<?php 
include '../../../config/koneksi.php';
include "../header/header.php";

$db= new database();
$id_petugas = $_GET['id'];
$lihat = $db->edit_petugas($id_petugas);

if (isset($_POST['edit'])) {
	$db->proses_edit($_POST['nama_petugas'],$_POST['username'],md5($_POST['password']),$_POST['telp'],$_POST['level'],$_POST['id_petugas']);
	header('location:data_petugas.php');
}


 ?>

<div class="container">
	<div class="main">
		<form method="post">
			<a href="data_petugas.php" class="btn btn-info">Kembali</a>
			<center>
				<h1>Edit Petugas</h1><br>
			</center> 
			<div class="form-group">
				<input type="hidden" name="id_petugas" value="<?php echo $lihat['id_petugas']; ?>" class="form-control" readonly="">
			</div>
			<div class="form-group">
				<label>Nama Petugas</label>
				<input type="text" name="nama_petugas" class="form-control" value="<?php echo $lihat['nama_petugas']; ?>">
			</div>
			<div class="form-group">
				<label>username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $lihat['username']; ?>">
			</div>
			<div class="form-group">
				<label>password</label>
				<input type="password" name="password" class="form-control" value="<?php echo $lihat['password']; ?>">
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input type="number" name="telp" class="form-control" value="<?php echo $lihat['telp']; ?>">
			</div>
			<div class="form-group">
				<label for="nama">Level</label>
				<select class="form-control" name="level" >
					<option value="<?php echo $lihat['level']; ?>"><?php echo $lihat['level']; ?></option>
					<option value="petugas">petugas</option>
				</select>
			</div>
			<button type="submit" name="edit" class="btn btn-primary">Edit Petugas</button>
		 	<br><br>
	 	</form>
	</div>
</div>

