<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
<div class="admin-content-main">
    <div class="admin-content-main-inner">
        <div class="container-fluid box">
            <!-- isi disini -->
            <h4>Daftar Pengguna Belum Verifikasi</h4>
            <br>
            <table id="validasiss" class="display" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Pengguna</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                		$query_akun = mysqli_query($koneksi,"select * from view_user where (level = 'tentor_lbb' || level='tentor_luar') && status='mail_ok' ");
                		while ($row_akun = mysqli_fetch_array($query_akun)) {
                            $id_nya = $row_akun['id_user'];
                	?>
                	<tr>
                		<td><?= $row_akun['id_user'] ?></td>
                		<td><?= $row_akun['uname'] ?></td>
                		<td><?= $row_akun['level'] ?></td>
                		<td><?= $row_akun['status'] ?></td>
                		<td>
                			<button onclick="document.getElementById('modalverifikasiakun<?= $row_akun['id_user'] ?>').style.display='block'" class="btn btn-secondary"><span class="fa fa-check"></span> Verifikasi</button>
                	</tr>
                    <div class="w3-modal" id="modalverifikasiakun<?= $row_akun['id_user'] ?>">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                            <center><h2 class="w3-center"><br>Detail User <?= ucfirst($row_akun['uname']) ?></h2></center>
                            <span onclick="document.getElementById('modalverifikasiakun<?= ucfirst($row_akun['id_user']) ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                            <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                <form action="" method="POST">
                                    <input type="hidden" name="id_nya" value="<?= $id_nya ?>">
                                    <div class="col-sm-12 col-md-6">
                                        <h3>Keahlian:</h3>
                                        <?php 
                                            $query_keahlian = mysqli_query($koneksi,"select * from keahlian where id_user='$id_nya'");
                                            if (mysqli_num_rows($query_keahlian)>0) {
                                                while ($row_keahlian = mysqli_fetch_array($query_keahlian)) {
                                                    echo "Jenjang: <b>".strtoupper($row_keahlian['jenjang'])."</b><br> Mata Pelajaran: <b>".ucwords($row_keahlian['mapel'])."</b><br> Penjelasan: <b>".ucwords($row_keahlian['deskripsi'])."</b><br>" ;
                                                }
                                            }else{
                                                echo "Belum Diisi";                                                
                                            }
                                        ?>                   
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <h3>Riwayat Pendidikan:</h3>
                                        <?php 
                                            $query_riwayat = mysqli_query($koneksi,"select * from riwayat where id_user_tentor='$id_nya'");
                                            $row_riwayat = mysqli_fetch_array($query_riwayat);
                                            if (mysqli_num_rows($query_riwayat)>0) {
                                                echo "SD/MI: <b>".strtoupper($row_riwayat['sd'])."</b><br> Tahun Pendidikan: <b>".ucwords($row_riwayat['tahun_sd'])
                                                    ."</b><br> SMP/MTs: <b>".strtoupper($row_riwayat['smp'])."</b><br> Tahun Pendidikan: <b>".ucwords($row_riwayat['tahun_smp'])
                                                    ."</b><br> SMA/MA: <b>".strtoupper($row_riwayat['sma'])."</b><br> Tahun Pendidikan: <b>".ucwords($row_riwayat['tahun_sma'])
                                                    ."</b><br> Sarjana: <b>".strtoupper($row_riwayat['sarjana'])."</b><br> Tahun Pendidikan: <b>".ucwords($row_riwayat['tahun_sarjana'])."</b>";
                                                
                                            }else{
                                                echo "Belum Diisi";
                                            }
                                        ?>    
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                     <hr>
                                    </div>
                                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                    <p style="text-align: center; margin:0 auto;"> <button type="submit" name="verified" onclick="return confirm('Anda Yakin Akan Memverifikasi Akun?')" class="btn btn-secondary">Verifikasi</button>  <button type="submit" onclick="return confirm('Anda Yakin Akan Menolak Akun?')" name="notverified" class="btn">Tolak</button></p>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                	<?php } ?>
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </div><!-- /.admin-content-main-inner -->
</div><!-- /.admin-content-main -->
<?php 
    if (isset($_POST['verified'])) {
        $id_nya = $_POST['id_nya'];
        $update_status = mysqli_query($koneksi,"update user set status='verified' where id_user='$id_nya'");
        $update_status = mysqli_query($koneksi,"update keahlian set status='verified' where id_user='$id_nya'");
        if ($update_status==TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Anda Berhasil Memverifikasi Akun'
                        });
                </script><meta http-equiv='refresh' content='2;url=valakun' />";
        }
    }if (isset($_POST['notverified'])) {
        $id_nya = $_POST['id_nya'];
        echo $id_nya;
    }
?>