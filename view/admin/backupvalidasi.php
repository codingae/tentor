<div class="box">
    <div class="row notes">
        <div class="col-sm-6 col-md-4 col-md-offset-2 col-lg-3 col-lg-offset-0">
            <div class="note">
                <div class="note-inner">
                    <h3 style="color: white">Validasi Akun Tentor</h3>
                    <!-- tahap 1 -->
                    <?php 
                        $tahap1    = mysqli_query($koneksi, "select count(status) as tahap1 from user where status='mail_tunggu' && level!='admin' && level!='siswa'");
                        $rowtahap1 = mysqli_fetch_array($tahap1);
                    ?>
                    <!-- tahap 2 -->
                    <?php 
                        $tahap2    = mysqli_query($koneksi, "select count(status) as tahap2 from user where status='mail_ok' && level!='admin' && level!='siswa'");
                        $rowtahap2 = mysqli_fetch_array($tahap2);
                    ?>
                    <!-- tahap 3 -->
                    <?php 
                        $tahap3    = mysqli_query($koneksi, "select count(status) as tahap3 from user where status='verified' && level!='admin' && level!='siswa'");
                        $rowtahap3 = mysqli_fetch_array($tahap3);
                    ?>
                    <span>Tahap 1 : <?= $rowtahap1['tahap1'] ?> Pengguna</span>
                    <span>Tahap 2 : <?= $rowtahap2['tahap2'] ?> Pengguna</span>
                    <span>Tahap 3 : <?= $rowtahap3['tahap3'] ?> Pengguna</span>
                    <br>
                    <a href="valakun" class="btn" style="background-color: #2196F3">Periksa</a>
                </div><!-- /.note-inner -->
            </div><!-- /.note -->
        </div><!-- /.col-* -->

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="note red-light">
                <div class="note-inner">
                    <h3 style="color: #EF5350">Validasi Riwayat Pendidikan</h3>
                    <?php 
                        $sd_count = mysqli_query($koneksi,"select count(verif_sd) as tahap1 from riwayat where verif_sd='tahap1'");
                        $row_sd   = mysqli_fetch_array($sd_count);
                    ?>
                    <?php 
                        $smp_count = mysqli_query($koneksi,"select count(verif_smp) as tahap1 from riwayat where verif_smp='tahap1'");
                        $row_smp   = mysqli_fetch_array($smp_count);
                    ?>
                    <?php 
                        $sma_count = mysqli_query($koneksi,"select count(verif_sd) as tahap1 from riwayat where verif_sma='tahap1'");
                        $row_sma   = mysqli_fetch_array($sma_count);
                    ?>
                    <?php 
                        $sarjana_count = mysqli_query($koneksi,"select count(verif_sd) as tahap1 from riwayat where verif_sarjana='tahap1'");
                        $row_sarjana   = mysqli_fetch_array($sarjana_count);
                    ?>
                    <span>Riwayat SD: <?= $row_sd['tahap1'] ?></span>
                    <span>Riwayat SMP: <?= $row_smp['tahap1'] ?></span>
                    <span>Riwayat SMA: <?= $row_sma['tahap1'] ?></span>
                    <span>Riwayat Sarjana: <?= $row_sarjana['tahap1'] ?></span>
                </div><!-- /.note-inner -->
            </div><!-- /.note -->
        </div><!-- /.col-* -->

        <div class="col-sm-6 col-md-4 col-md-offset-2 col-lg-3 col-lg-offset-0">
            <div class="note blue">
                <div class="note-inner">
                    <strong>9</strong>
                    <span>Complete real estate solutions.</span>
                </div><!-- /.note-inner -->
            </div><!-- /.note -->
        </div><!-- /.col-* -->

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="note blue-light">
                <div class="note-inner">
                    <strong>2</strong>
                    <span>Years selling on ThemeForest.</span>
                </div><!-- /.note-inner -->
            </div><!-- /.note -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</div>