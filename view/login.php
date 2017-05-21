<?php 
  if (!isset($_SESSION['token_login'])) {
    $_SESSION['token_login'] = base64_encode(openssl_random_pseudo_bytes(32));
  }
?>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<!-- messagebox -->
<script type="text/javascript" src="assets/libraries/lolibox/js/lobibox.js"></script>
<script type="text/javascript" src="assets/libraries/lolibox/js/messageboxes.js"></script>
<script type="text/javascript" src="assets/libraries/lolibox/js/notifications.js"></script>
<div class="container">
  <div class="content">
    <div class="col-sm-4 col-sm-offset-4">
      <h2 class="page-header center">Form Login</h2>
      <div class="box" >
        <form method="post" action="">
          <div class="form-group">
            <input id="token_log" name="token_log" type="hidden" value="<?php echo $_SESSION['token_login']; ?> " >
            <input type="text" class="form-control" name="uname" placeholder="Username">
          </div><!-- /.form-group -->
          <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password">
          </div><!-- /.form-group -->
          <button type="submit" class="btn" name="masuk">Masuk</button>
          <a href="daftar" style="float: right;">Belum Punya Akun?</a>
        </form>
        <?php            
          if (isset($_POST['masuk']) && $_SESSION['token_login'] || $_POST['token_log']) {
            session_unset($_SESSION['token_login']);
            $uname = addslashes(mysqli_real_escape_string($koneksi,$_POST['uname']));
            $pass  = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass'])));
            $query = mysqli_query($koneksi,"select id_user,uname,pass,kode_verifikasi,status,level from user where uname='$uname' ")or die(mysqli_error($koneksi));
            $row   = mysqli_fetch_array($query);
            if ($row['level']=="admin") {
              ?>
                <br>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    Anda Tidak Memiliki Akses
                </div>
              <?php
            }else{
              if ($row['status']=='mail_tunggu') {
                echo "<script>
                              Lobibox.notify('error', {
                                  continueDelayOnInactiveTab: true,
                                  showClass: 'fadeInDown',
                                  hideClass: 'fadeUpDown',
                                  size: 'mini',
                                  position: 'center top',
                                  msg: 'Anda Belum Verifikasi Email'
                              });
                      </script>
                      ";
              }elseif (($row['status']=='mail_ok' || $row['status'] == 'verified') && ($row['uname'] == $uname && $row['pass'] == $pass) ) {
                $qr = mysqli_query($koneksi,"select level,uname,id_user from user where uname='$uname' && pass='$pass'");
                $rw = mysqli_fetch_array($qr);
                if ($rw['uname']==$uname) {
                  $last_login = date("Y-m-d H:i:s");
                  $update = mysqli_query($koneksi,"update user set last_login='$last_login' where uname='$uname'");
                  if ($update==TRUE) {
                    $_SESSION['uname']   = base64_encode($rw['uname']);
                    $_SESSION['level']   = base64_encode($rw['level']);
                    $_SESSION['id_user'] = base64_encode($rw['id_user']);
                    if ($rw['level']=="siswa") {
                      echo "<script>
                                    Lobibox.notify('default', {
                                        continueDelayOnInactiveTab: true,
                                        showClass: 'fadeInDown',
                                        hideClass: 'fadeUpDown',
                                        size: 'mini',
                                        position: 'center top',
                                        msg: 'Proses Verifikasi.......'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=siswa' />
                            ";
                    }elseif ($rw['level']=="tentor_luar") {
                      echo "<script>
                                    Lobibox.notify('default', {
                                        continueDelayOnInactiveTab: true,
                                        showClass: 'fadeInDown',
                                        hideClass: 'fadeUpDown',
                                        size: 'mini',
                                        position: 'center top',
                                        msg: 'Proses Verifikasi.......'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=tluar' />
                            ";
                    }elseif ($rw['level']=="tentor_lbb") {
                      echo "<script>
                                    Lobibox.notify('default', {
                                        continueDelayOnInactiveTab: true,
                                        showClass: 'fadeInDown',
                                        hideClass: 'fadeUpDown',
                                        size: 'mini',
                                        position: 'center top',
                                        msg: 'Proses Verifikasi.......'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=tentor' />
                            ";
                    }
                  }else{
                    ?>
                      <br>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                          Silakan Hubungi Administrator
                      </div>
                    <?php
                  }    
                }
              }else{
                $query_error = mysqli_query($koneksi,"select uname from user where uname!='$uname' || pass!='$pass'")or die(mysqli_error($koneksi));      
                if (mysqli_num_rows($query_error)>0){
                      ?>
                        <br>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            Username atau Password Tidak Cocok
                        </div>
                      <?php
                }
              }
            }
          }
        ?>        
      </div><!-- /.row -->
    </div><!-- /.col-* -->
  </div><!-- /.content -->
</div><!-- /.container -->

