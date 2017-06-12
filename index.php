<?php
    error_reporting(0);
    session_start();
    $level_sess   = base64_decode($_SESSION['level']);
    $id_user_sess = base64_decode($_SESSION['id_user']);
    $uname_sess   = base64_decode($_SESSION['uname']);
    include_once "jembatan.php";
    $tentor = (!empty($_GET['tentor'])) ? $_GET['tentor'] : "kosong";
    if ($tentor == "daftar" || $tentor == "edituser" || $tentor == "editpp") {
        include_once "_partial/header_custom.php";
    }elseif($tentor == "admin" || $level_sess=="admin"){
        include_once "_partial/header_admin.php";
    }elseif($tentor=="cekadmin"){
        echo "";
    }else{
        include_once "_partial/header.php";
    }
?>
<?php
    if($tentor=="cekadmin"||$level_sess=="admin"){
        if (isset($_SESSION['id_user'])) {
        ?>
            <body class="open hide-secondary-sidebar">
        <?php
        }else{

        }
    }else{
        ?>
            <body class="">
        <?php
    }
?>
<?php
if($tentor == "admin" || $level_sess=="admin"){

}elseif($tentor=="cekadmin"){
    echo "";
}else{
    ?>
        <div class="page-wrapper">
    <?php
}
?>
    <?php
        if ($level_sess=='admin') {

        }elseif($level_sess=='tentor_lbb'){
            include_once "_partial/menu_tentor.php";
        }elseif($level_sess=='tentor_luar'){
            include_once "_partial/menu_tluar.php";
        }elseif($level_sess=='siswa'){
            include_once "_partial/menu_siswa.php";
        }elseif($tentor=='admin'||$tentor=='cekadmin'){
            echo "";
        }else{
            include_once "_partial/menu.php";
        }
    ?>
    <?php
    if($tentor == "admin" || $level_sess=="admin" || $tentor=='cekadmin'){
        echo "";
    }else{
        ?>
            <div class="main">
        <?php
    }
    ?>
    <?php
        if ($level_sess=='admin') {

        }elseif($level_sess=='tentor_lbb'){

        }elseif($level_sess=='tentor_luar'){

        }elseif($level_sess=='siswa'){

        }elseif($tentor=="cekadmin"){
            echo "";
        }else{
            if ($tentor == "kosong") {
                include_once "_partial/maps.php";
            }
        }
    ?>
        <?php
        if ($level_sess=='admin') {
            switch ($tentor) {
            case 'verifikasi': include "view/verifikasi.php"; break;
            case 'validasi': include "view/admin/validasi.php"; break;
            case 'valakun': include "view/admin/validasiakun.php"; break;
            case 'biaya': include "view/admin/biaya.php"; break;
            case 'admin': include "view/admin/home.php"; break;
            case 'pengguna': include "view/admin/pengguna.php"; break;
            case 'editprofil': include "view/admin/editprofil.php"; break;
            case 'tambah': include "view/admin/tambah.php"; break;
            case 'editpengguna': include "view/admin/edit_pengguna.php"; break;
            case 'pemberitahuan': include "view/admin/pemberitahuan.php"; break;
            case 'keluar': include "view/keluar.php"; break;
            case '404': include "view/admin/404.php"; break;
            case 'redirect': include "view/redirect.php"; break;
            default:include'view/admin/home.php';
            }
        }elseif ($level_sess=='tentor_lbb') {
            switch ($tentor) {
            case 'tentor': include "view/tentor_lbb/home.php"; break;
            case 'profil': include "view/siswa/profil.php"; break;
            case 'edituser': include "view/tentor_luar/edituser.php"; break;
            case 'editpp': include "view/tentor_luar/editpp.php"; break;
            case 'riwayat': include "view/tentor_luar/riwayat.php"; break;
            case 'jadwal': include "view/tentor_luar/jadwal.php"; break;
            case 'pemberitahuan': include "view/tentor_luar/pemberitahuan.php"; break;
            case 'keluar': include "view/keluar.php"; break;
            case '404': include "view/404.php"; break;
            case 'redirect': include "view/redirect.php"; break;
            default:include'view/tentor_lbb/home.php';
            }
        }elseif ($level_sess=='tentor_luar') {
            switch ($tentor) {
            case 'tluar': include "view/tentor_luar/home.php"; break;
            case 'riwayat': include "view/tentor_luar/riwayat.php"; break;
            case 'profil': include "view/siswa/profil.php"; break;
            case 'edituser': include "view/tentor_luar/edituser.php"; break;
            case 'editpp': include "view/tentor_luar/editpp.php"; break;
            case 'jadwal': include "view/tentor_luar/jadwal.php"; break;
            case 'pemberitahuan': include "view/tentor_luar/pemberitahuan.php"; break;
            case 'keluar': include "view/keluar.php"; break;
            case '404': include "view/404.php"; break;
            case 'redirect': include "view/redirect.php"; break;
            default:include'view/tentor_luar/home.php';
            }
        }elseif ($level_sess=='siswa') {
            switch ($tentor) {
            case 'keluar': include "view/keluar.php"; break;
            case 'jadwal': include "view/siswa/jadwal.php"; break;
            case 'siswa': include "view/siswa/home.php"; break;
            case 'profil': include "view/siswa/profil.php"; break;
            case 'pesan': include "view/siswa/pesan.php"; break;
            case 'showbiaya': include "view/siswa/showbiaya.php"; break;
            case 'pemberitahuan': include "view/siswa/pemberitahuan.php"; break;
            case 'pilih': include "view/siswa/pilih.php"; break;
            case 'editpp': include "view/tentor_luar/editpp.php"; break;
            case 'edituser': include "view/tentor_luar/edituser.php"; break;
            case 'raport': include "view/siswa/raport.php"; break;
            case 'redirect': include "view/redirect.php"; break;
            case '404': include "view/404.php"; break;
            case 'redirect': include "view/redirect.php"; break;
            default:include'view/siswa/home.php';
            }
        }else{
            switch ($tentor) {
                case 'admin': include "view/admin/home.php"; break;
                case 'keluar': include "view/keluar.php"; break;
                case 'profil': include "view/siswa/profil.php"; break;
                case 'cekadmin': include "view/admin/cek_admin.php"; break;
                case 'daftar': include "view/daftar.php"; break;
                case 'edituser': include "view/tentor_luar/edituser.php"; break;
                case 'login': include "view/login.php"; break;
                case 'sukses': include "view/sukses.php"; break;
                case 'profil': include "view/profil.php"; break;
                case 'verifikasi': include "view/verifikasi.php"; break;
                case 'redirect': include "view/redirect.php"; break;
                case '404': include "view/404.php"; break;
                default:include'view/home.php';
            }
        }
        ?>
    <?php
    if($tentor == "admin" || $level_sess=="admin" || $tentor=="cekadmin"){
        echo "";
    }else{
        ?>
            </div><!-- /.main -->
        <?php
    }
    ?>
<?php
    if ($tentor == "daftar" || $tentor == "edituser") {
        include_once "_partial/footer_custom.php";
    }elseif($tentor=="admin" || $level_sess=="admin"){
        include_once "_partial/footer_admin.php";
    }elseif($tentor=="cekadmin" || $level_sess=="admin"){
        echo "";
    }else{
        include_once "_partial/footer.php";
    }
?>
<?php
    if($tentor=="cekadmin" || $level_sess=="admin"){
        echo "";
    }else{
        ?>
            </html>
        <?php
    }
?>