<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: index.php");
}
include "connection.php"; //memanggil file connection.php untuk menghubungkan ke database
if (isset($_POST['simpan'])) {
	$nama_sepatu = $_POST['nama_sepatu'];
	$brand = $_POST['brand'];
	$jenis = $_POST['jenis'];
	$size = $_POST['size'];
	$harga = $_POST['harga'];
	$jumlah = $_POST['jumlah'];
	$deskripsi = $_POST['deskripsi'];
	$nama_folder="gambar";
	$tmp = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];
	$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
	$path = "$nama_folder/$nama_sepatu.$file_ext";

	move_uploaded_file($tmp,$path);

	$data = mysqli_query($mysqli, "INSERT INTO stok SET id_sepatu=null,nama_sepatu = '$nama_sepatu',brand = '$brand',jenis='$jenis' , size='$size', harga='$harga', jumlah='$jumlah', deskripsi='$deskripsi', gambar='$path'") or die ("data salah : ".mysqli_error($mysqli));
	if ($data) {
		echo "<script type='text/javascript'>alert('Dokumen Berhasil Di inputkan')</script>";
		echo "<script>document.location='tampil.php'</script>";
		
	} else{
		echo "<script type='text/javascript'>alert('Dokumen Gagal Di inputkan')</script>";
		echo "<script>document.location='add.php'</script>";
	}
}
?>