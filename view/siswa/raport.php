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
            <h1 class="page-header">Raport Anda</h1>
            <div class="box">
                <table class="table table-bordered">
                    <tr style="background: #1E88E5">
                        <td style="width: 5%"><b>#!</b></td>
                        <td><b>Mata Pelajaran</b></td>
                        <td><b>Tentor</b></td>
                        <td><b>Jadwal</b></td>
                        <td><b>Aksi</b></td>
                    </tr>
                    <?php 
                        $no = 1;
                        $id_user_pencari = base64_decode($_SESSION['id_user']);
                        $query_pemberitahuan = mysqli_query($koneksi,"select 
                            keahlian.mapel,
                            keahlian.jenjang,
                            user_detail.nama_lengkap,
                            permintaan_tentor.mulai_les,
                            permintaan_tentor.selesai_les,
                            permintaan_tentor.status,
                            permintaan_tentor.id_permintaan,
                            permintaan_tentor.id_biaya,
                            permintaan_tentor.id_user_pencari,
                            permintaan_tentor.id_user_tentor,
                            permintaan_tentor.id_detail_permintaan_tentor
                            from permintaan_tentor INNER JOIN keahlian 
                                 ON permintaan_tentor.id_keahlian=keahlian.id_keahlian
                                 INNER JOIN user_detail 
                                 ON permintaan_tentor.id_user_tentor=user_detail.id_user
                             where permintaan_tentor.id_user_pencari='$id_user_pencari' 
                                   &&  (permintaan_tentor.status='upload_valid' || permintaan_tentor.status='les_selesai') ");
                        // $query_pemberitahuan = mysqli_query($koneksi,"select * from permintaan_tentor where id_user_tentor='$id_tentor' && status='proses'");
                        if (mysqli_num_rows($query_pemberitahuan)>0) {
                        while ($row_pemberitahuan = mysqli_fetch_array($query_pemberitahuan)) {
                    ?>
                    <tr>
                        <td style="width: 5%"><?php echo $no++; ?></td>
                        <td>
                            <?php 
                                echo $row_pemberitahuan['mapel'];
                            ?>
                        </td>
                        <td><?php echo $row_pemberitahuan['nama_lengkap']; ?></td>
                        <td><?php echo $row_pemberitahuan['mulai_les']." sampai ".$row_pemberitahuan['selesai_les']; ?></td>
                        <td>
                            <button class="btn btn-secondary" onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='block'"><span class="fa fa-tasks"></span>Lihat Raport</button>
                            <?php 
                            	$id_p = $row_pemberitahuan['id_permintaan'];
                            	$cek_eval = mysqli_query($koneksi,"select * from evaluasi_siswa where id_permintaan='$id_p'");
                            	$cek_num  = mysqli_num_rows($cek_eval);
                            	if ($cek_num >= 3) {
                                	$cekNilaiTentor = mysqli_query($koneksi,"select * from nilai_tentor where id_permintaan_tentor='$id_p'");
                                	$cek_num_nilai  = mysqli_num_rows($cekNilaiTentor);
                                 ?>
                                    <div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" <?php if ($cek_num_nilai>0) {
                                        ?> style="max-width:900px" <?php
                                        }else{
                                        ?> style="max-width:600px" <?php
                                        } ?> >
                                        <center><h2 class="w3-center"><br>Raport Anda</h2></center>
                                        <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Keluar">&times;</span>
                                        <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                            <?php 
	                                        	if ($cek_num_nilai>0) {
	                                        	  ?>
                                                    <center><h4>Laporan Akhir Les</h4></center>
                                                    <center><h4><b>"BIMBEL FLC(Fun Learning Course)"</b></h4></center>
                                                    <center style="margin-top: 5px"><i>Alamat : Keplaksari, Peterongan, Keplaksari, Peterongan, Kabupaten Jombang, Jawa Timur 61481</i></center>
                                                    <hr style="background-color: black;height: 3px;margin-top: 9px">
                                                    <table>
                                                        <tr>
                                                            <td>Nama:</td>
                                                            <?php 
                                                                $query_nama = mysqli_query($koneksi,"select nama_lengkap from user_detail where id_user='$id_user_pencari'");
                                                                $row_nama   = mysqli_fetch_array($query_nama);
                                                            ?>
                                                            <td><b>: <?= ucwords($row_nama['nama_lengkap']) ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenjang/Kelas </td>
                                                            <?php 
                                                                $id_kelas    = $row_pemberitahuan['id_biaya'];
                                                                $query_kelas = mysqli_query($koneksi,"select kelas from biaya where id='$id_kelas'");
                                                                $row_kelas   = mysqli_fetch_array($query_kelas);
                                                            ?>
                                                            <td><b>: <?= strtoupper($row_pemberitahuan['jenjang'])." / Kelas ". $row_kelas['kelas'] ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mata Pelajaran </td>
                                                            <?php 
                                                                $query_nama = mysqli_query($koneksi,"select nama_lengkap from user_detail where id_user='$id_user_pencari'");
                                                                $row_nama   = mysqli_fetch_array($query_nama);
                                                            ?>
                                                            <td><b>: <?= ucwords($row_pemberitahuan['mapel']) ?></b></td>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                    <table class="table table-bordered">
                                                        <tr style="background: #1E88E5">
                                                            <td style="width: 5%"><b>#!</b></td>
                                                            <td><b>Jenis Nilai</b></td>
                                                            <td><b>Nilai</b></td>
                                                            <td><b>Catatan</b></td>
                                                        </tr>
                                                        <?php 
                                                            $no_nilai=1;
                                                            $query_nilai = mysqli_query($koneksi,"select * from evaluasi_siswa where id_permintaan='$id_p'");
                                                            while ($row_nilai   = mysqli_fetch_array($query_nilai)) {
                                                        ?>
                                                        <tr>
                                                            <td><b><?= $no_nilai++ ?></b></td>
                                                            <td><?= $row_nilai['jenis_nilai'] ?></td>
                                                            <td><?= $row_nilai['nilai'] ?></td>
                                                            <td><?= $row_nilai['catatan'] ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </table>
                                                    <center><h4><b>Pesan Manajemen Bimbel FLC</b></h4></center>
                                                    <blockquote style="font-size: 13px"><?= ucwords("pendidikan bukanlah milik mereka yang kaya, buka pula kekuatan mereka yang cerdas, pendidikan adalah milik mereka yang mau belajar, mencari bkebenaran dan membawa perubahan, teruslah belajar meski hanya sekedar untuk mengisi setetes air dalam gelas hidup kita") ?></blockquote>
                                                    <div class="col-sm-12 col-md-6">
                                                        <center><b>Orang Tua/Wali Siswa</b></center> <br><br><br><br>
                                                        <hr style="margin-top:5px;border-bottom: 2px solid #8c8b8b;border-top: 2px dotted #8c8b8b;width: 60%">
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <center><b>CEO Bimbel FLC</b><br><br><br><br>
                                                        <b><i>ARI ISMAWANTO</i></b>
                                                        <hr style="margin-top:5px ;border-bottom: 2px solid #8c8b8b;border-top: 2px dotted #8c8b8b;width: 60%">
                                                        </center>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12">
                                                        <br><br><br>
                                                    </div>

                                                    <center>
                                                        <button type="submit" name="#!" class="btn btn-secondary">
                                                        Cetak Raport</button>
                                                    </center>
                                                  <?php
	                                        	}else{
	                                        		echo "<p><center><h5><b>Silakan Berikan Testimoni Kepada Tentor <i style='color:#1565C0'>".$row_pemberitahuan['nama_lengkap']." </i>Terlebih Dahulu</b></h5></center><p>";
	                                        		?>
													<form action="" id="formTestimoni" method="post">
													<input type="hidden" name="id_permintaan" value="<?= $row_pemberitahuan['id_permintaan'] ?>">
													<input type="hidden" name="id_user_pencari" value="<?= $row_pemberitahuan['id_user_pencari'] ?>">
                                                    <input type="hidden" name="id_user_tentor" value="<?= $row_pemberitahuan['id_user_tentor'] ?>">
													<input type="hidden" name="id_detail_permintaan_tentor" value="<?= $row_pemberitahuan['id_detail_permintaan_tentor'] ?>">
	                                        		<div class="col-sm-12 col-md-12">
	                                        			<br>
														<fieldset id='demo1' class="rating" style="float: left">
														    RATE &nbsp;&nbsp;&nbsp;
														    <input class="stars" type="radio" id="star5" name="rating" value="5" required />
														    <label class = "full" for="star5" title="Sangat Baik"></label>
														    <input class="stars" type="radio" id="star4" name="rating" value="4" />
														    <label class = "full" for="star4" title="Baik"></label>
														    <input class="stars" type="radio" id="star3" name="rating" value="3" />
														    <label class = "full" for="star3" title="Cukup"></label>
														    <input class="stars" type="radio" id="star2" name="rating" value="2" />
														    <label class = "full" for="star2" title="Kurang"></label>
														    <input class="stars" type="radio" id="star1" name="rating" value="1" />
														    <label class = "full" for="star1" title="Sangat Kurang - 1 star"></label>
														</fieldset>
													</div>
													<div class="col-sm-12 col-md-12">	
														<label for="catatan">Catatan</label>
														<textarea name="catatan" id="catatan" cols="10" rows="3" class="form-control" required></textarea>
														<span id="jumlah_catatan"></span>
													</div>														
													<div class="col-sm-12 col-md-12">
													<br>															
														<center>
                                                        <button type="submit" name="kirimTestimoni" class="btn btn-secondary">
                                                        Kirim</button>
                                                        <button type="button" class="btn" onclick="myReset()">Reset</button>
                                                        </center>
													</div>
													</form>
	                                        		<?php
	                                        	}
	                                        ?>
	                                    </div>
	                                    <!-- </div> -->
	                                    </div>
	                                </div>
                            	 <?php
                            	 } else{
                            	 ?>
                        			<div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
	                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
	                                    <center><h2 class="w3-center"><br>Detail Jadwal</h2></center>
	                                    <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Keluar">&times;</span>
	                                    <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
	                                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
	                                        Tentor Belum Menyelesaikan Penilaian
	                                    </div>
	                                    <!-- </div> -->
	                                    </div>
	                                </div>
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
            </div>
        </div><!-- /.konten -->
    </div><!-- /.row -->
</div><!-- /.container -->
<script>
    $(document).ready(function () {
        $("#demo1 .stars").click(function () {
       
            $.post('rating.php',{rate:$(this).val()},function(d){
                // if(d>0)
                // {
                //     alert('You already rated');
                // }else{
                //     alert('Thanks For Rating');
                // }
            });
            $(this).attr("checked");
        });
    });
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
    function myReset(){
        document.getElementById("formTestimoni").reset();
        $('#jumlah_catatan').html('100 karakter tersisa');
    }
</script>

<?php 
	if (isset($_POST['kirimTestimoni'])) {
		include_once "_partial/lolibox.php";
		$rating          = $_POST['rating'];
		$catatan         = $_POST['catatan'];
		$id_permintaan   = $_POST['id_permintaan'];
		$id_user_pencari = $_POST['id_user_pencari'];
        $id_user_tentor  = $_POST['id_user_tentor'];
		$id_detail_permintaan_tentor  = $_POST['id_detail_permintaan_tentor'];
        $queryDetailPermintaan = mysqli_query($koneksi,"select * from detail_permintaan_tentor where id_permintaan='$id_detail_permintaan_tentor'");        
        while ($row=mysqli_fetch_array($queryDetailPermintaan)) {
            $hari = $row['hari'];
            $jam  = $row['jam'];
            if ($hari=="sabtu") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set sabtu='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }elseif ($hari=="minggu") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set minggu='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }elseif ($hari=="senin") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set senin='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }elseif ($hari=="selasa") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set selasa='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }elseif ($hari=="rabu") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set rabu='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }elseif ($hari=="rabu") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set rabu='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }elseif ($hari=="kamis") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set kamis='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }elseif ($hari=="jumat") {
                $queryNilaiTentor = mysqli_query($koneksi,"update jadwal_tentor set jumat='kosong' where id_user_tentor='$id_user_tentor' && id_jam='$jam'");
            }
        }
        $queryNilaiTentor = mysqli_query($koneksi,"insert into nilai_tentor values ('$id_permintaan','$id_user_pencari','$id_user_tentor','$rating','$catatan')");
        $queryNilaiTentor = mysqli_query($koneksi,"update permintaan_tentor set status='les_selesai' where id_permintaan='$id_permintaan'");
		if ($queryNilaiTentor==TRUE) {
			echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Anda Berhasil Mengirim Testimoni ke Tentor, Silakan Sudah Bisa Melihat Raport Anda'
                        });
                </script><meta http-equiv='refresh' content='4;url=raport' />";
		}else{
			echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Gagal, Silakan Hubungi Administrator'
                        });
                </script><meta http-equiv='refresh' content='4;url=raport' />";			
		}
	}
?>