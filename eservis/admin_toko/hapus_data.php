<?php

    if(isset($_GET["ID_TOKO"]) && !empty($_GET['ID_TOKO'])){
        // hapus artikel
        include("koneksi.php");
        $ID_TOKO = $_GET["ID_TOKO"];
        $query = mysqli_query($mysqli, "UPDATE toko_servis set ID_KANG= null WHERE ID_TOKO=$ID_TOKO");

        if($query) {
            // arahkan ke data artikel
            echo "<script> window.location = 'index.php'</script>";
        } else {
            // tampilkan pesan error
            die("Gagal menghapus: " . mysqli_error($koneksi));
        }
    } else {
        // arahkan ke data artikel
        header("location: index.php");
    }

?>
