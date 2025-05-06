<?php 
include "../../../config/koneksi.php";

$db= new database();

if (isset($_GET['tgl_pengaduan1'], $_GET['tgl_pengaduan2'])) {
	$tgl_pengaduan1 = $_GET['tgl_pengaduan1'];
	$tgl_pengaduan2 = $_GET['tgl_pengaduan2'];
	$lihat = $db->filter_tanggal($tgl_pengaduan1,$tgl_pengaduan2);
	echo "<script>window.print()</script>";
}else{
	$lihat = $db->generate_laporan(); 
}

 ?>

<link rel="stylesheet" type="text/css" href="../../../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../../assets/style.css">

<div class="container" style="margin-top:100px">
	<center>
		<h1>Daftar Pengaduan</h1>
		<br><br>
	</center>	
	<table class="table table-bordered">
		<thead>
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
		
		foreach($lihat as $l){

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
	<?php } ?>
	</table>
	<br><br>
	<div class="text-right">
		<h5>Denpasar, <?php echo date('d F y') ?></h5>
		<p>Admin</p>
	</div>
</div>



