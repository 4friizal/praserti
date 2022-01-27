<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$id			= $_POST["id"];
	$nama		= $_POST["nama_pengguna"];
	$username	= $_POST["username"];
	$password	= $_POST["password"];
	$id_outlet	= $_POST["id_outlet"];
	$role		= $_POST["role"];
	
	//sql memasukan data ke database
	$edit_data	= "UPDATE tb_user SET nama='$nama', username='$username', password='$password', id_outlet='$id_outlet', role='$role' WHERE id='$id'";
	$query  	= mysqli_query($db_koneksi, $edit_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=pengguna.php'>";
?>