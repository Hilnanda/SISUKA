<?php 

    // session_start();

    // if (!isset($_SESSION['ID_USER'])) {
    //     header("Location: ../login.php");
    // }
    include '../utama/koneksi.php';

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

  </head>
  <body>


    <div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
		
			 <!-- <a id="modal-535559" href="#modal-container-535559" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
			
			<div class="modal fade" id="modal-container-535559" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="myModalLabel">
								Modal title
							</h5> 
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form role="form">
								<div class="form-group">
									 
									<label for="exampleInputEmail1">
										Email address
									</label>
									<input type="email" class="form-control" id="exampleInputEmail1">
								</div>
								<div class="form-group">
									 
									<label for="exampleInputPassword1">
										Password
									</label>
									<input type="password" class="form-control" id="exampleInputPassword1">
								</div>
								<div class="form-group">
									 
									<label for="exampleInputFile">
										File input
									</label>
									<input type="file" class="form-control-file" id="exampleInputFile">
									<p class="help-block">
										Example block-level help text here.
									</p>
								</div>
								<div class="checkbox">
									 
									<label>
										<input type="checkbox"> Check me out
									</label>
								</div> 
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
							</form>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-primary">
								Save changes
							</button> 
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Close
							</button>
						</div>
					</div>
					
				</div>
				
			</div> -->
			<form action="">
    <table>
        <tr><td>ID</td><td> <select onchange="cek_database()" id="id">
    <option value='' selected>- Pilih -</option>
    <?php
	
											$query = mysqli_query($mysqli, "SELECT * FROM kendaraan");
                                            $hasil = mysqli_query($mysqli, "SELECT * FROM kendaraan");

                                            $row = mysqli_num_rows($hasil);
                                            if ($row==0) {
                                                echo "Data kosong!";
                                            }else{

                                            while ($show = mysqli_fetch_array($query)) {
										?>

	<option value="<?php echo $show['NOPOL']; ?>"><?php echo $show['NOPOL']; ?></option>
<?php

		}
        }
    ?>
    </select></td></tr>
        <tr><td>Nama Karyawan</td><td> <input type="text" id="nama_karyawan"></td></tr>
        <tr><td>Jenis Kelamin</td><td><input type="radio" name="jenis_kelamin" value="laki-laki"/> Laki-laki
            <input type="radio" name="jenis_kelamin" value="perempuan"/>Perempuan</td></tr>
        <tr><td>Alamat</td><td> <textarea id="address" style='width:300px'></textarea></td></tr>
    </table>
</form>
			
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function cek_database(){
        var id = $("#id").val();
        $.ajax({
            url: 'ajax.php',
            data:"id="+id ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama_karyawan').val(obj.nama_karyawan);
            $('#address').val(obj.address);
 
            var $jenis_kelamin = $('input:radio[name=jenis_kelamin]');
        if(obj.jenis_kelamin == 'laki-laki'){
            $jenis_kelamin.filter('[value=laki-laki]').prop('checked', true);
        }else{
            $jenis_kelamin.filter('[value=perempuan]').prop('checked', true);
        }
        });
    }
</script>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>