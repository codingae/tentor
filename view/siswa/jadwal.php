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
<div class="container">
    <div class="row">
        <!-- sidebar -->
        <?php include_once "_partial/sidebar.php"; ?>
        <!-- end sidebar -->
        <!-- konten -->
        <div class="content col-sm-8 col-md-9">
            <h1 class="page-header">Jadwal Les Anda</h1>
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
                            user_detail.nama_lengkap,
                            permintaan_tentor.mulai_les,
                            permintaan_tentor.selesai_les,
                            permintaan_tentor.status,
                            permintaan_tentor.id_permintaan,
                            permintaan_tentor.id_detail_permintaan_tentor
                            from permintaan_tentor INNER JOIN keahlian 
                                 ON permintaan_tentor.id_keahlian=keahlian.id_keahlian
                                 INNER JOIN user_detail 
                                 ON permintaan_tentor.id_user_tentor=user_detail.id_user
                             where permintaan_tentor.id_user_pencari='$id_user_pencari' 
                                   &&  permintaan_tentor.status='upload_valid' ");
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
                            <?php 
                                if ($row_pemberitahuan['status']=="upload_valid") {
                                    ?>
                                    <button class="btn btn-secondary" onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='block'"><span class="fa fa-tasks"></span>Detail</button>
                                    <div class="w3-modal" id="modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>">
                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                        <center><h2 class="w3-center"><br>Detail Jadwal</h2></center>
                                        <span onclick="document.getElementById('modalaksi<?php echo $row_pemberitahuan['id_permintaan']; ?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Keluar">&times;</span>
                                        <!-- <div class="w3-container w3-border-top w3-padding-16 w3-light-grey"> -->
                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                            <?php 
                                                $no_jadwal    = 1;
                                                $idnyadetail  = $row_pemberitahuan['id_detail_permintaan_tentor'];
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
<script src="assets/libraries/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="assets/libraries/fileinput/js/fileinput.js" type="text/javascript"></script>