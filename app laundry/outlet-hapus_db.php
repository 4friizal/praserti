<?php
	require("koneksi.php");
	
	//sql menghapus data ke database
	$id			= $_GET["id"];
	$hapus_data = "DELETE FROM tb_outlet WHERE id='$id'";
	$query  	= mysqli_query($db_koneksi, $hapus_data);
	
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=outlet.php'>";
?>