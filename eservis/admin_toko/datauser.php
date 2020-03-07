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

    <title>Admin Toko</title>
     <link rel="icon" href="fav.png" type="image/png">
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
                    <h1 class="page-header">Data Toko
                    </h1>

                </div>

                <!-- /.col-lg-12 -->
            </div>
            <?php 
            include 'koneksi.php';
            $query_user = "SELECT * FROM user WHERE ID_USER = $_SESSION[ID_USER]";
            $datashow = mysqli_query($mysqli, $query_user);
            $datashow_us = mysqli_fetch_array($datashow);
            $row_user = mysqli_num_rows($datashow);
            ?>
            <!-- /.row -->
            <main role="main" class="container">
                <div class="row">
                    <div class="col-md-7 blog-main text-right">
                        <dl>
                            <?php
                                $query5 = mysqli_query($mysqli, "SELECT * FROM toko_servis where ID_USER='$_SESSION[ID_USER]'");

                                //perintah menampilkan semua stok di tabel jual dengan perulangan
                                
                                    
                                    $show5 = mysqli_fetch_array($query5);

                                if($show5['NAMA_TOKO'] != null){
                                    ?>
                            <dt style="font-size: 20px;">
                                <i class="fa fa-address-card"></i> Nama Toko
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $show5['NAMA_TOKO']; ?>
                            </dd>
                            <?php
                                }
                            ?>

                            <dt style="font-size: 20px;">
                                <i class="fa fa-user fa-fw"></i> Username
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $datashow_us['USERNAME']; ?>
                            </dd>
                            <dt style="font-size: 20px;">
                                <i class="fa fa-glide fa-fw"></i> Nama Lengkap
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $datashow_us['NAMA_USER']; ?>
                            </dd>
                            <dt style="font-size: 20px;">
                                <i class="fa fa-address-card"></i> No Handphone
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $datashow_us['NO_HP']; ?>
                            </dd>
                            <dt style="font-size: 20px;">
                                <i class="fa fa-transgender fa-fw"></i> Jenis Kelamin
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $datashow_us['JENIS_KELAMIN']; ?>
                            </dd>
                            <dt style="font-size: 20px;">
                                <i class="fa fa-envelope-o fa-fw"></i> Email
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $datashow_us['EMAIL']; ?>
                            </dd>
                            <?php
                            if($show5['DESKRIPSI_TOKO'] != null){
                                    ?>
                            <dt style="font-size: 20px;">
                                <i class="fa fa-address-card"></i> Deskripsi Toko 
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $show5['DESKRIPSI_TOKO']; ?>
                            </dd>
                            <?php
                                }
                            ?>
                            <dt style="font-size: 20px;">
                                <i class="fa fa-map-marker fa-fw"></i> Alamat
                            </dt>
                            <dd style="font-size: 20px;">
                                <?php echo $datashow_us['ALAMAT_USER']; ?>
                            </dd>
                            <dd>
                                <a id="modal-990160"
                                    href="#modal-container-990170<?php echo $datashow_us['ID_USER']; ?>" role="button"
                                    data-toggle="modal"><button class="btn btn-primary">Edit</button></a>
                                <div class="modal fade text-left"
                                    id="modal-container-990170<?php echo $datashow_us['ID_USER'];?>" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Edit Data Toko
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="">
                                                <?php
                                                            if($show5['NAMA_TOKO'] != null){
                                                                    ?>
                                                            <div class="form-group">
                                                        <label>Nama Toko</label>
                                                        <input type="text" class="form-control" name="NAMA_TOKO"
                                                            value="<?php echo $show5['NAMA_TOKO']; ?>" />
                                                        <input type="hidden" class="form-control" name="ID_TOKO"
                                                            value="<?php echo $show5['ID_TOKO']; ?>" />
                                                    </div>
                                                            <?php
                                                                }
                                                            ?>
                                                           
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="NAMA_USER"
                                                            value="<?php echo $datashow_us['NAMA_USER']; ?>" />
                                                        <input type="hidden" class="form-control" name="ID_USER"
                                                            value="<?php echo $datashow_us['ID_USER']; ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="USERNAME"
                                                            value="<?php echo $datashow_us['USERNAME']; ?>" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>
                                                            Password
                                                        </label>
                                                        <input type="password" class="form-control" name="PASSWORD"
                                                            value="<?php echo $datashow_us['PASSWORD']; ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No Handphone</label>
                                                        <input type="text" class="form-control" name="NO_HP"
                                                            value="<?php echo $datashow_us['NO_HP']; ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label><br>
                                                        <input name="JENIS_KELAMIN" type="radio" value="Laki-Laki"
                                                            <?php if($datashow_us['JENIS_KELAMIN']=='Laki-Laki'){echo 'checked';}?> />
                                                        Laki-Laki
                                                        <input type="radio" name="JENIS_KELAMIN" value="Perempuan"
                                                            <?php if($datashow_us['JENIS_KELAMIN']=='Perempuan'){echo 'checked';}?> />
                                                        Perempuan

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="EMAIL"
                                                            value="<?php echo $datashow_us['EMAIL']; ?>" />
                                                    </div>
                                                    <?php
                                                            if($show5['ID_TOKO'] != null){
                                                                    ?>
                                                            <div class="form-group">
                                                        <label>Deskripsi Toko</label>
                                                        <textarea class="form-control" name="DESKRIPSI_TOKO"
                                                            value=""><?php echo $show5['DESKRIPSI_TOKO']; ?></textarea>
                                                    </div>
                                                            <?php
                                                                }
                                                            ?>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" name="ALAMAT_USER"
                                                            value=""><?php echo $datashow_us['ALAMAT_USER']; ?></textarea>
                                                    </div>
                                                   
                                                    
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary"
                                                            name="updateuser" />
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
                            </dd>
                            <dd style="margin-top: 10px">
                                <?php 
                                    $query2 = mysqli_query($mysqli, "SELECT * FROM toko_servis where ID_USER='$_SESSION[ID_USER]'");

                                    //perintah menampilkan semua stok di tabel jual dengan perulangan
                                    
                                        
                                        $show3 = mysqli_fetch_array($query2);
                                        if(!$show3['ID_USER']==$_SESSION['ID_USER']){
                                            ?>
                                <a id="modal-990190" href="#modal-container-990190" role="button"
                                    data-toggle="modal"><button class="btn btn-danger">Lengkapi Data Diri</button></a>
                                <?php
                                        }
                                    
                                     
                                    
                                ?>

                                <div class="modal fade text-left" id="modal-container-990190" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Data Toko
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                                          <div class="form-group">
                                                        <label>Nama Toko</label>
                                                        <input type="text" class="form-control" name="NAMA_TOKO"
                                                            />

                                                    </div>   
                                                     <div class="form-group">
                                                        <label>Deskripsi Toko</label>
                                                        <textarea class="form-control" name="DESKRIPSI_TOKO"
                                                           ></textarea>
                                                    </div>
                                                      
                                                
                                                  <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="NAMA_USER"
                                                            value="<?php echo $datashow_us['NAMA_USER']; ?>" disabled />
                                                        <input type="hidden" class="form-control" name="ID_USER"
                                                            value="<?php echo $datashow_us['ID_USER']; ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="EMAIL"
                                                            value="<?php echo $datashow_us['EMAIL']; ?>" disabled />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload Foto</label>
                                                        <input type="file" class="form-control" name="gambar[]" multiple
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary"
                                                            name="lengkapi" />
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
                            </dd>
                        </dl>
                    </div><!-- /.blog-main -->
                    <div class="col-md-1">
                        <div class="vl"></div>
                    </div>
                    <aside class="col-md-4 blog-sidebar">
                        <div class="p-3 mb-3 bg-light rounded">
                            <div class="text-center">
                                <?php 
                                    $query3 = mysqli_query($mysqli, "SELECT * FROM toko_servis where ID_USER='$_SESSION[ID_USER]'");

                                    //perintah menampilkan semua stok di tabel jual dengan perulangan
                                    
                                        
                                        $show4 = mysqli_fetch_array($query3);
                                    if($show4['FOTO_TOKO']== NULL ){
                                        if ($datashow_us['JENIS_KELAMIN']== 'Laki-Laki') {
                                            echo '<img src="images/male-user.png" class="img img-responsive" height="200px" width="auto">';
                                        }else{
                                            echo '<img src="images/female-user.png" class="img img-responsive" height="200px" width="auto">';
                                        }
                                    } else {
                                        ?>
                                <img src="images/<?php echo $show4['FOTO_TOKO']; ?>" height="300px" width="auto">
                                <?php


                                    }                    
                                    
                                    ?>
                            </div><br>


                            <p class="mb-0 text-center" style="font-size: 20px;">
                                <em><?php echo $datashow_us['USERNAME']; ?></em></p>
                        </div>


                    </aside><!-- /.blog-sidebar -->

                </div><!-- /.row -->
                <hr>
            </main><!-- /.container -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php 
        include "koneksi.php";
        
            if (isset($_POST["updateuser"])) {
                $ID_USER = $_POST['ID_USER'];
                $NAMA_USER = $_POST['NAMA_USER'];
                // $NIK_KANG = $_POST['NIK_KANG'];
                $NO_HP = $_POST['NO_HP'];
                // $ID_KATEGORI = $_POST['ID_KATEGORI'];
                // $KEAHLIAN = $_POST['KEAHLIAN'];
                $USERNAME = $_POST['USERNAME'];
                $PASSWORD = $_POST['PASSWORD'];
                $JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
                $EMAIL = $_POST['EMAIL'];
                $ALAMAT_USER = $_POST['ALAMAT_USER'];

                $NAMA_TOKO = $_POST['NAMA_TOKO'];
                $DESKRIPSI_TOKO = $_POST['DESKRIPSI_TOKO'];

                $query = mysqli_query($mysqli, "UPDATE user SET NAMA_USER='$NAMA_USER', USERNAME='$USERNAME', ALAMAT_USER='$ALAMAT_USER', JENIS_KELAMIN='$JENIS_KELAMIN', EMAIL='$EMAIL',NO_HP='$NO_HP' WHERE ID_USER='$ID_USER'") or die ("Sql salah : ".mysqli_error($mysqli));

                $query1 = mysqli_query($mysqli, "UPDATE toko_servis SET NAMA_TOKO='$NAMA_TOKO', DESKRIPSI_TOKO='$DESKRIPSI_TOKO' WHERE ID_USER='$ID_USER'") or die ("Sql salah : ".mysqli_error($mysqli));

                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'datauser.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>

    <?php 
        include "koneksi.php";
            if (isset($_POST["lengkapi"])) {
                $nama_folder="images/upload";
                
                 $NAMA_TOKO = $_POST['NAMA_TOKO'];
                $DESKRIPSI_TOKO = $_POST['DESKRIPSI_TOKO'];
                // $ID_KATEGORI = $_POST['ID_KATEGORI'];
                $ID_USER = $_POST['ID_USER'];
                // $NIK_KANG = $_POST['NIK_KANG'];
                // $KEAHLIAN = strip_tags($_POST['KEAHLIAN']);
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
                        move_uploaded_file($tmp_name, "images/".$file_name);
                        $gambar[$i] = $file_name; 								
                    }
                    $query = mysqli_query($mysqli, "INSERT INTO toko_servis set NAMA_TOKO='$NAMA_TOKO' ,DESKRIPSI_TOKO='$DESKRIPSI_TOKO',FOTO_TOKO='$gambar[0]',ID_USER='$_SESSION[ID_USER]', ID_KANG= null ") or die ("Sql salah : ".mysqli_error($mysqli));
                    if($query){
                        echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                        echo "<script>document.location = 'datauser.php';</script>";
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