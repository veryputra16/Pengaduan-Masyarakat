<?php 

include '../../config/koneksi.php';
include 'header/header.php';

$db = new database();

if (isset($_POST['tambah'])) {
	$tgl_pengaduan = date('Y/m/d');
	$nik = $_POST['nik'];
	$isi_laporan = $_POST['isi_laporan'];
	$foto = $_FILES['foto']['name'];
	$file = $_FILES['foto']['tmp_name'];
	$status = 0;

	move_uploaded_file($file, '../../assets/foto/'.$foto);
	if ($db->tambah_pengaduan($tgl_pengaduan,$nik,$isi_laporan,$foto,$status)) {
		echo "<script>alert('Berhasil Buat Pengaduan!')</script>";
	}
}

 ?>

<div class="container">
	 <div class="main">
	 	<br>
	 	<form method="post" enctype="multipart/form-data">
	 		<center>
	 			<h1>Form Pengaduan</h1><br>
	 		</center>
	 		<div class="form-group">
	 			<label>Tanggal Pengaduan</label>
	 			<input type="text" name="tgl_pengaduan" value="<?php echo date('d/m/Y'); ?>" class="form-control" readonly="">
	 		</div>
	 		<div class="form-group">
	 			<input type="hidden" name="nik" value="<?php echo $_SESSION['nik']; ?>" class="form-control" readonly="">
	 		</div>
	 		<div class="form-group">
	 			<label>Isi Laporan</label>
	 			<textarea type="text" name="isi_laporan" class="form-control" style="height: 200px; " required=""></textarea>
	 		</div>
	 		<div class="form-group">
	 			<label>Upload Foto</label><br>
	 			<input type="file" name="foto"><br>
	 		</div>
	 		<input type="submit" name="tambah" value="Buat Laporan" class="btn btn-secondary">
	 	</form>
	 </div>
</div>

