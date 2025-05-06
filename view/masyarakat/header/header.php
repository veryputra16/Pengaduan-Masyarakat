<?php 
session_start();
$db = new database();

if(! isset($_SESSION['login']))
{
    header('location:../../index.php');
}

if (isset($_GET['aksi'])) {
  $db->logout();
  header('location:../../index.php');
}

 ?>

<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../assets/style.css">

<nav class="navbar navbar-dark fixed-top bg-dark" style="padding: 20px;">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
		</div>
		<ul class="nav navbar-right text-light">
			<li><a>hi, <?php echo $_SESSION['nama']; ?></a></li>
		</ul>
	</div>	
</nav>

<div class="sidebar">
  <a href="masyarakat.php">Buat Pengaduan</a>
  <hr color="#737373" width="80%">
  <a href="lihat_pengaduan.php">Lihat Pengaduan</a>
  <hr color="#737373" width="80%">
  <a href="?aksi=logout" onclick="return confirm('Anda Yakin Ingin Logout ?')">Logout</a>
  <hr color="#737373" width="80%">  
</div>
