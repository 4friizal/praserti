<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$id_outlet		= $_POST["id_outlet"];
	$jenis_paket	= $_POST["jenis_paket"];
	$nama_paket		= $_POST["nama_paket"];
	$harga			= $_POST["harga"];
	
	//sql memasukan data ke database
	$tambah_data = "INSERT INTO tb_paket
				   (id_outlet, jenis, nama_paket, harga)
				   VALUE ('$id_outlet','$jenis_paket','$nama_paket','$harga')";
	$query  	 = mysqli_query($db_koneksi, $tambah_data);
	  
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=paket.php'>";
?>