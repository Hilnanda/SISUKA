<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: index.php");
}
include "admin/connection.php";

if (isset($_GET['id_cart'])) {
	if (empty($_GET['id_cart'])) {
		echo "<b>Data yang dihapus tidak ada</b>";
	}
	else{
		$delete = mysqli_query($mysqli, "DELETE FROM cart WHERE  id_cart='$_GET[id_cart]'") or die ("mysql Error : ".mysqli_error($mysqli));
		if ($delete) {
			echo "<script type='text/javascript'>alert('Dokumen Berhasil Di Hapus')</script>";
			echo "<script>document.location='cart.php'</script>";
		}else{
			echo "<script type='text/javascript'>alert('Dokumen Gagal Di Hapus')</script>";
			echo "<script>document.location='cart.php'</script>";
		}
	}
}
?>