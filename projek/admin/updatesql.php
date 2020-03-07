<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: index.php");
}
include "connection.php";

if (isset($_POST['update'])) {
	$id_sepatu = $_POST['id_sepatu'];
	$nama_sepatu = $_POST['nama_sepatu'];
	$brand = $_POST['brand'];
	$jenis = $_POST['jenis'];
	$size = $_POST['size'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$deskripsi = $_POST['deskripsi'];

	$data = mysqli_query($mysqli, "UPDATE stok SET id_sepatu='$id_sepatu',nama_sepatu='$nama_sepatu', brand='$brand',jenis='$jenis', size='$size', harga='$harga', jumlah='$jumlah', deskripsi='$deskripsi' WHERE id_sepatu='$id_sepatu'")or die("data salah : ".mysqli_error($mysqli));
	if ($data) {
		echo "<script type='text/javascript'>alert('Dokumen Berhasil Di Update')</script>";
		echo "<script>document.location='tampil.php'</script>";
	} else {
		echo "<script type='text/javascript'>alert('Dokumen Gagal Di Update')</script>";
		echo "<script>document.location='tampil.php'</script>";
	}
}
?>