<?php 
	if (isset($_POST['register'])){
		
		include '../koneksi.php';

		$id = $_POST['id_petugas'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$telp = $_POST['telp'];
		$level = $_POST['level'];

		$query = "INSERT INTO petugas VALUES('$id','$nama','$username','$password','$telp','$level')";

		$exec = mysqli_query($konek, $query);

		if($exec){
			echo "<script >alert('record added')</script>";
			header("Location:../petugas/loginPetugas.php");
			exit;
		}else{
			echo "<script >alert('record can't added')</script>";
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
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
		<form action="" method="post">
			<input type="text" name="id_petugas" placeholder="id_petugas"><br>
			<input type="text" name="nama" placeholder="nama"><br>
			<input type="text" name="username" placeholder="username"><br>
			<input type="password" name="password" placeholder="password"><br>
			<input type="number" name="telp" placeholder="telephone"><br>
			<div class="input-field col s12">
				<select name="level">
			    	<option value="petugas">Option 1</option>
			    	<option value="admin">Option 2</option>
			   		</select>
			    	<label>Materialize Select</label>
			  </div>
			<input type="submit" name="register" value="Daftar">
		</form>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>

	</body>
</html> 