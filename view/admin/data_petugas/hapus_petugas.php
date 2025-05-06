<?php 

include '../../../config/koneksi.php';

$db= new database();
$id_petugas =$_GET['id'];

if ($db->hapus_petugas($id_petugas)) {
	header('location:data_petugas.php');
}


 ?>