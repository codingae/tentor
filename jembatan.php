<?php
// error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$host     = "localhost";
$user     = "root";
$pass     = "asd";
$database = "db_tentor";
$koneksi  = new mysqli($host,$user,$pass,$database);

if (mysqli_connect_errno()) {
  trigger_error('Astaghfirullah koneksi gagal: '  . mysqli_connect_error(), E_USER_ERROR);
}

?>