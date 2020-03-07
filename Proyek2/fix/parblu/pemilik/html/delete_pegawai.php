<?php 

	session_start();


    if (!isset($_SESSION['USER_ID'])) {
        header("Location: ../login.php");
    }

	include "koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['USER_ID'])) {
		if (empty($_GET['USER_ID'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
			$delete = mysqli_query($mysqli, "DELETE FROM user WHERE USER_ID='$_GET[USER_ID]'") or die ("Mysql Error : ".mysqli_error($mysqli)); 
            
		if($delete){
			echo "<script type='text/javascript'> alert('Berhasil menghapus data') </script>";
			echo "<script>document.location = 'pegawai.php';</script>";
		}

		}
		# code...
	}


 ?>