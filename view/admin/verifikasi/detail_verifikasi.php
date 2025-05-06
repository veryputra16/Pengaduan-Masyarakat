<?php 
include '../../../config/koneksi.php';
include "../header/header.php";

$db= new database();
$lihat = $db->detail_laporan();

 ?>

<div class="container">
	<div class="main">
		<a href="verifikasi_pengaduan.php" class="btn btn-info">Kembali</a>
		<a href="proses_verif.php?id=<?php echo $lihat['id_pengaduan'] ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin memprosesnya?')">Proses</a>
		<br><br>
		<input type="hidden" name="id_pengaduan" value="<?php echo $lihat['id_pengaduan']; ?>">
		<center>
			<h1>Detail Pengaduan</h1><br>
		</center> 
		<div class="form-group" style="width: 90%;">
			<label for="nama">Tanggal Pengaduan</label>
			<input style="" type="text" name="tgl_pengaduan" value="<?php echo $lihat['tgl_pengaduan']; ?>" class="form-control" readonly="">
		</div>
		<div class="form-group" style="width: 90%;">
			<label for="nama">NIK</label>
			<input type="text" name="nik" class="form-control" value="<?php echo $lihat['nik']; ?>" readonly="">
		</div>
		<div class="form-group" style="width: 90%;">
			<label for="nama">Isi Laporan</label>
			<textarea type="text" name="isi_laporan" class="form-control" style="height: 150px;" readonly="">
			<?php echo $lihat['isi_laporan']; ?>
			</textarea>
		</div>
		<div class="form-group">
			<label for="nama">Bukti Foto</label><br>
			<img src="../../../assets/foto/<?php echo $lihat['foto']; ?>" width="90%;">
		</div>
	 	<br><br>
	</div>
</div>


