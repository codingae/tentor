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
            <h1 class="page-header">List Raport Siswa</h1>
            <div class="box">
                <table class="table table-bordered">
                    <tr style="background: #1E88E5">
                        <td style="width: 5%"><b>#!</b></td>
                        <td><b>Mata Pelajaran</b></td>
                        <td><b>Siswa</b></td>
                        <td><b>Jadwal</b></td>
                        <td><b>Aksi</b></td>
                    </tr>
                    <?php 
                        $no = 1;
                        $id_user_pencari = base64_decode($_SESSION['id_user']);
                        $query_pemberitahuan = mysqli_query($koneksi,"select 
                            keahlian.mapel,
                            user_detail.nama_lengkap,
                            permintaan_tentor.mulai_les,
                            permintaan_tentor.selesai_les,
                            permintaan_tentor.status,
                            permintaan_tentor.id_permintaan,
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
                            	 ?>
	                                <div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
	                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
	                                    <center><h2 class="w3-center"><br>Raport Anda</h2></center>
	                                    <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Keluar">&times;</span>
	                                    <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
	                                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
	                                        <?php 
	                                        	$cekNilaiTentor = mysqli_query($koneksi,"select * from nilai_tentor where id_permintaan_tentor='$id_p'");
	                                        	$cek_num_nilai  = mysqli_num_rows($cekNilaiTentor);
	                                        	if ($cek_num_nilai>0) {
	                                        		echo "Raport Tampil";
	                                        	}else{
	                                        		echo "<p><center><h5><b>Silakan Berikan Testimoni Kepada Tentor <i style='color:#1565C0'>".$row_pemberitahuan['nama_lengkap']." </i>Terlebih Dahulu</b></h5></center><p>";
	                                        		?>
													<form action="" id="formTestimoni" method="post">
													<input type="hidden" name="id_permintaan" value="<?= $row_pemberitahuan['id_permintaan'] ?>">
													<input type="hidden" name="id_user_pencari" value="<?= $row_pemberitahuan['id_user_pencari'] ?>">
													<input type="hidden" name="id_user_tentor" value="<?= $row_pemberitahuan['id_user_tentor'] ?>">
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