<?php
	require("koneksi.php");
	
	//memanggil data dari inputan
	$input_username = $_POST['username'];
	$input_password = $_POST['password'];
	$input_level 	= $_POST['level'];
	
	$sql 	= "SELECT * FROM tb_user WHERE username='$input_username' && password='$input_password' && role='$input_level'";
	$query  = mysqli_query($db_koneksi, $sql);
	$data 	= mysqli_fetch_array($query);
	IF(mysqli_num_rows($query)==1){
		$_SESSION['sesi_id'] 	= $data["id"];
		$_SESSION['sesi_user'] = $data["username"];
		$_SESSION['sesi_level'] = $data["role"];
		header('location:index.php');
	}ELSE{
		echo "<script>alert('Gagal! Username dan Password tidak sesuai');</script>";
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	}
	
?>