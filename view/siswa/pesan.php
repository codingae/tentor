<?php 
    $kode_tentor = $_GET['kode'];
	$id_user = base64_decode($_GET['kode']); 
	$query_detail = mysqli_query($koneksi,"select * from view_user where id_user='$id_user'");
    $row_detail   = mysqli_fetch_array($query_detail);
?>
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
            <h1 class="page-header">Pesan Tentor a.n <?= strtoupper($row_detail['uname']) ?></h1>
        	<div class="box">
                <center><h4><b>Silakan Pilih Hari</b></h4></center>
        		<form action="" method="post" id="form_pesan">
                    <input type="hidden" value="<?php echo $kode_tentor; ?>" name="kode_tentor">
                    <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" name="kode_pemesan">
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
                            $qr = mysqli_query($koneksi,"select * from jadwal_tentor where id_user_tentor='$id_user' order by id_jam ASC");
                            while ($rw=mysqli_fetch_array($qr)) {
                            ?>
                            <tr>
                                <td><?php echo $rw['id_jam']; ?> PM</td>
                                <td>
                                    <?php if ($rw['sabtu']=="kosong") { ?>
                                        &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'] ?>sabtu" name="sabtu">&nbsp;&nbsp;                
                                    <?php
                                        }elseif ($rw['sabtu']=="ngajar") {
                                            echo "Ngajar";
                                        }elseif ($rw['sabtu']=="proses") {
                                            echo "On Process..";
                                        } 
                                    ?>
                                </td>
                                <td>
                                    <?php if ($rw['minggu']=="kosong") { ?>
                                        &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'] ?>minggu" name="minggu">&nbsp;&nbsp;                
                                    <?php
                                        }elseif ($rw['minggu']=="ngajar") {
                                            echo "Ngajar";
                                        }elseif ($rw['minggu']=="proses") {
                                            echo "On Process..";
                                        } 
                                    ?>
                                </td>
                                <td>
                                    <?php if ($rw['senin']=="kosong") { ?>
                                        &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'] ?>senin" name="senin">&nbsp;&nbsp;                
                                    <?php
                                        }elseif ($rw['senin']=="ngajar") {
                                            echo "Ngajar";
                                        }elseif ($rw['senin']=="proses") {
                                            echo "On Process..";
                                        } 
                                    ?>
                                </td>
                                <td>
                                    <?php if ($rw['selasa']=="kosong") { ?>
                                        &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'] ?>selasa" name="selasa">&nbsp;&nbsp;                
                                    <?php
                                        }elseif ($rw['selasa']=="ngajar") {
                                            echo "Ngajar";
                                        }elseif ($rw['selasa']=="proses") {
                                            echo "On Process..";
                                        } 
                                    ?>
                                </td>
                                <td>
                                    <?php if ($rw['rabu']=="kosong") { ?>
                                        &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'] ?>rabu" name="rabu">&nbsp;&nbsp;                
                                    <?php
                                        }elseif ($rw['rabu']=="ngajar") {
                                            echo "Ngajar";
                                        }elseif ($rw['rabu']=="proses") {
                                            echo "On Process..";
                                        } 
                                    ?>                                
                                </td>
                                <td>
                                    <?php if ($rw['kamis']=="kosong") { ?>
                                        &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'] ?>kamis" name="kamis">&nbsp;&nbsp;                
                                    <?php
                                        }elseif ($rw['kamis']=="ngajar") {
                                            echo "Ngajar";
                                        }elseif ($rw['kamis']=="proses") {
                                            echo "On Process..";
                                        } 
                                    ?>
                                </td>
                                <td>
                                    <?php if ($rw['jumat']=="kosong") { ?>
                                        &nbsp;&nbsp;<input type="radio" value="<?= $rw['id_jam'] ?>jumat" name="jumat">&nbsp;&nbsp;                
                                    <?php
                                        }elseif ($rw['jumat']=="ngajar") {
                                            echo "Ngajar";
                                        }elseif ($rw['jumat']=="proses") {
                                            echo "On Process..";
                                        } 
                                    ?>                                
                                </td>
                            </tr>
                            <?php
                            }
                        ?> 
                    </table>
                    <div class="col-sm-12 col-md-6" >
                        <div class="form-group">
                            <select name="jenjang" id="jenjang" onchange ="show_biaya(this.value)" class="form-group" required="Pilih Jenjang & Mapel">
                                <option value="">Pilih Jenjang & Mapel</option>
                                <?php 
                                    $jenjang_q = mysqli_query($koneksi,"select jenjang, mapel, id_keahlian from keahlian where id_user='$id_user'");
                                    while ($jenjang_r = mysqli_fetch_array($jenjang_q)) {
                                    ?>
                                    <option value="<?= $jenjang_r['id_keahlian'] ?>"><?= "Jenjang: <b>".strtoupper($jenjang_r['jenjang'])."</b>; Mapel: <b>".ucwords($jenjang_r['mapel'])."</b>" ?></option>
                                    <?php
                                    }
                                ?>                                
                            </select>
                        </div><!-- /.form-group -->                    
                    </div>
                    <div class="col-sm-12 col-md-6" >
                        <div class="form-group">
                            <select name="paket" class="form-group">
                                <option value="">Pilih Durasi Les</option>                             
                                <option value="1">1 Bulan</option>                             
                                <option value="2">2 Bulan</option>                             
                                <option value="3">3 Bulan</option>                             
                                <option value="4">4 Bulan</option>                             
                                <option value="5">5 Bulan</option>                             
                                <option value="6">6 Bulan</option>                             
                            </select>
                        </div><!-- /.form-group -->                    
                    </div>
                    <div class="col-sm-12 col-md-12" >
                        <div id="biaya"></div>
                    </div>
                    <br>
                    <center>
                    <?php 
                        if (base64_decode($_SESSION['level'])=="tentor_lbb" || base64_decode($_SESSION['level'])=="tentor_luar") {
                            
                        }else{                                
                    ?>
                    <button type="submit" class="btn btn-secondary" name="submit_jadwal">Pesan Tentor</button>
                    <button type="button" class="btn" onclick="myReset()">Reset</button>
                    <?php } ?>
                    </center>
                </form>
        	</div>
        </div>
        <!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script>
    function myReset(){
        document.getElementById("form_pesan").reset();
    }
