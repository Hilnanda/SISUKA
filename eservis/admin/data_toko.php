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

    <title>Servis-In</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/timeline.css" rel="stylesheet">
    <link href="css/startmin.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <?php
                include("nav.php");
            ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Toko</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID Toko</th>
                                    <th>Nama Toko</th>
                                    <th>Deskripsi Toko</th>
                                    <th>Nama Pemilik</th>
                                    <th>Foto </th>
                                    
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM
                                    toko_servis as t
                                    inner join user as u
                                    on u.ID_USER = t.ID_USER");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM
                                    toko_servis as t
                                    inner join user as u
                                    on u.ID_USER = t.ID_USER");

                                    
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Data kosong!";
                                    }else{


                                    while ($show = mysqli_fetch_array($query)) {
                                        
                                     ?>
                                <tr>

                                    <td><?php echo $show['ID_TOKO']; ?></td>
                                    <td><?php echo $show['NAMA_TOKO']; ?></td>
                                    <td><?php echo $show['DESKRIPSI_TOKO']; ?></td>
                                    <td><?php echo $show['NAMA_USER']; ?></td>
                                    <td><img src="../admin_toko/images/<?php echo $show['FOTO_TOKO']; ?>" width="150px"></td>
                                    
                                    <td>
                                        
                                        <a
                                            href="deletetoko.php?ID_TOKO=<?php echo $show['ID_TOKO']; ?>"><button>Delete</button></a>

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