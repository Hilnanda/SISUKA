<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: index.php");
}
include "connection.php"; //memanggil file connection.php untuk menghubungkan ke database
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil</title>
	<link href="/projek/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/projek/css/gaya.css">
	<link href="/projek/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgb(255, 26, 26)">
		<div class="container">
			<a class="navbar-brand" href="/projek/index.php"><img src="/projek/css/background/logo.png" style="width: 70px; height: 40px"> Cenger's Sneaker</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="add.php" style="color: white">
							Tambah Stok Sepatu <img src="/projek/tambah.png" style="width: 25px">
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php" style="color: white">
							Logout <img src="/projek/logout.png" style="width: 23px">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			

			<div class="col-md-12">
				<h1 class="my-4">DAFTAR STOK SEPATU</h1>

				<table width="100%" cellpadding="10" class="table table-striped">
					<thead>
						<tr>
							<td width="100">ID Sepatu</td>
							<td width="150">Nama Sepatu</td>
							<td width="150">Brand</td>
							<td width="150">Jenis</td>
							<td width="150">Size</td>
							<td width="150">Harga</td>
							<td width="150">Jumlah</td>
							<td width="150">Deskripsi</td>
							<td width="200">Gambar</td>
							<td width="85" colspan="2">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php 
		$stok = mysqli_query($mysqli,"SELECT * FROM stok");//memberikan perintah query sql untuk menampilkan semua stok 
		//perintah untuk mnampilkan semua stok yang ada di tabel jual menggunakan perulangan
		while ($show = mysqli_fetch_array($stok)) {
			
			?>
			<tr>
				<td><?php echo $show['id_sepatu'];?></td>
				<td><?php echo $show['nama_sepatu'];?></td>
				<td><?php echo $show['brand'];?></td>
				<td><?php echo $show['jenis'];?></td>
				<td><?php echo $show['size'];?></td>
				<td><?php echo $show['harga'];?></td>
				<td><?php echo $show['jumlah'];?></td>
				<td><?php echo $show['deskripsi'];?></td>
				<td><img src="<?php echo $show['gambar'];?>" width="150px" height="auto"></td>
				<td><a href="update.php?id_sepatu=<?php echo $show['id_sepatu'];?>"><button class="btn btn-default">edit</button></a></td>
				<td><a href="deletesql.php?id_sepatu=<?php echo $show['id_sepatu'];?>"><button class="btn btn-default">delete</button></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<br>
	
	<br><br>
	
</div>
</div>
</div>

<script src="/projek/js/bootstrap.min.js"></script>
<script src="/projek/js/scripts.js"></script>
<script src="/projek/jquery.min.js"></script>
<script src="/projek/bootstrap.bundle.min.js"></script>
</body>
</html>