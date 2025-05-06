<?php 

include '../../config/koneksi.php';
include 'header/header.php';

$db = new database();
$lihat = $db->lihat_tanggapan();

?>

<div class="container">
	<div class="main">
		<a href="lihat_pengaduan.php" class="btn btn-info">Kembali</a>
		<center>
	 		<h1>Tanggapan</h1><br><br>
	 	</center>
	 	<div class="card">
	 		<div class="card-header">Detail Laporan</div>
	 		<div class="card-body">
	 			<?php 
	 				if ($lihat < 1) {
	 					echo "<font color='red'>Mohon Bersabar Pengaduan Belum Ditanggapi !</font>";
	 				}else{
	 					if ($lihat) {
	 				
	 				 ?>

	 				<div class="form-group">
	 					<label>Tanggal Tanggapan</label>
	 					<input type="text" name="tgl_tanggapan" value="<?php echo $lihat['tgl_tanggapan']; ?>" class="form-control" readonly="">
	 				</div>
	 				<div class="form-group">
	 					<label>Isi Laporan</label>
	 					<textarea type="text" name="isi_laporan" class="form-control" style="height: 150px;" readonly="">
	 						<?php echo $lihat['isi_laporan']; ?>
	 					</textarea>
	 				</div>
	 				<div class="form-group">
	 					<label>Tanggapan</label>
	 					<textarea type="text" name="tanggapan" class="form-control"  style="height: 150px;" readonly="">
	 						<?php echo $lihat['tanggapan']; ?>
	 					</textarea>
	 				</div>
	 			<?php }} ?>
	 		</div>
	 	</div>
	 	<br><br>
	</div>
</div>