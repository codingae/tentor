<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
<!-- <link rel="stylesheet" type="text/css" href="assets/libraries/custom/timeline.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/table.css"> -->
<?php 
if ($_GET['kode']) {
?>
<!-- <script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCL76rVshr5mzm9bOgZEtBVtIHhAsd1R6A&mode=driving"></script> -->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<?php 
$get_id      = base64_decode($_GET['kode']);
$id_tentor   = base64_decode($_SESSION['id_user']);
$query_siswa = mysqli_query($koneksi,"select 
                            permintaan_tentor.id_permintaan,
                            permintaan_tentor.id_detail_permintaan_tentor,
                            permintaan_tentor.mulai_les,
                            permintaan_tentor.selesai_les,
                            user_detail.nama_lengkap,
                            user_detail.longtitude,
                            user_detail.lattitude,
                            user_detail.alamat,
                            user_detail.no_telp,
                            keahlian.jenjang,
                            keahlian.mapel,
                            biaya.kelas,
                            permintaan_tentor.durasi,
                            permintaan_tentor.status
                            from permintaan_tentor INNER JOIN user_detail 
                                 ON permintaan_tentor.id_user_pencari=user_detail.id_user
                                 INNER JOIN keahlian
                                 ON permintaan_tentor.id_keahlian=keahlian.id_keahlian
                                 INNER JOIN biaya
                                 ON permintaan_tentor.id_biaya=biaya.id
                             where permintaan_tentor.id_user_tentor='$id_tentor' 
                                   && (permintaan_tentor.status='proses' || permintaan_tentor.status='upload_valid') && permintaan_tentor.id_permintaan='$get_id'");
$row_siswa     = mysqli_fetch_array($query_siswa);
$lat2          = $row_siswa['lattitude'];
$long2         = $row_siswa['longtitude'];

$cek_id_tentor = mysqli_query($koneksi,"select longtitude,lattitude from user_detail where id_user='$id_tentor'");
$row_cektentor = mysqli_fetch_array($cek_id_tentor);
$long1          = $row_cektentor['longtitude'];
$lat1         = $row_cektentor['lattitude'];
?>
<script>
$(document).ready(function() {
    'use strict';

    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(-7.546839499999997, 112.22647940000002),
            zoom: 15
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();

        directionsDisplay.setMap(map);
        var request = {
        origin: '<?= $lat1 ?>,<?= $long1 ?>', 
        destination: '<?= $lat2 ?>,<?= $long2 ?>',
        durationInTraffic: true,
        provideRouteAlternatives: true,
        unitSystem: true,
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
        };

        directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
        }
        });
        }
        
        if ($('#map-canvas').length != 0) {
            google.maps.event.addDomListener(window, 'load', initialize);
        }
})
</script>
<?php
}else{
?>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<?php
}
?>


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
            <h1 class="page-header">Pemberitahuan</h1>
            <div class="box">
                <table class="table table-bordered">
                    <tr style="background: #1E88E5">
                        <td><b>#!</b></td>
                        <td width="60%"><b>Pemberitahuan</b></td>
                        <!-- <td><b>Status</b></td> -->
                        <td><b>Aksi</b></td>
                    </tr>
                    <?php 
                        $no = 1;
                        $query_pemberitahuan = mysqli_query($koneksi,"select 
                            permintaan_tentor.id_permintaan,
                            permintaan_tentor.mulai_les,
                            permintaan_tentor.selesai_les,
                            user_detail.nama_lengkap,
                            user_detail.longtitude,
                            user_detail.lattitude,
                            user_detail.alamat,
                            user_detail.no_telp,
                            keahlian.jenjang,
                            keahlian.mapel,
                            biaya.kelas,
                            permintaan_tentor.durasi,
                            permintaan_tentor.status
                            from permintaan_tentor INNER JOIN user_detail 
                                 ON permintaan_tentor.id_user_pencari=user_detail.id_user
                                 INNER JOIN keahlian
                                 ON permintaan_tentor.id_keahlian=keahlian.id_keahlian
                                 INNER JOIN biaya
                                 ON permintaan_tentor.id_biaya=biaya.id
                             where permintaan_tentor.id_user_tentor='$id_tentor' 
                                   && (permintaan_tentor.status='proses' || permintaan_tentor.status='upload_valid')");
                        // $query_pemberitahuan = mysqli_query($koneksi,"select * from permintaan_tentor where id_user_tentor='$id_tentor' && status='proses'");
                        if (mysqli_num_rows($query_pemberitahuan)>0) {
                        while ($row_pemberitahuan = mysqli_fetch_array($query_pemberitahuan)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <?php 
                            if ($row_pemberitahuan['status']=="proses") {
                            ?>
                                <td width="60%">Anda Mendapat Permintaan Mengajar Dari <b><?php echo $row_pemberitahuan['nama_lengkap']; ?></b></td>
                                <td>
                                    <button class="btn btn-secondary" onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='block'"><span class="fa fa-tasks"></span>Aksi </button>
                                    <div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                            <center><h2 class="w3-center"><br>Validasi Permintaan <?php echo ucwords($row_pemberitahuan['nama_lengkap']); ?></h2></center>
                                            <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                            <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                    <form action="" method="post">
                                                        <p style="text-align: center; margin:0 auto;"> 
                                                                <input type="hidden" name="id_permintaan" value="<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                                                <button type="submit"  name="terima_siswa" class="btn btn-secondary">
                                                                Terima</button>
                                                                <button type="submit"  name="tolak_siswa" class="btn">
                                                                Tolak</button>
                                                        </p>
                                                    </form>
                                                </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <a href="pemberitahuan&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-map-marker"></span>Cek Detail </a>
                                </td>
                            <?php
                            }elseif ($row_pemberitahuan['status']=="upload_valid") {                  
                            ?>
                                <td width="60%"><b><?php echo $row_pemberitahuan['nama_lengkap']; ?></b> Sudah Melakukan Pembayaran, Silakan Anda Mulai Mengajar Pada <?php echo date_format(date_create($row_pemberitahuan['mulai_les']),'d-m-Y'); ?> - <?php echo date_format(date_create($row_pemberitahuan['selesai_les']),'d-m-Y'); ?></td>
                                <td>
                                    <a href="pemberitahuan&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-map-marker"></span>Cek Detail </a>
                                </td>
                            <?php
                            }
                        ?>
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
                    if ($_GET['kode']) {
                    ?>
                        <div class="row box">
                            <header><h3>Detail Siswa</h3><hr></header>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Nama Lengkap</label>
                                <input type="text" value="<?php echo ucwords($row_siswa['nama_lengkap']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Jenjang</label>
                                <input type="text" value="<?php echo strtoupper($row_siswa['jenjang']); ?>; Kelas: <?php echo strtoupper($row_siswa['kelas']); ?>" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-4">
                                <label for="">Siswa</label>
                                <input type="text" value="<?php echo ucwords($row_siswa['mapel']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="">No Telp</label>
                                <input type="text" value="<?php echo ucwords($row_siswa['no_telp']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="">Durasi Les</label>
                                <input type="text" value="<?php echo ucwords($row_siswa['durasi']); ?> Bulan" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-12">
                                <label for="">Alamat</label>
                                <input type="text" value="<?php echo ucwords($row_siswa['alamat']); ?> " class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Mulai Les</label>
                                <input type="text" value="<?php echo date_format(date_create($row_siswa['mulai_les']),'d-m-Y'); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Selesai Les</label>
                                <input type="text" value="<?php echo date_format(date_create($row_siswa['selesai_les']),'d-m-Y'); ?>" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <?php 
                                $no_jadwal    = 1;
                                $idnyadetail  = $row_siswa['id_detail_permintaan_tentor'];
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
                            <div class="col-sm-12 col-md-12">
                                <!-- <div id="map-canvas" style="width:100%;height:400px;"></div> -->
                            </div>

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

<?php 
    if (isset($_POST['terima_siswa'])) {
        include_once "_partial/lolibox.php";
        $id_permintaan = $_POST['id_permintaan'];
        $update_proses = mysqli_query($koneksi,"update permintaan_tentor set status='diterima' where id_permintaan='$id_permintaan'");
        if ($id_permintaan==TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Berhasil Menerima Permintaan Siswa, Silakan Tunggu Konfirmasi Pembayarn'
                        });
                </script><meta http-equiv='refresh' content='3;url=pemberitahuan' />";
        }
    }elseif (isset($_POST['tolak_siswa'])) {
        include_once "_partial/lolibox.php";
        echo "tolak";
    }
?>