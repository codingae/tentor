<br>
<div class="container">
<div class="mb60">
<?php 
    $id_user = base64_decode($_SESSION['id_user']);
    $query_ceknotif1 = mysqli_query($koneksi,"select id_user from keahlian where id_user='$id_user'");
    $row_ceknotif1   = mysqli_fetch_array($query_ceknotif1);
    if (mysqli_num_rows($query_ceknotif1)>0) {
        $cek1 = 0;
    }else{
        $cek1 = 1;
    }
    $query_ceknotif2 = mysqli_query($koneksi,"select id_user_tentor from riwayat where id_user_tentor='$id_user'");
    $row_ceknotif2   = mysqli_fetch_array($query_ceknotif2);
    if (mysqli_num_rows($query_ceknotif2)>0) {
        $cek2 = 0;
    }else{
        $cek2 = 1;
    }
    $hasil = $cek1+$cek2;
    if ($hasil=="2") {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <h4>
        <b>Silakan Lengkapi Informasi <a href="profil&kode&<?= $_SESSION['id_user'] ?>" class="btn btn-secondary">Keahlian</a> dan <a href="profil&kode&<?= $_SESSION['id_user'] ?>" class="btn btn-secondary">Riwayat Pendidikan</a> Anda Terlebih Dahulu Agar Akun Anda Muncul Dalam Sistem</b>
        </h4>
    </div>
    <?php
    }elseif ($hasil=="1" && $cek1=="1") {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <h4>
        <b>Silakan Lengkapi Informasi <a href="profil&kode&<?= $_SESSION['id_user'] ?>" class="btn btn-secondary">Keahlian</a> Anda Terlebih Dahulu Agar Akun Anda Muncul Dalam Sistem</b>
        </h4>
    </div>
    <?php
    }elseif (base64_decode($_SESSION['level'])=="tentor_lbb" && $cek2=="1") {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <h4>
        <b>Silakan Lengkapi Informasi <a href="profil&kode&<?= $_SESSION['id_user'] ?>" class="btn btn-secondary">Riwayat Pendidikan</a> Untuk Diverifikasi Admin</b>
        </h4>
    </div>
    <?php
    }
?>
 <div class="block background-white fullwidth mb-60">
    <div class="row notes">
        
        <div class="col-sm-6 col-md-4 col-md-offset-2 col-lg-3 col-lg-offset-0">
            <div class="note">
                <div class="note-inner">
                    <strong>9000+</strong>
                    <span>Sales done in real estate industry.</span>
                </div><!-- /.note-inner -->
            </div><!-- /.note -->
        </div><!-- /.col-* -->

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="note red-light">
                <div class="note-inner">
                    <strong>12000+</strong>
                    <span>Posts on our support forums.</span>
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
</div>
</div>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>