</script>
<script>
    function show_biaya(id) {
        //get the selected value

        //make the ajax call
        $.ajax({
            url: 'view/siswa/showbiaya.php',
            type: 'GET',
            data: {option : id},
            success: function(data) {
                $("#biaya").html(data);
            }
        });
    }
</script>
<?php 
    include_once "_partial/lolibox.php";
    if (isset($_POST['submit_jadwal'])) {
        $kode_pemesan = base64_decode($_POST['kode_pemesan']);
        $kode_tentor  = base64_decode($_POST['kode_tentor']);

        $sabtu      = $_POST['sabtu'];
        $minggu     = $_POST['minggu'];
        $senin      = $_POST['senin'];
        $selasa     = $_POST['selasa'];
        $rabu       = $_POST['rabu'];
        $kamis      = $_POST['kamis'];
        $jumat      = $_POST['jumat'];
        $paket      = $_POST['paket'];

        $id_biaya   = $_POST['pilih'];
        $id_keahlian= $_POST['jenjang'];

        $cek_sabtu  = count($sabtu);
        $cek_minggu = count($minggu);
        $cek_senin  = count($senin);
        $cek_selasa = count($selasa);
        $cek_rabu   = count($rabu);
        $cek_kamis  = count($kamis);
        $cek_jumat  = count($jumat);

        $cek_inputhari = $cek_sabtu+$cek_minggu+$cek_senin+$cek_selasa+$cek_rabu+$cek_kamis+$cek_jumat;

        if ($cek_inputhari<3 || $cek_inputhari>4) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Mohon Pilih Minimal 3 Hari dan Maksimal 4 Hari Untuk Pemilihan Hari'
                        });
                </script><meta http-equiv='refresh' content='3;url=pesan&kode&".$_GET['kode']."' />";
        }else{
            $date = date("ymd");    
            $query_id     = mysqli_query($koneksi,"select id_permintaan from permintaan_tentor where id_permintaan like '%".$date."%' order by id_permintaan desc limit 1");
            $row_id       = mysqli_fetch_array($query_id);
            if (mysqli_num_rows($query_id)>0) {
                $id_permintaan = $row_id['id_permintaan']+1;
            }
            else{
                $id_permintaan = $date."001"; 
            }
            $id_detail = $id_permintaan.$kode_tentor;

            // query untuk table
            $query_permintaan = mysqli_query($koneksi,"insert into permintaan_tentor values ('$id_permintaan','$kode_pemesan','$kode_tentor','$id_biaya','$id_keahlian','$id_detail','$paket','','proses','','')")or die(mysqli_error($koneksi));

            if (isset($sabtu)) {
                $sabtu = $sabtu;
                $jam   = substr($sabtu, 0,11);
                $hari  = substr($sabtu, 11,25);
                $query_permintaan = mysqli_query($koneksi,"insert into detail_permintaan_tentor values('$id_detail','$hari','$jam')")or die(mysqli_error($koneksi));
                $query_permintaan = mysqli_query($koneksi,"update jadwal_tentor set sabtu='proses' where id_jam='$jam' && id_user_tentor='$kode_tentor'")or die(mysqli_error($koneksi));
            }
            if (isset($minggu)) {
                $minggu = $minggu;
                $jam   = substr($minggu, 0,11);
                $hari  = substr($minggu, 11,25);
                $query_permintaan = mysqli_query($koneksi,"insert into detail_permintaan_tentor values('$id_detail','$hari','$jam')")or die(mysqli_error($koneksi));
                $query_permintaan = mysqli_query($koneksi,"update jadwal_tentor set minggu='proses' where id_jam='$jam' && id_user_tentor='$kode_tentor'")or die(mysqli_error($koneksi));                
            }
            if (isset($senin)) {
                $senin = $senin;
                $jam   = substr($senin, 0,11);
                $hari  = substr($senin, 11,25);
                $query_permintaan = mysqli_query($koneksi,"insert into detail_permintaan_tentor values('$id_detail','$hari','$jam')")or die(mysqli_error($koneksi));
                $query_permintaan = mysqli_query($koneksi,"update jadwal_tentor set senin='proses' where id_jam='$jam' && id_user_tentor='$kode_tentor'")or die(mysqli_error($koneksi));                

            }
            if (isset($selasa)) {
                $selasa = $selasa;
                $jam   = substr($selasa, 0,11);
                $hari  = substr($selasa, 11,25);
                $query_permintaan = mysqli_query($koneksi,"insert into detail_permintaan_tentor values('$id_detail','$hari','$jam')")or die(mysqli_error($koneksi));
                $query_permintaan = mysqli_query($koneksi,"update jadwal_tentor set selasa='proses' where id_jam='$jam' && id_user_tentor='$kode_tentor'")or die(mysqli_error($koneksi));                

            }
            if (isset($rabu)) {
                $rabu = $rabu;
                $jam   = substr($rabu, 0,11);
                $hari  = substr($rabu, 11,25);
                $query_permintaan = mysqli_query($koneksi,"insert into detail_permintaan_tentor values('$id_detail','$hari','$jam')")or die(mysqli_error($koneksi));
                $query_permintaan = mysqli_query($koneksi,"update jadwal_tentor set rabu='proses' where id_jam='$jam' && id_user_tentor='$kode_tentor'")or die(mysqli_error($koneksi));                

            }
            if (isset($kamis)) {
                $kamis = $kamis;
                $jam   = substr($kamis, 0,11);
                $hari  = substr($kamis, 11,25);
                $query_permintaan = mysqli_query($koneksi,"insert into detail_permintaan_tentor values('$id_detail','$hari','$jam')")or die(mysqli_error($koneksi));
                $query_permintaan = mysqli_query($koneksi,"update jadwal_tentor set kamis='proses' where id_jam='$jam' && id_user_tentor='$kode_tentor'")or die(mysqli_error($koneksi));                

            }
            if (isset($jumat)) {
                $jumat = $jumat;
                $jam   = substr($jumat, 0,11);
                $hari  = substr($jumat, 11,25);
                $query_permintaan = mysqli_query($koneksi,"insert into detail_permintaan_tentor values('$id_detail','$hari','$jam')")or die(mysqli_error($koneksi));
                $query_permintaan = mysqli_query($koneksi,"update jadwal_tentor set jumat='proses' where id_jam='$jam' && id_user_tentor='$kode_tentor'")or die(mysqli_error($koneksi));                
            }

            // $query_permintaan = mysqli_query($koneksi,"insert into evaluasi_siswa values('','','','','$id_permintaan')")or die(mysqli_error($koneksi));

            if ($query_permintaan==TRUE) {
                echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Anda Berhasil Mengirim Permintaan, Silakan Tunggu Konfirmasi Dari Tentor'
                        });
                </script><meta http-equiv='refresh' content='3;url=pesan&kode&".$_GET['kode']."' />";
            }

        }
        
        // $cek_biaya = mysqli_query($koneksi,"select id from biaya where id='$pilih'");
        // $row_biaya = mysqli_fetch_array($cek_biaya);
        // $kelas     = $row_biaya['kelas'];
        // $pertemuan = $row_biaya['pertemuan'];
        // $biaya     = $row_biaya['biaya'];

        // $cek_keahlian = mysqli_query($koneksi,"select * from keahlian where id_keahlian='$jenjang'");
        // $row_keahlian = mysqli_fetch_array($cek_keahlian);
        // $jnjng        = $row_keahlian['jenjang'];
        // $mapel        = $row_keahlian['mapel'];

        
    }
?>