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
	 	<br><br>
	 	<div class="card">
	 		<div class="card-header bg-dark text-light">Laporan</div>
	 		<div class="card-body">
	 			<center>
	 				<li class="fa fa-envelope"></li>
		 			<h1>Verifikasi pengaduan : <?php echo $read; ?></h1><br>
		 			<a href="../verifikasi/verifikasi_pengaduan.php" class="btn btn-primary">Lihat Laporan</a><br><br>
	 			</center>
	 		</div>
	 	</div>
	 </div>
</div>