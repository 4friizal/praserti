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
							<li><a href="paket.php">Paket Cucian</a></li>
							<li class="active"><a href="pengguna.php">Pengguna</a></li>
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
						<center><h4>CRUD Pengguna</h4></center>
						<?php
							$id		= $_GET['pengguna'];
							$sql	= "SELECT * FROM tb_user WHERE id='$id'";
							$query  = mysqli_query($db_koneksi, $sql);
							$data = mysqli_fetch_array($query);
						?>
						<form action="pengguna-ubah_db.php" method="POST" class="container-form">
							<input type="hidden" name="id" value="<?php echo $id; ?>"></input>
							<div class="form-group">
								<label>Nama Pengguna:</label>
								<input class="form-control" type="text" name="nama_pengguna" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama Pengguna"></input>
							</div>
							<div class="form-group">
								<label>Username:</label>
								<input class="form-control" type="text" name="username" value="<?php echo $data['username']; ?>" placeholder="Masukan Username"></input>
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input class="form-control" type="password" name="password" value="<?php echo $data['password']; ?>" placeholder="Masukan Password"></input>
							</div>
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
								<label>Role Pengguna:</label>
								<select name="role" class="form-control">
									<option value="<?php echo $data['role']; ?>"><?php echo $data['role']; ?></option>
									<option value="owner">Owner</option>
									<option value="kasir">Kasir</option>
								</select>
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