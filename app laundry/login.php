<!doctype>
<html>
	<head>
		<title>Laundry</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/gaya.css" rel="stylesheet">
	</head>
	<body class="latar_login">
		<div class="container">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 masuk">
					<form action="proses_login.php" method="POST" class="container-form center">
						<h1 class="font">Silakan Masuk</h1>
						<br>
						<div class="form-group">
							<label>Username</label>
							<input class="form-control oval" type="text" name="username" placeholder="Masukan Username Anda"></input>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control oval" type="password" name="password" placeholder="Masukan Password Anda"></input>
						</div>
						<div class="form-group">
							<label>Sebagai</label>
							<select name="level" class="form-control">
								<option value="admin">Admin</option>
								<option value="kasir">Kasir</option>
								<option value="owner">Owner</option>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-lg btn-block" type="submit">Masuk</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>