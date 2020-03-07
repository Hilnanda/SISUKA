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
                    <h1 class="page-header">Data Transaksi</h1>
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
                                    <th>ID Pesan</th>
                                    <th>ID Kang</th>
                                    <th>ID User</th>
                                    <th>Kerusakan</th>
                                    <th>Tanggal Servis</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Foto Bukti</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM 
                                    pesan");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM 
                                    pesan");

                                    
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Data kosong!";
                                    }else{


                                    while ($show = mysqli_fetch_array($query)) {
                                        $bukti;
                                     ?>
                                <tr>

                                    <td><?php echo $show['ID_PESAN']; ?></td>
                                    <td><?php echo $show['ID_KANG']; ?></td>
                                    <td><?php echo $show['ID_USER']; ?></td>
                                    <td><?php echo $show['KERUSAKAN']; ?></td>
                                    <td><?php echo $show['TANGGAL_SERVIS']; ?></td>
                                    <td><?php echo $show['TANGGAL_KEMBALI']; ?></td>
                                    <td><?php echo $show['TOTAL_BAYAR']; ?></td>
                                    <td><?php echo $show['STATUS']; ?></td>
                                    <?php
                                            if($show['FOTO_PESAN']==NULL){

                                            
                                        ?>
                                        <td><p><?php echo $bukti =  'Bukti Belum Dikirim';?></p></td>
                                            <?php } else{?>
                                                <td><img src="../admin_kang_servis/images/<?php echo $show['FOTO_PESAN']; ?>" width="150px"></td>

                                            <?php $bukti = 'Bukti Di kirim'; } ?>
                                    
                                    <td>
                                                <?php if($show['STATUS']=='Terbayar'){ ?>
                                                    <p>Terbayar</p>
                                            <?php }else if($bukti =='Bukti Di kirim'){ $bukti = '';?>
                                        <a id="modal-990160"
                                            href="#modal-container-990160<?php echo $show['ID_PESAN']; ?>"
                                            role="button" data-toggle="modal"><button class=""
                                                onclick="myFunction()">Konfirmasi Pembayaran</button></a>
                                                <?php } else if($bukti == 'Bukti Belum Dikirim'){?>
                                            <p>Bukti Belum Di Kirim</p>
                                       
                                                <?php } else{?>
                                            <p>Terbayar</p>
                                        <?php } ?>
                                        
                                    </td>
                                    <div class="modal fade" id="modal-container-990160<?php echo $show['ID_PESAN']; ?>"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Konfirmasi Bukti Pembayaran
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                    <input type="hidden" name="ID_PESAN" value="<?php echo $show['ID_PESAN']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bukti Pembayaran</label>
                                                        <img src="../admin_kang_servis/images/<?php echo $show['FOTO_PESAN']; ?>" height="auto"
                                                        width="570px">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary"
                                                            name="addbukti" value="Verifikasi Pembayaran"/>
                                                            
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-danger"
                                                            name="addbukti2" value="Verifikasi Gagal"/>
                                                            
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
    

    <?php 
        include "koneksi.php";
            if (isset($_POST["addbukti"])) {
                $ID_PESAN = $_POST['ID_PESAN'];
                
                $query4 = mysqli_query($mysqli, "UPDATE pesan SET STATUS='Terbayar' WHERE ID_PESAN='$ID_PESAN'") or die ("Sql salah : ".mysqli_error($mysqli));                
                
                if($query4){
                        echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                        echo "<script>document.location = 'data_transaksi.php';</script>";
                    }else{
                        echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                        echo '<script>window.history.back()</script>';
                     }
                
                
                
                
            }if (isset($_POST["addbukti2"])) {
                $ID_PESAN = $_POST['ID_PESAN'];
                
                
                $query4 = mysqli_query($mysqli, "UPDATE pesan SET FOTO_PESAN=NULL, STATUS='Upload Bukti Pembayaran' WHERE ID_PESAN='$ID_PESAN'") or die ("Sql salah : ".mysqli_error($mysqli));                
    
                if($query4){
                        echo "<script type='text/javascript'> alert('Berhasil konfirmasi data') </script>";
                        echo "<script>document.location = 'data_transaksi.php';</script>";
                    }else{
                        echo "<script type='text/javascript'> alert('Maaf gagal konfirmasi data !!!') </script>";
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