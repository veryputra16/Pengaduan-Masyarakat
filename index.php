<?php 	

session_start();
include 'config/koneksi.php';
$db = new database();

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if ($db->login($username,$password)) {
		echo "<script>alert('Berhasil Login')</script>";
	}
}


 ?>

<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/style.css">

<body style="background-color: #404040">
	<form method="POST">
		<div class="kotak">	
			<h1>SIGN IN</h1>
			<label>Username</label>
			<br>	
			<input type="text" name="username">
			<br>	
			<label>Password</label>
			<br>	
			<input type="password" name="password">
			<br>	
			<input type="submit" name="login" class="button" value="SIGN IN">
			<p>Don't have an account?<a class="link" href="register.php"> Sign Up</a></p>
		</div>	
	</form>
</body>