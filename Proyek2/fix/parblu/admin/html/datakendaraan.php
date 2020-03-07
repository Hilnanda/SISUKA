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
						<h3 class="text-themecolor m-b-0 m-t-0">Data Kendaraan</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="javascript:void(0)">Data</a>
							</li>
							<li class="breadcrumb-item active">Kendaraan</li>
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
							<a id="modal-990150" class="mt-3 ml-3" href="#modal-container-990150" role="button" data-toggle="modal">
								<button class=" btn btn-success">Tambah Data Kendaraan</button>
							</a>
							<div class="modal fade" id="modal-container-990150" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel">
												Tambah Data Kendaraan
											</h5>
											<button type="button" class="close" data-dismiss="modal">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<form role="form" method="post" action="">
												<div class="form-group">
													<label>Nomor Polisi</label>
													<input type="text" class="form-control" name="nopol" required/>
												</div>
												<div class="form-group">
													<label>Panjang Kendaraan (cm)</label>
													<input type="number" class="form-control" name="panjang_kendaraan" required/>
												</div>
												<div class="form-group">
													<label>Lebar Kendaraan (cm)</label>
													<input type="number" class="form-control" name="lebar_kendaraan" required/>
												</div>
												<div class="form-group">
													<label>Tinggi Kendaraan (cm)</label>
													<input type="number" class="form-control" name="tinggi_kendaraan" required/>
												</div>
												<div class="form-group">
													<input type="submit" class="form-control btn btn-primary" style="color:white;" name="addKendaraan" />
												</div>

											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" data-dismiss="modal">
												Close
											</button>
										</div>
									</div>

								</div>
							</div>
							<div class="card-block">
								<h4 class="card-title">Kendaraan Tabel</h4>

								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Kendaraan ID</th>
												<th>Nomor Polisi</th>
												<th>Panjang Kendaraan (cm)</th>
												<th>Lebar Kendaraan (cm)</th>
												<th>Tinggi Kendaraan (cm)</th>
												<th>Method</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query = mysqli_query($mysqli, "SELECT * FROM kendaraan");			
												
												$row = mysqli_num_rows($query);
												if ($row==0) {
													echo "Data kosong!";
												}else{
													while($show = mysqli_fetch_array($query)){

													
											?>
											<tr>
												<td>
													<?php echo $show['KENDARAAN_ID']; ?>
												</td>
												<td>
													<?php echo $show['NOPOL']; ?>
												</td>
												<td>
													<?php echo $show['PANJANG_KENDARAAN']; ?>
												</td>
												<td>
													<?php echo $show['LEBAR_KENDARAAN']; ?>
												</td>
												<td>
													<?php echo $show['TINGGI_KENDARAAN']; ?>
												</td>
												<td>
													<a id="modal-990160" href="#modal-container-990160<?php echo $show['KENDARAAN_ID']; ?>"
													 role="button" data-toggle="modal">
														<button class="btn btn-success" onclick="myFunction()"><i class="mdi mdi-grease-pencil"></i></button>
													</a>

													<a href="deletekendaraan.php?KENDARAAN_ID=<?php echo $show['KENDARAAN_ID']; ?>">
														<button class="btn btn-danger"><i class="mdi mdi-cup"></i></button>
													</a>
												</td>
											</tr>
											<div class="modal fade" id="modal-container-990160<?php echo $show['KENDARAAN_ID'];?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Edit Data Kendaraan
                                                </h5> 
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="post" action="">
                                                    <div class="form-group">
                                                        <label>Nomor Polisi</label>
                                                        <input type="text" class="form-control" name="nopol" value="<?php echo $show['NOPOL']; ?>" />
                                                        <input type="hidden" class="form-control" name="kendaraan_id" value="<?php echo $show['KENDARAAN_ID']; ?>" />
                                                    </div>
													<div class="form-group">
                                                        <label>Panjang Kendaraan (cm)</label>
                                                        <input type="number" class="form-control" name="panjang_kendaraan" value="<?php echo $show['PANJANG_KENDARAAN']; ?>" />
                                                    </div>
													<div class="form-group">
                                                        <label>Lebar Kendaraan (cm)</label>
                                                        <input type="number" class="form-control" name="lebar_kendaraan" value="<?php echo $show['LEBAR_KENDARAAN']; ?>" />
                                                    </div>
													<div class="form-group">
                                                        <label>Tinggi Kendaraan (cm)</label>
                                                        <input type="number" class="form-control" name="tinggi_kendaraan" value="<?php echo $show['TINGGI_KENDARAAN']; ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-primary" style="color:white;" name="updatekendaraan" />
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
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
            if (isset($_POST["addKendaraan"])) {
				$nopol = $_POST['nopol'];
				$panjang_kendaraan = $_POST['panjang_kendaraan'];
				$lebar_kendaraan = $_POST['lebar_kendaraan'];
				$tinggi_kendaraan = $_POST['tinggi_kendaraan'];
                $query = mysqli_query($mysqli, "INSERT INTO kendaraan VALUES(NULL, '$nopol', $panjang_kendaraan, $lebar_kendaraan, $tinggi_kendaraan)") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                    echo "<script>document.location = 'datakendaraan.php';</script>";
                }else{
                    echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                    echo '<script>window.history.back()</script>';
                }
            }

        ?>
	<?php 
        include "koneksi.php";
        
            if (isset($_POST["updatekendaraan"])) {
                $nopol = $_POST['nopol'];
				$panjang_kendaraan = $_POST['panjang_kendaraan'];
				$lebar_kendaraan = $_POST['lebar_kendaraan'];
				$tinggi_kendaraan = $_POST['tinggi_kendaraan'];
				$kendaraan_id = $_POST['kendaraan_id'];
                $query = mysqli_query($mysqli, "UPDATE kendaraan SET NOPOL='$nopol', PANJANG_KENDARAAN=$panjang_kendaraan, LEBAR_KENDARAAN=$lebar_kendaraan, TINGGI_KENDARAAN=$tinggi_kendaraan WHERE KENDARAAN_ID='$kendaraan_id'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'datakendaraan.php';</script>";
                }else{
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