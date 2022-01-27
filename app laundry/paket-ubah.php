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
							<li class="active"><a href="paket.php">Paket Cucian</a></li>
							<li><a href="pengguna.php">Pengguna</a></li>
							<li><a href="transaksi.php">Transaksi</a></li>
							<li><a href="laporan.php">Laporan</a></li>
						</ul>
					<?php } ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php" onclick="return confirm('Yakin Keluar?')"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>						
					</ul>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-12 latar_konten">
						<center><h4>CRUD Produk/Paket Cucian</h4></center>
						<?php
							$id		= $_GET['paket'];
							$sql	= "SELECT * FROM tb_paket WHERE id='$id'";
							$query  = mysqli_query($db_koneksi, $sql);
							$data = mysqli_fetch_array($query);
						?>
						<form action="paket-ubah_db.php" method="POST" class="container-form">
							<input type="hidden" name="id" value="<?php echo $id; ?>"></input>
							<div class="form-group">
								<label>Nama Outlet:</label>
								<select name="id_outlet" class="form-control">
									<?php
										$sql2	= "SELECT * FROM tb_outlet ORDER BY nama ASC";
										$query2  = mysqli_query($db_koneksi, $sql2);
										WHILE ($data2 = mysqli_fetch_array($query2)){
									?>
									<option value="<?php echo $data2['id']; ?>"><?php echo $data2['nama']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Paket:</label>
								<select name="jenis_paket" class="form-control">
									<option value="<?php echo $data['jenis']; ?>"><?php echo $data['jenis']; ?></option>
									<option value="kiloan">Kiloan</option>
									<option value="selimut">Selimut</option>
									<option value="bed_cover">Bed Cover</option>
									<option value="kaos">Kaos</option>
									<option value="lain">Lain</option>
								</select>
							</div>
							<div class="form-group">
								<label>Nama Paket:</label>
								<input class="form-control" type="text" name="nama_paket" value="<?php echo $data['nama_paket']; ?>" placeholder="Masukan Nama Paket"></input>
							</div>
							<div class="form-group">
								<label>Harga:</label>
								<input class="form-control" type="number" name="harga" value="<?php echo $data['harga']; ?>" placeholder="Masukan Harga Paket"></input>
							</div>
							<div class="form-group">
								<button class="btn btn-warning btn-lg btn-block" type="submit">Ubah Data</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>