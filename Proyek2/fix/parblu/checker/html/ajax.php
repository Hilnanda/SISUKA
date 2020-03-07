<?php
include "config.php";
$karyawan = mysqli_fetch_array(mysqli_query($config, "select * from kendaraan where KENDARAAN_ID='$_GET[id]'"));
$data_karyawan = array('nomor_polisi'   	=>  $karyawan['NOPOL'],
						'kendaraan_id'   	=>  $karyawan['KENDARAAN_ID'],
						'panjang_bak'   	=>  $karyawan['PANJANG_KENDARAAN'],
						'tinggi_bak'   	=>  $karyawan['TINGGI_KENDARAAN'],
						'lebar_bak'   	=>  $karyawan['LEBAR_KENDARAAN'],
						'volume_bak'   	=>  $karyawan['PANJANG_KENDARAAN']*$karyawan['TINGGI_KENDARAAN']*$karyawan['LEBAR_KENDARAAN']/100000000,);
 echo json_encode($data_karyawan);
