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
				<div class="col-lg-12">
					<div class="col-lg-12 latar_konten">
						<center><h4>Entri Transaksi Outlet</h4></center>
						<br>
						<table class="table table-bordered table-striped table-hover">
							<tr>
								<th>No</th>
								<th>Nama Outlet</th>
								<th>Entri Transaksi</th>
							</tr>
							<?php $i = 1 ?>
							<?php
								$sql	= "SELECT * FROM tb_outlet ORDER BY nama ASC";
								$query  = mysqli_query($db_koneksi, $sql);
								// $no=1;
								WHILE ($data = mysqli_fetch_array($query)){
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td>
									<a href="transaksi-outlet.php?outlet=<?php echo $data['id']; ?>" class="btn btn-success">Transaksi</a>
								</td>
							</tr>
							<?php $i++ ?>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>