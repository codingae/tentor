<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
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
        <div class="box">
            <h2 class="page-header">
            <div class="w3-row">
                <center>
                <a href="javascript:void(0)" onclick="tabsTentor(event, 'SD');">
                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m3 active">SD/MI</div>
                </a>
                <a href="javascript:void(0)" onclick="tabsTentor(event, 'SMP');">
                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m3">SMP/MTs</div>
                </a>
                <a href="javascript:void(0)" onclick="tabsTentor(event, 'SMA');">
                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m3">SMA/MA</div>
                </a>
                <a href="javascript:void(0)" onclick="tabsTentor(event, 'Sarjana');">
                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m3">Sarjana</div>
                </a>
                </center>
            </div> </h2>
            <div id="SD" class="w3-container kategoriTentor" style="display:none">
                <?php 
                $cek_user = mysqli_query($koneksi,"select id_user_tentor,sd,tahun_sd,ijazahsd from riwayat where id_user_tentor='$id_user_sess' && sd != '' && tahun_sd != '' && ijazahsd !='' ");
                $isi_sd   = mysqli_fetch_array($cek_user);
                $sd       = $isi_sd['sd'];
                $tahun_sd = $isi_sd['tahun_sd'];
                $ijazahsd = $isi_sd['ijazahsd'];
                // untuk edit
                if (mysqli_num_rows($cek_user) > 0) {
                    ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_sd_lama" name="ijazah_sd_lama" type="hidden" class="file-loading" value="<?= $ijazahsd ?>">
                            <input id="ijazah_sd" name="ijazah_sd" type="file" class="file-loading" value="<?= $ijazahsd ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="sd">Nama Sekolah Dasar</label>
                        <input class="form-control" id="sd" placeholder="Nama Sekolah Dasar" name="sd" value="<?= $sd ?>" autocomplete="off">
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_sd">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_sd" name="tahun_sd" placeholder="Tahun (Ex: 2001-2006)" value="<?= $tahun_sd ?>">
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="editsd">Edit</button></p>
                </form>
                    <?php                  
                }
                // untuk simpan
                else{
                    ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_sd" name="ijazah_sd" type="file" class="file-loading" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="sd">Nama Sekolah Dasar</label>
                        <input class="form-control" id="sd" placeholder="Nama Sekolah Dasar" name="sd" autocomplete="off" required>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_sd">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_sd" name="tahun_sd" placeholder="Tahun (Ex: 2001-2006)" required>
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="simpansd">Simpan</button></p>
                </form>
                    <?php
                }
                ?>
            </div>

            <div id="SMP" class="w3-container kategoriTentor" style="display:none">
                <?php 
                $cek_smp = mysqli_query($koneksi,"select id_user_tentor,smp,tahun_smp,ijazahsmp from riwayat where id_user_tentor='$id_user_sess' && smp != '' && tahun_smp != '' && ijazahsmp !='' ");
                $isi_smp   = mysqli_fetch_array($cek_smp);
                $smp       = $isi_smp['smp'];
                $tahun_smp = $isi_smp['tahun_smp'];
                $ijazahsmp = $isi_smp['ijazahsmp'];
                if (mysqli_num_rows($cek_smp) > 0) {
                ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_smp_lama" name="ijazah_smp_lama" type="hidden" value="<?= $ijazahsmp ?>">
                            <input id="ijazah_smp" name="ijazah_smp" type="file" class="file-loading">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="smp">Nama Sekolah Menengah Pertama</label>
                        <input class="form-control" id="smp" placeholder="Nama Sekolah Dasar" name="smp" value="<?= $smp ?>" autocomplete="off">
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_smp">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_smp" name="tahun_smp" value="<?= $tahun_smp ?>" placeholder="Tahun (Ex: 2006-2009)">
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="editsmp">Edit</button></p>
                </form>
                <?php                   
                }else{
                ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_smp" name="ijazah_smp" type="file" class="file-loading" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="smp">Nama Sekolah Menengah Pertama</label>
                        <input class="form-control" id="smp" placeholder="Nama Sekolah Dasar" name="smp" autocomplete="off" required>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_smp">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_smp" name="tahun_smp" placeholder="Tahun (Ex: 2006-2009)" required>
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="simpansmp">Simpan</button></p>
                </form>
                <?php
                }
                ?>
                
            </div>

            <div id="SMA" class="w3-container kategoriTentor" style="display:none">
                <?php 
                $cek_sma = mysqli_query($koneksi,"select id_user_tentor,sma,tahun_sma,ijazahsma from riwayat where id_user_tentor='$id_user_sess' && sma != '' && tahun_sma != '' && ijazahsma !='' ");
                $isi_sma   = mysqli_fetch_array($cek_sma);
                $sma       = $isi_sma['sma'];
                $tahun_sma = $isi_sma['tahun_sma'];
                $ijazahsma = $isi_sma['ijazahsma'];
                if (mysqli_num_rows($cek_sma) > 0) {
                ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_sma_lama" name="ijazah_sma_lama" type="hidden" value="<?= $ijazahsma ?>">
                            <input id="ijazah_sma" name="ijazah_sma" type="file" class="file-loading" value="<?= $ijazahsma ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="sma">Nama Sekolah Menengah Atas</label>
                        <input class="form-control" id="sma" placeholder="Nama Sekolah Dasar" name="sma" autocomplete="off" value="<?= $sma ?>">
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_sma">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_sma" name="tahun_sma" placeholder="Tahun (Ex: 2009-2012)" value="<?= $tahun_sma ?>">
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="editsma">Edit</button></p>
                </form>
                <?php             
                }else{
                ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_sma" name="ijazah_sma" type="file" class="file-loading" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="sma">Nama Sekolah Menengah Atas</label>
                        <input class="form-control" id="sma" placeholder="Nama Sekolah Dasar" name="sma" autocomplete="off" required>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_sma">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_sma" name="tahun_sma" placeholder="Tahun (Ex: 2009-2012)" required>
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="simpansma">Simpan</button></p>
                </form>
                <?php
                }
                ?>
            </div>

            <div id="Sarjana" class="w3-container kategoriTentor" style="display:none">
                <?php 
                $cek_sarjana   = mysqli_query($koneksi,"select id_user_tentor,sarjana,tahun_sarjana,transkrip from riwayat where id_user_tentor='$id_user_sess' && sarjana != '' && tahun_sarjana != '' && transkrip !='' ");
                $isi_sarjana   = mysqli_fetch_array($cek_sarjana);
                $sarjana       = $isi_sarjana['sarjana'];
                $tahun_sarjana = $isi_sarjana['tahun_sarjana'];
                $transkrip     = $isi_sarjana['transkrip'];
                if (mysqli_num_rows($cek_sarjana) > 0) {
                ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_sarjana_lama" name="ijazah_sarjana_lama" type="hidden" value="<?= $transkrip ?>">
                            <input id="ijazah_sarjana" name="ijazah_sarjana" type="file" class="file-loading" value="<?= $transkrip ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="sarjana">Nama Perguruan Tinggi</label>
                        <input class="form-control" id="sarjana" placeholder="Nama Sekolah Dasar" name="sarjana" autocomplete="off" value="<?= $sarjana ?>">
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_sarjana">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_sarjana" name="tahun_sarjana" placeholder="Tahun (Ex: 2012-2016)" value="<?= $tahun_sarjana ?>">
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="editsarjana">Edit</button></p>
                </form>
                <?php                    
                }else{
                ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div id="kv-avatar-errors-1" class="center-block" style="display:none;float: left"></div>
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="ijazah_sarjana" name="ijazah_sarjana" type="file" class="file-loading" required>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="sarjana">Nama Perguruan Tinggi</label>
                        <input class="form-control" id="sarjana" placeholder="Nama Sekolah Dasar" name="sarjana" autocomplete="off" required>
                    </div><!-- /.form-group -->                    
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="tahun_sarjana">Tahun Pendidikan</label>
                        <input type="text" class="form-control" id="tahun_sarjana" name="tahun_sarjana" placeholder="Tahun (Ex: 2012-2016)" required>
                    </div><!-- /.form-group -->                    
                </div>
                <p style="text-align: center; margin:0 auto;"><button type="submit" class="btn" name="simpansarjana">Simpan</button></p>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
        </div>
        <!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/libraries/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="assets/libraries/fileinput/js/fileinput.js" type="text/javascript"></script>
<!-- file input sd -->
<?php   
$cek_user = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user_sess' && sd != '' && tahun_sd != '' && ijazahsd !='' ");
if (mysqli_num_rows($cek_user) > 0) {
?>
<script>
    $("#ijazah_sd").fileinput({
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
        defaultPreviewContent: '<img src="<?= $ijazahsd ?>" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
</script>    
<?php                   
}else{
?>
<script>
    $("#ijazah_sd").fileinput({
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
        defaultPreviewContent: '<img src="assets/img/doc.png" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });    
</script>
<?php
}
?>
<!-- end -->
<!-- file input smp -->
<?php 
$cek_smp = mysqli_query($koneksi,"select id_user_tentor,smp,tahun_smp,ijazahsmp from riwayat where id_user_tentor='$id_user_sess' && smp != '' && tahun_smp != '' && ijazahsmp !='' ");
if (mysqli_num_rows($cek_smp)>0) {
?>
<script>
    $("#ijazah_smp").fileinput({
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
        defaultPreviewContent: '<img src="<?= $ijazahsmp ?>" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
</script>
<?php
}else{
?>
<script>
    $("#ijazah_smp").fileinput({
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
        defaultPreviewContent: '<img src="assets/img/doc.png" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
</script>
<?php
}
?>
<!-- end smp -->
<!-- file input sma -->
<?php 
$cek_sma = mysqli_query($koneksi,"select id_user_tentor,sma,tahun_sma,ijazahsma from riwayat where id_user_tentor='$id_user_sess' && sma != '' && tahun_sma != '' && ijazahsma !='' ");
if (mysqli_num_rows($cek_sma)>0) {
?>
<script>
    $("#ijazah_sma").fileinput({
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
        defaultPreviewContent: '<img src="<?= $ijazahsma ?>" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
</script>
<?php
}else{
?>
<script>
    $("#ijazah_sma").fileinput({
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
        defaultPreviewContent: '<img src="assets/img/doc.png" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
</script>
<?php
}
?>
<!-- end sma -->
<!-- file input sarjana -->
<?php 
$cek_sarjana   = mysqli_query($koneksi,"select id_user_tentor,sarjana,tahun_sarjana,transkrip from riwayat where id_user_tentor='$id_user_sess' && sarjana != '' && tahun_sarjana != '' && transkrip !='' ");
if (mysqli_num_rows($cek_sarjana)>0) {
?>
<script>
    $("#ijazah_sarjana").fileinput({
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
        defaultPreviewContent: '<img src="<?php echo $transkrip; ?>" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
</script>
<?php
}else{
?>
<script>
    $("#ijazah_sarjana").fileinput({
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
        defaultPreviewContent: '<img src="assets/img/doc.png" alt="Avatar" style="width:190px">',
        layoutTemplates: {main2: '{preview} ' +  ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png"]
    });
</script>
<?php
}
?>
<!-- end sarjana -->

<?php 
    include_once "_partial/lolibox.php";
    if (isset($_POST['simpansd'])) {
        $cek_user = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user_sess'");
        if (mysqli_num_rows($cek_user) > 0) {
            
        }else{
            $buat_id = mysqli_query($koneksi,"insert into riwayat values ('','$id_user_sess','','','','','','','','','','','','','belum','belum','belum','belum')")or die(mysqli_error($koneksi));
        }
        /*SD*/
        $sd        = addslashes(mysqli_real_escape_string($koneksi,$_POST['sd']));
        $tahun_sd  = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_sd']));
        $time      = time();                               //waktu
        $nama_sd   = $_FILES['ijazah_sd']['name'];              //nama
        $ukuran_sd = $_FILES['ijazah_sd']['size'];              //size
        $error_sd  = $_FILES['ijazah_sd']['error'];             //error
        $asal_sd   = $_FILES['ijazah_sd']['tmp_name'];          //asal file
        $format_sd = pathinfo($nama_sd,PATHINFO_EXTENSION);   //format file
        $nmfile_sd = "assets/riwayat/".$nama_sd;                         //folder + nama image
        
        if ($nama_sd !== "") {
            // seleksi error
            if ($error_sd === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_sd < 1500000) { 
                    // seleksi format file
                    if ($format_sd === "jpg" || $format_sd === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_sd)) {
                            $nmfile_sd = str_replace(".".$format_sd,"", $nmfile_sd);
                            $nmfile_sd = $nmfile_sd."_".$time.".".$format_sd;
                            $upload = move_uploaded_file($asal_sd,$nmfile_sd);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysd = mysqli_query($koneksi,"update riwayat set sd='$sd',tahun_sd='$tahun_sd',ijazahsd='$nmfile_sd' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysd == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SD Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_sd,$nmfile_sd);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysd = mysqli_query($koneksi,"update riwayat set sd='$sd',tahun_sd='$tahun_sd',ijazahsd='$nmfile_sd' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysd == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SD Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }else{
            
        }
    }

    if (isset($_POST['editsd'])) {
        $sd        = addslashes(mysqli_real_escape_string($koneksi,$_POST['sd']));
        $tahun_sd  = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_sd']));
        $ijazah_sd_lama  = addslashes(mysqli_real_escape_string($koneksi,$_POST['ijazah_sd_lama']));
        $time      = time();                               //waktu
        $nama_sd   = $_FILES['ijazah_sd']['name'];              //nama
        $ukuran_sd = $_FILES['ijazah_sd']['size'];              //size
        $error_sd  = $_FILES['ijazah_sd']['error'];             //error
        $asal_sd   = $_FILES['ijazah_sd']['tmp_name'];          //asal file
        $format_sd = pathinfo($nama_sd,PATHINFO_EXTENSION);   //format file
        $nmfile_sd = "assets/riwayat/".$nama_sd;                         //folder + nama image
        if ($nama_sd == "") {
            $queryeditsd = mysqli_query($koneksi,"update riwayat set sd='$sd',tahun_sd='$tahun_sd',ijazahsd='$ijazah_sd_lama' where id_user_tentor='$id_user_sess'");
            if ($queryeditsd==TRUE) {
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Berhasil Edit Riwayat Pendidikan SD'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Gagal memperbarui silakan lapor Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }else{
            unlink($ijazah_sd_lama);
            // seleksi error
            if ($error_sd === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_sd < 1500000) { 
                    // seleksi format file
                    if ($format_sd === "jpg" || $format_sd === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_sd)) {
                            $nmfile_sd = str_replace(".".$format_sd,"", $nmfile_sd);
                            $nmfile_sd = $nmfile_sd."_".$time.".".$format_sd;
                            $upload = move_uploaded_file($asal_sd,$nmfile_sd);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysd = mysqli_query($koneksi,"update riwayat set sd='$sd',tahun_sd='$tahun_sd',ijazahsd='$nmfile_sd' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysd == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SD Sudah Diperbarui'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_sd,$nmfile_sd);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysd = mysqli_query($koneksi,"update riwayat set sd='$sd',tahun_sd='$tahun_sd',ijazahsd='$nmfile_sd' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysd == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SD Sudah Diperbarui'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }
    }

    if (isset($_POST['simpansmp'])) {
        $cek_user = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user_sess'");
        if (mysqli_num_rows($cek_user) > 0) {
            
        }else{
            $buat_id = mysqli_query($koneksi,"insert into riwayat values ('','$id_user_sess','','','','','','','','','','','','','belum','belum','belum','belum')")or die(mysqli_error($koneksi));
        }
        /*SMP*/
        $smp        = addslashes(mysqli_real_escape_string($koneksi,$_POST['smp']));
        $tahun_smp  = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_smp']));
        $time       = time();                               //waktu
        $nama_smp   = $_FILES['ijazah_smp']['name'];              //nama
        $ukuran_smp = $_FILES['ijazah_smp']['size'];              //size
        $error_smp  = $_FILES['ijazah_smp']['error'];             //error
        $asal_smp   = $_FILES['ijazah_smp']['tmp_name'];          //asal file
        $format_smp = pathinfo($nama_smp,PATHINFO_EXTENSION);   //format file
        $nmfile_smp = "assets/riwayat/".$nama_smp;                         //folder + nama image
        if ($nama_smp !== "") {
            if ($error_smp === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_smp < 1500000) { 
                    // seleksi format file
                    if ($format_smp === "jpg" || $format_smp === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_smp)) {
                            $nmfile_smp = str_replace(".".$format_smp,"", $nmfile_smp);
                            $nmfile_smp = $nmfile_smp."_".$time.".".$format_smp;
                            $upload = move_uploaded_file($asal_smp,$nmfile_smp);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysmp = mysqli_query($koneksi,"update riwayat set smp='$smp',tahun_smp='$tahun_smp',ijazahsmp='$nmfile_smp' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysmp == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMP Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "salah upload";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_smp,$nmfile_smp);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysmp = mysqli_query($koneksi,"update riwayat set smp='$smp',tahun_smp='$tahun_smp',ijazahsmp='$nmfile_smp' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysmp == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMP Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }else{
            
        }
        // seleksi error
        /*END SMP*/
    }

    if (isset($_POST['editsmp'])) {
        $smp        = addslashes(mysqli_real_escape_string($koneksi,$_POST['smp']));
        $tahun_smp  = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_smp']));
        $ijazah_smp_lama  = addslashes(mysqli_real_escape_string($koneksi,$_POST['ijazah_smp_lama']));
        $time       = time();                               //waktu
        $nama_smp   = $_FILES['ijazah_smp']['name'];              //nama
        $ukuran_smp = $_FILES['ijazah_smp']['size'];              //size
        $error_smp  = $_FILES['ijazah_smp']['error'];             //error
        $asal_smp   = $_FILES['ijazah_smp']['tmp_name'];          //asal file
        $format_smp = pathinfo($nama_smp,PATHINFO_EXTENSION);   //format file
        $nmfile_smp = "assets/riwayat/".$nama_smp;                         //folder + nama image
        if ($nama_smp=="") {
            $querysmp = mysqli_query($koneksi,"update riwayat set smp='$smp',tahun_smp='$tahun_smp',ijazahsmp='$ijazah_smp_lama' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
            if ($querysmp == TRUE) {
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Riwayat Pendidikan SMP Sudah Diperbarui'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }else{
            unlink($ijazah_smp_lama);
            if ($error_smp === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_smp < 1500000) { 
                    // seleksi format file
                    if ($format_smp === "jpg" || $format_smp === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_smp)) {
                            $nmfile_smp = str_replace(".".$format_smp,"", $nmfile_smp);
                            $nmfile_smp = $nmfile_smp."_".$time.".".$format_smp;
                            $upload = move_uploaded_file($asal_smp,$nmfile_smp);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysmp = mysqli_query($koneksi,"update riwayat set smp='$smp',tahun_smp='$tahun_smp',ijazahsmp='$nmfile_smp' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysmp == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMP Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "salah upload";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_smp,$nmfile_smp);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysmp = mysqli_query($koneksi,"update riwayat set smp='$smp',tahun_smp='$tahun_smp',ijazahsmp='$nmfile_smp' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysmp == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMP Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }
    }

    if (isset($_POST['simpansma'])) {
        $cek_user = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user_sess'");
        if (mysqli_num_rows($cek_user) > 0) {
            
        }else{
            $buat_id = mysqli_query($koneksi,"insert into riwayat values ('','$id_user_sess','','','','','','','','','','','','','belum','belum','belum','belum')")or die(mysqli_error($koneksi));
        }
        /*SMA*/
        $sma       = addslashes(mysqli_real_escape_string($koneksi,$_POST['sma']));
        $tahun_sma = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_sma']));
        $time      = time();                               //waktu
        $nama_sma   = $_FILES['ijazah_sma']['name'];              //nama
        $ukuran_sma = $_FILES['ijazah_sma']['size'];              //size
        $error_sma  = $_FILES['ijazah_sma']['error'];             //error
        $asal_sma   = $_FILES['ijazah_sma']['tmp_name'];          //asal file
        $format_sma = pathinfo($nama_sma,PATHINFO_EXTENSION);   //format file
        $nmfile_sma = "assets/riwayat/".$nama_sma;                         //folder + nama image
        if ($nama_sma !== "") {
            // seleksi error
            if ($error_sma === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_sma < 1500000) { 
                    // seleksi format file
                    if ($format_sma === "jpg" || $format_sma === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_sma)) {
                            $nmfile_sma = str_replace(".".$format_sma,"", $nmfile_sma);
                            $nmfile_sma = $nmfile_sma."_".$time.".".$format_sma;
                            $upload = move_uploaded_file($asal_sma,$nmfile_sma);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysma = mysqli_query($koneksi,"update riwayat set sma='$smp',tahun_sma='$tahun_sma',ijazahsma='$nmfile_sma' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysma == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMA Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "salah upload";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_sma,$nmfile_sma);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysma = mysqli_query($koneksi,"update riwayat set sma='$smp',tahun_sma='$tahun_sma',ijazahsma='$nmfile_sma' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysma == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMA Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }else{
            
        } 
        /*END SMA*/
    }

    if (isset($_POST['editsma'])) {
        $sma       = addslashes(mysqli_real_escape_string($koneksi,$_POST['sma']));
        $tahun_sma = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_sma']));
        $ijazah_sma_lama = addslashes(mysqli_real_escape_string($koneksi,$_POST['ijazah_sma_lama']));
        $time      = time();                               //waktu
        $nama_sma   = $_FILES['ijazah_sma']['name'];              //nama
        $ukuran_sma = $_FILES['ijazah_sma']['size'];              //size
        $error_sma  = $_FILES['ijazah_sma']['error'];             //error
        $asal_sma   = $_FILES['ijazah_sma']['tmp_name'];          //asal file
        $format_sma = pathinfo($nama_sma,PATHINFO_EXTENSION);   //format file
        $nmfile_sma = "assets/riwayat/".$nama_sma;                         //folder + nama image
        if ($nama_sma=="") {
            $queryeditsma = mysqli_query($koneksi,"update riwayat set sma='$sma',tahun_sma='$tahun_sma',ijazahsma='$ijazah_sma_lama' where id_user_tentor='$id_user_sess'");
            if ($queryeditsma==TRUE) {
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Berhasil Edit Riwayat Pendidikan SMA'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Gagal memperbarui silakan lapor Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }else{
            unlink($ijazah_sma_lama);
            // seleksi error
            if ($error_sma === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_sma < 1500000) { 
                    // seleksi format file
                    if ($format_sma === "jpg" || $format_sma === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_sma)) {
                            $nmfile_sma = str_replace(".".$format_sma,"", $nmfile_sma);
                            $nmfile_sma = $nmfile_sma."_".$time.".".$format_sma;
                            $upload = move_uploaded_file($asal_sma,$nmfile_sma);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysma = mysqli_query($koneksi,"update riwayat set sma='$smp',tahun_sma='$tahun_sma',ijazahsma='$nmfile_sma' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysma == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMA Sudah Diperbarui'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "salah upload";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_sma,$nmfile_sma);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysma = mysqli_query($koneksi,"update riwayat set sma='$smp',tahun_sma='$tahun_sma',ijazahsma='$nmfile_sma' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysma == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan SMA Sudah Diperbarui'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }
    }

    if (isset($_POST['simpansarjana'])) {
        $cek_user = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user_sess'");
        if (mysqli_num_rows($cek_user) > 0) {
            
        }else{
            $buat_id = mysqli_query($koneksi,"insert into riwayat values ('','$id_user_sess','','','','','','','','','','','','','belum','belum','belum','belum')")or die(mysqli_error($koneksi));
        }
        /*KULIAH*/
        $sarjana        = addslashes(mysqli_real_escape_string($koneksi,$_POST['sarjana']));
        $tahun_sarjana  = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_sarjana']));
        $time           = time();                               //waktu
        $nama_sarjana   = $_FILES['ijazah_sarjana']['name'];              //nama
        $ukuran_sarjana = $_FILES['ijazah_sarjana']['size'];              //size
        $error_sarjana  = $_FILES['ijazah_sarjana']['error'];             //error
        $asal_sarjana   = $_FILES['ijazah_sarjana']['tmp_name'];          //asal file
        $format_sarjana = pathinfo($nama_sarjana,PATHINFO_EXTENSION);   //format file
        $nmfile_sarjana = "assets/riwayat/".$nama_sarjana;                         //folder + nama image
        if ($nama_sarjana !== "") {
            // seleksi error
            if ($error_sarjana === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_sarjana < 1500000) { 
                    // seleksi format file
                    if ($format_sarjana === "jpg" || $format_sarjana === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_sarjana)) {
                            $nmfile_sarjana = str_replace(".".$format_sarjana,"", $nmfile_sarjana);
                            $nmfile_sarjana = $nmfile_sarjana."_".$time.".".$format_sarjana;
                            $upload = move_uploaded_file($asal_sarjana,$nmfile_sarjana);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysarjana = mysqli_query($koneksi,"update riwayat set sarjana='$sarjana',tahun_sarjana='$tahun_sarjana',transkrip='$nmfile_sarjana' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysarjana == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan Perguruan Tinggi Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "salah upload";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_sarjana,$nmfile_sarjana);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysarjana = mysqli_query($koneksi,"update riwayat set sarjana='$sarjana',tahun_sarjana='$tahun_sarjana',transkrip='$nmfile_sarjana' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysarjana == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan Perguruan Tinggi Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            } 
        }else{
            
        }
        /*END*/
    }

    if (isset($_POST['editsarjana'])) {
        $sarjana        = addslashes(mysqli_real_escape_string($koneksi,$_POST['sarjana']));
        $tahun_sarjana  = addslashes(mysqli_real_escape_string($koneksi,$_POST['tahun_sarjana']));
        $ijazah_sarjana_lama  = addslashes(mysqli_real_escape_string($koneksi,$_POST['ijazah_sarjana_lama']));
        $time           = time();                               //waktu
        $nama_sarjana   = $_FILES['ijazah_sarjana']['name'];              //nama
        $ukuran_sarjana = $_FILES['ijazah_sarjana']['size'];              //size
        $error_sarjana  = $_FILES['ijazah_sarjana']['error'];             //error
        $asal_sarjana   = $_FILES['ijazah_sarjana']['tmp_name'];          //asal file
        $format_sarjana = pathinfo($nama_sarjana,PATHINFO_EXTENSION);   //format file
        $nmfile_sarjana = "assets/riwayat/".$nama_sarjana;                         //folder + nama image
        if ($nama_sarjana=="") {
            $queryeditsarjana = mysqli_query($koneksi,"update riwayat set sarjana='$sarjana',tahun_sarjana='$tahun_sarjana',transkrip='$ijazah_sarjana_lama' where id_user_tentor='$id_user_sess'");
            if ($queryeditsarjana==TRUE) {
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Berhasil Edit Riwayat Pendidikan Perguruan Tinggi'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Gagal memperbarui silakan lapor Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            }
        }else{
            unlink($ijazah_sarjana_lama);
            if ($error_sarjana === 0 ) {
                // seleksi ukuran ukuran dalam byte (ex: max 100kb)
                if ($ukuran_sarjana < 1500000) { 
                    // seleksi format file
                    if ($format_sarjana === "jpg" || $format_sarjana === "png") {
                        //seleksi nama file
                        if (file_exists($nmfile_sarjana)) {
                            $nmfile_sarjana = str_replace(".".$format_sarjana,"", $nmfile_sarjana);
                            $nmfile_sarjana = $nmfile_sarjana."_".$time.".".$format_sarjana;
                            $upload = move_uploaded_file($asal_sarjana,$nmfile_sarjana);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysarjana = mysqli_query($koneksi,"update riwayat set sarjana='$sarjana',tahun_sarjana='$tahun_sarjana',transkrip='$nmfile_sarjana' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysarjana == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan Perguruan Tinggi Sudah Dilengkapi'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "salah upload";
                            }                   
                        }else{
                            $upload = move_uploaded_file($asal_sarjana,$nmfile_sarjana);
                            // seleksi saat berhasil upload ke direktori
                            if ($upload == TRUE) {
                                $querysarjana = mysqli_query($koneksi,"update riwayat set sarjana='$sarjana',tahun_sarjana='$tahun_sarjana',transkrip='$nmfile_sarjana' where id_user_tentor='$id_user_sess'")or die(mysqli_error($koneksi));
                                if ($querysarjana == TRUE) {
                                    echo "<script>
                                                Lobibox.notify('default', {
                                                    continueDelayOnInactiveTab: true,
                                                    showClass: 'fadeInDown',
                                                    hideClass: 'fadeUpDown',
                                                    size: 'mini',
                                                    position: 'center top',
                                                    msg: 'Riwayat Pendidikan Perguruan Tinggi Sudah Diperbarui'
                                                });
                                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                                }
                            }else{
                                echo "<script>
                                            Lobibox.notify('default', {
                                                continueDelayOnInactiveTab: true,
                                                showClass: 'fadeInDown',
                                                hideClass: 'fadeUpDown',
                                                size: 'mini',
                                                position: 'center top',
                                                msg: 'Salah Upload (not update db) Hubungi Administrator'
                                            });
                                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
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
                                        msg: 'Hanya Mendukung format jpg,png'
                                    });
                            </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                    }
                }else{
                    echo "<script>
                                Lobibox.notify('default', {
                                    continueDelayOnInactiveTab: true,
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    size: 'mini',
                                    position: 'center top',
                                    msg: 'Maksimal File 1,5 MB'
                                });
                        </script><meta http-equiv='refresh' content='3;url=riwayat' />";
                }
            }else{
                echo "<script>
                            Lobibox.notify('default', {
                                continueDelayOnInactiveTab: true,
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                size: 'mini',
                                position: 'center top',
                                msg: 'Error, Silakan Hubungi Administrator'
                            });
                    </script><meta http-equiv='refresh' content='3;url=riwayat' />";
            } 
        }
    }
?>

<script>
function tabsTentor(evt, kategori) {
  var i, x, tablinks;
  x = document.getElementsByClassName("kategoriTentor");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(kategori).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>