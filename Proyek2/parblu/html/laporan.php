<?php

session_start();

if (!isset($_SESSION['USER_ID'])) {
    header("Location: ../login.php");
}
include 'koneksi.php';
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
    <title>ParBlu</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
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
        <?php
        include("nav.php");
        ?>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Laporan</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <?php

                        $hasil = 0;


                        ?>

                        <div class="card">

                            <div class="card-block">
                                <h4 class="card-title">Laporan Parblu</h4>
                                <form method="GET">
                                    <label>PILIH TANGGAL : </label>
                                    <input type="date" name="tanggal" class="form-control" style="max-width:80%" value="<?php echo $_GET['tanggal'] ?>">
                                    <input type="submit" class="btn btn-success" value="FILTER">
                                </form>
                                <div class="table-responsive">
                                    <?php if (isset($_GET['tanggal'])) { 
                                           $tgl = $_GET['tanggal'];


                                           $query1 = mysqli_query($mysqli, "SELECT * FROM
                                       laporan as laporan
                                       inner join data as dat
                                       on laporan.DATA_ID = dat.DATA_ID
                                       inner join kendaraan as kend
                                       on kend.KENDARAAN_ID = dat.KENDARAAN_ID
                                       inner join vendor as vend
                                       on vend.VENDOR_ID = dat.VENDOR_ID
                                       inner join material as mat
                                       on mat.MATERIAL_ID = dat.MATERIAL_ID
                                       inner join lokasi as lok
                                       on lok.LOKASI_ID = dat.LOKASI_ID where DATA_TANGGAL='$tgl'");

                                            $row = mysqli_num_rows($query1);
                                           if ($row==0) {
                                               echo "<h5 style='margin-top: 20px;'>Data Kosong!</h5>";
                                           }else{
                                        ?>
                                        
                                        <table class="table">

                                            <thead>
                                                <tr>

                                                    <th>No Polisi</th>
                                                    <th>Tanggal</th>
                                                    <th>Material-Vendor-Lokasi Bongkar</th>

                                                    <th>Panjang</th>
                                                    <th>Lebar</th>
                                                    <th>Tinggi</th>
                                                    <th>Volume</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                 

                                                    while ($show = mysqli_fetch_array($query1)) {

                                                        ?>
                                                    <tr>
                                                        <td><?php echo $show['NOPOL']; ?></td>
                                                        <td><?php echo $show['LAPORAN_TANGGAL']; ?></td>
                                                        <td><?php echo $show['LAPORAN_NAMA']; ?></td>

                                                        <td><?php echo $show['PANJANG_KENDARAAN']; ?></td>
                                                        <td><?php echo $show['LEBAR_KENDARAAN']; ?></td>
                                                        <td><?php echo $show['TINGGI_KENDARAAN']; ?></td>
                                                        <td><?php echo $show['DATA_VOLUME']; ?></td>
                                                    </tr>

                                                <?php
                                                        $hasil += $show['DATA_VOLUME'];
                                                    }

                                                    ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="1" class="text-right">Total Volume </td>
                                                    <td colspan=""><?php echo $hasil ?></td>
                                                    <?php
                                                        $query12 = mysqli_query($mysqli, "UPDATE laporan SET LAPORAN_VOLUME='$hasil' WHERE LAPORAN_TANGGAL='$tgl'") or die("Sql salah : " . mysqli_error($mysqli));

                                                        ?>

                                                </tr>

                                                    <?php
                                                        $query_cek = mysqli_query($mysqli, "SELECT * FROM
                                                        data where DATA_TANGGAL='$tgl'");
                                                        $data_cek = mysqli_fetch_array($query_cek);

                                                        if($data_cek['DATA_STATUS']=='Belum Terbayar'){

                                                        
                                                    ?>

                                                <tr>
                                                    <form action="" method="POST">
                                                        <td colspan="1" class="text-right">Harga </td>
                                                        <td colspan="">
                                                            <input type="text" style="max-width:50%" class="form-control hideThis" min="0" name="harga">
                                                            <input type="submit" name="hitung" class="btn btn-success" value="Hitung">
                                                            <!-- <input type="hidden" id="volume1" value="176.21"> -->
                                                        </td>
                                                    </form>
                                                </tr>
                                                        <?php } ?>
                                                <tr>

                                                    <td colspan="1" class="text-right">Total Harga </td>
                                                    <?php
                                                        if (isset($_POST['hitung'])) {
                                                            $harga = $_POST['harga'];

                                                            $harga *= $hasil;
                                                            $query_u = mysqli_query($mysqli, "UPDATE data SET DATA_HARGA='$harga' WHERE DATA_TANGGAL='$tgl'") or die("Sql salah : " . mysqli_error($mysqli));

                                                            $query = mysqli_query($mysqli, "SELECT * FROM
                                                data where DATA_TANGGAL='$tgl'");


                                                            $data = mysqli_fetch_array($query);
                                                            ?>
                                                        <td colspan=""><span id="total_harga1">Rp. <?php echo $data['DATA_HARGA'] ?>,-</span></td>
                                                    <?php
                                                            // if($query1){
                                                            //     echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                                                            // }else{
                                                            //     echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                                                            //     echo '<script>window.history.back()</script>';
                                                            // }

                                                        } else {
                                                            $query = mysqli_query($mysqli, "SELECT * FROM
                                                data where DATA_TANGGAL='$tgl'");
                                                            $data = mysqli_fetch_array($query);

                                                            ?>

                                                        <td colspan=""><span id="total_harga1">Rp. <?php echo $data['DATA_HARGA'] ?>,-</span></td>
                                                    <?php
                                                        }
                                                        ?>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" class="text-right">Status </td>
                                                    <td colspan="">
                                                        <?php
                                                            $query_status = mysqli_query($mysqli, "SELECT * FROM
                                                            data where DATA_TANGGAL='$tgl'");
                                                            $data_status = mysqli_fetch_array($query_status);
                                                            ?>
                                                        <b id="status_text1"><?php echo $data_status['DATA_STATUS'] ?></b>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="1" class="text-right"><a class="btn btn-success" href="cetak.php?tgl_cetak=<?php echo $tgl ?>">Cetak</a> </td>

                                                </tr>
                                            </tfoot>

                                        </table>
                                    <?php
                                                    }
                                    } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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
</body>

</html>