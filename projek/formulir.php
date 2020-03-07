<?php 
include "admin/connection.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cenger's Sneaker</title>
	<link href="bootstrap.min.css" rel="stylesheet">
	<link href="tokoOnline.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/gaya.css">
	<link href="css/style.css" rel="stylesheet">
	<link href="gayaformulir.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgb(255, 26, 26)">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img src="css/background/logo.png" style="width: 70px; height: 40px"> Cenger's Sneaker</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin/index.php">Admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cart.php">Keranjang Belanja <img src="cart.png" style="width: 25px"></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox" style="border-radius: 20px">
				<div class="carousel-item active">
					<img class="d-block img-fluid" src="gambar/1.jpg" alt="First slide" style="width: 100%">
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid" src="gambar/2.jpg" alt="Second slide" style="width: 100%">
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid" src="gambar/3.jpg" alt="Third slide" style="width: 100%">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div> -->

		<div class="row">
			<div class="col-lg-2">
				<h1 class="my-4">Category</h1>
				<div class="list-group">
					<div id="card-183811">
						<div class="card">
							<div class="card-header">
								<a class="card-link collapsed" data-toggle="collapse" data-parent="#card-183811" href="#card-element-743534">+ Menurut Brand</a>
							</div>
							<div id="card-element-743534" class="collapse">
								<div class="card-body">
									<a href="kategorivans.php">- VANS</a><br>
									<a href="kategorinike.php">- NIKE</a><br>
									<a href="kategoriadidas.php">- ADIDAS</a><br>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a class="card-link collapsed" data-toggle="collapse" data-parent="#card-183811" href="#card-element-916312">+ Menurut Jenis</a>
							</div>
							<div id="card-element-916312" class="collapse">
								<div class="card-body">
									<a href="sport.php">- SPORT</a><br>
									<a href="casual.php">- CASUAL</a><br>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
			<div class="col-lg-10">
				<h1 class="my-4" style="text-align: center;">Formulir</h1>
				<div class="row">
					<div class="col-75">
						<div class="container">
							<form action="endformulir.php" method="GET">

								<div class="row">
									<div class="col-50">
										<h3>Isi Data Dengan Benar</h3>
										<label for="fname"><i class="fa fa-user"></i> Nama Lengkap </label>
										<input type="text" id="fname" name="firstname" placeholder="Isi Nama Lengkap" required>
										<label for="email"><i class="fa fa-envelope"></i> Email</label>
										<input type="text" id="email" name="email" placeholder="Isi Email" required>
										<label for="adr"><i class="fa fa-address-card-o"></i> Alamat</label>
										<input type="text" id="adr" name="address" placeholder="Isi Alamat" required>
										<label for="city"><i class="fa fa-institution"></i> Kota</label>
										<input type="text" id="city" name="city" placeholder="Isi Kota" required>

										<div class="row">
											<div class="col-50">
												<label for="state">Provinsi</label>
												<input type="text" id="state" name="state" placeholder="Isi Negara" required>
											</div>
											<div class="col-50">
												<label for="pos">Kode Pos</label>
												<input type="text" id="pos" name="pos" placeholder="Isi Kode Pos" required>
											</div>
										</div>
									</div>

									<div class="col-50">
										<h3>Pembayaran</h3>
										<label for="fname">Transfer Ke</label>
										<div class="icon-container">
											<select name="kartu" >
												<option value="<img src='bni.png' style='width: 55px'>">BNI</option>
												<option value="<img src='bca.png' style='width: 55px'>">BCA</option>
												<option value="<img src='mandiri.png' style='width: 55px'>">Mandiri</option>
												<option value="<img src='bri.png' style='width: 55px'>">BRI</option>
											</select>
										</div>
										<label for="cname">Atas Nama</label>
										<input type="text" id="cname" name="cardname" placeholder="Ardiansyah" required>
										<label for="ccnum">Kartu Kredit</label>
										<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
										<label for="expmonth">Exp Month</label>
										<input type="text" id="expmonth" name="expmonth" placeholder="Juli" required>
										<div class="row">
											<div class="col-50">
												<label for="expyear">Exp Year</label>
												<input type="text" id="expyear" name="expyear" placeholder="2018" required>
											</div>
											<div class="col-50">
												<label for="cvv">CVV</label>
												<input type="text" id="cvv" name="cvv" placeholder="352" required>
											</div>
										</div>
									</div>

								</div>
								<input type="submit" value="Continue to checkout" class="btn" name="out">
							</form>
						</div>
					</div>
					<div class="col-25">
						<div class="container">
							<h2>Keranjang</h2>
							<table  class="table table-striped">
								<tr>
									<td>Nama Barang</td>
									<td>Jumlah</td>
									<td>Total</td>
								</tr>
								<?php 
								$stok = mysqli_query($mysqli,"SELECT * FROM cart");
								while ($show = mysqli_fetch_array($stok)) {

									?>
									<tr>
										<td><?php echo $show['nama_sepatu'];?></td>
										<td><?php echo $show['jumlah_cart'];?></td>
										<td><?php echo $show['total'];?></td>
									</tr>
									<?php } ?>
								</table>
								<hr>
								<?php 
								$stok = mysqli_query($mysqli,"SELECT SUM(total) as total FROM cart");
								$show = mysqli_fetch_array($stok);
								?>
								<p>Total <span class="price" style="color:black"><b>Rp <?php echo $show['total']; ?></b></span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script src="jquery.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>
	</body>
	</html>