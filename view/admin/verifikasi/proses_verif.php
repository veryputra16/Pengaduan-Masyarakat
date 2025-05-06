<?php 

include '../../../config/koneksi.php';

$db= new database();

if ($db->proses_verif()) {
	header('location:verifikasi_pengaduan.php');
	echo "<script>alert('BERHASIL')</script>";
}
?>