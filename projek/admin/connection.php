<?php 
//koneksi ke database
$server = "localhost";
$usernames = "root";
$passwords = "";
$database = "tokoku";


$mysqli =mysqli_connect($server, $usernames, $passwords, $database);

//check error, jikalau error tutup koneksi dengan mysql
if (mysqli_connect_errno()) {
	echo "Koneksi Gagal, ada masalah pada : ".mysqli_connect_error();
	exit();
	mysqli_close($mysqli);
}
 ?>