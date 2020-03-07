<?php 

	session_start();

	if (!isset($_SESSION["ID_USER"])) {
		header("Location: ../login.php");
		# code...
	}

	include "koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['ID_TOKO'])) {
		if (empty($_GET['ID_TOKO'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
			$delete = mysqli_query($mysqli, "DELETE FROM toko_servis WHERE ID_TOKO='$_GET[ID_TOKO]'") or die ("Mysql Error : ".mysqli_error($mysqli)); 

		if($delete){
			echo "<script type='text/javascript'> alert('Berhasil menghapus data') </script>";
			echo "<script>document.location = 'data_toko.php';</script>";
		}

		}
		# code...
	}


 ?>