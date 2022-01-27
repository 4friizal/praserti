<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$nama_pengguna	= $_POST["nama_pengguna"];
	$username		= $_POST["username"];
	$password		= $_POST["password"];
	$id_outlet		= $_POST["id_outlet"];
	$role			= $_POST["role"];
	
	//sql memasukan data ke database
	$tambah_data = "INSERT INTO tb_user
				   (nama, username, password, id_outlet, role)
				   VALUE ('$nama_pengguna','$username','$password','$id_outlet','$role')";
	$query  	 = mysqli_query($db_koneksi, $tambah_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=pengguna.php'>";
?>