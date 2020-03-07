<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Servis-in</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <!-- <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Website</a></li> -->
    </ul>

    <ul class="nav navbar-right navbar-top-links">

        <li class="dropdown">
            <?php 
                        include 'koneksi.php';
                            $perintah = mysqli_query($mysqli, "SELECT * from user WHERE ID_USER='$_SESSION[ID_USER]'");
                            $result = mysqli_fetch_array($perintah);

                        ?>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo $result['USERNAME']; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <img src="fav.png" class="img img-responsive" width="auto" height="100">
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="datauser.php"><i class="fa fa-users fa-fw"></i> Data Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>