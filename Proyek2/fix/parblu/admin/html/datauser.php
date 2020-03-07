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
						<h3 class="text-themecolor m-b-0 m-t-0">Data Group Users</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="javascript:void(0)">Data</a>
							</li>
							<li class="breadcrumb-item active">Group Users</li>
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
								<button class=" btn btn-success">Tambah Data Users</button>
							</a>
							<div class="modal fade" id="modal-container-990150" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel">
												Tambah Data User
											</h5>
											<button type="button" class="close" data-dismiss="modal">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<form role="form" method="post" action="" enctype="multipart/form-data">
												<div class="form-group">
													<label>Jenis User</label>
													<select name="jenis_user" class="form-control">


														<?php 

                                                        $query = mysqli_query($mysqli, "SELECT * FROM groupuser");

                                                        //perintah menampilkan semua stok di tabel jual dengan perulangan
                                                        $row = mysqli_num_rows($query);
                                                        if ($row==0) {
                                                            echo "Data kosong!";
                                                        }else{


                                                        while ($show = mysqli_fetch_array($query)) {
                                                            # code...
                                                         ?>
														<option value="<?php echo $show['GROUP_ID']; ?>">
															<?php echo $show['JENIS_USER']; ?>
														</option>

														<?php }
                                                         }
                                                          ?>
													</select>
												</div>
												<div class="form-group">
													<label>Username</label>
													<input type="text" class="form-control" name="username" required/>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" class="form-control" name="password" required/>
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="email" class="form-control" name="email" required/>
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jenis_kelamin" class="form-control" required>
														<option value="Laki-laki">Laki-laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Alamat</label>
													<textarea name="alamat" class="form-control" required></textarea>
												</div>
												<div class="form-group">
													<label>No. HP</label>
													<input type="number" class="form-control" name="no_hp" required/>
												</div>
												<div class="form-group">
													<label>Foto KTP</label>
													<input type="file" class="form-control" name="file" required/>
												</div>
												<div class="form-group">
													<input type="submit" class="form-control btn btn-primary" style="color:white;" name="addUser" />
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
								<h4 class="card-title">Users Tabel</h4>

								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>User ID</th>
												<th>Group ID</th>
												<th>Username</th>
												<th>Password</th>
												<th>Email</th>
												<th>Alamat</th>
												<th>No. Hp</th>
												<th>Foto Ktp</th>
												<th>Jenis Kelamin</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query1 = mysqli_query($mysqli, "SELECT * FROM user as u
												inner join groupuser as g
												on u.GROUP_ID = g.GROUP_ID");			
												
												$row = mysqli_num_rows($query1);
												if ($row==0) {
													echo "Data kosong!";
												}else{
													while($data = mysqli_fetch_array($query1)){
														

													
											?>
											<tr>
												<td>
													<?php echo $data['USER_ID']; ?>
												</td>
												<td>
													<?php echo $data['JENIS_USER']; ?>
												</td>
												<td>
													<?php echo $data['USERNAME']; ?>
												</td>
												<td>
													<?php echo $data['PASSWORD']; ?>
												</td>
												<td>
													<?php echo $data['EMAIL']; ?>
												</td>
												<td>
													<?php echo $data['ALAMAT']; ?>
												</td>
												<td>
													<?php echo $data['NO_HP']; ?>
												</td>

												<td>
													<img src="<?php echo $data['FOTO_KTP']; ?>" height="100px" width="auto">
												</td>
												<td>
													<?php echo $data['JENIS_KELAMIN']; ?>
												</td>
												<td>
													<a id="modal-990160" href="#modal-container-990160<?php echo $data['USER_ID']; ?>"
													 role="button" data-toggle="modal">
														<button class="btn btn-success" onclick="myFunction()">
															<i class="mdi mdi-grease-pencil"></i>
														</button>
													</a>

													<a href="deleteuser.php?USER_ID=<?php echo $data['USER_ID']; ?>">
														<button class="btn btn-danger">
															<i class="mdi mdi-cup"></i>
														</button>
													</a>
												</td>
											</tr>
											

											<div class="modal fade" id="modal-container-990160<?php echo $data['USER_ID'];?>"
											 role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="myModalLabel">
																Edit Data Group User
															</h5>
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<form role="form" method="post" action="">
																<div class="form-group">
																	<label>Jenis User</label>
																	<input type="hidden" class="form-control" name="user_id" value="<?php echo $data['USER_ID']; ?>"/>																	
																	<select name="jenis_user" class="form-control">


																		<?php 

																				$query = mysqli_query($mysqli, "SELECT * FROM groupuser");

																				//perintah menampilkan semua stok di tabel jual dengan perulangan
																				$row = mysqli_num_rows($query);
																				if ($row==0) {
																					echo "Data kosong!";
																				}else{


																				while ($tam = mysqli_fetch_array($query)) {
																					# code...
																				?>
																								<option <?php if ($data['GROUP_ID'] == $tam['GROUP_ID']) echo 'selected' ; ?> value="<?php echo $tam['GROUP_ID']; ?>">
																									<?php echo $tam['JENIS_USER']; ?>
																								</option>

																								<?php }
																				}
																				?>
																	</select>
																</div>
																<div class="form-group">
																	<label>Username</label>
																	<input type="text" class="form-control" name="username" value="<?php echo $data['USERNAME']; ?>"/>
																</div>
																<div class="form-group">
																	<label>Password</label>
																	<input type="password" class="form-control" name="password" value="<?php echo $data['PASSWORD']; ?>"/>
																</div>
																<div class="form-group">
																	<label>Email</label>
																	<input type="email" class="form-control" name="email" value="<?php echo $data['EMAIL']; ?>"/>
																</div>
																<div class="form-group">
																	<label>Jenis Kelamin</label>
																	<select name="jenis_kelamin" class="form-control">
																		<option <?php if ($data['JENIS_KELAMIN'] == "Laki-laki") echo 'selected' ; ?> value="Laki-laki">Laki-laki</option>
																		<option <?php if ($data['JENIS_KELAMIN'] == "Perempuan") echo 'selected' ; ?> value="Perempuan">Perempuan</option>
																	</select>
																</div>
																<div class="form-group">
																	<label>Alamat</label>
																	<textarea name="alamat" class="form-control"><?php echo $data['ALAMAT']; ?></textarea>
																</div>
																<div class="form-group">
																	<label>No. HP</label>
																	<input type="number" class="form-control" name="no_hp" value="<?php echo $data['NO_HP']; ?>"/>
																</div>
														

																<div class="form-group">
																	<input type="submit" class="form-control btn btn-primary" style="color:white;" name="updateuser" />
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
            if (isset($_POST["addUser"])) {
                $jenis_user = $_POST['jenis_user'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $no_hp = $_POST['no_hp'];
                $alamat = strip_tags($_POST['alamat']);
                // echo "<script type='text/javascript'> alert('haha') </script>";
                $code = $_FILES['file']['error'];
                if ($code === 0) {
                    $nama_folder="images/foto";
                    $nama_file = $_FILES['file']['name'];
                    $file_ext   = pathinfo($nama_file, PATHINFO_EXTENSION);
                    $path = "$nama_folder/$username.$file_ext";
                    $file_tmp   = $_FILES['file']['tmp_name'];
                    $tipe_file=array("image/jpeg", "image/gif", "image/png");
                    if (!in_array($_FILES['file']['type'], $tipe_file)) {
                        echo "<script type='text/javascript'> alert('Cek kembali ekstensi file anda (*.jpeg, *.jpg, *.gif, *.png, *.JPEG, *.JPG, *.GIF, *.PNG)') </script>";
                        echo "<script>document.location = 'datauser.php';</script>";
                    }else{
                        $move = move_uploaded_file($file_tmp, $path);
                        $query = mysqli_query($mysqli, "INSERT INTO user VALUES(NULL, '$jenis_user', '$username', '$password', '$email','$alamat','$no_hp', '$path', '$jenis_kelamin' )") or die ("Sql salah : ".mysqli_error($mysqli));
                        if($query){
                            echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
                            echo "<script>document.location = 'datauser.php';</script>";
                        }else{
                            echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
                            echo '<script>window.history.back()</script>';
                        }
                    }   
                }else if ($code===4) {
                    echo "Upload gagal karena tidak ada yang di upload";
                }
                
                
                
                
            }

        ?>
	<?php 
        include "koneksi.php";
        
            if (isset($_POST["updateuser"])) {
                $jenis_user = $_POST['jenis_user'];
                $username = $_POST['username'];
                $user_id = $_POST['user_id'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $no_hp = $_POST['no_hp'];
                $alamat = strip_tags($_POST['alamat']);
                $query = mysqli_query($mysqli, "UPDATE user SET GROUP_ID='$jenis_user', USERNAME='$username', PASSWORD='$password', EMAIL='$email', ALAMAT='$alamat', NO_HP='$no_hp', JENIS_KELAMIN='$jenis_kelamin' WHERE USER_ID='$user_id'") or die ("Sql salah : ".mysqli_error($mysqli));
                if($query){
                    echo "<script type='text/javascript'> alert('Berhasil meng-update data') </script>";
                    echo "<script>document.location = 'datauser.php';</script>";
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