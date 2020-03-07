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
                    <h1 class="page-header">Data Kategori Servis</h1>
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
                                        Tambah Data Kategori Servis
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="">
                                        
                                        <div class="form-group">
                                            <label>Nama Kategori Servis</label>
                                            <input type="text" class="form-control" name="NAMA_KATEGORI" />
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-primary" name="addkategori" />
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
                                    <th>ID Kategori Servis</th>
                                    <th>Nama Kategori Servis</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM kategori_servis");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM kategori_servis");

                                    
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Data kosong!";
                                    }else{


                                    while ($show = mysqli_fetch_array($query)) {
                                        
                                     ?>
                                <tr>

                                    <td><?php echo $show['ID_KATEGORI']; ?></td>
                                    <td><?php echo $show['NAMA_KATEGORI']; ?></td>
                                    
                                    <td>
                                        <a id="modal-990160"
                                            href="#modal-container-990160<?php echo $show['ID_KATEGORI']; ?>" role="button"
                                            data-toggle="modal"><button class="">Edit</button></a>

                                        <a
                                            href="deletekategori_servis.php?ID_KATEGORI=<?php echo $show['ID_KATEGORI']; ?>"><button>Delete</button></a>

                                    </td>

                                </tr>

                                <div class="modal fade" id="modal-container-990160<?php echo $show['ID_KATEGORI']; ?>"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Edit Data Kategori Servis
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="">
                                                    
                                                    <div class="form-group">
                                                        <label>Nama Kategori Servis</label>
                                                        <input type="text" class="form-control" name="NAMA_KATEGORI" value="<?php echo $show['NAMA_KATEGORI']; ?>" />
                                                        <input type="hidden" class="form-control" name="ID_KATEGORI" value="<?php echo $show['ID_KATEGORI']; ?>" />                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary"
                                                            name="updatekategori" />
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
            if (isset($_POST["addkategori"])) {
                $NAMA_KATEGORI = $_POST['NAMA_KATEGORI'];
                
                $query = mysqli_query($mysqli, "INSERT INTO kategori_servis VALUES(NULL,'$NAMA_KATEGORI')") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                    echo "<script>document.location = 'datakategori_servis.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
    <?php 
        include "koneksi.php";
        
            if (isset($_POST["updatekategori"])) {
                $ID_KATEGORI = $_POST['ID_KATEGORI'];
                $NAMA_KATEGORI = $_POST['NAMA_KATEGORI'];
                
                $query = mysqli_query($mysqli, "UPDATE kategori_servis SET NAMA_KATEGORI='$NAMA_KATEGORI' WHERE ID_KATEGORI='$ID_KATEGORI'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'datakategori_servis.php';</script>";
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