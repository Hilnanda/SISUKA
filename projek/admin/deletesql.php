<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: index.php");
}
include "connection.php";

if (isset($_GET['id_sepatu'])) {
	if (empty($_GET['id_sepatu'])) {
		echo "<b>Data yang dihapus tidak ada</b>";
	}
	else{
		$delete = mysqli_query($mysqli, "DELETE FROM stok WHERE  id_sepatu='$_GET[id_sepatu]'") or die ("mysql Error : ".mysqli_error($mysqli));
		if ($delete) {
			echo "<script type='text/javascript'>alert('Dokumen Berhasil Di Hapus')</script>";
			echo "<script>document.location='tampil.php'</script>";
		}else{
			echo "<script type='text/javascript'>alert('Dokumen Gagal Di Hapus')</script>";
			echo "<script>document.location='tampil.php'</script>";
		}
	}
}
?>