<!DOCTYPE html>
<html>
<head>
	<title></title>
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
					<form action="addsql.php" method="POST" enctype="multipart/form-data">
						<table  align="center">
							<tr>
								<th colspan="2" scope="row">
									<h1>Tambah Data Barang</h1><br>
								</th>
							</tr>
							<tr>
								<th scope="row">Nama Sepatu</th>
								<td><input class="form-control" type="text" name="nama_sepatu"><br></td>
							</tr>
							<tr>
								<th width="139" scope="row">Brand</th>
								<td width="400"><input class="form-control" type="text" name="brand" id="textfield"><br></td>
							</tr>
							<tr>
								<th width="139" scope="row">Jenis</th>
								<td width="289">
								<!-- <input class="form-control" type="text" name="jenis" id="textfield"><br> -->
								<select name="jenis" class="form-control">
									<option value="Sport">Sport</option>
									<option value="Casual">Casual</option>
									<option value="Formal">Formal</option>

								</select><br>
								</td>

							</tr>
							<tr>
								<th scope="row">Size</th>
								<td><input class="form-control" type="text" name="size"><br></td>
							</tr>
							<tr>
								<th scope="row">Harga</th>
								<td><input class="form-control" type="text" name="harga"><br></td>
							</tr>
							<tr>
								<th scope="row">Jumlah</th>
								<td><input class="form-control" type="text" name="jumlah"><br></td>
							</tr>
							<tr>
								<th scope="row">Deskripsi</th>
								<td><textarea class="form-control" name="deskripsi"></textarea><br></td>
							</tr>
							<tr>
								<th scope="row">Upload File</th>
								<td><input class="form-control" type="file" name="file"><br></td>
							</tr><br>
							<tr>
								<th colspan="2" scope="row">
									<input class="btn btn-default" type="submit" name="simpan" id="simpan" value="simpan"/>
									<input class="btn btn-default" type="reset" name="button2" id="button2" value="Reset"/><br><br>
									<a href="tampil.php">Ke Tampilan Database</a>
								</th>
								
							</tr>
							
						</table>
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
