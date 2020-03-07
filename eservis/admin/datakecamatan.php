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
                    <h1 class="page-header">Data Kecamatan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a id="modal-990150" href="#modal-container-990150" role="button" data-toggle="modal">
                        <button class=" btn btn-primary">Tambah Data</button></a>
                    <div class="modal fade" id="modal-container-990150" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">
                                        Tambah Data Kecamatan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="">
                                        
                                        <div class="form-group">
                                            <label>Nama Kecamatan</label>
                                            <input type="text" class="form-control" name="NAMA_KEC" />
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary" name="addkec" />
                                        </div>


                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID Kecamatan</th>
                                    <th>Nama Kecamatan</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM kec");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM kec");

                                    
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Data kosong!";
                                    }else{


                                    while ($show = mysqli_fetch_array($query)) {
                                        
                                     ?>
                                <tr>

                                    <td><?php echo $show['ID_KEC']; ?></td>
                                    <td><?php echo $show['NAMA_KEC']; ?></td>
                                    
                                    <td>
                                        <!-- <a href="updateuser.php?id_user=<?php echo $show['ID_KEC']; ?>"><button>Edit</button></a> -->
                                        <a id="modal-990160"
                                            href="#modal-container-990160<?php echo $show['ID_KEC']; ?>" role="button"
                                            data-toggle="modal"><button class="">Edit</button></a>

                                        <a
                                            href="deletekecamatan.php?ID_KEC=<?php echo $show['ID_KEC']; ?>"><button>Delete</button></a>

                                    </td>

                                </tr>

                                <div class="modal fade" id="modal-container-990160<?php echo $show['ID_KEC']; ?>"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Edit Data Kecamatan
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="">
                                                    
                                                    <div class="form-group">
                                                        <label>Nama Kecamatan</label>
                                                        <input type="text" class="form-control" name="NAMA_KEC" value="<?php echo $show['NAMA_KEC']; ?>" />
                                                        <input type="hidden" class="form-control" name="ID_KEC" value="<?php echo $show['ID_KEC']; ?>" />                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary"
                                                            name="updatekec" />
                                                    </div>


                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

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
    <?php 
        include "koneksi.php";
            if (isset($_POST["addkec"])) {
                $NAMA_KEC = $_POST['NAMA_KEC'];
                
                $query = mysqli_query($mysqli, "INSERT INTO kec VALUES(NULL,'$NAMA_KEC')") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                    echo "<script>document.location = 'datakecamatan.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
    <?php 
        include "koneksi.php";
        
            if (isset($_POST["updatekec"])) {
                $ID_KEC = $_POST['ID_KEC'];
                $NAMA_KEC = $_POST['NAMA_KEC'];
                
                $query = mysqli_query($mysqli, "UPDATE kec SET NAMA_KEC='$NAMA_KEC' WHERE ID_KEC='$ID_KEC'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'datakecamatan.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
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