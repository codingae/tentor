<div class="sidebar col-sm-4 col-md-3">
    <?php 
        $id_pengguna = base64_decode($_GET['kode']);
        $akun_status = mysqli_query($koneksi,"select status,level from user where id_user='$id_pengguna'");
        $row_status  = mysqli_fetch_array($akun_status);
        if (isset($id_pengguna)) {
            $tentor = (!empty($_GET['tentor'])) ? $_GET['tentor'] : "kosong";
            if ($tentor=="profil" && ($row_status['level']=="tentor_luar" || $row_status['level']=="tentor_lbb")) {
        ?>
            <div class="widget">
                <div class="widget-content">
                    <div class="agent-small">
                        <div class="agent-small-inner">
                            <div class="agent-small-image">
                                <a href="#" class="agent-small-image-inner">
                                    <?php 
                                        if ($row_status['status']=="verified") {
                                        ?>
                                            <img src="assets/img/verified.jpg" alt="">
                                        <?php
                                        }elseif ($row_status['status']=="mail_ok") {
                                        ?>
                                            <img src="assets/img/kurang_verified.jpg" alt="">
                                        <?php
                                        }elseif ($row_status['status']=="mail_tunggu") {
                                        ?>
                                            <img src="assets/img/not.png" alt="">
                                        <?php
                                        }
                                    ?>
                                </a><!-- /.agent-small-image-inner -->
                            </div><!-- /.agent-small-image -->

                            <div class="agent-small-content">
                                <h3 class="agent-small-title">
                                    <?php 
                                        if ($row_status['status']=="verified") {
                                            echo "Akun telah di verifikasi oleh LBB FLC Jombang";
                                        }elseif ($row_status['status']=="mail_ok") {
                                            echo "Akun masih dalam proses verifikasi oleh LBB FLC Jombang";
                                        }elseif ($row_status['status']=="mail_tunggu") {
                                            echo "Akun TIDAK REKOMENDASIKAN";
                                        }
                                    ?>
                                </h3>
                            </div><!-- /.agent-small-content -->
                        </div><!-- /.agent-small-inner -->
                    </div><!-- /.agent-small -->
                </div><!-- /.widget-content -->
            </div>
        <?php        # code...
            }else {
                
            }
        
        }else{

        }
    ?>
    <div class="widget">
        <div class="widget-title">
            <h2>Tentor Terbaik</h2>
        </div><!--/.widget-title -->
        <?php 
            $query_tentor_terbaik = mysqli_query($koneksi,"select * from view_user where level='tentor_lbb' || level = 'tentor_luar' limit 3");
            while ($row_tentor_tebaik = mysqli_fetch_array($query_tentor_terbaik)) {            
        ?>
        <div class="widget-content">
            <div class="agent-small">
                <div class="agent-small-inner">
                    <div class="agent-small-image">
                        <a href="#" class="agent-small-image-inner">
                            <img src="<?= $row_tentor_tebaik['foto'] ?>" alt="">
                        </a><!-- /.agent-small-image-inner -->
                    </div><!-- /.agent-small-image -->

                    <div class="agent-small-content">
                        <h3 class="agent-small-title">
                            <a href="profil&kode&<?= base64_encode($row_tentor_tebaik['id_user']) ?>"><?= $row_tentor_tebaik['nama_lengkap'] ?></a>
                        </h3>

                        <div class="agent-small-email">
                            <i class="fa fa-at"></i> <a href="#"><?= $row_tentor_tebaik['email'] ?></a>
                        </div><!-- /.agent-small-email -->

                        <div class="agent-small-phone">
                            <i class="fa fa-phone"></i> <?= substr($row_tentor_tebaik['no_telp'], 0,8).str_replace(substr($row_tentor_tebaik['no_telp'], 9,16), "*****", substr($row_tentor_tebaik['no_telp'], 9,16)) ?>
                        </div><!-- /.agent-small-phone -->
                    </div><!-- /.agent-small-content -->
                </div><!-- /.agent-small-inner -->
            </div><!-- /.agent-small -->
        </div><!-- /.widget-content -->
        <?php } ?>
    </div><!-- /.widget -->

    <div class="widget">
        <div class="widget-title">
            <h2>Cari Tentor</h2>
        </div><!-- /.widget-title -->

        <div class="widget-content">
            <form method="post" action="pilih">
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Cari Berdasarkan Nama">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <select name="jenjang">
                            <option value="">Pilih Jenjang</option>
                            <option value="sd">SD</option>
                            <option value="smp">SMP</option>
                            <option value="sma">SMA</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <select name="alamat">
                            <option value="">Pilih Wilayah</option>
                            <option value="Bandar Kedungmulyo">Bandar Kedungmulyo</option>
                            <option value="Bareng">Bareng</option>
                            <option value="Diwek">Diwek</option>
                            <option value="Gudo">Gudo</option>
                            <option value="Jogoroto">Jogoroto</option>
                            <option value="Jombang">Jombang</option>
                            <option value="Kabuh">Kabuh</option>
                            <option value="Kesamben">Kesamben</option>
                            <option value="Kudu">Kudu</option>
                            <option value="Megaluh">Megaluh</option>
                            <option value="Mojoagung">Mojoagung</option>
                            <option value="Mojowarno">Mojowarno</option>
                            <option value="Ngoro">Ngoro</option>
                            <option value="Ngusikan">Ngusikan</option>
                            <option value="Perak">Perak</option>
                            <option value="Jombang">Jombang</option>
                            <option value="Peterongan">Peterongan</option>
                            <option value="Plandaan">Plandaan</option>
                            <option value="Ploso">Ploso</option>
                            <option value="Sumobito">Sumobito</option>
                            <option value="Tembelang">Tembelang</option>
                            <option value="Wonosalam">Wonosalam</option>
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <button type="submit" class="btn form-control" style="width: 100%;height: 100%;color: white" name="cari_tentor_sidebar">Cari</button>
                    </div><!-- /.form-group -->
                </div><!-- /.row -->
            </form>
        </div><!-- /.widget-content -->
    </div><!-- /.widget -->
</div><!-- /.sidebar -->
<?php 
if (isset($_POST['cari_tentor_sidebar'])) {
    
}
?>