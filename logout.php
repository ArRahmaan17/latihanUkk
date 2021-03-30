<?php 
	
	session_start();
	session_destroy();

	header("Location:./masyarakat/pengaduanMasyarakat.php");
	exit;

 ?>