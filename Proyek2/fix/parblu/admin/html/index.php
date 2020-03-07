<?php

session_start();

if (!isset($_SESSION['USER_ID'])) {
    header("Location: ../../login.php");
}
include 'koneksi.php';
$queryUser = mysqli_query($mysqli, "SELECT * FROM user WHERE USER_ID = $_SESSION[USER_ID]");
$showUser = mysqli_fetch_array($queryUser);
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script type="text/javascript" src="Chart.js"></script>
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
        include("nav1.php");
        ?>
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
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
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3 class="card-title">Grafik Total Supply Material</h3>
                                                <h6 class="card-subtitle">Januari - Desember</h6>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div style="text-align: center;">
                                            <h5>Jumlah Semua Data : <?php
                                                                    $jumlah = mysqli_query($mysqli, "SELECT * from data");
                                                                    echo mysqli_num_rows($jumlah);
                                                                    ?></h5>
                                        </div>
                                        <?php
                                        $bulan       = mysqli_query($mysqli, "SELECT MATERIAL_NAMA FROM material");
                                        $penghasilan = mysqli_query($mysqli, "SELECT MATERIAL_ID, COUNT(*) as hitung FROM data GROUP BY MATERIAL_ID");
                                        ?>
                                        <div style="width: 800px;margin: 0px auto;">
                                            <canvas id="myChart"></canvas>
                                        </div>

                                        <script>
                                            var ctx = document.getElementById("myChart").getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) {
                                                                    echo '"' . $b['MATERIAL_NAMA'] . '",';
                                                                } ?>],
                                                    datasets: [{

                                                        label: ' Jumlah Data ',
                                                        data: [
                                                            <?php while ($p = mysqli_fetch_array($penghasilan)) {
                                                                echo '"' . $p['hitung'] . '",';
                                                            } ?>
                                                        ],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)',
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)',
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
                </div>

                <div class="row">
                    <!-- column -->
                    <div class="col-lg-4">


                        <div class="card">

                            <div class="card-block">
                                <h4 class="card-title">Laporan Parblu</h4>

                                <div class="table-responsive">
                                    <table class="table">

                                        <thead>
                                            <tr>

                                                <th>Tanggal</th>
                                                <th>Laporan Harian</th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php



                                            // $tanggal_filter = $_GET['tanggal_filter'];
                                            $query2 = mysqli_query($mysqli, "SELECT DATA_TANGGAL,COUNT(*) AS jumlah_harian
                                                    FROM data
                                                    WHERE DATA_TANGGAL=DATE(NOW())
                                                    GROUP BY DATA_TANGGAL");


                                            while ($show = mysqli_fetch_array($query2)) {

                                                ?>
                                                <tr>
                                                    <td><?php echo $show['DATA_TANGGAL']; ?></td>
                                                    <td><?php echo $show['jumlah_harian']; ?></td>



                                                </tr>

                                            <?php
                                            }

                                            ?>
                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">


                        <div class="card">

                            <div class="card-block">
                                <h4 class="card-title">Laporan Parblu</h4>

                                <div class="table-responsive">
                                    <table class="table">

                                        <thead>
                                            <tr>

                                                <th>Tahun/Bulan</th>
                                                <th>Laporan Bulanan</th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php



                                            // $tanggal_filter = $_GET['tanggal_filter'];
                                            $query2 = mysqli_query($mysqli, "SELECT CONCAT(YEAR(DATA_TANGGAL),'/',MONTHNAME(DATA_TANGGAL)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan
                                                    FROM data
                                                    WHERE CONCAT(YEAR(DATA_TANGGAL),'/',MONTHNAME(DATA_TANGGAL))=CONCAT(YEAR(NOW()),'/',MONTHNAME(NOW()))
                                                    GROUP BY YEAR(DATA_TANGGAL),MONTHNAME(DATA_TANGGAL)");


                                            while ($show = mysqli_fetch_array($query2)) {

                                                ?>
                                                <tr>
                                                    <td><?php echo $show['tahun_bulan']; ?></td>
                                                    <td><?php echo $show['jumlah_bulanan']; ?></td>



                                                </tr>

                                            <?php
                                            }

                                            ?>
                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">


                        <div class="card">

                            <div class="card-block">
                                <h4 class="card-title">Laporan Parblu</h4>

                                <div class="table-responsive">
                                    <table class="table">

                                        <thead>
                                            <tr>

                                                <th>Tahun</th>
                                                <th>Laporan Tahunan</th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php



                                            // $tanggal_filter = $_GET['tanggal_filter'];
                                            $query2 = mysqli_query($mysqli, "SELECT YEAR(DATA_TANGGAL) AS tahun, COUNT(*) AS jumlah_tahunan
                                                    FROM data
                                                    GROUP BY YEAR(DATA_TANGGAL);");


                                            while ($show = mysqli_fetch_array($query2)) {

                                                ?>
                                                <tr>
                                                    <td><?php echo $show['tahun']; ?></td>
                                                    <td><?php echo $show['jumlah_tahunan']; ?></td>



                                                </tr>

                                            <?php
                                            }

                                            ?>
                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">


                        <div class="card">

                            <div class="card-block">
                                <h4 class="card-title">Laporan Parblu</h4>

                                <div class="table-responsive">
                                    <table class="table">

                                        <thead>
                                            <tr>

                                                <th>No Polisi</th>
                                                <th>Material-Vendor-Lokasi Bongkar</th>

                                                <th>Panjang</th>
                                                <th>Lebar</th>
                                                <th>Tinggi</th>
                                                <th>Volume</th>
                                                <th>Status</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php



                                            // $tanggal_filter = $_GET['tanggal_filter'];
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
                                                on lok.LOKASI_ID = dat.LOKASI_ID where DATA_STATUS='Belum Terbayar'");


                                            while ($show = mysqli_fetch_array($query1)) {

                                                ?>
                                                <tr>
                                                    <td><?php echo $show['NOPOL']; ?></td>
                                                    <td><?php echo $show['LAPORAN_NAMA']; ?></td>

                                                    <td><?php echo $show['PANJANG_KENDARAAN']; ?></td>
                                                    <td><?php echo $show['LEBAR_KENDARAAN']; ?></td>
                                                    <td><?php echo $show['TINGGI_KENDARAAN']; ?></td>
                                                    <td><?php echo $show['DATA_VOLUME']; ?></td>
                                                    <td><?php echo $show['DATA_STATUS']; ?></td>
                                                    <td><a href="datalaporan.php?tanggal=<?php echo $show['DATA_TANGGAL'] ?>"><i class="mdi mdi-send"></i></a>
                                                        
                                                    </td>

                                                </tr>

                                            <?php
                                            }

                                            ?>
                                        </tbody>


                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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
</body>

</html>