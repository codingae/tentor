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
<div class="container">
    <div class="row">
        <div class="content col-sm-8 col-md-9">
            <form action="" method="post" enctype="multipart/form-data" id="validasi">
            <span class="page-header">
                <div class="col-sm-9 col-md-9">
                    <div class="form-group">
                      <h1>Daftar Sebagai =></h1>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="form-group">
                        <select name="level">
                            <option value="">Pilih</option>
                            <option value="siswa">Siswa</option>
                            <option value="tentor_luar">Tentor</option>
                        </select>
                    </div>
                </div>
            </span>
            <div class="box">
                <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="file" name="file" type="file" class="file-loading">
                        </div>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" autocomplete="off" required>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Username (ex: skripsi_2017)" required>
                        <span id="cek_uname"></span>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="*******" required>
                        <span id="cek_pass"></span>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomer Telephon (ex:08571255xxxx)" required>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">

                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="skripsi_2017@mail.com" required>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-12">
                    <input id="pac-input" class="controls" type="text" name="alamat" placeholder="Masukkan Alamat Anda Disini" required>
                    <!-- <input class="controls" type="button" name="alamat" value="geolocation" onclick="getLocation()"> -->
                        <div id="map-canvas"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input class="form-control" type="text" placeholder="Latitude" name="latitude" id="input-latitude" readonly>
                                    <!-- <input class="form-control" type="text" placeholder="Latitude" name="lat"> -->
                                </div><!-- /.form-group -->
                            </div><!-- /.col-* -->

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input class="form-control" type="text" placeholder="Lontgitude" name="longitude" id="input-longitude" readonly>
                                    <!-- <input class="form-control" type="text" placeholder="Lontgitude" name="lng"> -->
                                </div><!-- /.form-group -->
                            </div><!-- /.col-* -->
                        </div><!-- /.row -->
                    </div>
                </div>
            </div><!-- /.box -->

            <div class="center">
                <button class="btn btn-xl" name="submit-daftar">Daftar</button>
            </div><!-- /.center -->
            </form>
        </div><!-- /.content -->
        <div class="sidebar col-sm-4 col-md-3">
            <div class="widget">
                <div class="widget-title">
                    <h2>Top Tentor</h2>
                </div><!--/.widget-title -->

                <div class="widget-content">
                    <div class="agent-small">
                        <div class="agent-small-inner">
                            <div class="agent-small-image">
                                <a href="#" class="agent-small-image-inner">
                                    <img src="assets/img/tmp/agents/female.jpg" alt="">
                                </a><!-- /.agent-small-image-inner -->
                            </div><!-- /.agent-small-image -->

                            <div class="agent-small-content">
                                <h3 class="agent-small-title">
                                    <a href="#">Caelan Sinclair</a>
                                </h3>

                                <div class="agent-small-email">
                                    <i class="fa fa-at"></i> <a href="#">E-mail Address</a>
                                </div><!-- /.agent-small-email -->

                                <div class="agent-small-phone">
                                    <i class="fa fa-phone"></i> 1401-123-456
                                </div><!-- /.agent-small-phone -->
                            </div><!-- /.agent-small-content -->
                        </div><!-- /.agent-small-inner -->
                    </div><!-- /.agent-small -->

                    <div class="agent-small">
                        <div class="agent-small-inner">
                            <div class="agent-small-image">
                                <a href="#" class="agent-small-image-inner">
                                    <img src="assets/img/tmp/agents/male.jpg" alt="">
                                </a><!-- /.agent-small-image-inner -->
                            </div><!-- /.agent-small-image -->

                            <div class="agent-small-content">
                                <h3 class="agent-small-title">
                                    <a href="#">Lee Izzy</a>
                                </h3>

                                <div class="agent-small-email">
                                    <i class="fa fa-at"></i> <a href="#">E-mail Address</a>
                                </div><!-- /.agent-small-email -->

                                <div class="agent-small-phone">
                                    <i class="fa fa-phone"></i> 1401-456-789
                                </div><!-- /.agent-small-phone -->
                            </div><!-- /.agent-small-content -->
                        </div><!-- /.agent-small-inner -->
                    </div><!-- /.agent-small -->


                    <div class="agent-small">
                        <div class="agent-small-inner">
                            <div class="agent-small-image">
                                <a href="#" class="agent-small-image-inner">
                                    <img src="assets/img/tmp/agents/male.jpg" alt="">
                                </a><!-- /.agent-small-image-inner -->
                            </div><!-- /.agent-small-image -->

                            <div class="agent-small-content">
                                <h3 class="agent-small-title">
                                    <a href="#">Derick Brice</a>
                                </h3>

                                <div class="agent-small-email">
                                    <i class="fa fa-at"></i> <a href="#">E-mail Address</a>
                                </div><!-- /.agent-small-email -->

                                <div class="agent-small-phone">
                                    <i class="fa fa-phone"></i> 1401-789-123
                                </div><!-- /.agent-small-phone -->
                            </div><!-- /.agent-small-content -->
                        </div><!-- /.agent-small-inner -->
                    </div><!-- /.agent-small -->
                </div><!-- /.widget-content -->
            </div><!-- /.widget -->

            <div class="widget">
                <div class="widget-title">
                    <h2>Cari Tentor</h2>
                </div><!-- /.widget-title -->

                <div class="widget-content">
                    <form method="post" action="#!">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Keyword">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <select name="property">
                                <option>Property Type</option>
                                <option>Apartment</option>
                                <option>Condo</option>
                                <option>House</option>
                                <option>Villa</option>
                            </select>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <select name="contract">
                                <option>Contract</option>
                                <option>Rent</option>
                                <option>Sale</option>
                            </select>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <select name="location">
                                <option>Location</option>
                                <option>Kensal</option>
                                <option>Braymer</option>
                                <option>Horton Bay</option>
                                <option>Laurel Run</option>
                                <option>Estherville</option>
                                <option>Millhousen</option>
                                <option>Allegan</option>
                                <option>Florala</option>
                                <option>Dundarrach</option>
                                <option>Neligh</option>
                                <option>Roseboro</option>
                                <option>Mount Pleasant</option>
                                <option>Moro</option>
                                <option>Strathmoor Village</option>
                                <option>Mabton</option>
                                <option>Loup City</option>
                                <option>Wolverine</option>
                                <option>San Leandro</option>
                                <option>Dunwoody</option>
                                <option>Battle Ground</option>
                                <option>Hanson</option>
                                <option>Reedley</option>
                                <option>Bayshore</option>
                                <option>Tupelo</option>
                                <option>Lone Pine</option>
                            </select>
                        </div><!-- /.form-group -->

                        <button class="btn btn-lg btn-block">Search</button>
                    </form>
                </div><!-- /.widget-content -->
            </div><!-- /.widget -->
        </div><!-- /.sidebar -->
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

