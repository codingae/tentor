<link rel="stylesheet" type="text/css" href="assets/libraries/custom/w3_tabs.css">
<!-- some CSS styling changes and overrides -->
<style>
    .kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }
    .kv-avatar .file-input {
        display: table-cell;
        max-width: 220px;
    }
</style>
<?php 
    $kode   = addslashes($_GET['kode']);
    $query1 = mysqli_query($koneksi,"select * from view_user where id_user = '$kode'");
    $row1   = mysqli_fetch_array($query1);
?>
<div class="admin-content-main">
    <div class="admin-content-main-inner">
        <div class="container-fluid">
            <div class="col-sm-12">
              <div class="box">
                <h1 class="page-header">Pemberitahuan</h1>
                <table class="table table-bordered">
                    <tr style="background: #1E88E5">
                        <td style="width: 5%"><b>#!</b></td>
                        <td style="width: 55%"><b>Pemberitahuan</b></td>
                        <!-- <td><b>Status</b></td> -->
                        <td style="width: 35%"><b>Aksi</b></td>
                    </tr>
                    <?php 
                        $no = 1;
                        $id_user_pencari = base64_decode($_SESSION['id_user']);
                        $query_pemberitahuan = mysqli_query($koneksi,"select * from permintaan_tentor where status='upload_proses'");
                        // $query_pemberitahuan = mysqli_query($koneksi,"select * from permintaan_tentor where id_user_tentor='$id_tentor' && status='proses'");
                        if (mysqli_num_rows($query_pemberitahuan)>0) {
                        while ($row_pemberitahuan = mysqli_fetch_array($query_pemberitahuan)) {
                        $id_untuk_tentor = $row_pemberitahuan['id_user_tentor'];
                        $cek_tentor      = mysqli_query($koneksi,"select nama_lengkap from user_detail where id_user='$id_untuk_tentor'");
                        $row_tentor      = mysqli_fetch_array($cek_tentor);

                        $id_untuk_pencari = $row_pemberitahuan['id_user_pencari'];
                        $cek_pencari      = mysqli_query($koneksi,"select nama_lengkap from user_detail where id_user='$id_untuk_pencari'");
                        $row_pencari      = mysqli_fetch_array($cek_pencari)
                    ?>
                    <tr>
                        <td style="width: 5%"><?php echo $no++; ?></td>
                        <td style="width: 55%">
                            <?php 
                                if ($row_pemberitahuan['status']=="upload_proses") {
                                    echo "Siswa a.n <b>".$row_pencari['nama_lengkap']. "</b> Telah Mengupload Bukti Pembayaran";
                                }
                            ?>
                        </td>
                        <!-- <td><?php echo $row_pemberitahuan['status']; ?></td> -->
                        <td style="width: 35%">
                            <?php 
                                if ($row_pemberitahuan['status']=="upload_proses") {
                                    ?>
                                    <button class="btn btn-secondary" onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='block'"><span class="fa fa-tasks"></span>Aksi</button>
                                    <div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                            <center><h4 class="w3-center"><br>Validasi Bukti Bayar <?php echo ucwords($row_pencari['nama_lengkap']); ?></h4></center>
                                            <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                            <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                    <form action="" method="post">
                                                        <p style="text-align: center; margin:0 auto;"> 
                                                                <input type="hidden" name="id_permintaan" value="<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                                                <button type="submit"  name="terima_bukti" class="btn btn-secondary">
                                                                Valid</button>
                                                                <button type="submit"  name="tolak_bukti" class="btn">
                                                                Tidak Valid</button>
                                                        </p>
                                                    </form>
                                                </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <a href="pemberitahuan&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-info"></span>Detail</a>
                                    <?php 
                                      if (empty($row_pemberitahuan['upload_bukti_bayar'])) {
                                      ?>
                                      <a href="pemberitahuan&kode&<?= base64_encode($row_pemberitahuan['id_permintaan']) ?>" class="btn"><span class="fa fa-money"></span>Bayar di LBB</a>
                                      <?php
                                      }else{                                  
                                    ?>

                                    <?php } ?>
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
                <?php 
                    if (isset($_GET['kode'])) {
                        $get_id   = base64_decode($_GET['kode']);
                        $query_dt = mysqli_query($koneksi,"select 
                            permintaan_tentor.id_permintaan,
                            permintaan_tentor.upload_bukti_bayar,
                            permintaan_tentor.id_detail_permintaan_tentor,
                            user_detail.nama_lengkap,
                            user_detail.alamat,
                            keahlian.jenjang,
                            keahlian.mapel,
                            biaya.kelas,
                            biaya.biaya,
                            permintaan_tentor.durasi,
                            permintaan_tentor.status
                            from permintaan_tentor INNER JOIN user_detail 
                                 ON permintaan_tentor.id_user_tentor=user_detail.id_user
                                 INNER JOIN keahlian
                                 ON permintaan_tentor.id_keahlian=keahlian.id_keahlian
                                 INNER JOIN biaya
                                 ON permintaan_tentor.id_biaya=biaya.id
                             where permintaan_tentor.status='upload_proses' ");
                        $row_dt     = mysqli_fetch_array($query_dt);
                    ?>
                        <div class="row box">
                            <header><h3>Detail Permintaan Tentor</h3><hr></header>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Nama Tentor</label>
                                <input type="text" value="<?php echo ucwords($row_dt['nama_lengkap']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Jenjang</label>
                                <input type="text" value="<?php echo strtoupper($row_dt['jenjang']); ?>; Kelas: <?php echo strtoupper($row_dt['kelas']); ?>" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Mata Pelajaran</label>
                                <input type="text" value="<?php echo ucwords($row_dt['mapel']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">Durasi Les</label>
                                <input type="text" value="<?php echo ucwords($row_dt['durasi']); ?> Bulan" class="form-control" readonly>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-12">
                                <label for="">Biaya</label>
                                <?php 
                                    $hasil = $row_dt['biaya']*$row_dt['durasi'];
                                ?><b><i>
                                <input style="color:#1E88E5" type="text" value="Biaya Yang Harus Dibayar: Rp. <?php echo number_format($row_dt['biaya'],'0','.',',') ?> x <?php echo $row_dt['durasi']; ?> Bulan = <?php echo "Rp. ".number_format($hasil,'0','.',','); ?>" class="form-control" readonly>
                                </i></b>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="col-sm-12 col-md-12">
                                <?php 
                                  if ($row_dt['upload_bukti_bayar']=='') {
                                  ?>
                                  <label for=""><h4><b>Bukti Belum Di Upload</b></h4></label>
                                  <?php
                                  }else{                                  
                                ?>
                                <center>
                                  <label for=""><h4><b>Bukti Bayar Yang Di Upload</b></h4></label>
                                  <img src="<?php echo $row_dt['upload_bukti_bayar']; ?>" width="50%" alt="">
                                </center>
                                <?php } ?>
                            </div>
                            <br><br>
                            <br>
                            <hr>
                            <h3>Jadwal</h3>
                            <?php 
                                $no_jadwal    = 1;
                                $idnyadetail  = $row_dt['id_detail_permintaan_tentor'];
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
                            <center><a href="pemberitahuan"><button class="btn"><span class="fa fa-refresh"></span> Kembali</button></a></center>
                        </div>
                    <?php
                    }
                ?>
              </div>
            </div>
        </div>
    </div>
</div>
<?php 
    if (isset($_POST['terima_bukti'])) {
      include_once "_partial/lolibox.php";
      $id_permintaan = $_POST['id_permintaan'];
      $query_terima = mysqli_query($koneksi,"update permintaan_tentor set status='upload_valid' where id_permintaan='$id_permintaan'");
      if ($query_terima==TRUE) {
        echo "<script>
                      Lobibox.notify('default', {
                          continueDelayOnInactiveTab: true,
                          showClass: 'fadeInDown',
                          hideClass: 'fadeUpDown',
                          size: 'mini',
                          position: 'center top',
                          msg: 'Anda Memvalidasi Bukti Bayar'
                      });
              </script><meta http-equiv='refresh' content='2;url=pemberitahuan' />";
      }else{
        echo "<script>
                      Lobibox.notify('default', {
                          continueDelayOnInactiveTab: true,
                          showClass: 'fadeInDown',
                          hideClass: 'fadeUpDown',
                          size: 'mini',
                          position: 'center top',
                          msg: 'Gagal Validasi Silakan Hubungi Bagian Dev'
                      });
              </script><meta http-equiv='refresh' content='2;url=pemberitahuan' />";
      }
    }elseif (isset($_POST['tolak_bukti'])) {
      include_once "_partial/lolibox.php";
      $id_permintaan = $_POST['id_permintaan'];
      $query_terima = mysqli_query($koneksi,"update permintaan_tentor set status='upload_tidak_valid' where id_permintaan='$id_permintaan'");
      if ($query_terima==TRUE) {
        echo "<script>
                      Lobibox.notify('default', {
                          continueDelayOnInactiveTab: true,
                          showClass: 'fadeInDown',
                          hideClass: 'fadeUpDown',
                          size: 'mini',
                          position: 'center top',
                          msg: 'Anda Menolak Bukti Bayar'
                      });
              </script><meta http-equiv='refresh' content='2;url=pemberitahuan' />";
      }else{
        echo "<script>
                      Lobibox.notify('default', {
                          continueDelayOnInactiveTab: true,
                          showClass: 'fadeInDown',
                          hideClass: 'fadeUpDown',
                          size: 'mini',
                          position: 'center top',
                          msg: 'Gagal Menolak Silakan Hubungi Bagian Dev'
                      });
              </script><meta http-equiv='refresh' content='2;url=pemberitahuan' />";
      }
    }
?>