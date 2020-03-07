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
                    <h1 class="page-header">Data Penyervis</h1>
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
                                    <th>ID Penyervis</th>
                                    <th>Nik Penyervis</th>
                                    <th>Nama Penyervis</th>
                                    <th>Keahlian</th>
                                    <th>Kategori Bidang</th>
                                    <th>Foto Penyervis</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM 
                                    kang_servis as ks inner join user as u 
                                    on u.ID_USER = ks.ID_USER 
                                    inner join kategori_servis as k
                                    on k.ID_KATEGORI = ks.ID_KATEGORI");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM 
                                    kang_servis as ks inner join user as u 
                                    on u.ID_USER = ks.ID_USER 
                                    inner join kategori_servis as k
                                    on k.ID_KATEGORI = ks.ID_KATEGORI");

                                    
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Data kosong!";
                                    }else{


                                    while ($show = mysqli_fetch_array($query)) {
                                        
                                     ?>
                                <tr>

                                    <td><?php echo $show['ID_KANG']; ?></td>
                                    <td><?php echo $show['NIK_KANG']; ?></td>
                                    <td><?php echo $show['NAMA_USER']; ?></td>
                                    <td><?php echo $show['KEAHLIAN']; ?></td>
                                    <td><?php echo $show['NAMA_KATEGORI']; ?></td>
                                    <td><img src="../admin_kang_servis/images/<?php echo $show['FOTO_KANG']; ?>" width="150px"></td>
                                    
                                    <td>
                                        
                                        <a
                                            href="deleterpenyervis.php?ID_KANG=<?php echo $show['ID_KANG']; ?>"><button>Delete</button></a>

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