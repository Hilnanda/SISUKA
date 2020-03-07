<?php

session_start();

if (!isset($_SESSION['USER_ID'])) {
    header("Location: ../login.php");
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
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
			include('nav1.php');
		?>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Tabel Data</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)">Data</a>
                            </li>
                            <li class="breadcrumb-item active"></li>
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
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">

                            <div class="card-block">
                                <h4 class="card-title">Tabel Data</h4>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Data ID</th>
                                                <th>Kendaraan ID</th>
                                                <th>User ID</th>
                                                <th>Vendor ID</th>
                                                <th>Material ID</th>
                                                <th>Lokasi ID</th>
                                                <th>Data Tanggal</th>
                                                <th>Data Volume</th>
                                                <th>Data Status</th>
                                                <th>Data Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$query = mysqli_query($mysqli, "SELECT * FROM data as d inner join 
												kendaraan as k on d.KENDARAAN_ID = k.KENDARAAN_ID inner join
												user as u on d.USER_ID = u.USER_ID inner join
												vendor as v on d.VENDOR_ID = v.VENDOR_ID inner join
												material as m on d.MATERIAL_ID = m.MATERIAL_ID inner join
												lokasi as l on d.LOKASI_ID = l.LOKASI_ID");

											$row = mysqli_num_rows($query);
											if ($row == 0) {
												echo "Data kosong!";
											} else {
												while ($show = mysqli_fetch_array($query)) {


													?>
                                            <tr>
                                                <td>
                                                    <?php echo $show['DATA_ID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['NOPOL']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['USERNAME']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['VENDOR_NAMA']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['MATERIAL_NAMA']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['LOKASI_NAMA']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['DATA_TANGGAL']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['DATA_VOLUME']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $show['DATA_STATUS']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $show['DATA_FOTO']; ?>
                                                </td>
                                                <td>
                                                    <a id="modal-990160"
                                                        href="#modal-container-990160<?php echo $show['DATA_ID']; ?>"
                                                        role="button" data-toggle="modal">
                                                        <button class="btn btn-success" onclick="myFunction()"><i
                                                                class="mdi mdi-grease-pencil"></i></button>
                                                    </a>

                                                    <a href="deletedata.php?DATA_ID=<?php echo $show['DATA_ID']; ?>">
                                                        <button class="btn btn-danger"><i
                                                                class="mdi mdi-cup"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade"
                                                id="modal-container-990160<?php echo $show['DATA_ID']; ?>" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">
                                                                Edit Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action="">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control"
                                                                        name="data_id"
																		value="<?php echo $show['DATA_ID']; ?>" />
									
																</div>
																<div class="form-group">
																	<input type="hidden" class="form-control"
                                                                        name="tanggal_id"
																		value="<?php echo $show['DATA_TANGGAL']; ?>" />
																		<div class="form-group">
																	</div>
																<div class="form-group">
																	
																	<input type="hidden" class="form-control"
                                                                        name="vendor_nama"
                                                                        value="<?php echo $show['VENDOR_NAMA']; ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Kendaraan</label>
                                                                    <select name="nama_kendaraan" class="form-control">


                                                                        <?php

																						$queryk = mysqli_query($mysqli, "SELECT * FROM kendaraan");

																						//perintah menampilkan semua stok di tabel jual dengan perulangan
																						$rowk = mysqli_num_rows($queryk);
																						if ($rowk == 0) {
																							echo "Data kosong!";
																						} else {


																							while ($showk = mysqli_fetch_array($queryk)) {
																								# code...
																								?>
                                                                        <option
                                                                            <?php if ($show['KENDARAAN_ID'] == $showk['KENDARAAN_ID']) echo 'selected'; ?>
                                                                            value="<?php echo $showk['KENDARAAN_ID']; ?>">
                                                                            <?php echo $showk['NOPOL']; ?>
                                                                        </option>

                                                                        <?php }
																						}
																						?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama User</label>
                                                                    <select name="nama_user" class="form-control">


                                                                        <?php

																						$queryu = mysqli_query($mysqli, "SELECT * FROM user");

																						//perintah menampilkan semua stok di tabel jual dengan perulangan
																						$rowu = mysqli_num_rows($queryu);
																						if ($rowu == 0) {
																							echo "Data kosong!";
																						} else {


																							while ($showu = mysqli_fetch_array($queryu)) {
																								# code...
																								?>
                                                                        <option
                                                                            <?php if ($show['USER_ID'] == $showu['USER_ID']) echo 'selected'; ?>
                                                                            value="<?php echo $showu['USER_ID']; ?>">
                                                                            <?php echo $showu['USERNAME']; ?>
                                                                        </option>

                                                                        <?php }
																						}
																						?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Vendor</label>
                                                                    <select name="nama_vendor" class="form-control">


                                                                        <?php

																						$queryv = mysqli_query($mysqli, "SELECT * FROM vendor");

																						//perintah menampilkan semua stok di tabel jual dengan perulangan
																						$rowv = mysqli_num_rows($queryv);
																						if ($rowv == 0) {
																							echo "Data kosong!";
																						} else {


																							while ($showv = mysqli_fetch_array($queryv)) {
																								# code...
																								?>
                                                                        <option
                                                                            <?php if ($show['VENDOR_ID'] == $showv['VENDOR_ID']) echo 'selected'; ?>
                                                                            value="<?php echo $showv['VENDOR_ID']; ?>">
                                                                            <?php echo $showv['VENDOR_NAMA']; ?>
                                                                        </option>

                                                                        <?php }
																						}
																						?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Material</label>
                                                                    <select name="nama_material" class="form-control">


                                                                        <?php

																						$querym = mysqli_query($mysqli, "SELECT * FROM material");

																						//perintah menampilkan semua stok di tabel jual dengan perulangan
																						$rowm = mysqli_num_rows($querym);
																						if ($rowm == 0) {
																							echo "Data kosong!";
																						} else {


																							while ($showm = mysqli_fetch_array($querym)) {
																								# code...
																								?>
                                                                        <option
                                                                            <?php if ($show['MATERIAL_ID'] == $showm['MATERIAL_ID']) echo 'selected'; ?>
                                                                            value="<?php echo $showm['MATERIAL_ID']; ?>">
                                                                            <?php echo $showm['MATERIAL_NAMA']; ?>
                                                                        </option>

                                                                        <?php }
																						}
																						?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Lokasi</label>
                                                                    <select name="nama_lokasi" class="form-control">


                                                                        <?php

																						$queryl = mysqli_query($mysqli, "SELECT * FROM lokasi");

																						//perintah menampilkan semua stok di tabel jual dengan perulangan
																						$rowl = mysqli_num_rows($queryl);
																						if ($rowl == 0) {
																							echo "Data kosong!";
																						} else {


																							while ($showl = mysqli_fetch_array($queryl)) {
																								# code...
																								?>
                                                                        <option
                                                                            <?php if ($show['LOKASI_ID'] == $showl['LOKASI_ID']) echo 'selected'; ?>
                                                                            value="<?php echo $showl['LOKASI_ID']; ?>">
                                                                            <?php echo $showl['LOKASI_NAMA']; ?>
                                                                        </option>

                                                                        <?php }
																						}
																						?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select name="status" class="form-control">
                                                                        <option
                                                                            <?php if ($show['DATA_STATUS'] == "Terbayar") echo 'selected' ; ?>
                                                                            value="Terbayar">Terbayar</option>
                                                                        <option
                                                                            <?php if ($show['DATA_STATUS'] == "Belum Terbayar") echo 'selected' ; ?>
                                                                            value="Belum Terbayar">Belum Terbayar
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="submit"
                                                                        class="form-control btn btn-primary"
                                                                        style="color:white;" name="updatedata" />
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <?php
												}
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
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
            <footer class="footer">
                © 2017 Material Pro Admin by wrappixel.com
            </footer>
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
    <?php
	include "koneksi.php";

	if (isset($_POST["updatedata"])) {
		$nama_kendaraan = $_POST['nama_kendaraan'];
		$nama_user = $_POST['nama_user'];
		$nama_vendor = $_POST['nama_vendor'];
		$nama_material = $_POST['nama_material'];
		$nama_lokasi = $_POST['nama_lokasi'];
		$status = $_POST['status'];
		$data_id = $_POST['data_id'];
		$tanggal_id = $_POST['tanggal_id'];
		$vendor_nama = $_POST['vendor_nama'];
		if($status=="Terbayar"){
			$apiURL = 'https://eu94.chat-api.com/instance83869/';
			$token = '9tr5ve0awz8rjvio';

			$message = '-CV.Parblu- Pengiriman dari vendor '.$vendor_nama.' pada tanggal '.$tanggal_id.' dengan ID Pengiriman '.$data_id.' telah terbayar.';
			$phone = '62895348096044';

			$data = json_encode(
				array(
					'chatId'=>$phone.'@c.us',
					'body'=>$message
				)
			);
			$url = $apiURL.'message?token='.$token;
			$options = stream_context_create(
				array('http' =>
					array(
						'method'  => 'POST',
						'header'  => 'Content-type: application/json',
						'content' => $data
					)
				)
			);
			$response = file_get_contents($url,false,$options);
		}
		$queryex = mysqli_query($mysqli, "UPDATE data SET KENDARAAN_ID='$nama_kendaraan', USER_ID='$nama_user', VENDOR_ID='$nama_vendor', MATERIAL_ID='$nama_material', LOKASI_ID='$nama_lokasi', DATA_STATUS='$status' WHERE DATA_ID='$data_id'") or die("Sql salah : " . mysqli_error($mysqli));
		if ($queryex) {
			echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
			echo "<script>document.location = 'rekapdata.php';</script>";
		} else {
			echo "<script type='text/javascript'> alert('Maaf gagal meng-update data !!!') </script>";
			echo '<script>window.history.back()</script>';
		}
	}

	?>
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
</body>

</html>