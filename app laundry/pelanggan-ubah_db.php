<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$id		= $_POST["id"];
	$nama	= $_POST["nama"];
	$alamat	= $_POST["alamat"];
	$jk		= $_POST["jk"];
	$kontak	= $_POST["kontak"];
	
	//sql memasukan data ke database
	$edit_data	= "UPDATE tb_member SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', tlp='$kontak' WHERE id='$id'";
	$query  	= mysqli_query($db_koneksi, $edit_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=pelanggan.php'>";
?>