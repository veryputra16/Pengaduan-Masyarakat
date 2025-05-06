<?php 

include '../../config/koneksi.php';
include 'header/header.php';

$db = new database();
$lihat = $db->detail_laporan();

?>

<div class="container">
	<div class="main">
	 	<a class="btn btn-info" href="lihat_pengaduan.php">Kembali</a>
	 		<center>
	 			<h1>Detail Pengaduan</h1><br>
	 		</center>
	 		<div class="form-group">
	 			<label>Tanggal Pengaduan</label>
	 			<input type="text" name="tgl_pengaduan" value="<?php echo $lihat['tgl_pengaduan'] ?>" class="form-control" readonly="">
	 		</div>
	 		<div class="form-group">
	 			<label>NIK</label>
	 			<input type="text" name="nik" value="<?php echo $lihat['nik']; ?>" class="form-control" readonly="">
	 		</div>
	 		<div class="form-group">
	 			<label>Isi Laporan</label>
	 			<textarea type="text" name="isi_laporan" class="form-control" style="height: 200px;" readonly="">
	 				<?php echo $lihat['isi_laporan']; ?>
	 			</textarea>
	 		</div>
	 		<div class="form-group">
	 			<label>Foto</label><br>
	 			<img src="../../assets/foto/<?php echo $lihat['foto']; ?>" width="100%"><br><br>
	 		</div>
	 </div>
</div>