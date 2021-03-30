 <?php 
 session_start();
 if ($_SESSION['login']==='admin') {

 	include '../koneksi.php';

	$query = "SELECT m.nama as nama_pengadu, p.tgl_pengaduan as tanggal_pengadu, p.isi_laporan as isi_pengaduan, p.foto as foto_pengaduan, p.status as status_pengaduan FROM pangaduan p JOIN masyarakat m where p.status ='proses' AND p.nik = m.nik";

	$exec = mysqli_query($konek,$query);

	$getAllData = mysqli_fetch_all($exec,MYSQLI_ASSOC);

	if ($_POST['proses']) {
		$id = $getAllData[0]['id_pengaduan'];
		$query = "UPDATE pangaduan set status = 'selesai' where id_pengaduan = '$id'";
		$exec = mysqli_query($konek,$query);
		header("Location:laporanSelesai.php");
		exit;
	}
	
 }else{
 	header("Location: loginPetugas.php");
 	exit;
 }
	
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Title </title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="../css/materialize.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
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
		<table class="highlight centered">
			<thead>
				<tr>
					<th >nomer</th>
					<th class="hide-on-med-and-down col s0 m0" >nik pelapor</th>
					<th >gambar</th>
					<th >laporan</th>
					<th class="hide-on-med-and-down col s0 m0" >tanggal pelaporan</th>
					<th class="hide-on-med-and-down col s0 m0" >status</th>
					<th >aksi</th>
				</tr>
			</thead>
				
			<tbody>
				<?php $no=0; ?>
				<?php foreach ($getAllData as $key => $value) { $no++ ?>
					<tr>
						<td><?php echo "$no"; ?></td>
						<td class="hide-on-med-and-down col s0 m0" ><?php echo "".$value['nama_pengadu']; ?></td>
								
						<td><img class=" materialboxed responsive-img" style="width: 200px" src='../foto_pengaduan/<?php echo "".$value['foto_pengaduan']; ?>'></td>
						<td style="width: 20%"><?php echo "".$value['isi_pengaduan']; ?></td>
						<td class="hide-on-med-and-down col s0 m0" ><?php echo "".$value['tanggal_pengadu']; ?></td>
						<td class="hide-on-med-and-down col s0 m0" ><?php echo "".$value['status_pengaduan']; ?></td>
						<td>
							<form action="" method="post">
							<input class="waves-effect waves-black btn-flat" value="selesai" type="submit" name="proses">
							</form>
						</td>
					</tr>
				<?php }; ?>
			</tbody>
		</table>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript">
			const materialboxed = document.querySelectorAll('.materialboxed');
			M.Materialbox.init(materialboxed,{
				inDuration:100,
				outDuration:100,
			});
		</script>
	</body>
</html>
