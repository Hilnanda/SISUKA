<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: index.php");
}
include "admin/connection.php";

$data = mysqli_query($mysqli,"SELECT * FROM stok WHERE id_sepatu='$_GET[id_sepatu]'");
$datashow = mysqli_fetch_array($data);
if (isset($_GET['id_sepatu'])) {
	// if (isset($_POST['tocart'])) {
		$nama_sepatu = $datashow['nama_sepatu'];
		$brand = $datashow['brand'];
		$harga = $datashow['harga'];
		$deskripsi = $datashow['deskripsi'];

		$data = mysqli_query($mysqli, "INSERT INTO cart SET nama_sepatu = '$nama_sepatu',brand = '$brand' , harga='$harga', deskripsi='$deskripsi'") or die ("data salah : ".mysqli_error($mysqli));
		if ($data) {
			echo "<script type='text/javascript'>alert('Dokumen Berhasil Di Update')</script>";
			echo "<script>document.location='cart.php'</script>";
		} else {
			echo "<script type='text/javascript'>alert('Dokumen Gagal Di Tambahkan ke cart')</script>";
			echo "<script>document.location='index.php'</script>";
		}
	// }
	
}
?>