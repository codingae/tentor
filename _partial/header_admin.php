<?php 
    $q     = mysqli_query($koneksi,"select * from view_user where id_user='$id_user_sess' ");
    $r     = mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700&amp;subset=latin,latin-ext">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="assets/libraries/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/bootstrap-fileinput/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/nvd3/nv.d3.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/OwlCarousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/css/realsite-admin.css">
    <link rel="stylesheet" type="text/css" href="assets/libraries/lolibox/css/lobibox.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css">    
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <?php 
        include_once "_partial/lolibox.php";
    ?>
    <title>Admin Aplikasi Tentor</title>
</head>
<div class="admin-landing-image-source"></div>
<div class="admin-landing-image-cover"></div>
<div class="admin-wrapper">
    <?php include_once "sidebar_admin.php" ?>

    <div class="admin-content">
    <?php 
        if (isset($_SESSION['id_user'])) {
            
        }else{
            ?>
                <div class="admin-content-image-text">
                    <h1>Selamat Datang di Halaman Admin Aplikasi Tentor</h1>
                    <h2>Assalamu'alaikum..</h2>
                </div><!-- /.admin-content-image-text -->

                <div class="admin-content-image-call-to-action">
                    <br>
                    <span>Silakan Login Terlebih Dahulu &nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></span>            
                </div><!-- /.admin-content-image-call-to-action -->

            <?php
        }
    ?>
        <div class="admin-content-inner">
            <div class="admin-content-header">
                <div class="admin-content-header-inner">
                    <div class="container-fluid">
                        <div class="admin-content-header-logo">
                            <a href="admin">
                                Aplikasi Tentor
                            </a>
                        </div><!-- /admin-content-header-logo -->

                        <div class="admin-content-header-menu">
                            <ul class="admin-content-header-menu-inner collapse">
                                <li><a href="#">Dokumentasi</a></li>
                                <li><a href="editprofil&kode&<?php echo base64_decode($_SESSION['id_user']); ?>">Profil</a></li>
                                <li><a href="keluar">Logout</a></li>
                            </ul>

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".admin-content-header-menu-inner">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div><!-- /.admin-content-header-menu  -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.admin-content-header-inner -->
            </div><!-- /.admin-content-header -->