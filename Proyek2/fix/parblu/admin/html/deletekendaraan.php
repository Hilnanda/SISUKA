<?php 

	include "koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['KENDARAAN_ID'])) {
		if (empty($_GET['KENDARAAN_ID'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
			$delete = mysqli_query($mysqli, "DELETE FROM kendaraan WHERE KENDARAAN_ID='$_GET[KENDARAAN_ID]'") or die ("Mysql Error : ".mysqli_error($mysqli)); 

		if($delete){
			echo "<script type='text/javascript'> alert('Berhasil menghapus data') </script>";
			echo "<script>document.location = 'datakendaraan.php';</script>";
		}

		}
		# code...
	}


 ?>