/*cek uname & pass*/
$(document).ready(function(){
    $('#uname').blur(function(){
        $('#cek_uname').html('<img style="margin-left:10px; width:10px" src="assets/img/loading.gif">');
        var uname = $(this).val();
        $.ajax({
            type    : 'POST',
            url     : 'view/proses.php',
            data    : 'uname='+uname,
            success : function(data){
                $('#cek_uname').html(data);
            }
        })

    });
    $('#pass').blur(function(){
        $('#cek_pass').html('<img style="margin-left:10px; width:10px" src="assets/img/loading.gif">');
        var pass = $(this).val();
        $.ajax({
            type    : 'POST',
            url     : 'view/proses.php',
            data    : 'pass='+pass,
            success : function(data){
                $('#cek_pass').html(data);
            }
        })
    });
});
</script>

<?php
    if (isset($_POST['submit-daftar'])) {
        $date = date("Ymd");    
        $level        = addslashes(mysqli_real_escape_string($koneksi,$_POST['level']));
        $query_id     = mysqli_query($koneksi,"select id_user from user where id_user like '%$date' order by id_user desc limit 1");
        $row_id       = mysqli_fetch_array($query_id);
        if (mysqli_num_rows($query_id)>0) {
            $id_user = $row_id['id_user']+1;
        }
        else{
            if ($level == "siswa") {
                $id_user = "4".$date."001";
            }
            elseif ($level == "tentor_luar") {
                $id_user = "3".$date."001";
            }
        }   
        $uname        = addslashes(mysqli_real_escape_string($koneksi,$_POST['uname']));
        $pass         = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass'])));
        $nama_lengkap = addslashes(mysqli_real_escape_string($koneksi,$_POST['nama_lengkap']));
        $no_telp      = addslashes(mysqli_real_escape_string($koneksi,$_POST['no_telp']));
        $email        = addslashes(mysqli_real_escape_string($koneksi,$_POST['email']));
        $alamat       = addslashes(mysqli_real_escape_string($koneksi,$_POST['alamat']));
        $longitude    = addslashes(mysqli_real_escape_string($koneksi,$_POST['longitude']));
        $latitude     = addslashes(mysqli_real_escape_string($koneksi,$_POST['latitude']));
        $kode         = md5($uname).md5($pass);
        /*echo "nama lengkap: ".$nama_lengkap."<br>";
        echo "username: ".$uname."<br>";
        echo "password: ".$pass."<br>";
        echo "nomer telpon: ".$no_telp."<br>";
        echo "email: ".$email."<br>";
        echo "alamat: ".$alamat."<br>";
        echo "longitude: ".$longitude."<br>";
        echo "latitude: ".$latitude."<br>";*/
        // untuk foto
        $time   = time();                               //waktu
        $nama   = $_FILES['file']['name'];              //nama
        // $ukuran = $_FILES['file']['size'];              //size
        $error  = $_FILES['file']['error'];             //error
        $asal   = $_FILES['file']['tmp_name'];          //asal file
        // $format = pathinfo($nama,PATHINFO_EXTENSION);   //format file
        $nmfile = "assets/pp/".$nama;                         //folder + nama image
        if ($level == "siswa") {
            // seleksi ada foto atau tidak
            if (!empty($nama)) {
                // seleksi error
                if ($error === 0 ) {
                    //seleksi nama file
                    if (file_exists($nmfile)) {
                        $nmfile = str_replace(".".$format,"", $nmfile);
                        $nmfile = $nmfile."_".$time.".".$format;
                        $upload = move_uploaded_file($asal,$nmfile);
                        // seleksi saat berhasil upload ke direktori
                        if ($upload == TRUE) {
                            // saat semua data sudah ready
                            include "assets/libraries/mail/PHPMailerAutoload.php";
                            $mail = new PHPMailer;
                            $mail->isSMTP();
                            $mail->SMTPDebug = 2;
                            $mail->Debugoutput = 'html';
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587;
                            $mail->SMTPSecure = 'tls';
                            $mail->SMTPAuth = true;
                            $mail->Username = "aplikasitentor@gmail.com";
                            $mail->Password = "Qwerty09876";
                            $mail->setFrom('aplikasitentor@gmail.com', 'Aplikasi Tentor');
                            $mail->addAddress($email, $uname);
                            $mail->Subject = 'Aktivasi Akun Aplikasi Tentor';
                            $mail->msgHTML("Silakan Klik Link Dibawah ini Untuk Verifikasi Akun Anda, Apabila Tidak Bisa Di Klik, Silakan copy-paste Link Dibawah Ini <br><br><a href='http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."'>http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."</a><br><br><b>Terima Kasih Telah Bergabung</b>");
                            if (!$mail->send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                $query1 = mysqli_query($koneksi,"insert into user values ('$id_user','$level','$uname','$pass','','mail_tunggu','$kode') ")or die (mysqli_error($koneksi));
                                $query1 = mysqli_query($koneksi,"insert into user_detail values ('$id_user','$nama_lengkap','$no_telp','$email','$alamat','$nmfile','$longitude','$latitude') ")or die (mysqli_error($koneksi));
                                if ($query1 == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Anda Berhasil Mendaftar, Silakan Cek Email Anda'
                                                });
                                        </script><meta http-equiv='refresh' content='4;url=login' />";
                                }
                            }                    
                            // end mail
                        }else{
                            echo "<script>
                                        Lobibox.notify('error', {
                                            continueDelayOnInactiveTab: true,
                                            showClass: 'fadeInDown',
                                            hideClass: 'fadeUpDown',
                                            size: 'mini',
                                            position: 'center top',
                                            msg: 'Upload file gagal, Silakan hubungi admin'
                                        });
                                </script>";
                        }                   
                    }else{
                        $upload = move_uploaded_file($asal,$nmfile);
                        // seleksi saat berhasil upload ke direktori
                        if ($upload == TRUE) {
                            // saat semua data sudah ready
                            include "assets/libraries/mail/PHPMailerAutoload.php";
                            $mail = new PHPMailer;
                            $mail->isSMTP();
                            $mail->SMTPDebug = 2;
                            $mail->Debugoutput = 'html';
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587;
                            $mail->SMTPSecure = 'tls';
                            $mail->SMTPAuth = true;
                            $mail->Username = "aplikasitentor@gmail.com";
                            $mail->Password = "Qwerty09876";
                            $mail->setFrom('aplikasitentor@gmail.com', 'Aplikasi Tentor');
                            $mail->addAddress($email, $uname);
                            $mail->Subject = 'Aktivasi Akun Aplikasi Tentor';
                            $mail->msgHTML("Silakan Klik Link Dibawah ini Untuk Verifikasi Akun Anda, Apabila Tidak Bisa Di Klik, Silakan copy-paste Link Dibawah Ini <br><br><a href='http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."'>http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."</a><br><br><b>Terima Kasih Telah Bergabung</b>");
                            if (!$mail->send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                $query1 = mysqli_query($koneksi,"insert into user values ('$id_user','$level','$uname','$pass','','mail_tunggu','$kode') ")or die (mysqli_error($koneksi));
                                $query1 = mysqli_query($koneksi,"insert into user_detail values ('$id_user','$nama_lengkap','$no_telp','$email','$alamat','$nmfile','$longitude','$latitude') ")or die (mysqli_error($koneksi));
                                if ($query1 == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Anda Berhasil Mendaftar, Silakan Cek Email Anda'
                                                });
                                        </script><meta http-equiv='refresh' content='4;url=login' />";
                                }
                            }                    
                            // end mail
                        }else{
                            echo "<script>
                                        Lobibox.notify('error', {
                                            continueDelayOnInactiveTab: true,
                                            showClass: 'fadeInDown',
                                            hideClass: 'fadeUpDown',
                                            size: 'mini',
                                            position: 'center top',
                                            msg: 'Upload file gagal, Silakan hubungi admin'
                                        });
                                </script>";
                        }
                    }
                }else{
                    echo "error";
                }  
            }else{
                // saat semua data sudah ready
                include "assets/libraries/mail/PHPMailerAutoload.php";
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPDebug = 2;
                $mail->Debugoutput = 'html';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Username = "aplikasitentor@gmail.com";
                $mail->Password = "Qwerty09876";
                $mail->setFrom('aplikasitentor@gmail.com', 'Aplikasi Tentor');
                $mail->addAddress($email, $uname);
                $mail->Subject = 'Aktivasi Akun Aplikasi Tentor';
                $mail->msgHTML("Silakan Klik Link Dibawah ini Untuk Verifikasi Akun Anda, Apabila Tidak Bisa Di Klik, Silakan copy-paste Link Dibawah Ini <br><br><a href='http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."'>http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."</a><br><br><b>Terima Kasih Telah Bergabung</b>");
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $query1 = mysqli_query($koneksi,"insert into user values ('$id_user','$level','$uname','$pass','','mail_tunggu','$kode') ")or die (mysqli_error($koneksi));
                    $query1 = mysqli_query($koneksi,"insert into user_detail values ('$id_user','$nama_lengkap','$no_telp','$email','$alamat','assets/img/default_avatar.jpg','$longitude','$latitude') ")or die (mysqli_error($koneksi));
                    if ($query1 == TRUE) {
                        echo "<script>
                                    Lobibox.notify('default', {
                                        continueDelayOnInactiveTab: true,
                                        showClass: 'fadeInDown',
                                        hideClass: 'fadeUpDown',
                                        size: 'mini',
                                        position: 'center top',
                                        msg: 'Anda Berhasil Mendaftar, Silakan Cek Email Anda'
                                    });
                            </script><meta http-equiv='refresh' content='4;url=login' />";
                    }else{
                        echo "<script>
                                Lobibox.notify('error', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Upload file gagal, Silakan hubungi admin'
                                });
                        </script>";
                    }
                }                    
                // end mail
            }
        }elseif ($level == "tentor_luar") {

            // seleksi ada foto atau tidak
            if (!empty($nama)) {
                // seleksi error
                if ($error === 0 ) {
                    //seleksi nama file
                    if (file_exists($nmfile)) {
                        $nmfile = str_replace(".".$format,"", $nmfile);
                        $nmfile = $nmfile."_".$time.".".$format;
                        $upload = move_uploaded_file($asal,$nmfile);
                        // seleksi saat berhasil upload ke direktori
                        if ($upload == TRUE) {
                            // saat semua data sudah ready
                            include "assets/libraries/mail/PHPMailerAutoload.php";
                            $mail = new PHPMailer;
                            $mail->isSMTP();
                            $mail->SMTPDebug = 2;
                            $mail->Debugoutput = 'html';
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587;
                            $mail->SMTPSecure = 'tls';
                            $mail->SMTPAuth = true;
                            $mail->Username = "aplikasitentor@gmail.com";
                            $mail->Password = "Qwerty09876";
                            $mail->setFrom('aplikasitentor@gmail.com', 'Aplikasi Tentor');
                            $mail->addAddress($email, $uname);
                            $mail->Subject = 'Aktivasi Akun Aplikasi Tentor';
                            $mail->msgHTML("Silakan Klik Link Dibawah ini Untuk Verifikasi Akun Anda, Apabila Tidak Bisa Di Klik, Silakan copy-paste Link Dibawah Ini <br><br><a href='http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."'>http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."</a><br><br><b>Terima Kasih Telah Bergabung</b>");
                            if (!$mail->send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                $query1 = mysqli_query($koneksi,"insert into user values ('$id_user','$level','$uname','$pass','','mail_tunggu','$kode') ")or die (mysqli_error($koneksi));
                                $query1 = mysqli_query($koneksi,"insert into user_detail values ('$id_user','$nama_lengkap','$no_telp','$email','$alamat','$nmfile','$longitude','$latitude') ")or die (mysqli_error($koneksi));
                                for ($i=1; $i < 5 ; $i++) { 
                                    if ($i=="1") {
                                        $jam = "02.00-03.30";
                                    }elseif ($i=="2") {
                                        $jam = "03.45-05.15";
                                    }elseif ($i=="3") {
                                        $jam = "05.30-07.00";
                                    }elseif ($i=="4") {
                                        $jam = "07.15-08.45";
                                    }
                                    $query1 = mysqli_query($koneksi,"insert into jadwal_tentor values ('','$id_user','$jam','kosong','kosong','kosong','kosong','kosong','kosong','kosong') ")or die (mysqli_error($koneksi));
                                }
                                if ($query1 == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Anda Berhasil Mendaftar, Silakan Cek Email Anda'
                                                });
                                        </script><meta http-equiv='refresh' content='4;url=login' />";
                                }
                            }                    
                            // end mail
                        }else{
                            echo "<script>
                                        Lobibox.notify('error', {
                                            continueDelayOnInactiveTab: true,
                                            showClass: 'fadeInDown',
                                            hideClass: 'fadeUpDown',
                                            size: 'mini',
                                            position: 'center top',
                                            msg: 'Upload file gagal, Silakan hubungi admin'
                                        });
                                </script>";
                        }                   
                    }else{
                        $upload = move_uploaded_file($asal,$nmfile);
                        // seleksi saat berhasil upload ke direktori
                        if ($upload == TRUE) {
                            // saat semua data sudah ready
                            include "assets/libraries/mail/PHPMailerAutoload.php";
                            $mail = new PHPMailer;
                            $mail->isSMTP();
                            $mail->SMTPDebug = 2;
                            $mail->Debugoutput = 'html';
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587;
                            $mail->SMTPSecure = 'tls';
                            $mail->SMTPAuth = true;
                            $mail->Username = "aplikasitentor@gmail.com";
                            $mail->Password = "Qwerty09876";
                            $mail->setFrom('aplikasitentor@gmail.com', 'Aplikasi Tentor');
                            $mail->addAddress($email, $uname);
                            $mail->Subject = 'Aktivasi Akun Aplikasi Tentor';
                            $mail->msgHTML("Silakan Klik Link Dibawah ini Untuk Verifikasi Akun Anda, Apabila Tidak Bisa Di Klik, Silakan copy-paste Link Dibawah Ini <br><br><a href='http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."'>http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."</a><br><br><b>Terima Kasih Telah Bergabung</b>");
                            if (!$mail->send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                $query1 = mysqli_query($koneksi,"insert into user values ('$id_user','$level','$uname','$pass','','mail_tunggu','$kode') ")or die (mysqli_error($koneksi));
                                $query1 = mysqli_query($koneksi,"insert into user_detail values ('$id_user','$nama_lengkap','$no_telp','$email','$alamat','$nmfile','$longitude','$latitude') ")or die (mysqli_error($koneksi));
                                for ($i=1; $i < 5 ; $i++) { 
                                    if ($i=="1") {
                                        $jam = "02.00-03.30";
                                    }elseif ($i=="2") {
                                        $jam = "03.45-05.15";
                                    }elseif ($i=="3") {
                                        $jam = "05.30-07.00";
                                    }elseif ($i=="4") {
                                        $jam = "07.15-08.45";
                                    }
                                    $query1 = mysqli_query($koneksi,"insert into jadwal_tentor values ('','$id_user','$jam','kosong','kosong','kosong','kosong','kosong','kosong','kosong') ")or die (mysqli_error($koneksi));
                                }
                                if ($query1 == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Anda Berhasil Mendaftar, Silakan Cek Email Anda'
                                                });
                                        </script><meta http-equiv='refresh' content='4;url=login' />";
                                }
                            }                    
                            // end mail
                        }else{
                            echo "<script>
                                        Lobibox.notify('error', {
                                            continueDelayOnInactiveTab: true,
                                            showClass: 'fadeInDown',
                                            hideClass: 'fadeUpDown',
                                            size: 'mini',
                                            position: 'center top',
                                            msg: 'Upload file gagal, Silakan hubungi admin'
                                        });
                                </script>";
                        }
                    }
                }else{
                    echo "error";
                }  
            }else{
                // saat semua data sudah ready
                include "assets/libraries/mail/PHPMailerAutoload.php";
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPDebug = 2;
                $mail->Debugoutput = 'html';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
                $mail->Username = "aplikasitentor@gmail.com";
                $mail->Password = "Qwerty09876";
                $mail->setFrom('aplikasitentor@gmail.com', 'Aplikasi Tentor');
                $mail->addAddress($email, $uname);
                $mail->Subject = 'Aktivasi Akun Aplikasi Tentor';
                $mail->msgHTML("Silakan Klik Link Dibawah ini Untuk Verifikasi Akun Anda, Apabila Tidak Bisa Di Klik, Silakan copy-paste Link Dibawah Ini <br><br><a href='http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."'>http://localhost/tentor/verifikasi&kode&".$kode."&u&".base64_encode($uname)."</a><br><br><b>Terima Kasih Telah Bergabung</b>");
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $query1 = mysqli_query($koneksi,"insert into user values ('$id_user','$level','$uname','$pass','','mail_tunggu','$kode') ")or die (mysqli_error($koneksi));
                    $query1 = mysqli_query($koneksi,"insert into user_detail values ('$id_user','$nama_lengkap','$no_telp','$email','$alamat','assets/img/default_avatar.jpg','$longitude','$latitude') ")or die (mysqli_error($koneksi));
                    for ($i=1; $i < 5 ; $i++) { 
                        if ($i=="1") {
                            $jam = "02.00-03.30";
                        }elseif ($i=="2") {
                            $jam = "03.45-05.15";
                        }elseif ($i=="3") {
                            $jam = "05.30-07.00";
                        }elseif ($i=="4") {
                            $jam = "07.15-08.45";
                        }
                        $query1 = mysqli_query($koneksi,"insert into jadwal_tentor values ('','$id_user','$jam','kosong','kosong','kosong','kosong','kosong','kosong','kosong') ")or die (mysqli_error($koneksi));
                    }
                    if ($query1 == TRUE) {
                        echo "<script>
                                    Lobibox.notify('default', {
                                        continueDelayOnInactiveTab: true,
                                        showClass: 'fadeInDown',
                                        hideClass: 'fadeUpDown',
                                        size: 'mini',
                                        position: 'center top',
                                        msg: 'Anda Berhasil Mendaftar, Silakan Cek Email Anda'
                                    });
                            </script><meta http-equiv='refresh' content='4;url=login' />";
                    }else{
                        echo "<script>
                                Lobibox.notify('error', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Upload file gagal, Silakan hubungi admin'
                                });
                        </script>";
                    }
                }                    
                // end mail
            }
        }
    }
?>
