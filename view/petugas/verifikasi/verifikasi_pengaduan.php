<?php 

include '../../../config/koneksi.php';
include '../header/header.php';

$db = new database();
$lihat = $db->verif_pengaduan();

?>

	<div class="main">
		<h1>Verifikasi Pengaduan</h1><br/><br>
		<table class="table table-striped">
			<thead class="table-dark">
				<tr>
					<th>No</th>
					<th>Tgl Pengaduan</th>
					<th>NIK</th>
					<th>Isi Laporan</th>
					<th>Foto</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>	
			</thead>
			<?php 
			if (is_array($lihat)) {
				foreach ($lihat as $l) {			

		 	?>
			<tbody>
				<tr>
					<td><?php echo $l['id_pengaduan']; ?></td>
					<td><?php echo $l['tgl_pengaduan']; ?></td>
					<td><?php echo $l['nik']; ?></td>
					<td><?php echo $l['isi_laporan']; ?></td>
					<td><?php echo $l['foto']; ?></td>
					<td><?php echo $l['status']; ?></td>
					<td>
						<a href="detail_verifikasi.php?id=<?php echo $l['id_pengaduan']; ?>" class="btn btn-info">Detail & Verifikasi</a>
					</td>
				</tr>
			</tbody>
		<?php } } ?>
		</table>
		<br><br>
	</div>