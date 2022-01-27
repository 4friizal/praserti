<!doctype>
<html>
	<?php
		require("koneksi.php");
		$id 	= $_SESSION['sesi_id'];
		$user 	= $_SESSION['sesi_user'];
		$level 	= $_SESSION['sesi_level'];
		if(!isset($level)){
			echo "<script>window.location='login.php'</script>";
		}
	?>
	<head>
		<title>UKK MHS RPL</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/gaya.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 navbar navbar-inverse">
					<div class="navbar-brand active">
					 <p class="text">Aplikasi Pengelolaan Laundry</p>
					</div>
					<?php IF($level == 'kasir'){ ?>
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="pelanggan.php">Pelanggan</a></li>
							<li class="active"><a href="transaksi.php">Transaksi</a></li>
							<li><a href="laporan.php">Laporan</a></li>
						</ul>
					<?php }ELSE IF($level == 'owner'){ ?>
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="laporan.php">Laporan</a></li>
						</ul>
					<?php }ELSE IF($level == 'admin'){ ?>
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="pelanggan.php">Pelanggan</a></li>
							<li><a href="outlet.php">Outlet</a></li>
							<li><a href="paket.php">Paket Cucian</a></li>
							<li><a href="pengguna.php">Pengguna</a></li>
							<li class="active"><a href="transaksi.php">Transaksi</a></li>
							<li><a href="laporan.php">Laporan</a></li>
						</ul>
					<?php } ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php" onclick="return confirm('Yakin Keluar?')"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>						
					</ul>
				</div>
				<div class="col-lg-12 ">
					<div class="col-lg-12 latar_konten">
						<?php
							$id_outlet		= $_GET['outlet'];
							$id_transaksi	= $_GET['id'];
							
							$sql		= "SELECT * FROM tb_outlet WHERE id='$id_outlet'";
							$query  	= mysqli_query($db_koneksi, $sql);
							$data 		= mysqli_fetch_array($query);
							
							$sql1		= "SELECT * FROM tb_transaksi WHERE id_outlet='$id_outlet'";
							$query1  	= mysqli_query($db_koneksi, $sql1);
							$data1		= mysqli_fetch_array($query1);
							
							$id_member 	= $data1['id_member'];
							$sql2		= "SELECT * FROM tb_member WHERE id='$id_member'";
							$query2  	= mysqli_query($db_koneksi, $sql2);
							$data2 		= mysqli_fetch_array($query2);
							
							$id_user 	= $data1['id_user'];
							$sql3		= "SELECT * FROM tb_user WHERE id='$id_user'";
							$query3  	= mysqli_query($db_koneksi, $sql3);
							$data3 		= mysqli_fetch_array($query3);
							
							$sql4		= "SELECT * FROM tb_paket WHERE id_outlet='$id_outlet'";
							$query4  	= mysqli_query($db_koneksi, $sql4);
							$data4 		= mysqli_fetch_array($query4);
							
							$sql5			= "SELECT * FROM tb_detail_transaksi WHERE id_transaksi='$id_transaksi'";
							$query5  		= mysqli_query($db_koneksi, $sql5);
							$data5			= mysqli_fetch_array($query5);
						?>
						<center><h4>Rincian Transaksi</h4></center>
						<br>
						<div class="col-lg-6">
							<table class="table table-bordered table-hover">
								<tr>
									<th colspan="2">Member</th>
								</tr>
								<tr>
									<td>Nama</td>
									<td><?php echo $data2['nama']; ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><?php echo $data2['alamat']; ?></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td><?php echo $data2['jenis_kelamin']; ?></td>
								</tr>
								<tr>
									<td>NO HP / Tlp</td>
									<td><?php echo $data2['tlp']; ?></td>
								</tr>
							</table>
						</div>
						<div class="col-lg-6">
							<table class="table table-bordered table-hover">
								<tr>
									<th colspan="2">Pengguna Input</th>
								</tr>
								<tr>
									<td>Nama</td>
									<td><?php echo $data3['nama']; ?></td>
								</tr>
								<tr>
									<td>Username</td>
									<td><?php echo $data3['username']; ?></td>
								</tr>
								<tr>
									<td>Outlet</td>
									<td><?php echo $data['nama']; ?></td>
								</tr>
								<tr>
									<td>Role</td>
									<td><?php echo $data3['role']; ?></td>
								</tr>
							</table>
						</div>
						<div class="col-lg-12">
							<table class="table table-bordered table-hover">
								<tr>
									<th colspan="2">Transaksi</th>
								</tr>
								<tr>
									<td>Kode Invoice</td>
									<td><?php echo $data1['kode_invoice']; ?></td>
								</tr>
								<tr>
									<td>Tanggal Masuk</td>
									<td><?php echo $data1['tgl']; ?></td>
								</tr>
								<tr>
									<td>Batas Waktu</td>
									<td><?php echo $data1['batas_waktu']; ?></td>
								</tr>
								<tr>
									<td>Tanggal Bayar</td>
									<td><?php echo $data1['tgl_bayar']; ?></td>
								</tr>
								<tr>
									<td>Biaya Tambahan</td>
									<td><?php echo $data1['tgl_bayar']; ?></td>
								</tr>
								<tr>
									<td>Diskon</td>
									<td><?php echo $data1['diskon']; ?></td>
								</tr>
								<tr>
									<td>Pajak</td>
									<td><?php echo $data1['pajak']; ?></td>
								</tr>
								<tr>
									<td>Status</td>
									<td><?php echo $data1['status']; ?></td>
								</tr>
								<tr>
									<td>Dibayar</td>
									<td><?php echo $data1['dibayar']; ?></td>
								</tr>
								<tr>
									<td>Pilihan Paket</td>
									<td><?php echo $data4['nama_paket'].", ".$data4['jenis']; ?></td>
								</tr>
								<tr>
									<td>Qty</td>
									<td><?php echo $data5['qty']; ?></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td><?php echo $data5['keterangan']; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>window.print();</script>
	</body>
</html>