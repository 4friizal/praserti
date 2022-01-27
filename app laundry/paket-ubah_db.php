<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$id			= $_POST["id"];
	$id_outlet	= $_POST["id_outlet"];
	$jenis		= $_POST["jenis_paket"];
	$nama_paket	= $_POST["nama_paket"];
	$harga		= $_POST["harga"];
	
	//sql memasukan data ke database
	$edit_data	= "UPDATE tb_paket SET id_outlet='$id_outlet', jenis='$jenis', nama_paket='$nama_paket', harga='$harga' WHERE id='$id'";
	$query  	= mysqli_query($db_koneksi, $edit_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=paket.php'>";
?>