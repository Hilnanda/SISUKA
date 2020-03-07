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

    <title>Dashboard Pengelola NgalamParadise</title>
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


            
         ?>
    <div id="wrapper">
        <?php
                include("nav.php");
            ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard Penyervis</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable" id="tabs-37598">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active show" href="#tab1" data-toggle="tab">Data Toko Bekerja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab2" data-toggle="tab">Data Transaksi Servis</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <br>
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID Toko</th>
                                                <th>Nama Toko</th>
                                                <th>Deskripsi Toko</th>
                                                <th>Foto Toko</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM toko_servis WHERE ID_USER = '$_SESSION[ID_USER]' ");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM toko_servis WHERE ID_USER = '$_SESSION[ID_USER]' ");

                                    //perintah menampilkan semua stok di tabel jual dengan perulangan
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Tidak Bekerja di Toko";
                                    }else{


                                    while ($show = mysqli_fetch_array($query)) {
                                        // $kat = $show['ID_WISATA'];
                                        // $qq = mysqli_query($mysqli, "SELECT * FROM wisata WHERE ID_WISATA='$kat' ");
                                        // $tampil = mysqli_fetch_array($qq);
                                     ?>
                                            <tr>

                                                <td><?php echo $_SESSION['ID_TOKO']; ?></td>
                                                <td><?php echo $tampil['NAMA_TOKO']; ?></td>
                                                <td><?php echo $show['DESKRIPSI_TOKO']; ?></td>
                                                <td><?php echo $show['FOTO_TOKO']; ?></td>
                                                
                                            </tr>
                                            
                                            <?php }
                                     }
                                      ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <br>
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID Pesan</th>
                                                <th>ID Kang</th>
                                                <th>Kerusakan Barang</th>
                                                <th>Tanggal Servis</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Total Bayar</th>
                                                <th>Status</th>
                        
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                    
                                    $query9 = mysqli_query($mysqli, "SELECT * FROM pesan as p
                                    inner join kang_servis as k
                                    on k.ID_KANG = p.ID_KANG where k.ID_USER = '$_SESSION[ID_USER]'");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM pesan");

                                    //perintah menampilkan semua stok di tabel jual dengan perulangan
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Data kosong!";
                                    }else{


                                    while ($show9 = mysqli_fetch_array($query9)) {
                                        
                                     ?>
                                            <tr>

                                                <td><?php echo $show9['ID_PESAN']; ?></td>
                                                <td><?php echo $show9['ID_KANG']; ?></td>
                                                <td><?php echo $show9['KERUSAKAN']; ?></td>
                                                <td><?php echo $show9['TANGGAL_SERVIS']; ?></td>
                                                <td><?php echo $show9['TANGGAL_KEMBALI']; ?></td>
                                                <td><?php echo $show9['TOTAL_BAYAR']; ?></td>
                                                <td><?php echo $show9['STATUS']; ?></td>
                                                
                                                </td>

                                                <td>
                                                    <a id="modal-990160"
                                                        href="#modal-container-990160<?php echo $show9['ID_PESAN']; ?>"
                                                        role="button" data-toggle="modal"><button class=""
                                                            onclick="myFunction()">Edit</button></a>

                                                    
                                                </td>

                                            </tr>
                                            <div class="modal fade"
                                                id="modal-container-990160<?php echo $show9['ID_PESAN']; ?>"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">
                                                                Edit Transaksi
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action=""
                                                                enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label>Kerusakan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="KERUSAKAN"
                                                                         />
                                                                    <input type="hidden" name="ID_PESAN" value="<?php echo $show9['ID_PESAN']; ?>">
                                                                    
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>Tanggal Servis</label>
                                                                    <input type="date" class="form-control" name="TANGGAL_SERVIS" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tanggal Pengembalian</label>
                                                                    <input type="date" class="form-control" name="TANGGAL_KEMBALI" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Total Bayar</label>
                                                                    <input type="text" class="form-control" name="TOTAL_BAYAR" />
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <input type="submit"
                                                                        class="form-control btn btn-primary"
                                                                        name="updatepesan" />
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">
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
                </div>
            </div>

        </div>
        <?php 
        include "koneksi.php";
        
            if (isset($_POST["updatepost1"])) {
                $ID_EVENT = $_POST['ID_EVENT'];
                $NAMA_EVENT = $_POST['NAMA_EVENT'];
                $LOKASI_EVENT = $_POST['LOKASI_EVENT'];
                $TANGGAL_EVENT = $_POST['TANGGAL_EVENT'];
                $DESKRIPSI_EVENT = strip_tags($_POST['DESKRIPSI_EVENT']);
                $query = mysqli_query($mysqli, "UPDATE event SET NAMA_EVENT='$NAMA_EVENT',LOKASI_EVENT='$LOKASI_EVENT',DESKRIPSI_EVENT='$DESKRIPSI_EVENT',TANGGAL_EVENT='$TANGGAL_EVENT' WHERE ID_EVENT='$ID_EVENT'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'index.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
        <?php 
        include "koneksi.php";
            if (isset($_POST["addpost"])) {
                $nama_folder="images/upload";
                $tgl_post = date('Y-m-d');
                $NAMA_WISATAPOST = $_POST['NAMA_WISATAPOST'];
                $LOKASI_WISATAPOST = $_POST['LOKASI_WISATAPOST'];
                $LOKASI_WISATAPOST2 = $_POST['LOKASI_WISATAPOST2'];
                $ID_WISATA = $_POST['ID_WISATA'];
                $INFO_WISATAPOST = strip_tags($_POST['INFO_WISATAPOST']);
                $INFOWISATAPOST2 = strip_tags($_POST['INFOWISATAPOST2']);
                $code = $_FILES['gambar']['error'];
                $jumlah = count($_FILES['gambar']['name']);
                $jumlah = count($_FILES['gambar']['name']);
                if ($jumlah > 0) {
                    $gambar = array();
                    for ($i=0; $i < $jumlah; $i++) { 
                        $file_name = $_FILES['gambar']['name'][$i];
                        $tmp_name = $_FILES['gambar']['tmp_name'][$i];	
                        $file_ext   = pathinfo($file_name, PATHINFO_EXTENSION);	
                        // $path = "$nama_folder/$NAMA_WISATAPOST[$i].$file_ext";			
                        move_uploaded_file($tmp_name, "../admin/images/".$file_name);
                        $gambar[$i] = $file_name; 								
                    }
                    $query = mysqli_query($mysqli, "INSERT INTO wisatapost VALUES(NULL,'$ID_WISATA' ,'$NAMA_WISATAPOST', '$LOKASI_WISATAPOST', '$LOKASI_WISATAPOST2', '$INFO_WISATAPOST', '$INFOWISATAPOST2','$gambar[0]','$gambar[1]','$gambar[2]','$tgl_post','$_SESSION[ID_USER]' )") or die ("Sql salah : ".mysqli_error($mysqli));
                    if($query){
                        echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                        echo "<script>document.location = 'index.php';</script>";
                    }else{
                        echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                        echo '<script>window.history.back()</script>';
                     }			
                }
                else{
                    echo "<script type='text/javascript'> alert('Gambar Tidak Ada') </script>";
                    echo '<script>window.history.back()</script>';
                }                           
                
            }

        ?>
        <?php 
        include "koneksi.php";
            if (isset($_POST["addpostbudaya"])) {
                $nama_folder="images/upload";
                $tgl_post = date('Y-m-d');
                $NAMA_BUDAYA = $_POST['NAMA_BUDAYA'];
                $LOKASI_BUDAYA = $_POST['LOKASI_BUDAYA'];
                $LOKASI_BUDAYA2 = $_POST['LOKASI_BUDAYA2'];
                $ID_KEBUDAYAAN = $_POST['ID_KEBUDAYAAN'];
                $INFO_BUDAYA = strip_tags($_POST['INFO_BUDAYA']);
                $INFOBUDAYA2 = strip_tags($_POST['INFOBUDAYA2']);
                $code = $_FILES['gambar2']['error'];
                $jumlah = count($_FILES['gambar2']['name']);
                $jumlah = count($_FILES['gambar2']['name']);
                if ($jumlah > 0) {
                    $gambar = array();
                    for ($i=0; $i < $jumlah; $i++) { 
                        $file_name = $_FILES['gambar2']['name'][$i];
                        $tmp_name = $_FILES['gambar2']['tmp_name'][$i];	
                        $file_ext   = pathinfo($file_name, PATHINFO_EXTENSION);	
                        // $path = "$nama_folder/$NAMA_WISATAPOST[$i].$file_ext";			
                        move_uploaded_file($tmp_name, "../admin/images/".$file_name);
                        $gambar[$i] = $file_name; 								
                    }
                    $query = mysqli_query($mysqli, "INSERT INTO kebudayaanpost VALUES(NULL,'$ID_KEBUDAYAAN' ,'$NAMA_BUDAYA', '$LOKASI_BUDAYA', '$LOKASI_BUDAYA2', '$INFO_BUDAYA', '$INFOBUDAYA2','$gambar[0]','$gambar[1]','$gambar[2]','$tgl_post','$_SESSION[ID_USER]')") or die ("Sql salah : ".mysqli_error($mysqli));
                    if($query){
                        echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                        echo "<script>document.location = 'index.php';</script>";
                    }else{
                        echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                        echo '<script>window.history.back()</script>';
                     }			
                }
                else{
                    echo "<script type='text/javascript'> alert('Gambar Tidak Ada') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }
            ?>
        <?php 
        include "koneksi.php";
        
            if (isset($_POST["updatepostwisata"])) {
                $ID_POSTWISATA = $_POST['ID_POSTWISATA'];
                $ID_WISATA = $_POST['ID_WISATA'];
                $NAMA_WISATAPOST = $_POST['NAMA_WISATAPOST'];
                $LOKASI_WISATAPOST = $_POST['LOKASI_WISATAPOST'];
                $LOKASI_WISATAPOST2 = $_POST['LOKASI_WISATAPOST2'];
                $INFO_WISATAPOST = strip_tags($_POST['INFO_WISATAPOST']);
                $INFOWISATAPOST2 = strip_tags($_POST['INFOWISATAPOST2']);
                $query = mysqli_query($mysqli, "UPDATE wisatapost SET ID_WISATA='$ID_WISATA', NAMA_WISATAPOST='$NAMA_WISATAPOST',LOKASI_WISATAPOST='$LOKASI_WISATAPOST',LOKASI_WISATAPOST2='$LOKASI_WISATAPOST2', INFO_WISATAPOST='$INFO_WISATAPOST',INFOWISATAPOST2='$INFOWISATAPOST2' WHERE ID_POSTWISATA='$ID_POSTWISATA'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'index.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
        <?php 
        include "koneksi.php";
        
            if (isset($_POST["updatepesan"])) {
                $ID_PESAN = $_POST['ID_PESAN'];
                $KERUSAKAN = $_POST['KERUSAKAN'];
                
                $TANGGAL_SERVIS = $_POST['TANGGAL_SERVIS'];
                $TANGGAL_KEMBALI = $_POST['TANGGAL_KEMBALI'];
                $TOTAL_BAYAR = $_POST['TOTAL_BAYAR'];
                
                $query = mysqli_query($mysqli, "UPDATE pesan 
                SET KERUSAKAN='$KERUSAKAN',TANGGAL_SERVIS='$TANGGAL_SERVIS',
                TANGGAL_KEMBALI='$TANGGAL_KEMBALI',TOTAL_BAYAR='$TOTAL_BAYAR' where ID_PESAN = '$ID_PESAN'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'index.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
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