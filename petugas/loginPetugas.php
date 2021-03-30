<?php
	session_start();
	if ($_SESSION['login'] == 'admin') {
		header("Location: verifikasiLaporan.php");
		exit;
	}
	if (isset($_POST['username']) AND isset($_POST['password'])) {
		include '../koneksi.php';

		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM petugas WHERE username = '$username' AND password ='$password'";
		$execQuery = mysqli_query($konek, $query);
		$getData = mysqli_fetch_all($execQuery, MYSQLI_ASSOC);
		$numRow = mysqli_num_rows($execQuery);
		$_SESSION['idPetugas'] = $getData[0]['id_petugas'];
		
		if ($numRow === 1) {
			echo "<script>alert('Login Successfully')</script>";
			$_SESSION['login'] = "admin";
			header("Location: verifikasiLaporan.php");
			exit();
		}else{
			echo "<script>alert('Login unsuccessfully')</script>";
			header("Location: loginPetugas.php");
			exit;
		}
	}	
?>

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
    	<form action="" method="post">
			<input type="text" autocomplete="off" name="username" placeholder="username">
			<input type="password" name="password" placeholder="password">
			<input type="submit" name="login" value="Login">
		</form>
      	<script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>