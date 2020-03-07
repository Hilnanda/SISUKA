<?php 
session_start();
if (!isset($_SESSION["nama"])) {
	header("Location: cart.php");
}
include "admin/connection.php";

if (isset($_POST['checkout'])) {
	$size_cart = $_POST['size_cart'];
	$jumlah_cart = $_POST['jumlah_cart'];
	$total = $_POST['total'];
	$id = $_POST['id_cart'];

	$data = mysqli_query($mysqli, "UPDATE cart SET size_cart='$size_cart',jumlah_cart='$jumlah_cart',total='$total' WHERE id_cart='$id'")or die("data salah : ".mysqli_error($mysqli));
	echo "<script>document.location='cart.php'</script>";
}
?>