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
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgb(255, 26, 26)">
		<div class="container">
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
		<!-- slide -->
		<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
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
		</div>

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

			<div class="col-lg-7">
				<div class="row">
					<?php 
					$stok = mysqli_query($mysqli,"SELECT * FROM stok WHERE jenis='Casual'");
					while ($show = mysqli_fetch_array($stok)) {
						?>
						<div class="col-lg-4 col-md-6 mb-4">
							<div class="card h-100">
								<td><img src="admin/<?php echo $show['gambar'];?>" style="padding: 10px; padding-left: 20px" width="250px" height="200px"></td>
								<div class="card-body">
									<h4 class="card-title">
										<td><?php echo $show['nama_sepatu'];?></td>
									</h4>
									<h5>Rp <td><?php echo $show['harga'];?></td></h5>
									<small>&#9733; &#9733; &#9733; &#9733; &#9733;</small>
								</div>
								<div class="card-footer">

									<a id="modal-25348" href="#modal-container-25348<?php echo $show['id_sepatu'];?>" role="button" class="btn" data-toggle="modal">
										<button class="btn btn-warning" >
											<span class="glyphicon glyphicon-shopping-cart"></span>
											Detail Produk
										</button>
									</a>
									<div class="modal fade" id="modal-container-25348<?php echo $show['id_sepatu'];?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 75%">

										<div class="modal-dialog" role="document">
											<div class="modal-content" style="width: 800px">
												<div class="modal-header">
													<h5 class="modal-title" id="myModalLabel">
														Detail Produk
													</h5> 
													<button type="button" class="close" data-dismiss="modal">
														<span aria-hidden="true">×</span>
													</button>
												</div>

												<div class="container">
													<div class="row">
														<div class="col-lg-6">
															<div class="modal-body">
																<td><img src="admin/<?php echo $show['gambar'];?>" style="padding: 10px; padding-left: 20px" width="300px" height="auto"></td>
															</div>
														</div>
														<div class="col-lg-6">
															<h3><td><b>Nama Barang : <?php echo $show['nama_sepatu'];?></b></td><br></h3>
															<div class="modal-body">
																<h5><td><b>Deskripsi : </b><?php echo $show['deskripsi'];?></td></h5>
																<h5><td><b>Harga : Rp </b><?php echo $show['harga'];?></td></h5>
																<h5><td><b>Brand : </b><?php echo $show['brand'];?></td></h5><br>
																
															</div>
															
														</div>
													</div>
												</div>

												<div class="modal-footer">
													<a href="prosescart.php?id_sepatu=<?php echo $show['id_sepatu'];?>"><button type="button" class="btn btn-primary">
														Tambah Ke Keranjang <img src="cart.png" style="width: 25px">
													</button> 

												</a>

												<button type="button" class="btn btn-secondary" data-dismiss="modal">
													Tutup
												</button>
											</div>
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

			</div>
			<div class="col-lg-3">
				<h1 class="my-4">Keranjangku <img src="cart.png" style="width: 35px"></h1>
				<table  class="table table-striped">
					<tr>
						<td>Nama Barang</td>
						<td>Brand</td>
						<td>Harga</td>
					</tr>
					<?php 
					$stok = mysqli_query($mysqli,"SELECT * FROM cart");
					while ($show = mysqli_fetch_array($stok)) {

						?>
						<tr>
							<td><?php echo $show['nama_sepatu'];?></td>
							<td><?php echo $show['brand'];?></td>
							<td><?php echo $show['harga'];?></td>
						</tr>
						<?php } ?>
					</table>
					<a href="cart.php"><button type="button" class="btn btn-primary">Lihat Keranjang</button></a>
					<hr>
					<h4>METODE PEMBAYARAN</h4>
					<img src="1.png" style="width: 350px">
					<img src="2.png" style="width: 350px"><hr>
					<h4>JASA PENGIRIMAN</h4>
					<img src="3.png" style="width: 350px">
					<img src="4.png" style="width: 350px">
					<img src="5.png" style="width: 260px"><hr>
					<h4>BANK TRANSFER</h4>
					<img src="6.png" style="width: 350px">
				</div>
			</div>
		</div>





		<footer class="py-3" style="background-color: rgb(255, 26, 26)">
			<div class="container-fluid">
				<img src="css/background/logo.png" style="width: 70px; height: 40px"><span class="m-0 text-white" style="font-size: 20px"> Cenger's Sneaker</span>
				<span style="font-size: 12px; color: white;margin-left: 8px" >Situs Jual Beli Sepatu Online Mudah dan terpercaya</span>
				<span style="font-size: 20px; color: white;margin-left: 630px" >Temukan Kami Di : </span>
				<a href="https://www.facebook.com/ardi.keren.9404362"><img style="width: 30px" src="fb.png"></a>
				<a href="https://www.instagram.com/ardi_cenger/?hl=id"><img style="width: 30px" src="instagram.png"></a>
				<a href="https://www.youtube.com/channel/UCSEEeCetQv3URI7LNfrO7Fg/featured?view_as=subscriber"><img style="width: 30px" src="youtube.png"></a>
			</div>
		</footer>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script src="jquery.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>
	</body>
	</html>