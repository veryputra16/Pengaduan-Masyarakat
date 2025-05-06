<?php 
include "../../../config/koneksi.php";
include '../header/header.php';

$db= new database();

$lihat = $db->generate_laporan(); 

 ?>

<div class="main">
	<div class="jarak">
		<h1>Daftar Pengaduan</h1>
		<br>
		<table border="0">
			<form method="GET" action="proses_generate.php">
				<tr>
					<td><label >Dari tanggal</label>
					<td><input type="date" name="tgl_pengaduan1"></td>
				</tr>
				
				<tr>
					<td><label>Sampai tanggal</label></td>
					<td><input type="date" name="tgl_pengaduan2"></td>
				</tr>

				<tr>
					<td><br><input type="submit" class="btn btn-primary" value="Cari & Cetak"></td>
				</tr>
			</form>
		</table>

		<br><br>
		<table class="table table-striped">
			<thead class="table-dark">
				<tr>
					<th>No</th>
					<th>Tgl Pengaduan</th>
					<th>NIK</th>
					<th>Isi laporan</th>
					<th>Foto</th>
					<th>Status</th>
					
				</tr>
			</thead>

			<?php 
			if (is_array($lihat)) {
				foreach ($lihat as $l) {			

		 	?>
			<tbody>
				<tr>
					<td><?php echo $l['id_pengaduan']; ?></td>
					<td><?php echo $l["tgl_pengaduan"];   ?></td>
					<td><?php echo $l['nik']; ?></td>
					<td><?php echo $l['isi_laporan']; ?></td>
					<td><?php echo $l['foto']; ?></td>
					<td><?php echo $l['status']; ?></td>				
				</tr>
			</tbody>
		<?php } }?>
		</table>
	</div>
</div>




