<?php 

	include "koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['LOKASI_ID'])) {
		if (empty($_GET['LOKASI_ID'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
			$delete = mysqli_query($mysqli, "DELETE FROM LOKASI WHERE LOKASI_ID='$_GET[LOKASI_ID]'") or die ("Mysql Error : ".mysqli_error($mysqli)); 

		if($delete){
			echo "<script type='text/javascript'> alert('Berhasil menghapus data') </script>";
			echo "<script>document.location = 'datalokasibongkar.php';</script>";
		}

		}
		# code...
	}


 ?>