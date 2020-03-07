<?php 
	//koneksi ke database
	$server = "localhost";
	$usernames = "root";
	$password = "";
	$database = "eservice";

	$mysqli = mysqli_connect($server, $usernames, $password, $database);
	//check error, jikalau error tutup koneksi dengan mysql
	if (mysqli_connect_errno()) {
		echo "Koneksi gagal, ada masalah pada :".mysqli_connect_error();
		exit();
		mysqli_close();
	}

 ?>