<?php 
session_start();
$db = new database();

if(! isset($_SESSION['login']))
{
    header('location:../../../index.php');
}

if (isset($_GET['aksi'])) {
  $db->logout();
  header('location:../../../index.php');
}

 ?>

<link rel="stylesheet" type="text/css" href="../../../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../../assets/style.css">
<link rel="stylesheet" type="text/css" href="../../../assets/font-awesome/css/font-awesome.min.css">

<nav class="navbar navbar-dark fixed-top bg-dark" style="padding: 20px;">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Admin Page</a>
		</div>
		<ul class="nav navbar-nav navbar-right text-light">
			<li><a>hi, <?php echo $_SESSION['nama']; ?></a></li>
		</ul>
	</div>	
</nav>

<div class="sidebar">
  <a href="../adm/admin.php">Home</a>
  <hr width="80%" color="#595959">
  <a href="../verifikasi/verifikasi_pengaduan.php">Verifikasi Pengaduan</a>
  <hr width="80%" color="#595959">
  <a href="../laporan/data_pengaduan_proses.php">Tanggapan</a>
  <hr width="80%" color="#595959">
  <a href="../data_petugas/data_petugas.php">Data Petugas</a>
  <hr width="80%" color="#595959">
  <a href="../laporan/generate_laporan.php">Generate Laporan</a>
  <hr width="80%" color="#595959">
  <a href="?aksi=logout" onclick="return confirm('Anda Yakin Ingin Logout ?')">Logout</a>
  <hr width="80%" color="#595959">
</div>
