<?php 
    $id_user      = base64_decode($_GET['kode']); 
    $query_detail = mysqli_query($koneksi,"select * from view_user where id_user='$id_user'");
    $row_detail   = mysqli_fetch_array($query_detail);
?>
<link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/timeline.css">
<link rel="stylesheet" type="text/css" href="assets/libraries/custom/table.css">
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
            <h1 class="page-header">Detail Profil <?= ucfirst($row_detail['uname']) ?><a href="edituser&kode&<?= $_SESSION['id_user'] ?>" style="float: right; font-size: 15px"><span class="fa fa-edit"></span>&nbsp;Edit</a></h1>
            <div class="row box">
                <div class="col-sm-12 col-md-5">
                    <div class="property-gallery">
                        <div class="property-gallery-preview">
                            <a href="editpp&kode&<?= $_SESSION['id_user'] ?>" id="crop" title="edit photo profil">
                                <img src="<?= $row_detail['foto'] ?>"  class="centered-and-cropped" width="400" height="350" alt="photo" >
                            </a>
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
            <div class="box">
            <h2 class="page-header"><div class="w3-row"><center>
                <a href="javascript:void(0)" onclick="tabsTentor(event, 'Keahlian');">
                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Keahlian</div>
                </a>
                <a href="javascript:void(0)" onclick="tabsTentor(event, 'Riwayat');">
                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Riwayat Pendidikan</div>
                </a>
                <a href="javascript:void(0)" onclick="tabsTentor(event, 'Jadwal');">
                  <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Jadwal</div>
                </a></center>
            </div> </h2>
            <div id="Keahlian" class="w3-container kategoriTentor" style="display:none">
                <h2>Keahlian</h2>
                <p>Keahlian is the capital kategoriTentor of England.</p>
            </div>
            
            <div id="Riwayat" class="w3-container kategoriTentor" style="display:none">
                <?php 
                    $cek_isi = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user_sess' && sd!='' && tahun_sd!='' && ijazahsd!='' && smp!='' && tahun_smp!='' && ijazahsmp!='' && sma!='' && tahun_sma!='' && ijazahsma!='' && sarjana!='' && tahun_sarjana!='' && transkrip!='' ");
                    if (mysqli_num_rows($cek_isi)>0) {
                        
                    }else{
                    ?>
                        <p style="text-align: center; margin:0 auto;"><a href="riwayat" class="btn">Tambah Riwayat</a></p>
                    <?php
                    }
                ?>
                <ul class="timeline">
                    <?php 
                    $cek_sarjana = mysqli_query($koneksi,"select sarjana,tahun_sarjana,transkrip from riwayat where id_user_tentor='$id_user_sess' && sarjana!='' && tahun_sarjana!='' && transkrip!='' ");
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
                            <div class="desc"><img src="<?= $query_sarjana['transkrip'] ?>" width="70%" alt=""></div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    
                    <?php 
                    $cek_sma = mysqli_query($koneksi,"select sma,tahun_sma,ijazahsma from riwayat where id_user_tentor='$id_user_sess' && sma!='' && tahun_sma!='' && ijazahsma!='' ");
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
                            <div class="desc"><img src="<?= $query_sma['ijazahsma'] ?>" width="70%" alt=""></div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    
                    <?php 
                    $cek_smp = mysqli_query($koneksi,"select smp,tahun_smp,ijazahsmp from riwayat where id_user_tentor='$id_user_sess' && smp!='' && tahun_smp!='' && ijazahsmp!='' ");
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
                            <div class="desc"><img src="<?= $query_smp['ijazahsmp'] ?>" width="70%" alt=""></div>
                        </div>
                    </li>
                    <?php 
                    }
                    ?>
                    
                    <?php 
                    $cek_sd = mysqli_query($koneksi,"select sd,tahun_sd,ijazahsd from riwayat where id_user_tentor='$id_user_sess' && sd!='' && tahun_sd!='' && ijazahsd!='' ");
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
                            <div class="desc"><img src="<?= $query_sd['ijazahsd'] ?>" width="70%" alt=""></div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>

            <div id="Jadwal" class="w3-container kategoriTentor" style="display:none">
                <table class="tg" style="width: 100%">
                    <tr>
                        <th class="tg-nudq">Jam</th>
                        <th class="tg-f8tx">Sabtu</th>
                        <th class="tg-f8tx">Minggu</th>
                        <th class="tg-f8tx">Senin</th>
                        <th class="tg-f8tx">Selasa</th>
                        <th class="tg-f8tx">Rabu</th>
                        <th class="tg-f8tx">Kamis</th>
                        <th class="tg-f8tx">Jum'at</th>
                    </tr>
                    <?php 
                        $qr = mysqli_query($koneksi,"select * from jadwal_tentor where id_user_tentor='$id_user'");
                        while ($rw=mysqli_fetch_array($qr)) {
                        ?>
                        <tr>
                            <td class="tg-yw4l"><?php echo $rw['id_jam']; ?> PM</td>
                            <td class="tg-yw4l">
                                <?php if ($rw['sabtu']=="kosong") { ?>
                                    &nbsp;&nbsp;<input type="checkbox" name="sabtu">&nbsp;&nbsp;                
                                <?php
                                    }elseif ($rw['sabtu']=="ngajar") {
                                        echo "Ngajar";
                                    } 
                                ?>
                            </td>
                            <td class="tg-yw4l">
                                <?php if ($rw['minggu']=="kosong") { ?>
                                    &nbsp;&nbsp;<input type="checkbox" name="minggu">&nbsp;&nbsp;                
                                <?php
                                    }elseif ($rw['minggu']=="ngajar") {
                                        echo "Ngajar";
                                    } 
                                ?>
                            </td>
                            <td class="tg-yw4l">
                                <?php if ($rw['senin']=="kosong") { ?>
                                    &nbsp;&nbsp;<input type="checkbox" name="senin">&nbsp;&nbsp;                
                                <?php
                                    }elseif ($rw['senin']=="ngajar") {
                                        echo "Ngajar";
                                    } 
                                ?>
                            </td>
                            <td class="tg-yw4l">
                                <?php if ($rw['selasa']=="kosong") { ?>
                                    &nbsp;&nbsp;<input type="checkbox" name="selasa">&nbsp;&nbsp;                
                                <?php
                                    }elseif ($rw['selasa']=="ngajar") {
                                        echo "Ngajar";
                                    } 
                                ?>
                            </td>
                            <td class="tg-yw4l">
                                <?php if ($rw['rabu']=="kosong") { ?>
                                    &nbsp;&nbsp;<input type="checkbox" name="rabu">&nbsp;&nbsp;                
                                <?php
                                    }elseif ($rw['rabu']=="ngajar") {
                                        echo "Ngajar";
                                    } 
                                ?>                                
                            </td>
                            <td class="tg-yw4l">
                                <?php if ($rw['kamis']=="kosong") { ?>
                                    &nbsp;&nbsp;<input type="checkbox" name="kamis">&nbsp;&nbsp;                
                                <?php
                                    }elseif ($rw['kamis']=="ngajar") {
                                        echo "Ngajar";
                                    } 
                                ?>
                            </td>
                            <td class="tg-yw4l">
                                <?php if ($rw['jumat']=="kosong") { ?>
                                    &nbsp;&nbsp;<input type="checkbox" name="juamt">&nbsp;&nbsp;                
                                <?php
                                    }elseif ($rw['jumat']=="ngajar") {
                                        echo "Ngajar";
                                    } 
                                ?>                                
                            </td>
                        </tr>
                        <?php
                        }
                    ?> 
                </table>
            </div>
            </div>
            <!-- komentar -->
            <br><br><br>
            <h2 class="page-header ">Valuation </h2>
                <div class="row box">
                    <div class="col-sm-4">
                        <span class="small-title">Notice</span>

                        <p class="text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut elementum risus, ut auctor nisl. Donec a euismod mi. Ut accumsan, enim nec luctus ullamcorper.
                        </p>
                    </div>

                    <div class="col-sm-8">
                        <div class="property-valuation">
                            <div class="row">
                                <div class="col-sm-8">
                                    <ul class="property-valuation-values">
                                        <li><span style="width: 80%;"></span></li>
                                        <li><span style="width: 43%;"></span></li>
                                        <li><span style="width: 97%;"></span></li>
                                        <li><span style="width: 67%;"></span></li>
                                        <li><span style="width: 90%;"></span></li>
                                    </ul><!-- /.property-valuation-values -->
                                </div>

                                <div class="col-sm-4">
                                    <ul class="property-valuation-keys">
                                        <li>Crime</li>
                                        <li>Traffic</li>
                                        <li>Pollution</li>
                                        <li>Education</li>
                                        <li>Health</li>
                                    </ul><!-- /.property-valuation-keys -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.property-valuation -->
                    </div>
                </div><!-- /.row -->
            <!-- end komentar -->
        </div><!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script type="text/javascript" src="assets/js/jquery.js"></script>
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