<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$id		= $_POST["id"];
	$nama	= $_POST["nama"];
	$alamat	= $_POST["alamat"];
	$kontak	= $_POST["kontak"];
	
	//sql memasukan data ke database
	$edit_data	= "UPDATE tb_outlet SET nama='$nama', alamat='$alamat', tlp='$kontak' WHERE id='$id'";
	$query  	= mysqli_query($db_koneksi, $edit_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=outlet.php'>";
?>