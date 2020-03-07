<?php 

	include "koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['GROUP_ID'])) {
		if (empty($_GET['GROUP_ID'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
			$delete = mysqli_query($mysqli, "DELETE FROM groupuser WHERE GROUP_ID='$_GET[GROUP_ID]'") or die ("Mysql Error : ".mysqli_error($mysqli)); 

		if($delete){
			echo "<script type='text/javascript'> alert('Berhasil menghapus data') </script>";
			echo "<script>document.location = 'datagroup.php';</script>";
		}

		}
		# code...
	}


 ?>