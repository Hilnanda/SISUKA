<?php 
    include '../admin/koneksi.php';
    session_start();
    error_reporting(0);
    $kecamatan = mysqli_query($mysqli, "SELECT * FROM user WHERE ID_USER = '$_SESSION[ID_USER]' ");
    $show_kecamatan = mysqli_fetch_array($kecamatan);
    $kang_servis = mysqli_query($mysqli,"SELECT * FROM kang_servis AS k INNER JOIN user AS u ON k.ID_USER = u.ID_USER WHERE u.USER_LVL = 3 AND u.ID_KEC = '$show_kecamatan[ID_KEC]'");
    $toko_servis = mysqli_query($mysqli,"SELECT * FROM toko_servis  AS k INNER JOIN user AS u ON k.ID_USER = u.ID_USER WHERE u.USER_LVL = 4 AND u.ID_KEC = '$show_kecamatan[ID_KEC]'");
	?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>SERVIS-IN</title>

	<!--
            CSS
            ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="category">

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/fav.png" alt="" style="padding-right: 10px"><b>SERVIS-IN</b></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item submenu dropdown active">
								<a href="category.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Toko & Tukang </a>
								
							</li>
							
							<?php 
                    include '../admin/koneksi.php';
                    

                    if (!isset($_SESSION['ID_USER'])) {
                        
                    

                ?>
                <li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="../login.php">Login</a></li>
									
								</ul>
                            </li>
                <?php
                    }else{

                    
                    
                ?>
                <li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
									
								</ul>
                            </li>
                <?php
                    }
                ?>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
							<?php 
                    include '../admin/koneksi.php';

                    if (isset($_SESSION['ID_USER'])) {
                        
                    

                ?>
							<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
							<?php
					}
							?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Toko & Tukang Service</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
    <?php 
         if (isset($_SESSION['ID_USER'])) {
    ?>
    
	<section class="owl-carousel active-product-area section_gap">
		
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Toko Service</h1>
						
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<?php 
						while ($show_toko_servis = mysqli_fetch_array($toko_servis)) {
                            
					?>
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
                        <img src="../admin_toko/images/<?php echo $show_toko_servis['FOTO_TOKO']; ?>" height="250px" width="250px">
							<div class="product-details">
								<h3><?php echo $show_toko_servis['NAMA_TOKO'];?></h3>
								<div class="price">
									<h6>Deskripsi Toko : <?php echo $show_toko_servis['DESKRIPSI_TOKO'];?></h6>
									<h6 >No HP : <?php echo $show_toko_servis['NO_HP'];?></h6>
								</div>
								<div class="col-md-9">
                                <div class="blog_post">
								<a href="pesan2.php?ID_TOKO=<?php echo $show_toko_servis['ID_TOKO'];?>" class="white_bg_btn" >Order</a>

                                </div>
                            </div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<?php
                        
                    }
                    ?>
					
					
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Tukang Service</h1>
						</div>
					</div>
				</div>
				<div class="row">
                    <?php
                        while ($show_kang_servis = mysqli_fetch_array($kang_servis)) {
                            $kategori = mysqli_query($mysqli, "SELECT * FROM kategori_servis WHERE ID_KATEGORI = '$show_kang_servis[ID_KATEGORI]' ");
                            while ($show_kategori = mysqli_fetch_array($kategori)) {
                    ?>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
                        <img src="../admin_kang_servis/images/<?php echo $show_kang_servis['FOTO_KANG']; ?>" height="250px" width="250px">
							<div class="product-details">
								<h3><?php echo $show_kang_servis['NAMA_USER'];?></h3>
								<div >
									<h6>Bidang Keahlian : <?php echo $show_kategori['NAMA_KATEGORI'];?></h6>
									<h6 class="l-through">No HP : <?php echo $show_kang_servis['NO_HP'];?></h6>
								</div>
								<div class="col-md-9">
                                <div class="blog_post">
								<a href="pesan.php?ID_KANG=<?php echo $show_kang_servis['ID_KANG'];?>" class="white_bg_btn" >Order</a>
										
                                </div>
                            </div>
							</div>
						</div>
					</div>
                    <?php
                        }
                    }
                    ?>
					
					
				</div>
			</div>
		</div>
	</section>
     <?php
         } else {
    ?>
    <div class="container-fluid" style="margin-bottom: 50px ">
            <div class="row" >
                <h2 style="margin-left: 600px">Harus Login Terlebih Dahulu</h2>
            </div>
    </div>
    <?php
         }
    ?>
	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
			
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> SERVIS-IN Developers
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="../js/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>