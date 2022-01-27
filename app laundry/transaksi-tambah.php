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
						<center><h4>Entri Transaksi</h4></center>
						<?php $id_outlet= $_GET['outlet']; ?>
						<form action="transaksi-tambah_db.php" method="POST" class="container-form">
							<input type="hidden" name="id_user" value="<?php echo $id; ?>"></input>
							<div class="form-group">
								<label>Nama Outlet:</label>
								<select name="id_outlet" class="form-control" readonly>
									<?php
										$sql	= "SELECT * FROM tb_outlet WHERE id='$id_outlet'";
										$query  = mysqli_query($db_koneksi, $sql);
										$data = mysqli_fetch_array($query);
									?>
									<option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
								</select>
							</div>
							<div class="form-group">
								<label>Kode Invoice:</label>
								<input class="form-control" type="text" name="kode_invoice" placeholder="Masukan Kode Invoice"></input>
							</div>
							<div class="form-group">
								<label>Nama Member:</label>
								<select name="id_member" class="form-control">
									<?php
										$sql2	= "SELECT * FROM tb_member ORDER BY nama ASC";
										$query2  = mysqli_query($db_koneksi, $sql2);
										WHILE ($data2 = mysqli_fetch_array($query2)){
									?>
									<option value="<?php echo $data2['id']; ?>"><?php echo $data2['nama']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal Masuk:</label>
								<input class="form-control" type="date" name="tanggal_masuk"></input>
							</div>
							<div class="form-group">
								<label>Batas Waktu:</label>
								<input class="form-control" type="date" name="batas_waktu"></input>
							</div>
							<div class="form-group">
								<label>Tanggal Bayar:</label>
								<input class="form-control" type="date" name="tanggal_bayar"></input>
							</div>
							<div class="form-group">
								<label>Biaya Tambahan:</label>
								<input class="form-control" type="number" name="biaya_tambahan" placeholder="Masukan Biaya Tambahan"></input>
							</div>
							<div class="form-group">
								<label>Diskon:</label>
								<input class="form-control" type="number" name="diskon" placeholder="Masukan Diskon"></input>
							</div>
							<div class="form-group">
								<label>Pajak:</label>
								<input class="form-control" type="number" name="pajak" placeholder="Masukan Pajak"></input>
							</div>
							<div class="form-group">
								<label>Status:</label>
								<select name="status" class="form-control">
									<option value="baru">Baru</option>
									<option value="proses">Proses</option>
									<option value="selesai">Selesai</option>
									<option value="diambil">Diambil</option>
								</select>
							</div>
							<div class="form-group">
								<label>Di Bayar:</label>
								<select name="dibayar" class="form-control">
									<option value="dibayar">Dibayar</option>
									<option value="belum_dibayar">Belum Dibayar</option>
								</select>
							</div>
							<div class="form-group">
								<label>Pilihan Paket:</label>
								<select name="id_paket" class="form-control">
									<?php
										$sql3	= "SELECT * FROM tb_paket ORDER BY nama_paket ASC";
										$query3  = mysqli_query($db_koneksi, $sql3);
										WHILE ($data3 = mysqli_fetch_array($query3)){
									?>
									<option value="<?php echo $data3['id']; ?>"><?php echo $data3['nama_paket']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Qty:</label>
								<input class="form-control" type="number" name="qty" placeholder="Masukan Jumlah / Qty"></input>
							</div>
							<div class="form-group">
								<label>Keterangan:</label>
								<textarea class="form-control" type="number" name="keterangan" placeholder="Masukan Keterangan"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-info btn-lg btn-block" type="submit">Tambah Transaksi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>