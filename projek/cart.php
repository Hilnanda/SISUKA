<?php 
session_start();
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
	<script type="text/javascript" src="js/jquery.js"></script>
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
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin/index.php">Admin</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="">Keranjang Belanja <img src="cart.png" style="width: 25px"></a>
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

			<div class="col-lg-10">
				<!-- <div class="container"> -->
				<div class="row">
					<?php 
					$data = mysqli_query($mysqli,"SELECT * FROM cart");

					while ($show = mysqli_fetch_array($data)) {
						?>
						<div class="col-lg-4 col-md-6 mb-4">
							<div class="card h-100">
								<div class="card-body">

									<form action="updatebarang.php" method="POST">
										<h4 class="card-title">
											<td><?php echo $show['nama_sepatu'];?></td>
										</h4>
										<input type="hidden" name="id_cart" value="<?php echo $show['id_cart'];?>">
										<h5>Jumlah <input style="width: 40px" type="number" min="1" value="<?php echo $show['jumlah_cart'];?>" name="jumlah_cart">
										</h5>
										<h5>Size <input style="margin-left: 28px;width: 45px" type="text" name="size_cart" value="<?php echo $show['size_cart'];?>" required></h5>
										<h5>Satuan Rp <td><?php echo $show['harga'];?></td></h5>
										<?php $total = $show['harga']*$show['jumlah_cart'];  ?>

										<h5>Total Rp <td><?php echo $total;?></td></h5>
										<input type="hidden" name="total" value="<?php echo $total;?>">
										<small>&#9733; &#9733; &#9733; &#9733; &#9733;</small><br><br>
										<input  type="submit" class="btn btn-warning" value="Tambah" name="checkout">

										<!-- <a id="modal-25348" href="#modal-container-253489" role="button" class="btn" data-toggle="modal">
											
											<span class="glyphicon glyphicon-shopping-cart"></span>
										</a> -->
									</form>
									
								</div>
								<div class="card-footer">

									<a id="modal-25348" href="#modal-container-25348" role="button" class="btn" data-toggle="modal">
										<button class="btn btn-warning" >
											<span class="glyphicon glyphicon-shopping-cart"></span>
											Detail Produk
										</button>
									</a>
									<a href="deletepart.php?id_cart=<?php echo $show['id_cart'];?>">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Batal Beli
										</button>
									</a>

									<div class="modal fade" id="modal-container-25348" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 75%">

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

														<div class="col-lg-12">
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
					<?php 	} ?>
				</div>
				<!-- </div> -->

				<div class="modal-footer">
					<a href="formulir.php" >
						<button class="btn btn-warning" style="height: 90px;width: 200px">
							<span class="glyphicon glyphicon-shopping-cart"></span>
							Check Out
						</button>
					</a>
					<a href="deletecart.php">
						<button style="height: 90px;width: 200px" type="button" class="btn btn-secondary" data-dismiss="modal">
							Hapus Keranjang
						</button>
					</a>

				</div>

			</div>

		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.form').submit(function(){
				var nama = $("#nama").val();
				var alamat = $("#alamat").val();
				var bank = $("#bank").val();

				if (nama == ""&& alamat == "") {
					$("nama").attr("placeholder","Nama Harus Diisi");
					$("alamat").attr("placeholder","Alamat Harus Diisi");

				}
				return false;
			});
		});
	</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="jquery.min.js"></script>
	<script src="bootstrap.bundle.min.js"></script>
</body>
</html>