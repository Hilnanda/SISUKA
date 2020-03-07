<?php 

	session_start();

	if (!isset($_SESSION["ID_USER"])) {
		header("Location: ../login.php");
		# code...
	}

	include "koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['ID_KEC'])) {
		if (empty($_GET['ID_KEC'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
			$delete = mysqli_query($mysqli, "DELETE FROM kec WHERE ID_KEC='$_GET[ID_KEC]'") or die ("Mysql Error : ".mysqli_error($mysqli)); 

		if($delete){
			echo "<script type='text/javascript'> alert('Berhasil menghapus data') </script>";
			echo "<script>document.location = 'datakecamatan.php';</script>";
		}

		}
		# code...
	}


 ?>