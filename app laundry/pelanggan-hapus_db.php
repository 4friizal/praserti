<?php
	require("koneksi.php");
	
	//sql menghapus data ke database
	$id_member	= $_GET["member"];
	$hapus_data = "DELETE FROM tb_member WHERE id='$id_member'";
	$query  	= mysqli_query($db_koneksi, $hapus_data);
	
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=pelanggan.php'>";
?>