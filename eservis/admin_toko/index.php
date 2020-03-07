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
                    <h1 class="page-header">Dashboard Toko</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable" id="tabs-37598">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active show" href="#tab1" data-toggle="tab">Data Penyervis</a>

                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#tab2" data-toggle="tab">Data Transaksi Servis</a>
                            </li> -->
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                         <a id="modal-990150" href="#modal-container-990156" role="button"
                                    data-toggle="modal"><button class=" btn btn-primary">Tambah Data</button></a>
                                <div class="modal fade" id="modal-container-990156" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Tambah Data Tukang
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="" >
                                                    <div class="form-group">
                                                        <label>ID Kang</label>
                                                        <input type="text" class="form-control" name="ID_KANG" />
                                                        <input type="hidden" class="form-control" name="ID_TOKO" />
                                                    </div>
                                                  <!--   <div class="form-group">
                                                        <label>Keahlian</label>
                                                        <input type="text" class="form-control" name="KEAHLIAN" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload Foto</label>
                                                        <input type="file" class="form-control" name="gambar2[]"
                                                            multiple />
                                                    </div> -->
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary"
                                                            name="updatedatakang" />
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

                                </div><br><br>
                                        <thead>
                                            <tr>
                                                <th>ID Kang</th>
                                                <th>NIK Kang</th>
                                                <th>Keahlian</th>
                                                <th>Foto Kang</th>
                                                 <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM kang_servis as k inner join toko_servis as t on k.ID_KANG = t.ID_KANG WHERE t.ID_USER = '$_SESSION[ID_USER]'");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM kang_servis as k inner join toko_servis as t on k.ID_KANG = t.ID_KANG WHERE t.ID_USER = '$_SESSION[ID_USER]'");

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

                                                <td><?php echo $show['ID_KANG']; ?></td>
                                                <td><?php echo $show['NIK_KANG']; ?></td>
                                                <td><?php echo $show['KEAHLIAN']; ?></td>
                                                <td><?php echo "<img src='../admin_kang_servis/images/".$show['FOTO_KANG']."' width='100' height='100'>"; ?></td>
                                               <!--  <td><button class=" btn btn-primary">Tambah Data</button></td> -->
                                                <td>
            <a href="hapus_data.php?ID_TOKO=<?php echo $show['ID_TOKO']; ?>" class='btn btn-danger' /><i class='fa fa-trash'></i> Hapus</a></td>
                                            </tr>
                                            <!-- <div class="modal fade"
                                                id="modal-container-990160<?php echo $show['ID_POSTWISATA']; ?>"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">
                                                                Edit Data Post
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action=""
                                                                enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label>Nama Wisata</label>
                                                                    <input type="text" class="form-control"
                                                                        name="NAMA_WISATAPOST"
                                                                        value="<?php echo $show['NAMA_WISATAPOST']; ?>" />
                                                                    <input type="hidden" class="form-control"
                                                                        name="ID_POSTWISATA"
                                                                        value="<?php echo $show['ID_POSTWISATA']; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jenis Wisata</label>
                                                                    <select name="ID_WISATA" class="form-control"
                                                                        value="<?php echo $show['ID_WISATA']; ?>">


                                                                        <?php 

                                                        $query4 = mysqli_query($mysqli, "SELECT * FROM wisata");

                                                        //perintah menampilkan semua stok di tabel jual dengan perulangan
                                                        


                                                        while ($datashow = mysqli_fetch_array($query4)) {
                                                            # code...
                                                            if($show['ID_WISATA'] == $datashow['ID_WISATA']){
                                                                ?>
                                                                        <option selected="selected"
                                                                            value="<?php echo $datashow['ID_WISATA']; ?>">
                                                                            <?php echo $datashow['JENIS_WISATA']; ?>
                                                                        </option>
                                                                        <?php
                                                                
                                                            }else{

                                                            
                                                         ?>

                                                                        <option
                                                                            value="<?php echo $datashow['ID_WISATA']; ?>">
                                                                            <?php echo $datashow['JENIS_WISATA']; ?>
                                                                        </option>

                                                                        <?php } 
                                                         }
                                                          ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Lokasi Wisata Lat Post</label>
                                                                    <input type="text" class="form-control"
                                                                        name="LOKASI_WISATAPOST"
                                                                        value="<?php echo $show['LOKASI_WISATAPOST']; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Lokasi Wisata Long Post</label>
                                                                    <input type="text" class="form-control"
                                                                        name="LOKASI_WISATAPOST2"
                                                                        value="<?php echo $show['LOKASI_WISATAPOST2']; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi 1 Wisata Post</label>
                                                                    <textarea class="form-control ckeditor"
                                                                        name="INFO_WISATAPOST"><?php echo $show['INFO_WISATAPOST']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi 2 Wisata Post</label>
                                                                    <textarea class="form-control ckeditor"
                                                                        name="INFOWISATAPOST2"><?php echo $show['INFOWISATAPOST2']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit"
                                                                        class="form-control btn btn-primary"
                                                                        name="updatedkang" />
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

                                            </div> -->
                                            <?php }
                                     }
                                      ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <?php
             include "koneksi.php";
        
            if (isset($_POST["updatedatakang"])) {
                 
                // $NIK_KANG = $_POST['NIK_KANG'];
                // $KEAHLIAN = $_POST['KEAHLIAN'];
                $ID_KANG = $_POST['ID_KANG'];
                $ID_TOKO = $_POST['ID_TOKO'];



                // $ID_POSTWISATA = $_POST['ID_POSTWISATA'];
                // $ID_WISATA = $_POST['ID_WISATA'];
                // $NAMA_WISATAPOST = $_POST['NAMA_WISATAPOST'];
                // $LOKASI_WISATAPOST = $_POST['LOKASI_WISATAPOST'];
                // $LOKASI_WISATAPOST2 = $_POST['LOKASI_WISATAPOST2'];
                // $INFO_WISATAPOST = strip_tags($_POST['INFO_WISATAPOST']);
                // $INFOWISATAPOST2 = strip_tags($_POST['INFOWISATAPOST2']);
                $query = mysqli_query($mysqli, "UPDATE toko_servis SET ID_KANG='$ID_KANG' where ID_USER='$_SESSION[ID_USER]'  ") or die ("Sql salah : ".mysqli_error($mysqli));

                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'index.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
                           <!--  <div class="tab-pane" id="tab2">
                                <br>
                                <a id="modal-990150" href="#modal-container-990156" role="button"
                                    data-toggle="modal"><button class=" btn btn-primary">Tambah Data</button></a>
                                <div class="modal fade" id="modal-container-990156" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Tambah Data Budaya
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Nama Budaya</label>
                                                        <input type="text" class="form-control" name="NAMA_BUDAYA" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Kebudayaan</label>
                                                        <select name="ID_KEBUDAYAAN" class="form-control">


                                                            <?php 

                                                        $query = mysqli_query($mysqli, "SELECT * FROM kebudayaan");
                                                        $hasil = mysqli_query($mysqli, "SELECT * FROM kebudayaan");

                                                        //perintah menampilkan semua stok di tabel jual dengan perulangan
                                                        $row = mysqli_num_rows($hasil);
                                                        if ($row==0) {
                                                            echo "Data kosong!";
                                                        }else{


                                                        while ($show = mysqli_fetch_array($query)) {
                                                            # code...
                                                         ?>
                                                            <option value="<?php echo $show['ID_KEBUDAYAAN']; ?>">
                                                                <?php echo $show['JENIS_KEBUDAYAAN']; ?></option>

                                                            <?php }
                                                         }
                                                          ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Lokasi Lat Budaya</label>
                                                        <input type="text" class="form-control" name="LOKASI_BUDAYA" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Lokasi Long Budaya</label>
                                                        <input type="text" class="form-control" name="LOKASI_BUDAYA2" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Deskripsi 1 Budaya</label>
                                                        <textarea class="form-control ckeditor"
                                                            name="INFO_BUDAYA"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Deskripsi 2 Budaya</label>
                                                        <textarea class="form-control ckeditor"
                                                            name="INFOBUDAYA2"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload Foto (Max. 3)</label>
                                                        <input type="file" class="form-control" name="gambar2[]"
                                                            multiple />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary"
                                                            name="addpostbudaya" />
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID Pesan</th>
                                                <th>ID Kang</th>
                                                <th>ID User</th>
                                                <th>Kerusakan</th>
                                                <th>Tanggal Service</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Total Bayar</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                    $query = mysqli_query($mysqli, "SELECT * FROM kebudayaanpost WHERE ID_USER = '$_SESSION[ID_USER]'");
                                    $hasil = mysqli_query($mysqli, "SELECT * FROM kebudayaanpost WHERE ID_USER = '$_SESSION[ID_USER]'");

                                    //perintah menampilkan semua stok di tabel jual dengan perulangan
                                    $row = mysqli_num_rows($hasil);
                                    if ($row==0) {
                                        echo "Data kosong!";
                                    }else{


                                    while ($show = mysqli_fetch_array($query)) {
                                        $kat = $show['ID_KEBUDAYAAN'];
                                        $qq = mysqli_query($mysqli, "SELECT * FROM kebudayaan WHERE ID_KEBUDAYAAN='$kat' ");
                                        $tampil = mysqli_fetch_array($qq);
                                     ?>
                                            <tr>

                                                <td><?php echo $show['ID_POSTKEBUDAYAAN']; ?></td>
                                                <td><?php echo $tampil['JENIS_KEBUDAYAAN']; ?></td>
                                                <td><?php echo $show['NAMA_BUDAYA']; ?></td>
                                                <td><?php echo $show['LOKASI_BUDAYA']; ?></td>
                                                <td><?php echo $show['LOKASI_BUDAYA2']; ?></td>
                                                <td><?php echo substr($show['INFO_BUDAYA'],0,200); ?>...</td>
                                                <td><?php echo substr($show['INFOBUDAYA2'],0,200); ?>...</td>
                                                <td><img src="../admin/images/<?php echo $show['FOTO_BUDAYA']; ?>"
                                                        height="100px" width="auto">
                                                <td><img src="../admin/images/<?php echo $show['FOTO_BUDAYA2']; ?>"
                                                        height="100px" width="auto">
                                                <td><img src="../admin/images/<?php echo $show['FOTO_BUDAYA3']; ?>"
                                                        height="100px" width="auto">
                                                <td><?php echo $show['TANGGAL_BUDAYAPOST']; ?></td>

                                                </td>

                                                <td>
                                                    <a id="modal-990160"
                                                        href="#modal-container-990160<?php echo $show['ID_POSTKEBUDAYAAN']; ?>"
                                                        role="button" data-toggle="modal"><button class=""
                                                            onclick="myFunction()">Edit</button></a>

                                                    <a
                                                        href="deletepostwisata.php?ID_POSTKEBUDAYAAN=<?php echo $show['ID_POSTKEBUDAYAAN']; ?>"><button>Delete</button></a>

                                                </td>

                                            </tr>
                                            <div class="modal fade"
                                                id="modal-container-990160<?php echo $show['ID_POSTKEBUDAYAAN']; ?>"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">
                                                                Edit Data Post
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action=""
                                                                enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label>Nama Budaya</label>
                                                                    <input type="text" class="form-control"
                                                                        name="NAMA_BUDAYA"
                                                                        value="<?php echo $show['NAMA_BUDAYA']; ?>" />
                                                                    <input type="hidden" class="form-control"
                                                                        name="ID_POSTKEBUDAYAAN"
                                                                        value="<?php echo $show['ID_POSTKEBUDAYAAN']; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jenis Budaya</label>
                                                                    <select name="ID_KEBUDAYAAN" class="form-control"
                                                                        value="<?php echo $show['ID_WISATA']; ?>">


                                                                        <?php 

                                                        $query4 = mysqli_query($mysqli, "SELECT * FROM kebudayaan   ");

                                                        //perintah menampilkan semua stok di tabel jual dengan perulangan
                                                        


                                                        while ($datashow = mysqli_fetch_array($query4)) {
                                                            # code...
                                                            if($show['ID_KEBUDAYAAN'] == $datashow['ID_KEBUDAYAAN']){
                                                                ?>
                                                                        <option selected="selected"
                                                                            value="<?php echo $datashow['ID_KEBUDAYAAN']; ?>">
                                                                            <?php echo $datashow['JENIS_KEBUDAYAAN']; ?>
                                                                        </option>
                                                                        <?php
                                                                
                                                            }else{

                                                            
                                                         ?>

                                                                        <option
                                                                            value="<?php echo $datashow['ID_KEBUDAYAAN']; ?>">
                                                                            <?php echo $datashow['JENIS_KEBUDAYAAN']; ?>
                                                                        </option>

                                                                        <?php } 
                                                         }
                                                          ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Lokasi Lat Budaya</label>
                                                                    <input type="text" class="form-control"
                                                                        name="LOKASI_BUDAYA"
                                                                        value="<?php echo $show['LOKASI_BUDAYA']; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Lokasi Long Budaya</label>
                                                                    <input type="text" class="form-control"
                                                                        name="LOKASI_BUDAYA2"
                                                                        value="<?php echo $show['LOKASI_BUDAYA2']; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi 1 Budaya</label>
                                                                    <textarea class="form-control ckeditor"
                                                                        name="INFO_BUDAYA"><?php echo $show['INFO_BUDAYA']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi 2 Budaya</label>
                                                                    <textarea class="form-control ckeditor"
                                                                        name="INFOBUDAYA2"><?php echo $show['INFOBUDAYA2']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit"
                                                                        class="form-control btn btn-primary"
                                                                        name="updatepostbudaya" />
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
                            </div> -->
                            

                            

                        </div>
                    </div>
                </div>
            </div>

        </div>
       <!--  <?php 
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

        ?> -->
        <!-- <?php 
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

        ?> -->
       <!--  <?php 
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
        
            if (isset($_POST["updatepostbudaya"])) {
                $ID_POSTKEBUDAYAAN = $_POST['ID_POSTKEBUDAYAAN'];
                $NAMA_BUDAYA = $_POST['NAMA_BUDAYA'];
                $ID_KEBUDAYAAN = $_POST['ID_KEBUDAYAAN'];
                $LOKASI_BUDAYA = $_POST['LOKASI_BUDAYA'];
                $LOKASI_BUDAYA2 = $_POST['LOKASI_BUDAYA2'];
                $INFO_BUDAYA = strip_tags($_POST['INFO_BUDAYA']);
                $INFOBUDAYA2 = strip_tags($_POST['INFOBUDAYA2']);
                $query = mysqli_query($mysqli, "UPDATE kebudayaanpost SET ID_KEBUDAYAAN='$ID_KEBUDAYAAN',NAMA_BUDAYA='$NAMA_BUDAYA',LOKASI_BUDAYA='$LOKASI_BUDAYA',LOKASI_BUDAYA2='$LOKASI_BUDAYA2', INFO_BUDAYA='$INFO_BUDAYA',INFOBUDAYA2='$INFOBUDAYA2' WHERE ID_POSTKEBUDAYAAN='$ID_POSTKEBUDAYAAN'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'index.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?> -->
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