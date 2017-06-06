<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
<script type="text/javascript" src="assets/js/jquery.inputmask.js"></script>
<script>
    $(document).ready(function(){
        $.('#biaya').maskMoney({prefix:'Rp. ',thousands:'.', decimal:',', precision:0});
    });
</script>
<div class="admin-content-main">
    <div class="admin-content-main-inner">
        <div class="container-fluid box">
            <!-- isi disini -->
            <h4>Biaya Les
                <button  style="float: right" onclick="document.getElementById('tambahbiaya').style.display='block'" class="btn btn-secondary"><i class="fa fa-plus"></i> Tambah Biaya</button>
            </h4>
            <br>
            <table id="validasiss" class="display" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Pertemuan (/minggu)</th>
                        <th>Biaya (/bulan)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                        $no = 1;
                		$query_biaya = mysqli_query($koneksi,"select * from biaya ");
                		while ($row_biaya = mysqli_fetch_array($query_biaya)) {
                	?>
                	<tr>
                		<td><?= $no++; ?></td>
                		<td><?= "Kelas ".$row_biaya['kelas'] ?></td>
                		<td><?= $row_biaya['pertemuan']."x Pertemuan" ?></td>
                		<td><?= $row_biaya['biaya'] ?></td>
                		<td>
                			<button onclick="document.getElementById('modaledit<?= $row_biaya['id'] ?>').style.display='block'" class="btn btn-secondary"><span class="fa fa-check"></span> Edit</button>
                	</tr>
                    <div class="w3-modal" id="modaledit<?= $row_biaya['id'] ?>">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                            <center><h2 class="w3-center"><br>Detail User <?= ucfirst($row_biaya['uname']) ?></h2></center>
                            <span onclick="document.getElementById('modaledit<?= $row_biaya['id'] ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                            <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                <form action="" method="POST">
                                    <?php 
                                        $id = $row_biaya['id'];
                                        $edit_query = mysqli_query($koneksi,"select * from biaya where id='$id'");
                                        $edit_row   = mysqli_fetch_array($edit_query);
                                    ?>
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="kelas" value="Kelas <?= $edit_row['kelas'] ?>" readonly>
                                        </div><!-- /.form-group --> 
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pertemuan" value="<?= $edit_row['pertemuan'] ?>x Pertemuan" readonly>
                                        </div><!-- /.form-group --> 
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="biaya" value="<?= $edit_row['biaya'] ?>" placeholder="Biaya Pertemuan Perbulan" autocomplete="off" required>
                                        </div><!-- /.form-group --> 
                                    </div>
                                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                    <p style="text-align: center; margin:0 auto;"> <button type="submit" name="edit_biaya" onclick="return confirm('Anda Yakin Akan Mengedit Biaya?')" class="btn btn-secondary">Edit</button></p>
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
<div class="w3-modal" id="tambahbiaya">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <center><h2 class="w3-center"><br>Detail User <?= ucfirst($row_biaya['uname']) ?></h2></center>
        <span onclick="document.getElementById('tambahbiaya').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
            <form action="" method="POST">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <select name="kelas" id="kelas">
                            <option value="">Pilih Kelas</option>
                            <option value="1">Kelas 1</option>
                            <option value="2">Kelas 2</option>
                            <option value="3">Kelas 3</option>
                            <option value="4">Kelas 4</option>
                            <option value="5">Kelas 5</option>
                            <option value="6">Kelas 6</option>
                            <option value="7">Kelas 7</option>
                            <option value="8">Kelas 8</option>
                            <option value="9">Kelas 9</option>
                            <option value="10">Kelas 10</option>
                            <option value="11">Kelas 11</option>
                            <option value=2"1">Kelas 12</option>
                        </select>
                    </div><!-- /.form-group --> 
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <select name="pertemuan" id="pertemuan">
                            <option value="">Pilih Jumlah Pertemuan</option>
                            <option value="3">3x Pertemuan</option>
                            <option value="4">4x Pertemuan</option>
                        </select>
                    </div><!-- /.form-group --> 
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <input class="form-control" type="number" placeholder="Biaya Pertemuan Perbulan" name="biaya" autocomplete="off" required>
                    </div><!-- /.form-group --> 
                </div>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <p style="text-align: center; margin:0 auto;"> 
                    <button type="submit" name="submit_biaya" onclick="return confirm('Anda Yakin Akan Menambah Informasi Biaya')" class="btn btn-secondary">Submit</button>
                </p>
                </div>
            </form>
        <!-- </div> -->
    </div>
</div>
<?php 
    if (isset($_POST['submit_biaya'])) {
        $kelas     = $_POST['kelas'];
        $pertemuan = $_POST['pertemuan'];
        $biaya     = $_POST['biaya'];
        $insert_biaya = mysqli_query($koneksi,"insert into biaya values('','$kelas','$pertemuan','$biaya')");
        if ($insert_biaya==TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Anda Berhasil Menambah Biaya'
                        });
                </script><meta http-equiv='refresh' content='2;url=biaya' />";
        }
/*        $update_status = mysqli_query($koneksi,"update user set status='verified' where id_user='$id_nya'");
        $update_status = mysqli_query($koneksi,"update keahlian set status='verified' where id_user='$id_nya'");
        */
    }if (isset($_POST['edit_biaya'])) {
        $id        = $_POST['id'];
        // $kelas     = $_POST['kelas'];
        // $pertemuan = $_POST['pertemuan'];
        $biaya     = $_POST['biaya'];
        $update_biaya = mysqli_query($koneksi,"update biaya set biaya='$biaya' where id='$id'");
        if ($update_biaya==TRUE) {
            echo "<script>
                        Lobibox.notify('default', {
                            continueDelayOnInactiveTab: true,
                            showClass: 'fadeInDown',
                            hideClass: 'fadeUpDown',
                            size: 'mini',
                            position: 'center top',
                            msg: 'Anda Berhasil Mengupdate Biaya'
                        });
                </script><meta http-equiv='refresh' content='2;url=biaya' />";
        }
    }
?>
