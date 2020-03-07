<?php

session_start();

if (!isset($_SESSION['USER_ID'])) {
    header("Location: ../../login.php");
}

// if (isset($_SESSION['ID_USER'])) {
// 						$query2 = mysqli_query($mysqli, "SELECT * FROM user where ID_USER = $_SESSION[ID_USER]");
// 						$user = mysqli_fetch_array($query2);
// 							<a id="modal-179881" href="#modal-container-179881<?php echo $show['ID_EVENT']; " role="button" data-toggle="modal" class="imgover"  ><img src="<?php echo $show['FOTO_EVENT']; " alt="" style="width: 400px; height: 200px"></a>
// 					}
// 					else{

// 							<a  href="../login/login.php" role="button"  class="imgover"  ><img src="<?php echo $show['FOTO_EVENT']; " alt="" style="width: 400px; height: 200px"></a>




// 					}
include '../utama/koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d");

$hasil_user = mysqli_query($mysqli, "SELECT * FROM user where USER_ID = $_SESSION[USER_ID]");

$show_user = mysqli_fetch_array($hasil_user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>User Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                            <!-- Light Logo icon -->
                            <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                            <img src="parblu.png" style="height: 50px" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>

                            <!-- Light Logo text -->
                            <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> -->
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                         
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                            <img src="../../pemilik/assets/images/users/user.png" alt="user" class="profile-pic m-r-10" />
                            
                            <?php echo $show_user['USERNAME']; ?>
                        </a>
                        </li>
                                
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <div class="card">
                    <div class="card-block">
                        <center class="m-t-30"> <img src="../../pemilik/assets/images/users/user.png" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10"><?php echo $show_user['USERNAME']; ?></h4>
                            <h6 class="card-subtitle">Petugas Lapangan</h6>
                            <div class="row text-center justify-content-md-center">
                                <!-- <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">10</font></a></div> -->
                                <!-- <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div> -->
                            </div>
                        </center>

                    </div>
                </div>
                <!-- Sidebar navigation-->
                <!-- <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.html" aria-expanded="false"><i
                                    class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.html" aria-expanded="false"><i
                                    class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="table-basic.html" aria-expanded="false"><i
                                    class="mdi mdi-table"></i><span class="hide-menu">Tabel Rekapan</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="icon-material.html" aria-expanded="false"><i
                                    class="mdi mdi-emoticon"></i><span class="hide-menu">Input Data</span></a>
                        </li>
                       <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu">Lokasi Bongkar</span></a> 
                        </li>
                         <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Blank Page</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i
                                    class="mdi mdi-help-circle"></i><span class="hide-menu">Error 404</span></a>
                        </li>
                    </ul>
                    <div class="text-center m-t-30">
                    </div>
                </nav> -->
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">

                <!-- item--><a style="margin-left: 70px;" href="../../logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i>Logout</a> </div>
    </div>
    <!-- End Bottom points-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="col-md-7 col-4 align-self-center">

                </div>


            </div>





            <div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Data Masuk</h4><br>
                                <h6 class="card-subtitle">
                                    <table>
                                        <select class="btn btn-primary" onchange="cek_database()" id="id">
                                            <option value='' selected>-Tambah Data - Pilih Nomor Kendaraan</option>
                                            <?php
                                            include "config.php";
                                            $karyawan = mysqli_query($config, "SELECT * FROM kendaraan");
                                            while ($row = mysqli_fetch_array($karyawan)) {
                                                echo "
                                                    <option value='$row[KENDARAAN_ID]'>$row[NOPOL]
                                                    </option>";
                                            }
                                            ?>
                                        </select></td>
                                    </table>
                                </h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Data ID</th>
                                                <th>User ID</th>
                                                <th>Nomor Kendaraan ID</th>
                                                <th>Vendor ID</th>
                                                <th>Material ID</th>
                                                <th>Lokasi ID</th>
                                                <th>Tanggal</th>
                                                <th>Volume</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Foto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query = mysqli_query($mysqli, "SELECT * FROM data");
                                            $hasil = mysqli_query($mysqli, "SELECT * FROM data");

                                            $row = mysqli_num_rows($hasil);
                                            if ($row == 0) {
                                                echo "Data kosong!";
                                            } else {

                                                while ($show = mysqli_fetch_array($query)) {

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $show['DATA_ID']; ?></td>
                                                        <td><?php echo $show['USER_ID']; ?></td>
                                                        <td><?php echo $show['KENDARAAN_ID']; ?></td>
                                                        <td><?php echo $show['VENDOR_ID']; ?></td>
                                                        <td><?php echo $show['MATERIAL_ID']; ?></td>
                                                        <td><?php echo $show['LOKASI_ID']; ?></td>
                                                        <td><?php echo $show['DATA_TANGGAL']; ?></td>
                                                        <td><?php echo $show['DATA_VOLUME']; ?></td>
                                                        <td><?php echo $show['DATA_HARGA']; ?></td>
                                                        <td><?php echo $show['DATA_STATUS']; ?></td>
                                                        <td><img src="../datafoto/<?php echo $show['DATA_FOTO']; ?>" height="auto" width="100px">
                                                        </td>
                                                    </tr>
                                            <?php }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">



                <!-- Column -->
                <!-- <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3 class="card-title">Review Pendapatan Terbanyak</h3>
                                                <h6 class="card-subtitle">Januari - Maret</h6> </div>
                                            <div class="ml-auto">
                                                <ul class="list-inline">
                                                    <li>
                                                        <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Pasir</h6> </li>
                                                    <li>
                                                        <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Split</h6> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="amp-pxl" style="height: 360px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="card-title">Our Visitors </h3>
                                <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                                <div id="visitor" style="height:290px; width:100%;"></div>
                            </div>
                            <div>
                                <hr class="m-t-0 m-b-0">
                            </div>
                            <div class="card-block text-center ">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Mobile</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10 m-r-10"></i>Desktop</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Tablet</h6> </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->

                <div class="modal fade" id="modal-container-535559" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Data Masuk
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $_SESSION['USER_ID'] ?>" name="user_id">
                                        <label for="exampleInputDate">
                                            Tanggal
                                        </label>
                                        <input type="text" class="form-control" name="tanggalInput" id="exampleInputDate" value=<?php echo "$tanggal"; ?> readonly>
                                    </div>
                                    <div class="form-group">

                                        <Input type="hidden" name="userid" value="1">

                                        <label for="exampleInputMaterial">
                                            Material
                                        </label>
                                        <select name="inputMaterial" class="form-control" id="exampleInputMaterial">
                                            <?php
                                            $query = mysqli_query($mysqli, "SELECT * FROM material");
                                            $hasil = mysqli_query($mysqli, "SELECT * FROM material");

                                            $row = mysqli_num_rows($hasil);
                                            if ($row == 0) {
                                                echo "Data kosong!";
                                            } else {

                                                while ($show = mysqli_fetch_array($query)) {

                                                    ?>

                                                    <option value="<?php echo $show['MATERIAL_ID']; ?>"><?php echo $show['MATERIAL_NAMA']; ?></option>

                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNopol">
                                            Nomor Polisi
                                        </label>
                                        <input type="text" class="form-control" name="InputNopol" id="InputNopol">
                                        <input type="hidden" class="form-control" name="InputNopol2" id="InputNopol2">
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputPanjang">
                                            Panjang
                                        </label>
                                        <input type="number" class="form-control" nama="panjangKen" id="InputPanjang" readonly>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputLebar">
                                            Lebar
                                        </label>
                                        <input type="number" class="form-control" name="lebarKen" id="InputLebar" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputTinggi">
                                            Tinggi
                                        </label>
                                        <input type="number" class="form-control" name="tinggiKen" id="InputTinggi" readonly>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputVol">
                                            Volume
                                        </label>
                                        <input type="number" step="0.25" class="form-control" name="volumeKen" id="InputVol" readonly>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputLokBong">
                                            Lokasi Bongkar
                                        </label>
                                        <select name="lokbong" class="form-control" id="InputLokBong">
                                            <?php
                                            $query = mysqli_query($mysqli, "SELECT * FROM lokasi");
                                            $hasil = mysqli_query($mysqli, "SELECT * FROM lokasi");

                                            $row = mysqli_num_rows($hasil);
                                            if ($row == 0) {
                                                echo "Data kosong!";
                                            } else {

                                                while ($show = mysqli_fetch_array($query)) {

                                                    ?>

                                                    <option value="<?php echo $show['LOKASI_ID']; ?>"><?php echo $show['LOKASI_NAMA']; ?></option>

                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputVendor">
                                            Vendor
                                        </label>
                                        <select name="vendor" class="form-control" id="exampleInputVendor">

                                            <?php

                                            $query = mysqli_query($mysqli, "SELECT * FROM vendor");
                                            $hasil = mysqli_query($mysqli, "SELECT * FROM vendor");

                                            $row = mysqli_num_rows($hasil);
                                            if ($row == 0) {
                                                echo "Data kosong!";
                                            } else {

                                                while ($show = mysqli_fetch_array($query)) {

                                                    ?>

                                                    <option value="<?php echo $show['VENDOR_ID']; ?>"><?php echo $show['VENDOR_NAMA']; ?></option>

                                            <?php }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputFile">
                                            Masukkan Foto
                                        </label>
                                        <input type="file" class="form-control-file" name="gambar" id="exampleInputFile">
                                    </div>
                                    <div class="checkbox">
                                    </div>
                                    <input class="btn btn-parimary" type="submit" name="datakiriman" class="btn btn-primary">
                                </form>
                            </div>
                            <div class="modal-footer">


                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Batal
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <?php
            include "../utama/koneksi.php";

            if (isset($_POST["datakiriman"])) {
                // $Userid = $_POST['userid'];
                $Userid = $_POST['user_id'];
                $Tanggal_input = $_POST['tanggalInput'];
                $Input_material = $_POST['inputMaterial'];
                $Nopol = $_POST['InputNopol2'];
                $Volume_ken = $_POST['volumeKen'];
                $Lokbong = $_POST['lokbong'];
                $Vendor = $_POST['vendor'];



                $code = $_FILES['gambar']['error'];
                if ($code === 0) {
                    $nama_folder = "../datafoto";
                    $nama_file = $_FILES['gambar']['name'];
                    $file_ext   = pathinfo($nama_file, PATHINFO_EXTENSION);
                    $path = "$nama_folder/$Userid.$file_ext";
                    $file_tmp   = $_FILES['gambar']['tmp_name'];
                    $tipe_file = array("image/jpeg", "image/gif", "image/png");
                    if (!in_array($_FILES['gambar']['type'], $tipe_file)) {
                        echo "<script type='text/javascript'> alert('Cek kembali ekstensi file anda (*.jpeg, *.jpg, *.gif, *.png)') </script>";
                        echo "<script>document.location = '../html/index.php';</script>";
                    } else {
                        $move = move_uploaded_file($file_tmp, $path);
                        $query = mysqli_query($mysqli, "INSERT INTO data VALUES(null,$Nopol, $Userid, $Vendor, $Input_material,$Lokbong,'$Tanggal_input' ,$Volume_ken,'','Belum Terbayar', '$path')") or die("Sql salah : " . mysqli_error($mysqli));
                        // $query = mysqli_query($mysqli, "INSERT INTO laporan VALUES(null,$Nopol, $Userid, $Vendor, $Input_material,$Lokbong,'$Tanggal_input' ,$Volume_ken,'','Belum Terbayar', '$path')") or die ("Sql salah : ".mysqli_error($mysqli));
                        $hasil1 = mysqli_query($mysqli, "SELECT * FROM data order by DATA_ID desc limit 1");



                        $show1 = mysqli_fetch_array($hasil1);
                        if ($query) {
                            echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                            echo "<script>document.location = '../crud/postdata.php?DATA_ID=$show1[DATA_ID]';</script>";
                        } else {
                            echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                            echo '<script>window.history.back()</script>';
                        }
                    }
                } else if ($code === 4) {
                    echo "Upload gagal karena tidak ada yang di upload";
                }
            }
            // $query = mysqli_query($mysqli, "INSERT INTO data VALUES(NULL,'$Nopol', '$Userid', '$Vendor', '$Input_material','$Lokbong','$Tanggal_input' ,'$Volume_ken','Belum Dibayar', $gambar[0])") or die ("Sql salah : ".mysqli_error($mysqli));

            ?>
            <!-- Row -->
            <!-- Row -->

            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2019 RAD-Lite Mockup </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
        function cek_database() {
            var id = $("#id").val();
            $.ajax({
                url: 'ajax.php',
                data: "id=" + id,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                coba = obj.volume_bak;
                tes = coba.toFixed(2);
                $('#InputNopol').val(obj.nomor_polisi);
                $('#InputNopol2').val(obj.kendaraan_id);
                $('#InputTinggi').val(obj.tinggi_bak);
                $('#InputLebar').val(obj.lebar_bak);
                $('#InputPanjang').val(obj.panjang_bak);
                $('#InputVol').val(tes);
                $("#modal-container-535559").modal('show');
            });
        }
    </script>

</html>