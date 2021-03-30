<?php 

	include '../koneksi.php';
	
	$query = "SELECT m.nama as nama_pengadu, p.tgl_pengaduan as tanggal_pengaduan, p.isi_laporan as isi_pengaduan, p.foto as foto_pengaduan, p.status as status_pengaduan FROM pangaduan p JOIN masyarakat m WHERE p.nik = m.nik";

	$execQuery = mysqli_query($koneksi, $query);

	print_r($execQuery);

	
 ?>