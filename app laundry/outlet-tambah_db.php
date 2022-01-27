<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$nama	= $_POST["nama"];
	$alamat	= $_POST["alamat"];
	$kontak	= $_POST["kontak"];
	
	//sql memasukan data ke database
	$tambah_data = "INSERT INTO tb_outlet
				   (nama, alamat, tlp)
				   VALUE ('$nama','$alamat','$kontak')";
	$query  	 = mysqli_query($db_koneksi, $tambah_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=outlet.php'>";
?>