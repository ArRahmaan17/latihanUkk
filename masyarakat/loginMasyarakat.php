<?php
session_start();
if (isset($_SESSION['login'])) {
	header('Location:pengaduanMasyarakat.php');
	exit;
}
// cek apakah user dan password ada nilai nya
if (isset($_POST['username']) AND isset($_POST['password'])) {
	// koneksi database 
	include '../koneksi.php';

	// query login 
	$query = "SELECT * FROM masyarakat WHERE username = '".$_POST['username']."' AND password ='".$_POST['password']."';";
	// execute query login
	$execQuery = mysqli_query($konek, $query);
	// mengambil data dari execute query login
	$getData = mysqli_fetch_all($execQuery, MYSQLI_ASSOC);

	$numRow = mysqli_num_rows($execQuery);

	$_SESSION['nik'] = $getData[0]['nik'];

	$_SESSION['login'] = 'masyarakat';

	// logik login success atau unsuccesss

	if ($numRow === 1) {
		echo "<script>alert('Login Successfully')</script>";
		header("location:pengaduanMasyarakat.php");
		exit;
	}else{
		echo "<script>alert('Login Unsuccessfully')</script>";
	}
	
}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Title of the document</title>
	  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
	  <link rel="stylesheet" type="text/css" href="../css/materialize.css">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav>
			    <div class="nav-wrapper">
			      <a class="brand-logo center">Logo</a>
			      <ul id="nav-mobile" class="left hide-on-med-and-down">
			        <li><a href="">Sass</a></li>
			        <li><a href="">Components</a></li>
			        <li><a href="">JavaScript</a></li>
			      </ul>
			    </div>
			</nav>
		</div>
		<div class="section container center-align">
			<div class="row">
			    <div class="col s12 m12">
			      <div class="card-panel card large">
			        <form class="container " action="" method="post">
						<i class="large material-icons">account_circle</i><br><br><br><br>
						<input type="text" autocomplete="off" name="username" placeholder="username"><br><br><br>
						<input type="password" name="password" placeholder="password"><br><br><br>
						<input class="waves-effect waves-teal btn-flat center-align" type="submit" name="login" value="Login"><br><br>
						<a class="right" href="registerMasyarakat.php">Dont Have Account?</a>
					</form>
			      </div>
			    </div>
			</div>
		</div>
		<script src="./js/materialize.js"></script>
	</body>
</html>