<?php 
if (isset($_GET["pesan"])) {
	$pesan = $_GET["pesan"];
}
if (isset($_POST["submit"])) {
	$username = htmlentities(strip_tags(trim($_POST["username"])));
	$password = htmlentities(strip_tags(trim($_POST["password"])));
	$pesan_error = "";
	if (empty($username)) {
		$pesan_error .= "Username belum terisi <br>";
	}
	if (empty($password)) {
		$pesan_error .= "password belum terisi <br>";
	}

	include("connection.php");
	$username = mysqli_real_escape_string($mysqli,$username);
	$password = mysqli_real_escape_string($mysqli,$password);

	$query = "SELECT * FROM user_admin WHERE username = '$username' AND password = '$password'";
	$hasil = mysqli_query($mysqli,$query);

	if (mysqli_num_rows($hasil) == 0) {
		$pesan_error .= "Coba Lagi";
	}
	mysqli_free_result($hasil);
	mysqli_close($mysqli);
	if ($pesan_error === "") {
		session_start();
		$_SESSION["nama"] = $username;
		header("Location: tampil.php");
	}
}
else{
	$pesan_error = "";
	$username = "";
	$password = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Toko Sepatu</title>
	<link rel="stylesheet" type="text/css" href="styling.css">
	<link href="/projek/css/bootstrap.min.css" rel="stylesheet">
	<link href="/projek/css/style.css" rel="stylesheet">
</head>
<body style="background-color: rgb(230, 230, 230)">
	<div class="wrap-form-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-4">

				</div>
				<div class="col-md-4">
					<div class="form-contact">
						<div class="login">
						<h1 class="my-4">ADMIN TOKO</h1>
						<?php 
						if (isset($pesan)) {
							echo "<div class=\"error\">$pesan</div>";
						}
						if ($pesan_error !== "") {
							echo "<div class=\"error\">$pesan_error</div>";
						}
						?>
						<form action="index.php" method="POST">
							<!-- <fieldset> -->
							<legend>Login Admin</legend>
							<div class="form-group">
								<p>
									<label for="username">Username : </label>
									<input placeholder="Username" class="form-control" type="text" name="username" id="username" value="<?php echo $username ?>">
								</p>
							</div>
							<div class="form-group">
								<p>
									<label for="password">Password : </label>
									<input placeholder="*******" class="form-control" type="password" name="password" id="password" value="<?php echo $password ?>">
								</p>
							</div>

							<p>
								<input class="btn btn-default" type="submit" name="submit" value="Login">
							</p>
							<!-- </fieldset> -->
							<button class="btn btn-default"><a href="/projek/index.php" style="color: red">Kembali</a></button>
						</form>
					</div>
					</div>
					
				</div>
				<div class="col-md-4">

				</div>
			</div>
		</div>
	</div>
	
	
	<script src="/projek/js/jquery.min.js"></script>
	<script src="/projek/js/bootstrap.min.js"></script>
	<script src="/projek/js/scripts.js"></script>
</body>
</html>