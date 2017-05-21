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
<div class="admin-content-main">
    <div class="admin-content-main-inner">
        <div class="container-fluid">
            <div class="col-sm-12">
                <form action="" method="post" enctype="multipart/form-data" id="useradmin">
                    <div class="box">
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
                                    <option value="tentor_luar">Tentor Luar</option>
                                    <option value="tentor_lbb">Tentor LBB</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        </span>
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
                        <div class="center">
                            <button class="btn btn-xl" name="submit-daftar">Daftar</button>
                        </div><!-- /.center -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
            elseif ($level == "tentor_luar" || $level == "tentor_lbb") {
                $id_user = "3".$date."001";
            }
            elseif ($level == "admin") {
                $id_user = "1".$date."001";
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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                            </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                            </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
        }elseif ($level == "tentor_lbb") {

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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                            </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
        }elseif ($level == "admin") {
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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                                        </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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
                            </script><meta http-equiv='refresh' content='4;url=pengguna' />";
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