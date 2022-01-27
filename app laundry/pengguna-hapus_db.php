<?php
	require("koneksi.php");
	
	//sql menghapus data ke database
	$id			= $_GET["pengguna"];
	$hapus_data = "DELETE FROM tb_user WHERE id='$id'";
	$query  	= mysqli_query($db_koneksi, $hapus_data);
	
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=pengguna.php'>";
?>