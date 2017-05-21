<!-- some CSS styling changes and overrides -->
<style>
    .kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }
    .kv-avatar .file-input {
        display: table-cell;
        max-width: 220px;
    }
</style>
<?php 
    $kode   = addslashes($_GET['kode']);
    $query1 = mysqli_query($koneksi,"select * from view_user where id_user = '$kode'");
    $row1   = mysqli_fetch_array($query1);
?>
<div class="admin-content-main">
    <div class="admin-content-main-inner">
        <div class="container-fluid">
            <div class="col-sm-12">
                <form action="" method="post" enctype="multipart/form-data" id="useradmin">
                    <div class="box">
                        <span class="page-header">
                          <div class="col-sm-9 col-md-9">
                              <div class="form-group">
                                  <h1>Profil <?php echo ucfirst($row1['uname']) ?> </h1>
                              </div>
                          </div>
                        </span>
                        <div class="row">
                            <!-- <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                                    <div class="kv-avatar center-block" style="width:200px">
                                        <input id="file" name="file" type="file" class="file-loading">
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" value="<?= $row1['nama_lengkap'] ?>" placeholder="Nama Lengkap" name="nama_lengkap" autocomplete="off" required>
                                </div><!-- /.form-group -->                    
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?= $row1['uname'] ?>" id="uname" name="uname" placeholder="Username (ex: skripsi_2017)" required>
                                    <span id="cek_uname"></span>
                                </div><!-- /.form-group -->                    
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="hidden" value="<?= $row1['pass'] ?>"" id="pass_lama" name="pass_lama">
                                    <input type="password" value="******" class="form-control" id="pass" name="pass" placeholder="*******" required>
                                    <span id="cek_pass"></span>
                                </div><!-- /.form-group -->                    
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" value="<?= $row1['no_telp'] ?>" class="form-control" id="no_telp" name="no_telp" placeholder="Nomer Telephon (ex:08571255xxxx)" required>
                                </div><!-- /.form-group -->                    
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" value="<?= $row1['email'] ?>" class="form-control" id="email" name="email" placeholder="skripsi_2017@mail.com" required>
                                </div><!-- /.form-group -->                    
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <input id="pac-input" value="<?= $row1['alamat'] ?>" class="controls" type="text" name="alamat" placeholder="Masukkan Alamat Anda Disini" required>
                                <!-- <input class="controls" type="button" name="alamat" value="geolocation" onclick="getLocation()"> -->
                                <div id="map-canvas"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input class="form-control" value="<?= $row1['lattitude'] ?>" type="text" placeholder="Latitude" name="latitude" id="input-latitude" readonly>
                                            <!-- <input class="form-control" type="text" placeholder="Latitude" name="lat"> -->
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-* -->

                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input class="form-control" value="<?= $row1['longtitude'] ?>" type="text" placeholder="Lontgitude" name="longitude" id="input-longitude" readonly>
                                            <!-- <input class="form-control" type="text" placeholder="Lontgitude" name="lng"> -->
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-* -->
                                </div><!-- /.row -->
                            </div>
                        </div>
                        <div class="center">
                            <button class="btn btn-xl" name="editadmin">EDIT</button>
                        </div><!-- /.center -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
    if (isset($_POST['editadmin'])) {
        $nama_lengkap = addslashes(mysqli_real_escape_string($koneksi,$_POST['nama_lengkap']));
        $no_telp      = addslashes(mysqli_real_escape_string($koneksi,$_POST['no_telp']));
        $email        = addslashes(mysqli_real_escape_string($koneksi,$_POST['email']));
        $alamat       = addslashes(mysqli_real_escape_string($koneksi,$_POST['alamat']));
        $longitude    = addslashes(mysqli_real_escape_string($koneksi,$_POST['longitude']));
        $latitude     = addslashes(mysqli_real_escape_string($koneksi,$_POST['latitude']));
        $uname        = addslashes(mysqli_real_escape_string($koneksi,$_POST['uname']));
        $pass         = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass'])));
        $pass_lama    = addslashes(mysqli_real_escape_string($koneksi,$_POST['pass_lama']));
        if ($pass == "13bbf54a6850c393fb8d1b2b3bba997b") {
            $pass_fix = $pass_lama;
            $query_update = mysqli_query($koneksi,"update user set uname='$uname',pass='$pass_fix' where id_user='$id_user_sess'")or die(mysqli_error($koneksi));
            $query_update = mysqli_query($koneksi,"update user_detail set nama_lengkap='$nama_lengkap',no_telp='$no_telp',email='$email',alamat='$alamat',longtitude='$longitude',lattitude='$latitude' where id_user='$id_user_sess'")or die(mysqli_error($koneksi)); 
            if ($query_update == TRUE) {
                echo "<script>
                          Lobibox.notify('default', {
                              continueDelayOnInactiveTab: true,
                              showClass: 'fadeInDown',
                              hideClass: 'fadeUpDown',
                              size: 'mini',
                              position: 'center top',
                              msg: 'Berhasil update profil'
                          });
                  </script><meta http-equiv='refresh' content='4;url=admin' />";
            }
        }else{
            if ($pass_lama == $pass) {
                echo "<script>
                          Lobibox.notify('default', {
                              continueDelayOnInactiveTab: true,
                              showClass: 'fadeInDown',
                              hideClass: 'fadeUpDown',
                              size: 'mini',
                              position: 'center top',
                              msg: 'Password sama dengan password lama'
                          });
                  </script>
                  ";
            }else{
                $pass_fix = $pass;
                $query_update = mysqli_query($koneksi,"update user set uname='$uname',pass='$pass_fix' where id_user='$id_user_sess'")or die(mysqli_error($koneksi));
                $query_update = mysqli_query($koneksi,"update user_detail set nama_lengkap='$nama_lengkap',no_telp='$no_telp',email='$email',alamat='$alamat',longtitude='$longitude',lattitude='$latitude' where id_user='$id_user_sess'")or die(mysqli_error($koneksi)); 
                if ($query_update == TRUE) {
                    echo "<script>
                              Lobibox.notify('default', {
                                  continueDelayOnInactiveTab: true,
                                  showClass: 'fadeInDown',
                                  hideClass: 'fadeUpDown',
                                  size: 'mini',
                                  position: 'center top',
                                  msg: 'Berhasil update profil'
                              });
                      </script><meta http-equiv='refresh' content='4;url=admin' />
                  ";
                }
            }
        }
        
        // echo "nama lengkap: ".$nama_lengkap."<br>";
        // echo "username: ".$uname."<br>";
        // echo "password: ".$pass."<br>";
        // echo "passwordfix: ".$pass_fix."<br>";
        // echo "nomer telpon: ".$no_telp."<br>";
        // echo "email: ".$email."<br>";
        // echo "alamat: ".$alamat."<br>";
        // echo "longitude: ".$longitude."<br>";
        // echo "latitude: ".$latitude."<br>";
    }
?>