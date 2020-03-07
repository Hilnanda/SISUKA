<?php 

	include "../utama/koneksi.php"; //memanggil file koneksi

	//perintah menghapus data sesuai id dipilih

	if (isset($_GET['DATA_ID'])) {
		if (empty($_GET['DATA_ID'])) {
			echo "<b>Data yang dihapus tidak ada";
			# code...
		}else{
            $hasil = mysqli_query($mysqli, "SELECT * FROM data as d inner join 
            kendaraan as k on d.KENDARAAN_ID = k.KENDARAAN_ID inner join
            user as u on d.USER_ID = u.USER_ID inner join
            vendor as v on d.VENDOR_ID = v.VENDOR_ID inner join
            material as m on d.MATERIAL_ID = m.MATERIAL_ID inner join
            lokasi as l on d.LOKASI_ID = l.LOKASI_ID where DATA_ID = $_GET[DATA_ID]");
            $show = mysqli_fetch_array($hasil); 
            $tanggal = $show['DATA_TANGGAL'];
            $status = $show['DATA_STATUS'];
            $volume = $show['DATA_VOLUME'];
            $nama = $show['MATERIAL_NAMA']."-".$show['VENDOR_NAMA']."-".$show['LOKASI_NAMA'];
			$insert = mysqli_query($mysqli, "INSERT INTO laporan VALUES (null, $_GET[DATA_ID],'$nama','$tanggal','$status',$volume)") or die ("Mysql Error : ".mysqli_error($mysqli)); 

		if($insert){
			echo "<script>document.location = '../html/index.php';</script>";
		}

		}
		# code...
	}


 ?>