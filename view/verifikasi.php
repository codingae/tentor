<style> 
h1{
  color: #fff;
  width: 600px;  
}
/*loader*/
.loader,
.loader:before,
.loader:after {
  background: #1E88E5;
  -webkit-animation: load1 1s infinite ease-in-out;
  animation: load1 1s infinite ease-in-out;
  width: 1em;
  height: 4em;
}
.loader:before,
.loader:after {
  position: absolute;
  top: 0;
  content: '';
}
.loader:before {
  left: -1.5em;
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.loader {
  text-indent: -9999em;
  margin: 88px auto;
  position: relative;
  font-size: 11px;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}
.loader:after {
  left: 1.5em;
}
@-webkit-keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #1E88E5;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #1E88E5;
    height: 5em;
  }
}
@keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #1E88E5;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #1E88E5;
    height: 5em;
  }
}
/*akhir loader*/  
</style>
<center><h3 style="color: #1E88E5"><b>Proses Verifikasi...</b></h3></center>
<div class="loader"></div>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<?php 
  include_once "_partial/lolibox.php";
  $kode  = addslashes(mysqli_real_escape_string($koneksi,$_GET['kode']));
  $uname = addslashes(mysqli_real_escape_string($koneksi,base64_decode($_GET['u'])));
  $query = mysqli_query($koneksi,"select * from user where uname='$uname' && kode_verifikasi='$kode'")or die(mysqli_error($koneksi));
  if (mysqli_num_rows($query)>0) {
    $update = mysqli_query($koneksi,"update user set status='mail_ok' where uname='$uname' && kode_verifikasi='$kode'")or die(mysqli_error($koneksi));
    if ($update==TRUE) {
/*      echo "<script>
              Lobibox.notify('default', {
                  continueDelayOnInactiveTab: true,
                  showClass: 'fadeInDown',
                  hideClass: 'fadeUpDown',
                  size: 'mini',
                  position: 'center top',
                  msg: 'Anda Berhasil Verifikasi Email'
              });
      </script>";*/
      ?>
        <meta http-equiv='refresh' content='3;url=login' />
      <?php
    }else{
      echo "<script>
                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: true,
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        size: 'mini',
                        position: 'center top',
                        msg: 'Sepertinya Ada Kesalahan, Silakan Hubungi Administrator'
                    });
            </script>";
    }
  }
?>