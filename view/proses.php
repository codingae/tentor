<?php
error_reporting(0);
session_start();
include_once "../jembatan.php";
$uname   = mysqli_real_escape_string($koneksi, $_POST['uname']);
$sql     = "select * from user where uname = '$uname'";
$process = mysqli_query($koneksi, $sql);
$isi     = mysqli_fetch_array($process);
$num     = mysqli_num_rows($process);
if (isset($_POST['uname'])) {
	if($num == 0){
		if (strlen($_POST['uname']) < 4) {
			echo "&#215;<span style='color: red;font-style: italic;'> Minimal 4 Karakter</span>";
		}else{
			echo "&#10004;<span style='color: green;font-style: italic;'> Username ".$uname." masih tersedia</span>";		
		}
	}else{
		if ($isi['id_user'] == base64_decode($_SESSION['id_user']) || $isi['uname'] == $uname) {
			echo "&#10004;<span style='color: green;font-style: italic;'> Username ".$uname." milik anda sendiri</span>";
		}else{
			echo "&#215;<span style='color: red;font-style: italic;'> Username ".$uname." tidak tersedia</span>";
		}
	}
}
if (isset($_POST['pass'])) {
	if (strlen($_POST['pass'])<6) {
		echo "&#215;<span style='color: red;font-style: italic;'> Minimal 6 Karakter</span>";
	}
}
?>