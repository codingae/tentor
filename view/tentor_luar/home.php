tentor luar
<div class="container">
<div class="mb60">
 <div class="block background-white fullwidth mb-60">
    <div class="row notes">
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
                Silakan Lengkapi Informasi Keahlian dan Riwayat Pendidikan Anda Terlebih Dahulu Agar Akun Anda Muncul Dalam
            </div>
            <?php
            }elseif ($hasil=="1") {
                # code...
            }
        ?>
        

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