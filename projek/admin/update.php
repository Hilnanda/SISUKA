<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: index.php");
}
include "connection.php";

$data = mysqli_query($mysqli,"SELECT * FROM stok WHERE id_sepatu='$_GET[id_sepatu]'");
$datashow = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" type="text/css" href="punyaadd.css">
	<link href="/projek/css/bootstrap.min.css" rel="stylesheet">
	<link href="/projek/css/style.css" rel="stylesheet">
</head>
<body style="background-color: rgb(230, 230, 230)">
	<div class="container">
		<div class="row">
			<div class="col-md-3">

			</div>
			<div class="col-md-4">
				<div class="form-contact">
					<form action="updatesql.php" method="POST">
						<h1>Update Data Barang</h1>
						<p>
							<table>
							<tr><td>Nama Sepatu</td><td><input class="form-control" type="text" name="nama_sepatu" value="<?php echo $datashow['nama_sepatu'];?>">
							<input class="form-control" type="hidden" name="id_sepatu" value="<?php echo $datashow['id_sepatu'];?>"><br></td></tr>
								<tr><td>Brand</td><td><input class="form-control" type="text" name="brand" value="<?php echo $datashow['brand'];?>"><br></td></tr>
								<tr><td>Jenis</td><td><input class="form-control" type="text" name="jenis" value="<?php echo $datashow['jenis'];?>"><br></td></tr>
								<tr><td>Size </td><td><input class="form-control" type="text" name="size" value="<?php echo $datashow['size'];?>"></td><br></tr>
								<tr><td>Harga</td><td><input class="form-control" type="text" name="harga" value="<?php echo $datashow['harga'];?>"><br></td></tr>
								<tr><td>Jumlah</td><td><input class="form-control" type="text" name="jumlah" value="<?php echo $datashow['jumlah'];?>"><br></td></tr>
								<tr><td>Deskripsi</td><td><textarea class="form-control" type="text" name="deskripsi" value="<?php echo $datashow['deskripsi'];?>"><?php echo $datashow['deskripsi'];?></textarea><br></td></tr>
								<tr><td><input class="btn btn-default" type="submit" name="update" value="EDIT"><br><br>
								<a href="tampil.php">Ke Tampilan Database</a></td></tr>

							</table>
						</p>
					</form>
				</div>
			</div>
			<div class="col-md-5">

			</div>
		</div>
	</div>
	
	<script src="/projek/js/jquery.min.js"></script>
	<script src="/projek/js/bootstrap.min.js"></script>
	<script src="/projek/js/scripts.js"></script>
</body>
</html>