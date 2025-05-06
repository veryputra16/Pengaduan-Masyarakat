<?php 

include '../../../config/koneksi.php';
include '../header/header.php';

$db = new database();
$lihat = $db->data_petugas();

?>

	<div class="main">
		<div class="jarak">
			<h1>Daftar Petugas</h1><br/>
			<a href="tambah_petugas.php" class="btn btn-primary">Tambah</a>
			<br><br>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr>
						<th>No</th>
						<th>Nama Petugas</th>
						<th>Username</th>
						<th>Password</th>
						<th>Telp</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>	
				</thead>
				<?php 
				if (is_array($lihat)) {
					foreach ($lihat as $l) {			

		 		?>
				<tbody>
					<tr>
						<td><?php echo $l['id_petugas']; ?></td>
						<td><?php echo $l['nama_petugas']; ?></td>
						<td><?php echo $l['username']; ?></td>
						<td><?php echo $l['password']; ?></td>
						<td><?php echo $l['telp']; ?></td>
						<td><?php echo $l['level']; ?></td>
						<td>
							<a href="edit_petugas.php?id=<?php echo $l['id_petugas']; ?>" class="btn btn-info">Edit</a>
							<a href="hapus_petugas.php?id=<?php echo $l['id_petugas']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapusnya?')">Hapus</a>
						</td>
					</tr>
				</tbody>
			<?php } } ?>
			</table>
			<br><br>
		</div>
	</div>