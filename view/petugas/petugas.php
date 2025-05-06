<?php 
include "../../../config/koneksi.php";
include "../header/header.php";

$db= new database();
$read = $db->data_pengaduan();

if(! isset($_SESSION['login']))
{
    header('location:../../../index.php');
}

 ?>

<div class="container">
	 <div class="main">
	 	<div class="card">
	 		<div class="card-header bg-dark text-light">Laporan</div>
	 		<div class="card-body">
	 			<center>
		 			<h1>Laporan pengaduan ada : <?php echo $read; ?></h1><br>
		 			<a href="../verifikasi/verifikasi_pengaduan.php" class="btn btn-primary">Lihat Laporan</a><br><br>
	 			</center>
	 		</div>
	 	</div>
	 </div>
</div>