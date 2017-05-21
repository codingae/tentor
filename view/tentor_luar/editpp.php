<?php 
    $id_user      = base64_decode($_GET['kode']); 
    $query_detail = mysqli_query($koneksi,"select foto,uname from view_user where id_user='$id_user'");
    $row1         = mysqli_fetch_array($query_detail);
?>
<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<style>
.crop {
    float: left;
    margin: .5em 10px .5em 0;
    overflow: hidden; /* this is important */
    position: relative; /* this is important too */
    border: 1px solid #ccc;
    width: 50px;
    height: 50px;
}
.crop img {
    position: absolute;
    top: -20px;
    left: -20px;
}
</style>
<div class="container">
    <div class="row">
        <!-- sidebar -->
        <?php include_once "_partial/sidebar.php"; ?>
        <!-- end sidebar -->
        <!-- konten -->
        <div class="content col-sm-8 col-md-9">
            <form action="" method="post" enctype="multipart/form-data" id="useradmin">
                <div class="box">
                    <span class="page-header">
                      <div class="col-sm-9 col-md-9">
                          <div class="form-group">                                  
                              <h1><a href="javascript:history.back()"><i class="fa fa-arrow-left"></i></a> Profil <?php echo ucfirst($row1['uname']) ?> </h1>
                          </div>
                      </div>
                    </span>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                                <div class="kv-avatar center-block" style="width:200px">
                                    <input id="file" name="file" type="file" class="file-loading" value="<?php echo $row1['foto']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                        <button class="btn btn-xl" name="edituser">EDIT</button>
                    </div><!-- /.center -->
                </div>
            </form>
        </div>
        <!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCL76rVshr5mzm9bOgZEtBVtIHhAsd1R6A"></script>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->
<script src="assets/libraries/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="assets/libraries/fileinput/js/fileinput.js" type="text/javascript"></script>
<?php 
    include_once "_partial/lolibox.php";
?>
<?php 
    if (isset($level_sess) && isset($row1['foto'])) {
        ?>
            <script>
                $("#file").fileinput({
                    overwriteInitial: true,
                    maxFileSize: 1500,
                    showClose: false,
                    showCaption: false,
                    browseLabel: '',
                    removeLabel: '',
                    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                    removeTitle: 'Hapus Foto',
                    elErrorContainer: '#kv-avatar-errors-1',
                    msgErrorClass: 'alert alert-block alert-danger',
                    defaultPreviewContent: '<img src="<?php echo $row1['foto']; ?>" alt="Avatar" style="width:190px">',
                    layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
                    allowedFileExtensions: ["jpg", "png", "gif"]
                });
            </script>
        <?php
    }
    else{
        ?>
            <script>
                $("#file").fileinput({
                    overwriteInitial: true,
                    maxFileSize: 1500,
                    showClose: false,
                    showCaption: false,
                    browseLabel: '',
                    removeLabel: '',
                    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                    removeTitle: 'Hapus Foto',
                    elErrorContainer: '#kv-avatar-errors-1',
                    msgErrorClass: 'alert alert-block alert-danger',
                    defaultPreviewContent: '<img src="assets/img/default_avatar.jpg" alt="Avatar" style="width:160px">',
                    layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
                    allowedFileExtensions: ["jpg", "png", "gif"]
                });
            </script>
        <?php
    }
?>
<?php 
    if (isset($_POST['edituser'])) {
        $time   = time();                               //waktu
        $nama   = $_FILES['file']['name'];              //nama
        $ukuran = $_FILES['file']['size'];              //size
        $error  = $_FILES['file']['error'];             //error
        $asal   = $_FILES['file']['tmp_name'];          //asal file
        $format = pathinfo($nama,PATHINFO_EXTENSION);   //format file
        $nmfile = "assets/pp/".$nama;                         //folder + nama image
        if ($nama == "") {
            echo "<script>
                          Lobibox.notify('default', {
                              continueDelayOnInactiveTab: true,
                              showClass: 'fadeInDown',
                              hideClass: 'fadeUpDown',
                              size: 'mini',
                              position: 'center top',
                              msg: 'Tidak ada perubahan'
                          });
                  </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
        }elseif ($nama != "") {
            if ($row1['foto']=="assets/img/default_avatar.jpg") {
                
            }else{
                unlink($row1['foto']);                
            }
            if ($error === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran < 1500000) { 
                    // seleksi format file
                    if ($format === "jpg" || $format === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile)) {
                            $nmfile = str_replace(".".$format,"", $nmfile);
                            $nmfile = $nmfile."_".$time.".".$format;
                            $upload = move_uploaded_file($asal,$nmfile);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $query_update = mysqli_query($koneksi,"update user_detail set foto='$nmfile' where id_user='$id_user'")or die(mysqli_error($koneksi));
                                if ($query_update==TRUE) {
                                    echo "<script>
                                                  Lobibox.notify('default', {
                                                      continueDelayOnInactiveTab: true,
                                                      showClass: 'fadeInDown',
                                                      hideClass: 'fadeUpDown',
                                                      size: 'mini',
                                                      position: 'center top',
                                                      msg: 'Berhasil Ganti Foto Profil, Tunggu...'
                                                  });
                                          </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
                                }
                            }else{
                                echo "<script>
                                              Lobibox.notify('default', {
                                                  continueDelayOnInactiveTab: true,
                                                  showClass: 'fadeInDown',
                                                  hideClass: 'fadeUpDown',
                                                  size: 'mini',
                                                  position: 'center top',
                                                  msg: 'Salah Upload, Hubungi administrator'
                                              });
                                      </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal,$nmfile);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $query_update = mysqli_query($koneksi,"update user_detail set foto='$nmfile' where id_user='$id_user'")or die(mysqli_error($koneksi));
                                if ($query_update==TRUE) {
                                    echo "<script>
                                                  Lobibox.notify('default', {
                                                      continueDelayOnInactiveTab: true,
                                                      showClass: 'fadeInDown',
                                                      hideClass: 'fadeUpDown',
                                                      size: 'mini',
                                                      position: 'center top',
                                                      msg: 'Berhasil Ganti Foto Profil, Tunggu...'
                                                  });
                                          </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
                                }
                            }else{
                                echo "<script>
                                              Lobibox.notify('default', {
                                                  continueDelayOnInactiveTab: true,
                                                  showClass: 'fadeInDown',
                                                  hideClass: 'fadeUpDown',
                                                  size: 'mini',
                                                  position: 'center top',
                                                  msg: 'Salah Upload, Hubungi administrator'
                                              });
                                      </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
                            }
                        }
                    }else{
                        echo "<script>
                                      Lobibox.notify('default', {
                                          continueDelayOnInactiveTab: true,
                                          showClass: 'fadeInDown',
                                          hideClass: 'fadeUpDown',
                                          size: 'mini',
                                          position: 'center top',
                                          msg: 'Salah Format, Gunakan JPG/PNG'
                                      });
                              </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
                    }
                }else{
                    echo "<script>
                                  Lobibox.notify('default', {
                                      continueDelayOnInactiveTab: true,
                                      showClass: 'fadeInDown',
                                      hideClass: 'fadeUpDown',
                                      size: 'mini',
                                      position: 'center top',
                                      msg: 'File Max 1,5 MB'
                                  });
                          </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
                }
            }else{
                echo "<script>
                              Lobibox.notify('default', {
                                  continueDelayOnInactiveTab: true,
                                  showClass: 'fadeInDown',
                                  hideClass: 'fadeUpDown',
                                  size: 'mini',
                                  position: 'center top',
                                  msg: 'File Error'
                              });
                      </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
            } 
        }
    }
?>