<?php 	

include 'config/koneksi.php';
$db = new database();

if (isset($_POST['regis'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$telp = $_POST['telp'];

	if ($db->register($nik,$nama,$username,$password,$telp)) {
		echo "<script>alert('Berhasil Register')</script>";
		header('location:index.php');
	}
}

?>

<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/style.css">

<body style="background-color: #404040">
	<div class="kotak2">
		<form method="POST"> 		
			<h1>SIGN UP</h1>
			<label>NIK</label>
			<br>	
			<input type="text" name="nik">
			<br>	
			<label>Nama</label>
			<br>	
			<input type="text" name="nama">
			<br>	
			<label>Username</label>
			<input type="text" name="username">
			<br>	
			<label>Password</label>
			<input type="password" name="password">
			<br>	
			<label>Telepon</label>
			<input type="number" name="telp">
			<br>	
			<input type="submit" name="regis" class="button" value="SIGN UP">
			<p>Already have an account?<a class="link" href="index.php"> Sign In</a></p>
		</form>
	</div>	
</body>