<?php 

include '../../config/koneksi.php';
include 'header/header.php';

$db = new database();
$lihat2 = $db->lihat_laporan();

?>

<div class="main">
	<center>
		<h1 style="margin-right: 15%; margin-bottom: 80px;">Daftar Pengaduan</h1>
	</center>
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
			$no = 1;
			if (is_array($lihat2)) {
				foreach ($lihat2 as $lihat) {			
		 ?>
		<tbody>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $lihat['tgl_pengaduan']; ?></td>
				<td><?php echo $lihat['nik']; ?></td>
				<td><?php echo $lihat['isi_laporan']; ?></td>
				<td><?php echo $lihat['foto']; ?></td>
				<td><?php echo $lihat['status']; ?></td>
				<td>
					<a class="btn btn-info" href="detail_pengaduan.php?id=<?php echo $lihat['id_pengaduan']; ?>">Detail</a>
					<a class="btn btn-primary" href="lihat_tanggapan.php?id=<?php echo $lihat['id_pengaduan']; ?>">Lihat Tanggapan</a>
				</td>
			</tr>
		</tbody>
	<?php } } ?>
	</table>
</div>