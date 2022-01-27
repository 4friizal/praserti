<?php
	require("koneksi.php");
	
	//sql menghapus data ke database
	$id			= $_GET["paket"];
	$hapus_data = "DELETE FROM tb_paket WHERE id='$id'";
	$query  	= mysqli_query($db_koneksi, $hapus_data);
	
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=paket.php'>";
?>