<?php 

	session_start();

	if (!isset($_SESSION["ID_USER"])) {
		header("Location: ../login.php");
		# code...
	}

	include "koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['ID_KATEGORI'])) {
		if (empty($_GET['ID_KATEGORI'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
			$delete = mysqli_query($mysqli, "DELETE FROM kategori_servis WHERE ID_KATEGORI='$_GET[ID_KATEGORI]'") or die ("Mysql Error : ".mysqli_error($mysqli)); 

		if($delete){
			echo "<script type='text/javascript'> alert('Berhasil menghapus data') </script>";
			echo "<script>document.location = 'datakategori_servis.php';</script>";
		}

		}
		# code...
	}


 ?>