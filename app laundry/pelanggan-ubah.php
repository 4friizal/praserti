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
		<title>Laundry</title>
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
							<li class="active"><a href="pelanggan.php">Pelanggan</a></li>
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
							<li class="active"><a href="pelanggan.php">Pelanggan</a></li>
							<li><a href="outlet.php">Outlet</a></li>
							<li><a href="paket.php">Paket Cucian</a></li>
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
						<center><h4>Registrasi Pelanggan / Member</h4></center>
						<?php
							$id_member = $_GET['member'];
							$sql	= "SELECT * FROM tb_member WHERE id='$id_member'";
							$query  = mysqli_query($db_koneksi, $sql);
							$data = mysqli_fetch_array($query);
						?>
						<form action="pelanggan-ubah_db.php" method="POST" class="container-form">
							<input type="hidden" name="id" value="<?php echo $data['id']; ?>"></input>
							<div class="form-group">
								<label>Nama:</label>
								<input class="form-control" type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama Lenkap"></input>
							</div>
							<div class="form-group">
								<label>Alamat:</label>
								<textarea class="form-control" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Masukan Alamat Lenkap"><?php echo $data['alamat']; ?></textarea>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin:</label>
								<select name="jk" class="form-control">
									<option value="<?php echo $data['jenis_kelamin']; ?>"><?php echo $data['jenis_kelamin']; ?></option>
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label>No Hp / Tlp:</label>
								<input class="form-control" type="number" name="kontak" value="<?php echo $data['tlp']; ?>" placeholder="Masukan Nomor Hp / Tlp"></input>
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