<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					
					<a href="Home Page/index.php"><span><i class="fab fa fa-home"></i></span></a>
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name="username" id="inputEmail" type="text" class="form-control" placeholder="Username" required autofocus>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="password" type="password" class="form-control" placeholder="Password" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn float-right login_btn">
					</div>
				</form>
				<?php 

        if (isset($_POST["login"])) {
            // $username = htmlentities(strip_tags(trim($_POST["username"])));
            // $password = htmlentities(strip_tags(trim($_POST["password"])));

            include ("admin/koneksi.php");
            // $username = mysqli_real_escape_string($mysqli, $username);
            // $password = mysqli_real_escape_string($mysqli, $password);
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $hasil = mysqli_query($mysqli, $query);
            $row = mysqli_num_rows($hasil);
            $data = mysqli_fetch_array($hasil);
            if($row==1){
                
              if ($data['USER_LVL']==1) {
                session_start();
                $_SESSION['ID_USER'] = $data['ID_USER'];
                echo "<script>alert('Anda berhasil login');</script>";
                echo "<script>document.location = 'admin/index.php';</script>";
              }else if($data['USER_LVL']==2){
								session_start();
                $_SESSION['ID_USER'] = $data['ID_USER'];
                echo "<script>alert('Anda berhasil login user');</script>";
                echo "<script>document.location = 'Home Page/index.php';</script>";
                // session_start();
                // $_SESSION['id_user'] = $data['id_user'];
                // echo "<script>alert('Anda berhasil login');</script>";
                // echo "<script>document.location = 'user_cover.php';</script>";
              } else if($data['USER_LVL']==3){
								session_start();
                $_SESSION['ID_USER'] = $data['ID_USER'];
                echo "<script>alert('Anda berhasil login Penyervis');</script>";
                echo "<script>document.location = 'admin_kang_servis/index.php';</script>";
                // session_start();
                // $_SESSION['id_user'] = $data['id_user'];
                // echo "<script>alert('Anda berhasil login');</script>";
                // echo "<script>document.location = 'user_cover.php';</script>";
              } else if($data['USER_LVL']==4){
								session_start();
                $_SESSION['ID_USER'] = $data['ID_USER'];
                echo "<script>alert('Anda berhasil login Pengelolah Toko');</script>";
                echo "<script>document.location = 'admin_toko/index.php';</script>";
                // session_start();
                // $_SESSION['id_user'] = $data['id_user'];
                // echo "<script>alert('Anda berhasil login');</script>";
                // echo "<script>document.location = 'user_cover.php';</script>";
              }                           
            }else{
                echo "<script>alert('Anda gagal login');</script>";
                echo "<script>document.location = 'Login.php';</script>";
            }
            mysqli_free_result($hasil);
            mysqli_close($mysqli);


        }

 ?>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?
					<a href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a>
					
				</div>
				<div class="d-flex justify-content-center">
					<!-- <a href="#">Forgot your password?</a> -->
				</div>
				<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form role="form" method="post" action="">
      <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="NAMA_USER" />
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="USERNAME" />
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Password
                                            </label>
                                            <input type="password" class="form-control" name="PASSWORD" />
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <input type="radio" class="" name="JENIS_KELAMIN" value="Laki-Laki" />
                                            Laki-Laki <input type="radio" class="" name="JENIS_KELAMIN"
                                                value="Perempuan" /> Perempuan
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="EMAIL" />
                                        </div>
                                        <div class="form-group">
                                            <label>No Hp</label>
                                            <input type="text" class="form-control" name="NO_HP" />
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="ALAMAT_USER"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <select name="ID_KEC" class="form-control">


                                                <?php 
                                                  include ("admin/koneksi.php");
                                                        $query = mysqli_query($mysqli, "SELECT * FROM kec");
                                                        $hasil = mysqli_query($mysqli, "SELECT * FROM kec");

                                                        //perintah menampilkan semua stok di tabel jual dengan perulangan
                                                        $row = mysqli_num_rows($hasil);
                                                        if ($row==0) {
                                                            echo "Data kosong!";
                                                        }else{


                                                        while ($show = mysqli_fetch_array($query)) {
                                                            # code...
                                                         ?>
                                                <option value="<?php echo $show['ID_KEC']; ?>">
                                                    <?php echo $show['NAMA_KEC']; ?></option>

                                                <?php }
                                                         }
                                                          ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Pengguna</label>
                                            <select name="USER_LEVEL" class="form-control">


                                                <?php 
                                                  include ("admin/koneksi.php");
                                                        $query = mysqli_query($mysqli, "SELECT * FROM level_pengguna where USER_LEVEL > 1");
                                                        $hasil = mysqli_query($mysqli, "SELECT * FROM level_pengguna where USER_LEVEL > 1");

                                                        //perintah menampilkan semua stok di tabel jual dengan perulangan
                                                        $row = mysqli_num_rows($hasil);
                                                        if ($row==0) {
                                                            echo "Data kosong!";
                                                        }else{


                                                        while ($show = mysqli_fetch_array($query)) {
                                                            # code...
                                                         ?>
                                                <option value="<?php echo $show['USER_LEVEL']; ?>">
                                                    <?php echo $show['HAK_USER']; ?></option>

                                                <?php }
                                                         }
                                                          ?>
                                            </select>
                                        </div>
              
               <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" name="adduser" />
              </div>
              
            </form>
      </div>

      

    </div>
  </div>
</div>
			</div>
		</div>
	</div>
</div>

<?php 
    include "admin/koneksi.php";
    if (isset($_POST["adduser"])) {
      $NAMA_USER = $_POST['NAMA_USER'];
      $USERNAME = $_POST['USERNAME'];
      $PASSWORD = $_POST['PASSWORD'];
      $JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
      $EMAIL = $_POST['EMAIL'];
      $NO_HP = $_POST['NO_HP'];
      $ID_KEC = $_POST['ID_KEC'];
      $ALAMAT_USER = $_POST['ALAMAT_USER'];
      // $new_date = date('Y-m-d',strtotime($date));
      $JENIS_USER = $_POST['USER_LEVEL'];
      $query = mysqli_query($mysqli, "INSERT INTO user VALUES(NULL,'$NAMA_USER','$USERNAME','$PASSWORD', '$ALAMAT_USER','$ID_KEC' ,'$JENIS_KELAMIN' , '$EMAIL','$NO_HP' ,'$JENIS_USER')") or die ("Sql salah : ".mysqli_error($mysqli));
      if($query){
          echo "<script type='text/javascript'> alert('Berhasil meng-upload data') </script>";
          echo "<script>document.location = 'login.php';</script>";
      }else{
          echo "<script type='text/javascript'> alert('Maaf gagal meng-upload data !!!') </script>";
          echo '<script>window.history.back()</script>';
      }
  }

    ?>
</body>
</html>