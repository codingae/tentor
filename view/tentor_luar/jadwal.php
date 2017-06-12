<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
<!-- <link rel="stylesheet" type="text/css" href="assets/libraries/custom/timeline.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/table.css"> -->
<?php 
if ($_GET['kode']) {
?>
<script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCL76rVshr5mzm9bOgZEtBVtIHhAsd1R6A&mode=driving"></script>
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
$long1         = $row_cektentor['longtitude'];
$lat1          = $row_cektentor['lattitude'];
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
            <h1 class="page-header">Jadwal</h1>
            <div class="box">
                <table class="table table-bordered">
                    <tr style="background: #1E88E5">
                        <td><b>#!</b></td>
                        <td><b>Nama</b></td>
                        <td><b>Mapel</b></td>
                        <td><b>Jenjang</b></td>
                        <!-- <td><b>Status</b></td> -->
                        <td><b>Aksi</b></td>
                    </tr>
                    <?php 
                        $no = 1;
                        $query_pemberitahuan = mysqli_query($koneksi,"select 
                            permintaan_tentor.id_permintaan,
                            user_detail.nama_lengkap,
                            user_detail.longtitude,
                            user_detail.lattitude,
                            user_detail.alamat,
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
                                   && permintaan_tentor.status='upload_valid'");
                        // $query_pemberitahuan = mysqli_query($koneksi,"select * from permintaan_tentor where id_user_tentor='$id_tentor' && status='proses'");
                        if (mysqli_num_rows($query_pemberitahuan)>0) {
                        while ($row_pemberitahuan = mysqli_fetch_array($query_pemberitahuan)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row_pemberitahuan['nama_lengkap']; ?></td>
                        <td><?php echo $row_pemberitahuan['mapel']; ?></td>
                        <td><?php echo ucwords($row_pemberitahuan['jenjang'])."; Kelas:".$row_pemberitahuan['kelas']; ?></td>
                        <td>
                            <a href="jadwal&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-map-marker"></span>Detail</a>
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
                    if ($_GET['kode']) {
                    ?>
                        <hr style="border: 5px dashed;">
                        <a href="javascript:void(0)" onclick="tabDetail(event, 'detail_siswa');" id="default">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m6" style="font-size: 18px">Detail Siswa</div>
                        </a>
                        <a href="javascript:void(0)" onclick="tabDetail(event, 'evaluasi');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m6" style="font-size: 18px">Evaluasi Siswa</div>
                        </a>
                        <div class="row box">
                            <!-- detail_siswa -->
                            <div id="detail_siswa" class="w3-container detailnya" style="display:none">
                                <!-- <header><h3>Detail Siswa</h3><hr></header> -->
                                <br>
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
                                    <input type="text" value="<?php echo ucwords($row_siswa['alamat']); ?>" class="form-control" readonly>
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
                                    <div id="map-canvas" style="width:100%;height:400px;"></div>
                                </div>

                                <br><br>
                                <br><br>
                                <center><a href="jadwal"><button class="btn"><span class="fa fa-refresh"></span> Kembali</button></a></center>
                            </div>
                            <!-- end detail_siswa -->
                            <!-- evaluasi -->
                            <div id="evaluasi" class="w3-container detailnya" style="display:none">
                                <br>
                                <center> 
                                    <button class="btn btn-secondary" onclick="document.getElementById('modalaksi<?php echo $row_siswa['id_permintaan']; ?>').style.display='block'"><span class="fa fa-tasks"></span>Tambah Nilai </button>
                                </center>    
                                <div class="w3-modal" id="modalaksi<?php echo $row_siswa['id_permintaan']; ?>">
                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                        <center><h2 class="w3-center"><br>Input Nilai Siswa</h2></center>
                                        <span onclick="document.getElementById('modalaksi<?php echo $row_siswa['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                        <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                <form action="" method="post" id="form_nilai">
                                                    <p style="text-align: center; margin:0 auto;"> 
                                                        <input type="hidden" name="id_permintaan" value="<?php echo $row_siswa['id_permintaan']; ?>">
                                                        <div class="col-sm-12 col-md-6">
                                                            <label for="">Jenis Nilai</label>
                                                            <input type="text" name="jenis_nilai" autocomplete="off" class="form-control" placeholder="Ex: UH-1, UH-2, Ulangan-Akhir">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                            <label for="">Nilai</label>
                                                            <input type="number" name="nilai" autocomplete="off" class="form-control" placeholder="Ex; 1-100">
                                                        </div>
                                                        <br>
                                                        <br><br>
                                                        <br>
                                                        <div class="col-sm-12 col-md-12">
                                                            <label for="">Catatan</label>
                                                            <textarea name="catatan" id="catatan" class="form-control" cols="10" rows="2" placeholder="Isi Catatan Yang Diperlukan Untuk Siswa"></textarea>
                                                            <span id="jumlah_catatan"></span>
                                                        </div>
                                                        <br>
                                                        <br><br>
                                                        <br>
                                                        <br>
                                                        <center>
                                                        <button type="submit" name="isi_nilai" class="btn btn-secondary">
                                                        Simpan</button>
                                                        <button type="button" class="btn" onclick="myReset()">Reset</button>
                                                        </center>
                                                    </p>
                                                </form>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <br>
                                <table class="table table-bordered">
                                    <tr style="background: #E91E63;color: white">
                                        <td><b>#!</b></td>
                                        <td><b>Jenis Ujian</b></td>
                                        <td><b>Nilai</b></td>
                                        <td><b>Catatan</b></td>
                                        <!-- <td><b>Status</b></td> -->
                                        <td><b></b></td>
                                    </tr>
                                    <?php 
                                        $nonya = 1;
                                        $query_eval = mysqli_query($koneksi,"select * from evaluasi_siswa where id_permintaan='$get_id'");
                                        if (mysqli_num_rows($query_eval)>0) {
                                            while ($row_eval=mysqli_fetch_array($query_eval)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $nonya++; ?></td>
                                                <td><?php echo $row_eval['jenis_nilai']; ?></td>
                                                <td><?php echo $row_eval['nilai']; ?></td>
                                                <td><?php echo $row_eval['catatan']; ?></td>
                                                <td>
                                                    <button class="btn btn-secondary" onclick="document.getElementById('modaleditnilai<?php echo $row_eval['id_evaluasi']; ?>').style.display='block'">
                                                        <span class="fa fa-pencil"></span>
                                                    </button>
                                                    <div class="w3-modal" id="modaleditnilai<?php echo $row_eval['id_evaluasi']; ?>">
                                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                                            <center><h2 class="w3-center"><br>Edit Nilai Siswa</h2></center>
                                                            <span onclick="document.getElementById('modaleditnilai<?php echo $row_eval['id_evaluasi']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                                            <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                                                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                                    <form action="" method="post" id="editnilai<?php echo $row_eval['id_evaluasi']; ?>">
                                                                        <p style="text-align: center; margin:0 auto;"> 
                                                                            <input type="hidden" name="id_permintaan" value="<?php echo $row_eval['id_evaluasi']; ?>">
                                                                            <div class="col-sm-12 col-md-6">
                                                                                <label for="">Jenis Nilai</label>
                                                                                <input type="text" name="jenis_nilai" value="<?php echo $row_eval['jenis_nilai']; ?>" class="form-control" placeholder="Ex: UH-1, UH-2, Ulangan-Akhir">
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6">
                                                                                <label for="">Nilai</label>
                                                                                <input type="number" name="nilai" value="<?php echo $row_eval['nilai']; ?>" class="form-control" placeholder="Ex; 1-100">
                                                                            </div>
                                                                            <br>
                                                                            <br><br>
                                                                            <br>
                                                                            <div class="col-sm-12 col-md-12">
                                                                                <label for="">Catatan</label>
                                                                                <textarea name="catatan" id="catatan<?php echo $row_eval['id_evaluasi']; ?>" class="form-control" cols="10" rows="2" placeholder="Isi Catatan Yang Diperlukan Untuk Siswa"><?php echo $row_eval['catatan']; ?></textarea>
                                                                                <span id="jumlah_catatan<?php echo $row_eval['id_evaluasi']; ?>"></span>
                                                                            </div>
                                                                            <br>
                                                                            <br><br>
                                                                            <br>
                                                                            <br>
                                                                            <center>
                                                                            <button type="submit" name="edit_nilai" class="btn btn-secondary">
                                                                            Simpan</button>
                                                                            <button type="button" class="btn" onclick="myReset<?php echo $row_siswa['id_permintaan']; ?>()">Reset</button>
                                                                            </center>
                                                                        </p>
                                                                    </form>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            var text_max = 100;
                                                                            var text_length = $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').val().length;
                                                                            var text_remaining = text_max - text_length;
                                                                            $('#jumlah_catatan<?php echo $row_eval['id_evaluasi']; ?>').html(text_remaining + ' karakter tersisa');
                                                                            $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').keyup(function() {
                                                                                var text_length1 = $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').val().length;
                                                                                var text_remaining1 = text_max - text_length1;
                                                                                $('#jumlah_catatan<?php echo $row_eval['id_evaluasi']; ?>').html(text_remaining1 + ' karakter tersisa');
                                                                            });
                                                                            $('textarea.form-control').keypress(function(e) {
                                                                                if (e.which < 0x20) {
                                                                                    // e.which < 0x20, then it's not a printable character
                                                                                    // e.which === 0 - Not a character
                                                                                    return;     // Do nothing
                                                                                }
                                                                                if (this.value.length == text_max) {
                                                                                    e.preventDefault();
                                                                                } else if (this.value.length > text_max) {
                                                                                    // Maximum exceeded
                                                                                    this.value = this.value.substring(0, text_max);
                                                                                }
                                                                            });
                                                                        });
                                                                        function myReset<?php echo $row_siswa['id_permintaan']; ?>(){
                                                                            document.getElementById("editnilai<?php echo $row_eval['id_evaluasi']; ?>").reset();
                                                                            var text_max = 100;
                                                                            var text_length1 = $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').val().length;
                                                                            var text_remaining1 = text_max - text_length1;
                                                                            $('#jumlah_catatan<?php echo $row_eval['id_evaluasi']; ?>').html(text_remaining1 + ' karakter tersisa');
                                                                        }
                                                                    </script>
                                                                </div>
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                    <button class="btn" onclick="document.getElementById('modalhapusnilai<?php echo $row_eval['id_evaluasi']; ?>').style.display='block'">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
                                                    <div class="w3-modal" id="modalhapusnilai<?php echo $row_eval['id_evaluasi']; ?>">
                                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                                            <center><h2 class="w3-center"><br>Edit Nilai Siswa</h2></center>
                                                            <span onclick="document.getElementById('modalhapusnilai<?php echo $row_eval['id_evaluasi']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                                            <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                                                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                                    <form action="" method="post" id="editnilai<?php echo $row_eval['id_evaluasi']; ?>">
                                                                        <p style="text-align: center; margin:0 auto;"> 
                                                                            <input type="hidden" name="id_eval" value="<?php echo $row_eval['id_evaluasi']; ?>">
                                                                            <center>
                                                                            <h4>Anda Yakin Akan Menghapus Nilai <?php echo strtoupper($row_eval['jenis_nilai']); ?>?</h4>
                                                                            <button type="submit" name="hapus_nilai" class="btn">
                                                                            Iya</button>
                                                                            <span onclick="document.getElementById('modalhapusnilai<?php echo $row_eval['id_evaluasi']; ?>').style.display='none'" class="btn btn-secondary" title="Close Modal">Tidak</span>
                                                                        </p>
                                                                    </form>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            var text_max = 100;
                                                                            var text_length = $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').val().length;
                                                                            var text_remaining = text_max - text_length;
                                                                            $('#jumlah_catatan<?php echo $row_eval['id_evaluasi']; ?>').html(text_remaining + ' karakter tersisa');
                                                                            $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').keyup(function() {
                                                                                var text_length1 = $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').val().length;
                                                                                var text_remaining1 = text_max - text_length1;
                                                                                $('#jumlah_catatan<?php echo $row_eval['id_evaluasi']; ?>').html(text_remaining1 + ' karakter tersisa');
                                                                            });
                                                                            $('textarea.form-control').keypress(function(e) {
                                                                                if (e.which < 0x20) {
                                                                                    // e.which < 0x20, then it's not a printable character
                                                                                    // e.which === 0 - Not a character
                                                                                    return;     // Do nothing
                                                                                }
                                                                                if (this.value.length == text_max) {
                                                                                    e.preventDefault();
                                                                                } else if (this.value.length > text_max) {
                                                                                    // Maximum exceeded
                                                                                    this.value = this.value.substring(0, text_max);
                                                                                }
                                                                            });
                                                                        });
                                                                        function myReset<?php echo $row_eval['id_evaluasi']; ?>(){
                                                                            document.getElementById("editnilai<?php echo $row_eval['id_evaluasi']; ?>").reset();
                                                                            var text_max = 100;
                                                                            var text_length1 = $('#catatan<?php echo $row_eval['id_evaluasi']; ?>').val().length;
                                                                            var text_remaining1 = text_max - text_length1;
                                                                            $('#jumlah_catatan<?php echo $row_eval['id_evaluasi']; ?>').html(text_remaining1 + ' karakter tersisa');
                                                                        }
                                                                    </script>
                                                                </div>
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        }else{
                                            ?><tr><td colspan="5">Belum ada evaluasi</td></tr><?php
                                        }
                                    ?>
                                </table>

                                <center><a href="jadwal"><button class="btn"><span class="fa fa-refresh"></span> Kembali</button></a></center>
                            </div>
                            <!-- end evaluasi -->
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div><!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script>
    $(document).ready(function() {
        var text_max = 100;
        $('#jumlah_catatan').html(text_max + ' karakter tersisa');
        $('#catatan').keyup(function() {
            var text_length = $('#catatan').val().length;
            var text_remaining = text_max - text_length;

            $('#jumlah_catatan').html(text_remaining + ' karakter tersisa');
        });
        $('textarea.form-control').keypress(function(e) {
            if (e.which < 0x20) {
                // e.which < 0x20, then it's not a printable character
                // e.which === 0 - Not a character
                return;     // Do nothing
            }
            if (this.value.length == text_max) {
                e.preventDefault();
            } else if (this.value.length > text_max) {
                // Maximum exceeded
                this.value = this.value.substring(0, text_max);
            }
        });
    });
    function tabDetail(evt, kategori) {
      var i, x, tablinks;
      x = document.getElementsByClassName("detailnya");
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
    document.getElementById("default").click();
    function myReset(){
        document.getElementById("form_nilai").reset();
        $('#jumlah_catatan').html('100 karakter tersisa');
    }
</script>
<?php 
    if (isset($_POST['isi_nilai'])) {
        include_once "_partial/lolibox.php";
        $id_permintaan     = $_POST['id_permintaan'];
        $jenis_nilai       = $_POST['jenis_nilai'];
        $nilai             = $_POST['nilai'];
        $catatan           = $_POST['catatan'];
        $query_jenis_nilai = mysqli_query($koneksi,"insert into evaluasi_siswa values ('','$jenis_nilai','$nilai','$catatan','$id_permintaan')");
        if ($query_jenis_nilai==TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Selamat Anda Berhasil Menginput Nilai'
                        });
                </script><meta http-equiv='refresh' content='3;url=jadwal&kode&".base64_encode($get_id)."' />";
        }
    }
    if (isset($_POST['edit_nilai'])) {
        include_once "_partial/lolibox.php";
        $id_permintaan     = $_POST['id_permintaan'];
        $jenis_nilai       = $_POST['jenis_nilai'];
        $nilai             = $_POST['nilai'];
        $catatan           = $_POST['catatan'];
        $query_edit_nilai  = mysqli_query($koneksi,"update evaluasi_siswa set jenis_nilai='$jenis_nilai',nilai='$nilai',catatan='$catatan' where id_evaluasi='$id_permintaan'");
        if ($query_edit_nilai==TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Selamat Anda Berhasil Mengedit Nilai'
                        });
                </script><meta http-equiv='refresh' content='3;url=jadwal&kode&".base64_encode($get_id)."' />";
        }
    }
    if (isset($_POST['hapus_nilai'])) {
        include_once "_partial/lolibox.php";
        $id_eval     = $_POST['id_eval'];
        $query_eval  = mysqli_query($koneksi,"delete from evaluasi_siswa where id_evaluasi='$id_eval'");
        if ($query_eval==TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Selamat Anda Berhasil Menghapus Nilai'
                        });
                </script><meta http-equiv='refresh' content='3;url=jadwal&kode&".base64_encode($get_id)."' />";
        }
    }
?>