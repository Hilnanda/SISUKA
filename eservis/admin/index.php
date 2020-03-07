<?php 

    session_start();

    if (!isset($_SESSION['ID_USER'])) {
        header("Location: ../login.php");
    }
    include 'koneksi.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pariwisata dan Kebudayaan di Kota Malang</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/timeline.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php 
            include 'koneksi.php';
            $query_user = "SELECT * FROM user";
            $hasil_user = mysqli_query($mysqli, $query_user);
            $row_user = mysqli_num_rows($hasil_user);

            $query_kategori_servis = "SELECT * FROM kategori_servis";
            $hasil_kategori_servis = mysqli_query($mysqli, $query_kategori_servis);
            $row_kategori_servis = mysqli_num_rows($hasil_kategori_servis);

            $query_kec = "SELECT * FROM kec";
            $hasil_kec = mysqli_query($mysqli, $query_kec);
            $row_kec = mysqli_num_rows($hasil_kec);

            $query_kang_servis = "SELECT * FROM kang_servis";
            $hasil_kang_servis = mysqli_query($mysqli, $query_kang_servis);
            $row_kang_servis = mysqli_num_rows($hasil_kang_servis);

            $query_membeli = "SELECT * FROM membeli";
            $hasil_membeli = mysqli_query($mysqli, $query_membeli);
            $row_membeli = mysqli_num_rows($hasil_membeli);

            

            // $query_pengelola = "SELECT * FROM pengelola";
            // $hasil_pengelola = mysqli_query($mysqli, $query_pengelola);
            // $row_pengelola = mysqli_num_rows($hasil_pengelola);

            // $query_wisata = "SELECT * FROM wisata";
            // $hasil_wisata = mysqli_query($mysqli, $query_wisata);
            // $row_wisata = mysqli_num_rows($hasil_wisata);

            // $query_wisataalam = "SELECT * FROM wisatapost";
            // $hasil_wisataalam = mysqli_query($mysqli, $query_wisataalam);
            // $row_wisataalam = mysqli_num_rows($hasil_wisataalam);

            
         ?>
    <div id="wrapper">
        <?php
                include("nav.php");
            ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_user; ?></div>
                                    <div>New Users!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="datauser.php" class="pull-left">View
                                        Details</i></a></span>
                                <span class="pull-right"><a href="datauser.php" class="pull-right"><i
                                            class="fa fa-arrow-circle-right"></i></a></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plane fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_wisata; ?></div>
                                    <div>New Kategori Wisata!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="datawisata.php" class="pull-left">View Details</span>
                                <span class="pull-right"><a href="datawisata.php" class="pull-right"><i
                                            class="fa fa-arrow-circle-right"></i></a></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-camera-retro fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_wisataalam; ?></div>
                                    <div>New Data Wisata!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="datawisatahiburan.php" class="pull-left">View
                                        Details</a></span>
                                <span class="pull-right"><a href="datawisatahiburan.php" class="pull-right"><i
                                            class="fa fa-arrow-circle-right"></i></a></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->

            </div>
            <!-- <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-asterisk fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_kebudayaan; ?></div>
                                    <div>New Kategori Kebudayaan!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="datakebudayaan.php" class="pull-left">View
                                        Details</span>
                                <span class="pull-right"><a href="datakebudayaan.php" class="pull-right"><i
                                            class="fa fa-arrow-circle-right"></i></a></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-rebel fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_candi; ?></div>
                                    <div>New Data Kebudayaan!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="datacandi.php" class="pull-left">View
                                        Details</a></span>
                                <span class="pull-right"><a href="datacandi.php" class="pull-right"><i
                                            class="fa fa-arrow-circle-right"></i></a></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar-check-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_event; ?></div>
                                    <div>New Event!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="dataevent.php" class="pull-left">View
                                        Details</a></span>
                                <span class="pull-right"><a href="dataevent.php" class="pull-right"><i
                                            class="fa fa-arrow-circle-right"></i></a></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->

            <!-- </div> -->
            <!-- <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_membeli; ?></div>
                                    <div>New Transaksi!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><a href="datawisata.php" class="pull-left">View Details</span>
                                <span class="pull-right"><a href="datawisata.php" class="pull-right"><i
                                            class="fa fa-arrow-circle-right"></i></a></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div> -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>

</body>

</html>