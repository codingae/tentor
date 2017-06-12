<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">

<script type="text/javascript" src="assets/js/jquery.js"></script>
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
<style type="text/css">
/* animated spoiler CSS by Bloggersentral.com */
/*.spoilerbutton {display:block;margin:5px 0;}
.spoiler {overflow:hidden;background: #f5f5f5;}
.spoiler > div {-webkit-transition: all 0.2s ease;-moz-transition: margin 0.2s ease;-o-transition: all 0.2s ease;transition: margin 0.2s ease;}
.spoilerbutton[value="Opsi_Bayar_1"] + .spoiler > div {margin-top:-100%;}
.spoilerbutton[value="Sembunyikan_Opsi_1"] + .spoiler {padding:5px;} 
.spoilerbutton[value="Opsi_Bayar_2"] + .spoiler > div {margin-top:-100%;}
.spoilerbutton[value="Sembunyikan_Opsi_2"] + .spoiler {padding:5px;} */
</style>
<div class="container">
    <div class="row">
        <!-- sidebar -->
        <?php include_once "_partial/sidebar.php"; ?>
        <!-- end sidebar -->
        <!-- konten -->
        <div class="content col-sm-8 col-md-9">
            <h1 class="page-header">Pemberitahuan</h1>
            <div class="box">
                <table class="table table-bordered">
                    <tr style="background: #1E88E5">
                        <td style="width: 5%"><b>#!</b></td>
                        <td style="width: 55%"><b>Pemberitahuan</b></td>
                        <!-- <td><b>Status</b></td> -->
                        <td style="width: 35%"><b>Aksi</b></td>
                    </tr>
                    <?php 
                        $no = 1;
                        $id_user_pencari = base64_decode($_SESSION['id_user']);
                        $query_pemberitahuan = mysqli_query($koneksi,"select 
                            permintaan_tentor.status,
                            permintaan_tentor.id_permintaan,
                            permintaan_tentor.id_biaya,
                            permintaan_tentor.upload_bukti_bayar,
                            permintaan_tentor.mulai_les,
                            permintaan_tentor.selesai_les,
                            user_detail.nama_lengkap,
                            biaya.biaya
                            from permintaan_tentor INNER JOIN user_detail 
                                 ON permintaan_tentor.id_user_tentor=user_detail.id_user
                                 INNER JOIN biaya 
                                 ON permintaan_tentor.id_biaya=biaya.id
                             where permintaan_tentor.id_user_pencari='$id_user_pencari' 
                                   && (permintaan_tentor.status!='proses' or permintaan_tentor.status!='upload_proses')");
                        // $query_pemberitahuan = mysqli_query($koneksi,"select * from permintaan_tentor where id_user_tentor='$id_tentor' && status='proses'");
                        if (mysqli_num_rows($query_pemberitahuan)>0) {
                        while ($row_pemberitahuan = mysqli_fetch_array($query_pemberitahuan)) {
                    ?>
                    <tr>
                        <td style="width: 5%"><?php echo $no++; ?></td>
                        <td style="width: 55%">
                            <?php 
                                if ($row_pemberitahuan['status']=="diterima") {
                                    echo "Permintaan Les Kepada Tentor <b>".$row_pemberitahuan['nama_lengkap']."</b> DITERIMA, Silakan Melakukan Pembayaran";
                                }elseif ($row_pemberitahuan['status']=="upload_tidak_valid") {
                                    echo "File Bukti Bayar Anda Kemungkinan Kurang Jelas atau Tidak Sesuai, Silakan Upload Ulang Dengan File Yang Benar";                                    
                                }elseif ($row_pemberitahuan['status']=="upload_valid") {
                                    echo "Tentor Akan Mulai Mengajar Pada<b> ".$row_pemberitahuan['mulai_les']." sampai ".$row_pemberitahuan['selesai_les'];                                    
                                }
                            ?>
                        </td>
                        <!-- <td><?php echo $row_pemberitahuan['status']; ?></td> -->
                        <td style="width: 35%">
                            <?php 
                                if ($row_pemberitahuan['status']=="diterima") {
                                    ?>
                                    <button class="btn btn-secondary" onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='block'"><span class="fa fa-tasks"></span>Upload Bukti Bayar</button>
                                    <div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                        <center><h2 class="w3-center"><br>Upload Bukti Bayar</h2></center>
                                        <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Keluar">&times;</span>
                                        <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                                                        <div class="kv-avatar center-block" style="width:200px">
                                                            <input id="file" name="file" type="file" class="file-loading">
                                                        </div>
                                                    </div><!-- /.form-group -->                    
                                                </div>
                                                <p style="text-align: center; margin:0 auto;"> 
                                                        <input type="hidden" name="id_permintaan" value="<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                                        <button type="submit"  name="upload_bukti_bayar" class="btn btn-secondary">
                                                        Upload</button>
                                                </p>
                                            </form>
                                        </div>
                                        <!-- </div> -->
                                        </div>
                                    </div>
                                    <a href="pemberitahuan&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-info"></span>Detail </a>
                                    <?php
                                }
                                elseif ($row_pemberitahuan['status']=="upload_tidak_valid") {
                                    ?>
                                    <button class="btn btn-secondary" onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='block'"><span class="fa fa-tasks"></span>Upload Bukti Bayar</button>
                                    <div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                        <center><h2 class="w3-center"><br>Upload Bukti Bayar</h2></center>
                                        <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Keluar">&times;</span>
                                        <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                                                        <div class="kv-avatar center-block" style="width:200px">
                                                            <input id="file" name="file" type="file" class="file-loading">
                                                        </div>
                                                    </div><!-- /.form-group -->                    
                                                </div>
                                                <p style="text-align: center; margin:0 auto;"> 
                                                        <input type="hidden" name="id_permintaan" value="<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                                        <input type="hidden" name="bukti_bayar_lama" value="<?php echo $row_pemberitahuan['upload_bukti_bayar']; ?>">
                                                        <button type="submit"  name="upload_bukti_bayar" class="btn btn-secondary">
                                                        Upload</button>
                                                </p>
                                            </form>
                                        </div>
                                        <!-- </div> -->
                                        </div>
                                    </div>
                                    <a href="pemberitahuan&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-info"></span>Detail </a>
                                    <?php
                                }elseif ($row_pemberitahuan['status']=="upload_valid") {
                                    ?>
                                    <a href="pemberitahuan&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-info"></span>Detail </a>
                                    <?php
                                }
                            ?>
                            
                            
                        </td>
                    </tr>
                    <?php 
                        } 
                    }
                    else{
                    ?>
                    <tr><td colspan="7">Tidak Ada Pemberitahuan</td></tr>
                    <?php
                    } 
                    ?>
                </table>
                <?php 
                    if (isset($_GET['kode'])) {
                        $get_id   = base64_decode($_GET['kode']);
                        $query_dt = mysqli_query($koneksi,"select 
                            permintaan_tentor.id_permintaan,
                            permintaan_tentor.id_detail_permintaan_tentor,
                            permintaan_tentor.mulai_les,
                            permintaan_tentor.selesai_les,
                            user_detail.nama_lengkap,
                            user_detail.alamat,
                            keahlian.jenjang,
                            keahlian.mapel,
                            biaya.kelas,
                            biaya.biaya,
                            permintaan_tentor.durasi,
                            permintaan_tentor.status
                            from permintaan_tentor INNER JOIN user_detail 
                                 ON permintaan_tentor.id_user_tentor=user_detail.id_user
                                 INNER JOIN keahlian
                                 ON permintaan_tentor.id_keahlian=keahlian.id_keahlian
                                 INNER JOIN biaya
                                 ON permintaan_tentor.id_biaya=biaya.id
                             where permintaan_tentor.id_user_pencari='$id_user_pencari' 
                                   && (permintaan_tentor.status='diterima' || permintaan_tentor.status='upload_tidak_valid' || permintaan_tentor.status='upload_valid') && permintaan_tentor.id_permintaan='$get_id'");
                        $row_dt     = mysqli_fetch_array($query_dt);
                    ?>
                        <div class="row box">
                            <header><h3>Detail Permintaan Tentor</h3><hr></header>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Nama Tentor</label>
                                <input type="text" value="<?php echo ucwords($row_dt['nama_lengkap']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Jenjang</label>
                                <input type="text" value="<?php echo strtoupper($row_dt['jenjang']); ?>; Kelas: <?php echo strtoupper($row_dt['kelas']); ?>" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Mata Pelajaran</label>
                                <input type="text" value="<?php echo ucwords($row_dt['mapel']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Durasi Les</label>
                                <input type="text" value="<?php echo ucwords($row_dt['durasi']); ?> Bulan" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-12">
                                <label for="">Alamat</label>
                                <input type="text" value="<?php echo ucwords($row_dt['alamat']); ?>" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-12">
                                <label for="">Biaya</label>
                                <?php 
                                    $hasil = $row_dt['biaya']*$row_dt['durasi'];
                                ?><b><i>
                                <?php 
                                    if ($row_dt['status']=="upload_valid") {
                                        ?><input style="color:#1E88E5" type="text" value="LUNAS" class="form-control" readonly><?php
                                    }else{
                                    ?><input style="color:#1E88E5" type="text" value="Biaya Yang Harus Dibayar: Rp. <?php echo number_format($row_dt['biaya'],'0','.',',') ?> x <?php echo $row_dt['durasi']; ?> Bulan = <?php echo "Rp. ".number_format($hasil,'0','.',','); ?>" class="form-control" readonly><?php
                                    }
                                ?>
                                </i></b>
                            </div>
                            <?php 
                                if ($row_dt['status']=="upload_valid") {
                                }else{
                                    ?>
                                        <br><br>
                                        <br>
                                        <br>
                                        <div class="col-sm-12 col-md-12">
                                            <label for="">PEMBAYARAN</label>
                                            <h4><b style="color:#1E88E5"><i>Transfer Melalui Rek. BRI 2323213xxx A.N Ari Wijayanto (CEO FLC Jombang)</i></b></h4>
                                        </div>
                                    <?php
                                }
                            ?>
                            <br><br>
                            <hr>
                            <h3>Jadwal</h3>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Mulai Les</label>
                                <b><i>
                                    <input style="color:#1E88E5" type="text" value="<?php echo date_format(date_create($row_dt['mulai_les']),'d-m-Y'); ?>" class="form-control" readonly>
                                </i></b>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Selesai Les</label>
                                <b><i>
                                    <input style="color:#1E88E5" type="text" value="<?php echo date_format(date_create($row_dt['selesai_les']),'d-m-Y'); ?>" class="form-control" readonly>
                                </i></b>
                            </div>
                            <?php 
                                $no_jadwal    = 1;
                                $idnyadetail  = $row_dt['id_detail_permintaan_tentor'];
                                $query_jadwal = mysqli_query($koneksi,"select * from detail_permintaan_tentor where id_permintaan='$idnyadetail'");
                                $cek_jumlah   = mysqli_num_rows($query_jadwal);
                                while ($row_jadwal   = mysqli_fetch_array($query_jadwal)) {                                
                                    if ($cek_jumlah==3) {
                                    ?>
                                        <div class="col-sm-12 col-md-4">
                                            <label for="">Jadwal <?php echo $no_jadwal++; ?></label>
                                            <input type="text" value="Hari: <?php echo ucwords($row_jadwal['hari']); ?> ; Jam: <?php echo ucwords($row_jadwal['jam']); ?>" class="form-control" readonly>
                                        </div>
                                    <?php
                                    }elseif ($cek_jumlah==4) {
                                    ?>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="">Jadwal <?php echo $no_jadwal++; ?></label>
                                            <input type="text" value="Hari: <?php echo ucwords($row_jadwal['hari']); ?> ; Jam: <?php echo ucwords($row_jadwal['jam']); ?>" class="form-control" readonly>
                                        </div>
                                    <?php
                                    }
                                }
                            ?>
                            <br><br>
                            <br><br>
                            <br><br>
                            <center><a href="pemberitahuan"><button class="btn"><span class="fa fa-refresh"></span> Kembali</button></a></center>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div><!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script src="assets/libraries/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="assets/libraries/fileinput/js/fileinput.js" type="text/javascript"></script>
<?php 
    $query_cek = mysqli_query($koneksi,"select upload_bukti_bayar from permintaan_tentor where status='upload_tidak_valid' && id_permintaan='$get_id'");
    $row_cek   = mysqli_fetch_array($query_cek);
    if (mysqli_num_rows($query_cek)>0) {
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
        defaultPreviewContent: '<img src="<?php echo $row_cek['upload_bukti_bayar']; ?>" alt="Avatar" style="width:225px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
    </script>
    <?php    
    }else{
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
        defaultPreviewContent: '<img src="assets/img/doc.png" alt="Avatar" style="width:225px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
    </script>
    <?php
    }
?>
<?php 
    if (isset($_POST['upload_bukti_bayar'])) {
        include_once "_partial/lolibox.php";
        $id_permintaan = $_POST['id_permintaan'];
        if (isset($_POST['bukti_bayar_lama'])) {
            $bukti_bayar_lama = $_POST['bukti_bayar_lama'];
            unlink($bukti_bayar_lama);
        }
        $time   = time();                               //waktu
        $nama   = $_FILES['file']['name'];              //nama
        // $ukuran = $_FILES['file']['size'];              //size
        $error  = $_FILES['file']['error'];             //error
        $asal   = $_FILES['file']['tmp_name'];          //asal file
        // $format = pathinfo($nama,PATHINFO_EXTENSION);   //format file
        $nmfile = "assets/bb/".$nama;                         //folder + nama image

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
                        $update_upload_proses = mysqli_query($koneksi,"update permintaan_tentor set upload_bukti_bayar='$nmfile',status='upload_proses' where id_permintaan='$id_permintaan'");
                        if ($update_upload_proses == TRUE) {
                            echo "<script>
                                        Lobibox.notify('default', {
                                            continueDelayOnInactiveTab: true,
                                            showClass: 'fadeInDown',
                                            hideClass: 'fadeUpDown',
                                            size: 'mini',
                                            position: 'center top',
                                            msg: 'Anda Berhasil Mengupload File Bukti Bayar, Silakan Tunggu Konfirmasi Dari Admin LBB FLC'
                                        });
                                </script><meta http-equiv='refresh' content='4;url=pemberitahuan' />";
                        }
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
                            </script><meta http-equiv='refresh' content='4;url=pemberitahuan' />";
                    }                   
                }else{
                    $upload = move_uploaded_file($asal,$nmfile);
                    // seleksi saat berhasil upload ke direktori
                    if ($upload == TRUE) {
                        $update_upload_proses = mysqli_query($koneksi,"update permintaan_tentor set upload_bukti_bayar='$nmfile',status='upload_proses' where id_permintaan='$id_permintaan'");
                        if ($update_upload_proses == TRUE) {
                            echo "<script>
                                        Lobibox.notify('default', {
                                            continueDelayOnInactiveTab: true,
                                            showClass: 'fadeInDown',
                                            hideClass: 'fadeUpDown',
                                            size: 'mini',
                                            position: 'center top',
                                            msg: 'Anda Berhasil Mengupload File Bukti Bayar, Silakan Tunggu Konfirmasi Dari Admin LBB FLC'
                                        });
                                </script><meta http-equiv='refresh' content='4;url=pemberitahuan' />";
                        }
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
                            </script><meta http-equiv='refresh' content='4;url=pemberitahuan' />";
                    }
                }
            }else{
                echo "error";
            }
        }else{
             echo "<script>
                        Lobibox.notify('error', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Anda Belum Mengupload Bukti Bayar, Silakan Upload Dahulu File Bukti Bayar Anda'
                        });
                </script><meta http-equiv='refresh' content='3;url=pemberitahuan' />";
        }
    }
?>