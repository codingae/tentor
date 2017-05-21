<?php 
	if(isset($_POST['var_uname']) AND isset($_POST['var_pass'])){
		$username = addslashes($_POST['var_uname']);
		$password = addslashes(md5($_POST['var_pass']));		
		$check    = mysqli_query($koneksi,"select * from user where uname='$username' && pass='$password' && level='admin'");
		$rw       = mysqli_fetch_array($check);
		if(mysqli_num_rows($check)==0){
			echo "kosong";
		}
		else{
			echo "ok";
			$last_login = date("Y-m-d H:i:s");
            $update = mysqli_query($koneksi,"update user set last_login='$last_login' where uname='$username' && pass='$password' && level='admin'");
			$_SESSION['uname']   = base64_encode($rw['uname']);
			$_SESSION['level']   = base64_encode($rw['level']);
			$_SESSION['id_user'] = base64_encode($rw['id_user']);
		}
	}
?>