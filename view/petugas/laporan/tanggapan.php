<?php 
	include '../../../config/koneksi.php';
	include "../header/header.php";
	$db= new database();
	$lihat = $db->detail_laporan();

	if (isset($_POST['tanggapi'])) {
		$id_pengaduan = $_POST['id_pengaduan'];
		$tgl_tanggapan = $_POST['tgl_tanggapan'];
		$tanggapan = $_POST['tanggapan'];
		$id_petugas = $_POST['id_petugas'];

	if ($db->tanggapan($id_pengaduan,$tgl_tanggapan,$tanggapan,$id_petugas)) {
		echo "<script>alert('BERHASIL')</script>";
		header('location:data_pengaduan_proses.php');
	}
}

 ?>

 <div class="container">
 	<div class="main">
 		<a href="detail_pengaduan_proses.php?id=<?php echo $lihat['id_pengaduan']; ?>" class="btn btn-info">Kembali</a><br><br>
 		<form method="post">
 			<h1>Form Menanggapi</h1><br/>
 			<div class="form-group">
 				<input class="form-control" type="hidden" name="id_pengaduan" value="<?php echo $_GET['id'] ?>" readonly="">
 			</div>

 			<div class="form-group">
 				<label>Tgl Tanggapan</label>
 				<input class="form-control" type="text" name="tgl_tanggapan" value="<?php echo date('Y-m-d'); ?>" readonly="">
 			</div>

 			<div class="form-group">
 				<label>Tanggapan</label>
 				<textarea class="form-control" type="text" name="tanggapan" style="height: 150px;" ></textarea>
 			</div>
 			<div class="form-group">
 				<label>Id Petugas</label>
 				<input class="form-control" type="text" name="id_petugas" value="<?php echo $_SESSION['id_petugas'];?>" readonly="">
 			</div>

 			<button type="submit" class="btn btn-primary" name="tanggapi">Tanggapi</button><br><br><br>
 		</form>
 	</div>
 </div>