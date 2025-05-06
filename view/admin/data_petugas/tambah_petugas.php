<?php 
include '../../../config/koneksi.php';
include "../header/header.php";

$db= new database();

if (isset($_POST['tambah'])) {
	$nama_petugas = $_POST['nama_petugas'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$telp = $_POST['telp'];
	$level = $_POST['level'];

	if ($db->tambah_petugas($nama_petugas,$username,$password,$telp,$level)) {
		header('location:data_petugas.php');
	}
}


 ?>

<div class="container">
	<div class="main">
		<form method="post">
			<a href="data_petugas.php" class="btn btn-info">Kembali</a>
			<center>
				<h1 style="margin-left: -10%;">Tambah Petugas</h1><br>
			</center> 
			<div class="form-group" style="width: 90%">
				<label for="nama">Nama Petugas</label>
				<input type="text" name="nama_petugas" class="form-control">
			</div>
			<div class="form-group" style="width: 90%">
				<label for="nama">username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group" style="width: 90%">
				<label for="nama">password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group" style="width: 90%">
				<label for="nama">Telp</label>
				<input type="number" name="telp" class="form-control">
			</div>
			<div class="form-group" style="width: 90%">
				<label for="nama">Level</label>
				<select class="form-control" name="level" >
					<option value="petugas">petugas</option>
				</select>
			</div>
			<button type="submit" name="tambah" class="btn btn-primary">Tambah data</button>
		 	<br><br>
	 	</form>
	</div>
</div>

