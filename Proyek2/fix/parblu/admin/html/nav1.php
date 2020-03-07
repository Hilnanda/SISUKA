<header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                            <img src="parblu.png" style="height: 50px" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         
                         <!-- Light Logo text -->    
                         <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a> -->
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> 
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/user.png" alt="user" class="profile-pic m-r-10" />
                                <?php echo $showUser['USERNAME'];?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                <ul id="sidebarnav">
		<li>
			<a class="waves-effect waves-dark" href="index.php" aria-expanded="false">
				<i class="mdi mdi-gauge"></i>
				<span class="hide-menu">Dashboard</span>
			</a>
		</li>
		<li>
			<a class="waves-effect waves-dark" href="datagroup.php" aria-expanded="false">
				<i class="mdi mdi-account-multiple"></i>
				<span class="hide-menu">Data Group Users</span>
			</a>
		</li>
		<li>
			<a class="waves-effect waves-dark" href="datauser.php" aria-expanded="false">
				<i class="mdi mdi-account"></i>
				<span class="hide-menu">Data Users</span>
			</a>
		</li>
		<li>
			<a class="waves-effect waves-dark" href="datavendor.php" aria-expanded="false">
				<i class="mdi mdi-google-circles-communities"></i>
				<span class="hide-menu">Data Vendor</span>
			</a>
        </li>
        <li>
			<a class="waves-effect waves-dark" href="datamaterial.php" aria-expanded="false">
				<i class="mdi mdi-fire"></i>
				<span class="hide-menu">Data Material</span>
			</a>
        </li>
        <li>
			<a class="waves-effect waves-dark" href="datalokasibongkar.php" aria-expanded="false">
				<i class="mdi mdi-map-marker-radius"></i>
				<span class="hide-menu">Data Lokasi Bongkar</span>
			</a>
        </li>
        <li>
			<a class="waves-effect waves-dark" href="datakendaraan.php" aria-expanded="false">
				<i class="mdi mdi-motorbike"></i>
				<span class="hide-menu">Data Kendaraan</span>
			</a>
        </li>
        <hr>
		<li>
			<a class="waves-effect waves-dark" href="rekapdata.php" aria-expanded="false">
            <i class="mdi mdi-table"></i>
                <span class="hide-menu">Tabel Rekapan</span>
                
			</a>
		</li>
		<li>
			<a class="waves-effect waves-dark" href="datalaporan.php" aria-expanded="false">
            <i class="mdi mdi-database"></i>
				<span class="hide-menu">Data Laporan</span>
			</a>
		</li>
	</ul>
                    <div class="text-center m-t-30">
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a style="margin-left: 70px;" href="../../logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i>Logout</a> </div>
            <!-- End Bottom points-->
        </aside>