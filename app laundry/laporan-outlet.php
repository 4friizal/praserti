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
							<li><a href="transaksi.php">Transaksi</a></li>
							<li class="active"><a href="laporan.php">Laporan</a></li>
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
							<li><a href="transaksi.php">Transaksi</a></li>
							<li class="active"><a href="laporan.php">Laporan</a></li>
						</ul>
					<?php } ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php" onclick="return confirm('Yakin Keluar?')"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>						
					</ul>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-12 latar_konten">
						<h2 class="center">Laporan</h2>
						<table class="table table-bordered table-striped table-hover">
							<br>
							<tr>
								<th>No</th>
								<th>Kode Invoice</th>
								<th>Nama Member</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Dibayar</th>
							</tr>
							<?php $i = 1 ?>
							<?php
								$id_outlet	= $_GET['outlet'];
								$sql		= "SELECT * FROM tb_transaksi WHERE id_outlet='$id_outlet' ORDER BY tgl ASC";
								$query  	= mysqli_query($db_koneksi, $sql);
								$no=1;
								WHILE ($data = mysqli_fetch_array($query)){
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $data['kode_invoice']; ?></td>
								<td>
									<?php
										$id_member 	= $data['id_member'];
										$sql2		= "SELECT * FROM tb_member WHERE id='$id_member'";
										$query2  	= mysqli_query($db_koneksi, $sql2);
										$data2	 	= mysqli_fetch_array($query2);
										echo $data2['nama'];
									?>
								</td>
								<td><?php echo $data['tgl']; ?></td>
								<td><?php echo $data['status']; ?></td>
								<td><?php echo $data['dibayar']; ?></td>
							</tr>
							<?php $i++ ?>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script>window.print();</script>
	</body>
</html>