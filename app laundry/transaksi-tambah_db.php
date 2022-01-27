<?php
	require("koneksi.php");
	
	//memanggil data inputan
	$id_outlet		= $_POST["id_outlet"];
	$kode_invoice	= $_POST["kode_invoice"];
	$id_member		= $_POST["id_member"];
	$tanggal_masuk	= $_POST["tanggal_masuk"];
	$batas_waktu	= $_POST["batas_waktu"];
	$tanggal_bayar	= $_POST["tanggal_bayar"];
	$biaya_tambahan	= $_POST["biaya_tambahan"];
	$diskon			= $_POST["diskon"];
	$pajak			= $_POST["pajak"];
	$status			= $_POST["status"];
	$dibayar		= $_POST["dibayar"];
	$id_user		= $_POST["id_user"];
	
	$id_paket		= $_POST["id_paket"];
	$qty			= $_POST["qty"];
	$keterangan		= $_POST["keterangan"];
	
	//sql memasukan data ke database transaksi
	echo $tambah_data = "INSERT INTO tb_transaksi
				   (id_outlet, kode_invoice, id_member, tgl, batas_waktu, tgl_bayar, biaya_tambahan, diskon, pajak, status, dibayar, id_user)
				   VALUE ('$id_outlet','$kode_invoice','$id_member','$tanggal_masuk','$batas_waktu','$tanggal_bayar','$biaya_tambahan','$diskon','$pajak','$status','$dibayar','$id_user')";
	$query  	 = mysqli_query($db_koneksi, $tambah_data);
	 
	
	$sql		= "SELECT * FROM tb_transaksi ORDER BY id DESC LIMIT 1";
	$query  	= mysqli_query($db_koneksi, $sql);
	$data = mysqli_fetch_array($query);
	$id_transaksi	= $data["id"];
	$id_paket		= $_POST["id_paket"];
	$qty			= $_POST["qty"];
	$keterangan		= $_POST["keterangan"];
	
	//sql memasukan data ke database detail transaksi
	$tambah_data = "INSERT INTO tb_detail_transaksi
				   (id_transaksi, id_paket, qty, keterangan)
				   VALUE ('$id_transaksi','$id_paket','$qty','$keterangan')";
	$query  	 = mysqli_query($db_koneksi, $tambah_data);
	
	//mengarahkan secara otomatis
	echo "<meta http-equiv='refresh' content='0;url=transaksi-outlet.php?outlet=$id_outlet'>";
?>