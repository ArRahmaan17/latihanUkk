<?php
	session_start();
	if ($_SESSION['login'] == 'masyarakat') {
			if(isset($_POST['register'])){
			include '../koneksi.php';

			$nik = $_SESSION['nik'];
			$laporan = $_POST['laporan'];
			$namefoto = rand(1,10000)."-".$_FILES['fotolaporan']['name'];
			$namefoto = str_replace(' ','', $namefoto);
			$tmp_name = $_FILES['fotolaporan']['tmp_name'];
			move_uploaded_file($tmp_name, "foto_pengaduan/".$namefoto);

			$query = "INSERT INTO pangaduan VALUES (null,now(),'$nik','$laporan','$namefoto','0')";


			$exec=mysqli_query($konek, $query);

			if( $exec){ 
				echo "<script>alert('Laporan telah terkirim')</script>";
			}
			else{
				echo "<script>alert('Laporan gagal di kirim')</script>";
			}
		}
	}else{
		header("Location:loginMasyarakat.php");
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Title of the document</title>
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
      <link rel="stylesheet" type="text/css" href="../css/materialize.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body class="container">
		<nav>
		    <div class="nav-wrapper">
		      <a href="#" class="brand-logo center">Logo</a>
		      <ul id="nav-mobile" class="left hide-on-med-and-down">
		        <li><a href="">Sass</a></li>
		        <li><a href="">Components</a></li>
		        <li><a href="">JavaScript</a></li>
		      </ul>
		    </div>
		</nav>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="row">
		        <div class="input-field col s12">
		          <textarea autocomplete="off" name="laporan" id="textarea1" class="materialize-textarea"></textarea>
		          <label for="textarea1">Textarea</label>
		        </div>
      		</div>
			<input type="file" name="fotolaporan" accept="image/png, image/jpeg" ><br>
			<input type="submit" name="register" value="Lapor">
		</form>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html> 