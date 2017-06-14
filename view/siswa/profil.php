<?php 
    $id_user      = base64_decode($_GET['kode']); 
    $query_detail = mysqli_query($koneksi,"select * from view_user where id_user='$id_user'");
    $row_detail   = mysqli_fetch_array($query_detail);
    $lat2         = $row_detail['lattitude'];
    $long2        = $row_detail['longtitude'];
    $id_valid     = $row_detail['id_user'];
    
    $query_detail1 = mysqli_query($koneksi,"select lattitude,longtitude from view_user where id_user='$id_user_sess'");
    $row_detail1   = mysqli_fetch_array($query_detail1);
    $lat1          = $row_detail1['lattitude'];
    $long1         = $row_detail1['longtitude'];
?>
<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/timeline.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/table.css">
<script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCL76rVshr5mzm9bOgZEtBVtIHhAsd1R6A&mode=driving"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
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
<style>
    /****** Rating Starts *****/
    .rating { 
        border: none;
        /*float: left;*/
    }

    .rating > input { display: none; } 
    .rating > label:before { 
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating > .half:before { 
        content: "\f089";
        position: absolute;
    }

    .rating > label { 
        color: #ddd; 
        float: right; 
    }

    .rating > input:checked ~ label, 
    .rating:not(:checked) > label:hover,  
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

    .rating > input:checked + label:hover, 
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, 
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     

</style>
<div class="container">
    <div class="row">
        <!-- sidebar -->
        <?php include_once "_partial/sidebar.php"; ?>
        <!-- end sidebar -->
        <!-- konten -->
        <div class="content col-sm-8 col-md-9">
            <input type="hidden" value="<?= $alamat1 ?>" id="start">
            <input type="hidden" value="<?= $alamat2 ?>" id="end">
            <?php 
                if ($id_user_sess==$id_valid) {
                ?>
                    <h1 class="page-header">Detail Profil <?= ucfirst($row_detail['uname']) ?><a href="edituser&kode&<?= $_SESSION['id_user'] ?>" style="float: right; font-size: 15px"><span class="fa fa-edit"></span>&nbsp;Edit</a></h1>
                <?php
                }else{
                ?>
                    <h1 class="page-header">Detail Profil <?= ucfirst($row_detail['uname']) ?></h1>
                <?php
                }
            ?>
            <div class="row box">
                <div class="col-sm-12 col-md-5">
                    <div class="property-gallery">
                        <div class="property-gallery-preview">
                        <?php 
                            if ($id_user_sess==$id_valid) {
                            ?>
                            <a href="editpp&kode&<?= $_SESSION['id_user'] ?>" id="crop" title="edit photo profil">
                                <img src="<?= $row_detail['foto'] ?>"  class="centered-and-cropped" width="50%" height="50%" alt="photo" >
                            </a>
                            <?php
                            }else{
                            ?>
                                <img src="<?= $row_detail['foto'] ?>"  class="centered-and-cropped" width="100%" height="100%" alt="photo" >
                            <?php
                            }
                        ?>
                        </div><!-- /.property-gallery-preview -->
                    </div><!-- /.property-gallery -->
                </div>

                <div class="col-sm-12 col-md-7 ">
                    <div class="property-list">
                        <dl>
                            <dt>ID : </dt><dd><?= $row_detail['id_user'] ?></dd>
                            <dt>Nama Lengkap : </dt><dd><?= $row_detail['nama_lengkap'] ?></dd>
                            <dt>Username : </dt><dd><?= $row_detail['uname'] ?></dd>
                            <dt>Nomer Telpon : </dt><dd><?= $row_detail['no_telp'] ?></dd>
                            <dt>Email : </dt><dd><?= $row_detail['email'] ?></dd>
                            <dt>Alamat : </dt><dd><?= $row_detail['alamat'] ?></dd>
                        </dl>
                    </div><!-- /.property-list -->

                    <h2 class="mb30">Social Profiles</h2>

                    <ul class="clearfix sharing-buttons">
                        <li>
                            <a class="facebook" href="https://www.facebook.com/share.php?u=http://html.realsite.byaviators.com&amp;title=Realsite%20-%20Material%20Real%20Estate%20HTML%20Template#sthash.BUkY1jCE.dpuf"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="fa fa-facebook fa-left"></i>
                                <span class="social-name">Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a class="google-plus" href="https://plus.google.com/share?url=http://html.realsite.byaviators.com" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="fa fa-google-plus fa-left"></i>
                                <span class="social-name">Google+</span>
                            </a>
                        </li>
                        <li>
                            <a class="twitter" href="https://twitter.com/home?status=Realsite%20-%20Material%20Real%20Estate%20HTML%20Template+http://html.realsite.byaviators.com#sthash.BUkY1jCE.dpuf"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="fa fa-twitter fa-left"></i>
                                <span class="social-name">Twitter</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.row -->
            <?php 
                if ($row_detail['level'] == "siswa") {
                    
                }elseif ($row_detail['level'] == "tentor_lbb" || $row_detail['level'] == "tentor_luar") {
                    $id_nya = base64_decode($_SESSION['id_user']);
                ?>
                    <div class="box">
                    <h2 class="page-header"><div class="w3-row"><center>
                        <a href="javascript:void(0)" onclick="tabsTentor(event, 'Keahlian');" id="default">
                        <?php $query_ceknotif1 = mysqli_query($koneksi,"select id_user from keahlian where id_user='$id_user'");
                            $row_ceknotif1   = mysqli_fetch_array($query_ceknotif1);
                            if (mysqli_num_rows($query_ceknotif1)>0) {
                                ?>
                                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m6">Keahlian</div>
                                <?php
                            }else{
                                ?>
                                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m6">Keahlian <span class="badge">?</span></div>
                                <?php
                            } ?>
                        </a>
                        <a href="javascript:void(0)" onclick="tabsTentor(event, 'Riwayat');">
                            <?php 
                            $query_ceknotif2 = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user'");
                            $row_ceknotif2   = mysqli_fetch_array($query_ceknotif2);
                            if (mysqli_num_rows($query_ceknotif2)>0) {
                            ?>
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m6">Riwayat Pendidikan</div>
                            <?php
                            }else{
                            ?>
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-col m6">Riwayat Pendidikan<span class="badge">?</span></div>
                            <?php
                            }
                            ?>
                        </a>
                        <!-- <a href="javascript:void(0)" onclick="tabsTentor(event, 'Jadwal');">
                          <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Jadwal</div>
                        </a> -->
                        </center>
                    </div> </h2>
                    <div id="Keahlian" class="w3-container kategoriTentor" style="display:none">
                        <?php 
                            if ($row_detail['id_user']==$id_user_sess) {
                                ?>
                                    <p style="text-align: center; margin:0 auto;">
                                    <button onclick="document.getElementById('modalkeahlian').style.display='block'" class="btn btn-secondary">Tambah Keahlian</button>
                                    </p>
                                <?php
                            }else{

                            }
                        ?>
                        <h3>List Keahlian</h3>
                        <ol>
                            <?php 
                                $query_keahlian1 = mysqli_query($koneksi,"select * from keahlian where id_user='$id_user'");
                                $cek_keahlian1 = mysqli_num_rows($query_keahlian1);
                                if ($cek_keahlian1 > 0) {
                                    while ($rowkeahlian1=mysqli_fetch_array($query_keahlian1)) {
                                        ?>
                                        <li>Jenjang : <?= $rowkeahlian1['jenjang'] ?> 
                                        <br> Mata Pelajaran : <?= ucfirst($rowkeahlian1['mapel']) ?> 
                                        <br> Status : 
                                            <?php if ($rowkeahlian1['status']=="belum") {
                                                echo "Masih Proses Verifikasi";
                                            }else{
                                                echo $rowkeahlian1['status'];
                                            } ?>
                                        </li>
                                        <?php
                                    }     
                                }else{
                                    ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                            Belum Mendeskripsikan Keahlian Sama Sekali
                                        </div>
                                    <?php
                                }
                            ?>
                        </ol>
                        <div class="w3-modal" id="modalkeahlian">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                <center><h2 class="w3-center"><br>Tambah Keahlian</h2></center>
                                <span onclick="document.getElementById('modalkeahlian').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                    <form action="" method="POST">
                                        <div class="col-sm-12 col-md-6" >
                                            <div class="form-group">
                                                <select name="jenjang" class="form-group">
                                                    <option value="">Pilih Jenjang</option>
                                                    <option value="sd">SD / Sederajat</option>
                                                    <option value="smp">SMP / Sederajat</option>
                                                    <option value="sma">SMA / Sederajat</option>
                                                </select>
                                            </div><!-- /.form-group -->                    
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" autocomplete="off" name="mapel" placeholder="Mata Pelajaran Yang Di Kuasai">
                                            </div><!-- /.form-group -->                    
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <textarea name="deskripsi" id="deskripsi" cols="10" rows="2" class="form-control" placeholder="Deskripsi Keterangan"></textarea>
                                                <span id="jumlah_deskripsi"></span>
                                            </div><!-- /.form-group -->                    
                                        </div>
                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                        <p style="text-align: center; margin:0 auto;"> <button type="submit" name="tambahkeahlian" class="btn">Tambah Keahlian</button></p>
                                        </div>
                                    </form>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div id="Riwayat" class="w3-container kategoriTentor" style="display:none">
                        <?php 
                            $cek_isi = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user' && sd!='' && tahun_sd!='' && ijazahsd!='' && smp!='' && tahun_smp!='' && ijazahsmp!='' && sma!='' && tahun_sma!='' && ijazahsma!='' && sarjana!='' && tahun_sarjana!='' && transkrip!='' ");
                            if (mysqli_num_rows($cek_isi)>0) {
                                
                            }else{
                                if ($row_detail['id_user']==$id_user_sess) {                        
                            ?>
                                <p style="text-align: center; margin:0 auto;"><a href="riwayat" class="btn btn-secondary">Tambah Riwayat</a></p>
                            <?php
                                }else{

                                }
                            }
                            if (mysqli_num_rows($query_ceknotif2)>0) {
                            ?>
                            <ul class="timeline">
                            <?php 
                            $cek_sarjana = mysqli_query($koneksi,"select sarjana,tahun_sarjana,transkrip from riwayat where id_user_tentor='$id_user' && sarjana!='' && tahun_sarjana!='' && transkrip!='' ");
                            $query_sarjana = mysqli_fetch_array($cek_sarjana);
                            if (mysqli_num_rows($cek_sarjana)>0) {
                            ?>
                            <!-- Item 1 -->
                            <li>
                                <div class="direction-r">
                                    <div class="flag-wrapper">
                                        <span class="flag"><?= $query_sarjana['sarjana'] ?></span>
                                        <span class="time-wrapper"><span class="time"><?= $query_sarjana['tahun_sarjana'] ?></span></span>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }else{

                            }
                            ?>
                            
                            <?php 
                            $cek_sma = mysqli_query($koneksi,"select sma,tahun_sma,ijazahsma from riwayat where id_user_tentor='$id_user' && sma!='' && tahun_sma!='' && ijazahsma!='' ");
                            $query_sma = mysqli_fetch_array($cek_sma);
                            if (mysqli_num_rows($cek_sma)) {
                            ?>
                            <!-- Item 2 -->
                            <li>
                                <div class="direction-l">
                                    <div class="flag-wrapper">
                                        <span class="flag"><?= $query_sma['sma'] ?></span>
                                        <span class="time-wrapper"><span class="time"><?= $query_sma['tahun_sma'] ?></span></span>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }else{

                            }
                            ?>
                            
                            <?php 
                            $cek_smp = mysqli_query($koneksi,"select smp,tahun_smp,ijazahsmp from riwayat where id_user_tentor='$id_user' && smp!='' && tahun_smp!='' && ijazahsmp!='' ");
                            $query_smp = mysqli_fetch_array($cek_smp);
                            if (mysqli_num_rows($cek_smp)>0) {
                            ?>
                            <!-- Item 3 -->
                            <li>
                                <div class="direction-r">
                                    <div class="flag-wrapper">
                                        <span class="flag"><?= $query_smp['smp'] ?></span>
                                        <span class="time-wrapper"><span class="time"><?= $query_smp['tahun_smp'] ?></span></span>
                                    </div>
                                </div>
                            </li>
                            <?php 
                            }else{

                            }
                            ?>
                            
                            <?php 
                            $cek_sd = mysqli_query($koneksi,"select sd,tahun_sd,ijazahsd from riwayat where id_user_tentor='$id_user' && sd!='' && tahun_sd!='' && ijazahsd!='' ");
                            $query_sd = mysqli_fetch_array($cek_sd);
                            if (mysqli_num_rows($cek_sd)>0) {
                            ?>
                            <!-- Item 4 -->
                            <li>
                                <div class="direction-l">
                                    <div class="flag-wrapper">
                                        <span class="flag"><?= $query_sd['sd'] ?></span>
                                        <span class="time-wrapper"><span class="time"><?= $query_sd['tahun_sd'] ?></span></span>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }else{

                            }
                            ?>
                            
                            </ul>
                            <?php
                            }
                            else{
                            ?>
                                <br>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    Belum Mengisi Daftar Riwayat Pendidikan
                                </div>
                            <?php
                            }
                        ?>
                    </div>
                    </div>
                    <h2 class="page-header ">Jadwal Tentor</h2>
                    <div class="row box">
                        <form action="" method="post">
                            <table class="table table-bordered" style="width: 100%">
                                <tr>
                                    <th>Jam</th>
                                    <th>Sabtu</th>
                                    <th>Minggu</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jum'at</th>
                                </tr>
                                <?php 
                                    $qr = mysqli_query($koneksi,"select * from jadwal_tentor where id_user_tentor='$id_user'");
                                    while ($rw=mysqli_fetch_array($qr)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $rw['id_jam']; ?> PM</td>
                                        <td>
                                            <?php if ($rw['sabtu']=="kosong") { ?>
                                                Tersedia
                                                <!-- &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'].$_SESSION['id_user'] ?>" name="sabtu">&nbsp;&nbsp;                 -->
                                            <?php
                                                }elseif ($rw['sabtu']=="ngajar") {
                                                    echo "Ngajar";
                                                }elseif ($rw['sabtu']=="proses") {
                                                    echo "On Process";
                                                } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($rw['minggu']=="kosong") { ?>
                                                Tersedia
                                                <!-- &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'].$_SESSION['id_user'] ?>" name="minggu">&nbsp;&nbsp;                 -->
                                            <?php
                                                }elseif ($rw['minggu']=="ngajar") {
                                                    echo "Ngajar";
                                                }elseif ($rw['minggu']=="proses") {
                                                    echo "On Process";
                                                } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($rw['senin']=="kosong") { ?>
                                                Tersedia
                                                <!-- &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'].$_SESSION['id_user'] ?>" name="senin">&nbsp;&nbsp;                 -->
                                            <?php
                                                }elseif ($rw['senin']=="ngajar") {
                                                    echo "Ngajar";
                                                }elseif ($rw['senin']=="proses") {
                                                    echo "On Process";
                                                } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($rw['selasa']=="kosong") { ?>
                                                Tersedia
                                                <!-- &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'].$_SESSION['id_user'] ?>" name="selasa">&nbsp;&nbsp;                 -->
                                            <?php
                                                }elseif ($rw['selasa']=="ngajar") {
                                                    echo "Ngajar";
                                                }elseif ($rw['selasa']=="proses") {
                                                    echo "On Process";
                                                } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($rw['rabu']=="kosong") { ?>
                                                Tersedia
                                                <!-- &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'].$_SESSION['id_user'] ?>" name="rabu">&nbsp;&nbsp;                 -->
                                            <?php
                                                }elseif ($rw['rabu']=="ngajar") {
                                                    echo "Ngajar";
                                                }elseif ($rw['rabu']=="proses") {
                                                    echo "On Process";
                                                } 
                                            ?>                                
                                        </td>
                                        <td>
                                            <?php if ($rw['kamis']=="kosong") { ?>
                                                Tersedia
                                                <!-- &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'].$_SESSION['id_user'] ?>" name="kamis">&nbsp;&nbsp;                 -->
                                            <?php
                                                }elseif ($rw['kamis']=="ngajar") {
                                                    echo "Ngajar";
                                                }elseif ($rw['kamis']=="proses") {
                                                    echo "On Process";
                                                } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($rw['jumat']=="kosong") { ?>
                                                Tersedia
                                                <!-- &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'].$_SESSION['id_user'] ?>" name="juamt">&nbsp;&nbsp;                 -->
                                            <?php
                                                }elseif ($rw['jumat']=="ngajar") {
                                                    echo "Ngajar";
                                                }elseif ($rw['jumat']=="proses") {
                                                    echo "On Process";
                                                } 
                                            ?>                                
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                ?> 
                            </table>
                            <br>
                            <center>
                            <?php 
                                if (base64_decode($_SESSION['level'])=="tentor_lbb" || base64_decode($_SESSION['level'])=="tentor_luar") {
                                    
                                }else{                                
                            ?>
                            <button type="submit" class="btn" name="submit_jadwal">Pesan Tentor</button>
                            <?php } ?>
                            </center>
                        </form>
                    </div><!-- /.row -->
                    <!-- komentar -->
                    <?php 
                        $cek_maps = mysqli_query ($koneksi,"select id_user from user where id_user = '$id_user_sess' && level='siswa' ");
                        if (mysqli_num_rows($cek_maps)>0) {
                            ?>
                            <br>
                            <h2 class="page-header ">Direction Maps (Lokasi <?= $row_detail['uname'] ?>)</h2>
                            <div class="row box">
                                <div class="col-sm-12 col-md-12">
                                    <div id="map-canvas" style="width:100%;height:400px;"></div>
                                </div>
                            </div>
                            <?php                            
                        }else{
                        }
                    ?>
                    <br>
                    <?php 
                    $queryKomentar = mysqli_query($koneksi,"select 
                        user.uname,
                        user_detail.foto,
                        nilai_tentor.nilai,
                        nilai_tentor.id_permintaan_tentor,
                        nilai_tentor.catatan
                        from permintaan_tentor INNER JOIN user 
                             ON permintaan_tentor.id_user_pencari=user.id_user
                             INNER JOIN user_detail 
                             ON permintaan_tentor.id_user_pencari=user_detail.id_user
                             INNER JOIN nilai_tentor 
                             ON permintaan_tentor.id_permintaan=nilai_tentor.id_permintaan_tentor
                         where nilai_tentor.id_user_tentor='$id_user' order by nilai_tentor.nilai ASC");
                    ?>
                    <h2 class="page-header ">Komentar </h2>
                        <div class="row box">
                        <?php if (mysqli_num_rows($queryKomentar)>0) {
                            ?>
                            <div id="comments" class="comments-area">
                                <?php 
                                    while ($rowKomentar = mysqli_fetch_array($queryKomentar)) {
                                ?>
                                <ol class="comment-list">
                                    <li class="comment byuser comment-author-admin even thread-even depth-1 comments" id="comment-31">
                                        <div class="comment clearfix">
                                            <div class="comment-author">
                                                <img alt="Foto" src="<?= $rowKomentar['foto'] ?>" class="avatar avatar-70 photo" height="70" width="70">
                                            </div><!-- /.comment-image -->

                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <strong class="comment-author"><?= ucfirst($rowKomentar['uname']) ?></strong>
                                                    <span class="separator">|</span>
                                                    <span class="comment-date rating">
                                                        <?php 
                                                            $nilai = $rowKomentar['nilai'];
                                                            ?>
                                                                <!-- <fieldset  class="x"> -->
                                                                <input type="radio" name="rating<?= $rowKomentar['id_permintaan_tentor'] ?>" value="5" <?php if ($nilai=="5") {
                                                                    echo "checked";
                                                                }else{
                                                                    echo "disabled";
                                                                    } ?> />
                                                                <label class = "full" for="star5" title="Sangat Baik"></label>
                                                                <input type="radio" name="rating<?= $rowKomentar['id_permintaan_tentor'] ?>" value="4" <?php if ($nilai=="4") {
                                                                    echo "checked";
                                                                }else{
                                                                    echo "disabled";
                                                                    } ?> />
                                                                <label class = "full" for="star4" title="Baik"></label>
                                                                <input type="radio" name="rating<?= $rowKomentar['id_permintaan_tentor'] ?>" value="3" <?php if ($nilai=="3") {
                                                                    echo "checked";
                                                                }else{
                                                                    echo "disabled";
                                                                    } ?> />
                                                                <label class = "full" for="star3" title="Cukup"></label>
                                                                <input type="radio" name="rating<?= $rowKomentar['id_permintaan_tentor'] ?>" value="2" <?php if ($nilai=="2") {
                                                                    echo "checked";
                                                                }else{
                                                                    echo "disabled";
                                                                    } ?> />
                                                                <label class = "full" for="star2" title="Kurang"></label>
                                                                <input type="radio" name="rating<?= $rowKomentar['id_permintaan_tentor'] ?>" value="1" <?php if ($nilai=="1") {
                                                                    echo "checked";
                                                                }else{
                                                                    echo "disabled";
                                                                    } ?> />
                                                                <label class = "full" for="star1" title="Sangat Kurang"></label>
                                                                <!-- </fieldset> -->
                                                            <?php
                                                        ?>
                                                    </span>
                                                </div><!-- /.comment-meta -->

                                                <div class="comment-body">
                                                    <p><?= $rowKomentar['catatan'] ?></p>
                                                </div><!-- /.comment-body -->
                                            </div><!-- /.comment-content -->
                                        </div><!-- /.comment -->
                                    </li>
                                </ol><!-- /.comment-list -->
                                <?php } ?>
                            </div>
                            <?php
                            }else{
                                ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                        Belum Ada Komentar
                                    </div>
                                <?php
                            } 
                        ?>
                            
                        </div><!-- /.row -->
                       
                    <!-- end komentar -->
                <?php
                }
            ?>
        </div><!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
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
document.getElementById("default").click();
$(document).ready(function() {
    var text_max = 100;
    $('#jumlah_deskripsi').html(text_max + ' karakter tersisa');
    $('#deskripsi').keyup(function() {
        var text_length = $('#deskripsi').val().length;
        var text_remaining = text_max - text_length;

        $('#jumlah_deskripsi').html(text_remaining + ' karakter tersisa');
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
</script>

<?php 
    include_once "_partial/lolibox.php";
    if (isset($_POST['tambahkeahlian'])) {
        $jenjang   = addslashes(mysqli_real_escape_string($koneksi,$_POST['jenjang']));
        $mapel     = addslashes(mysqli_real_escape_string($koneksi,$_POST['mapel']));
        $deskripsi = addslashes(mysqli_real_escape_string($koneksi,$_POST['deskripsi']));
        $query_keahlian = mysqli_query($koneksi,"insert into keahlian values ('','$id_user_sess','$jenjang','$mapel','$deskripsi','belum')")or die(mysqli_error($koneksi));
        if ($query_keahlian == TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Informasi Akan Diverifikasi Admin Terlebih Dahulu'
                        });
                </script><meta http-equiv='refresh' content='3;url=profil&kode&".$_SESSION['id_user']."' />";
        }
    }
    if (isset($_POST['submit_jadwal'])) {
        if (empty($_SESSION['id_user'])) {
            echo "<script>window.location='login&profil&$_GET[kode]'</script>";
        }else{
            echo "<script>window.location='pesan&kode&".base64_encode($id_user)."'</script>";
        }
    }
?>