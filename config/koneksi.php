<?php 	

class database{

	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db= "db_pengaduan_masyarakat";
	var $koneksi = "";

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
	}


	function login($username,$password){
		$sql = mysqli_query($this->koneksi,"SELECT * FROM masyarakat where username='$username' and password='$password'");
		$data =  mysqli_num_rows($sql);

		$sql2 = mysqli_query($this->koneksi,"SELECT * FROM petugas where username='$username' and password='$password'");
		$data2 = mysqli_num_rows($sql2);

		//LOGIN MASYARAKAT
		if ($data > 0) 
		{
			$res = mysqli_fetch_array($sql);
			$_SESSION['username'] = $username;
			$_SESSION['nik']=$res['nik'];
			$_SESSION['nama']=$res['nama'];
			$_SESSION['login']=true;
			header('location:view/masyarakat/masyarakat.php');
		}

		//LOGIN ADMIN & PETUGAS
		if ($data2 > 0) 
		{
			$res2 = mysqli_fetch_array($sql2);
			if ($res2['level']=='admin') {
				$_SESSION['username'] = $username;
				$_SESSION['nama']=$res2['nama_petugas'];
				$_SESSION['id_petugas']=$res2['id_petugas'];
				$_SESSION['login']=true;
				$_SESSION['level']='admin';
				header('location:view/admin/adm/admin.php');

			}elseif ($res2['level']=='petugas') {
				$_SESSION['username'] = $username;
				$_SESSION['nama']=$res2['nama_petugas'];
				$_SESSION['id_petugas']=$res2['id_petugas'];
				$_SESSION['login']=true;
				$_SESSION['level']='petugas';
				header('location:view/petugas/ptgs/petugas.php');
			}
			
		}else{
			echo "<script>alert('Username atau Password Salah!')</script>";
		}
	}


	function register($nik,$nama,$username,$password,$telp)
	{
		$cek = mysqli_num_rows(mysqli_query($this->koneksi, "SELECT * FROM masyarakat where username='$username' or nik='$nik'"));
		
		if ($cek > 0) {
			echo "<script>alert('Username atau Nik sudah ada')</script>";
		}else{
			$sql = mysqli_query($this->koneksi, "INSERT INTO masyarakat values ('$nik','$nama','$username','$password','$telp')");
			return $sql;
		}
	}


	function logout()
	{
		session_start();
		session_destroy();
	}




	//START MASYARAKAT
	function tambah_pengaduan($tgl_pengaduan,$nik,$isi_laporan,$foto,$status)
	{
		$sql = mysqli_query($this->koneksi,"INSERT INTO pengaduan values('','$tgl_pengaduan','$nik','$isi_laporan','$foto','$status')");
		return $sql;
	}

	function lihat_laporan()
	{
		$sql = mysqli_query($this->koneksi,"SELECT * FROM pengaduan where nik = '$_SESSION[nik]'");
		while ($s = mysqli_fetch_array($sql)) {
			$hasil[] = $s;
		}
		return $hasil;
	}


	function detail_laporan()
	{
		$sql = mysqli_query($this->koneksi, "SELECT * FROM pengaduan where id_pengaduan='$_GET[id]'");
		return $sql->fetch_array();
	}

	function lihat_tanggapan()
	{
		$sql = mysqli_query($this->koneksi,"SELECT * FROM pengaduan,tanggapan where tanggapan.id_pengaduan='$_GET[id]' AND tanggapan.id_pengaduan=pengaduan.id_pengaduan");
		return $sql->fetch_array();
	}




	//START ADMIN & PETUGAS
	function data_pengaduan()
	{
		$sql = mysqli_query($this->koneksi,"SELECT * from pengaduan where status ='0'");
		$data = mysqli_num_rows($sql);
		return $data; 
	}

	function verif_pengaduan()
	{
		$data = mysqli_query($this->koneksi, "SELECT * FROM pengaduan where status='0'");
		while ($d = mysqli_fetch_array($data)) {
			$hasil[] = $d;
		}
		return $hasil;
	}

	function proses_verif(){
		$sql = mysqli_query($this->koneksi, "UPDATE pengaduan set status='proses' where id_pengaduan='$_GET[id]'");
		return $sql;
	}

	function data_pengaduan_proses()
	{
		$sql = mysqli_query($this->koneksi, "SELECT * FROM pengaduan where status='proses'");
		while ($s = mysqli_fetch_array($sql)) {
			$hasil[] = $s;
		}
		return $hasil; 
	}

	function tanggapan($id_pengaduan,$tgl_tanggapan,$tanggapan,$id_petugas)
	{
		$tambah = mysqli_query($this->koneksi, "INSERT INTO tanggapan values ('','$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas')");

		mysqli_query($this->koneksi, "UPDATE pengaduan set status='selesai' where id_pengaduan='$id_pengaduan'");

		return $tambah;
	}


	function data_petugas()
	{
		$sql = mysqli_query($this->koneksi,"CALL data_petugas");
		while ($s = mysqli_fetch_array($sql)) {
			$hasil[] = $s;
		}
		return $hasil;
	}

	function tambah_petugas($nama_petugas,$username,$password,$telp,$level)
	{
		$sql = mysqli_query($this->koneksi, "INSERT INTO petugas values('','$nama_petugas','$username','$password','$telp','$level') ");
		return $sql;
	}

	function edit_petugas($id_petugas)
	{
		$sql = mysqli_query($this->koneksi, "SELECT * FROM petugas where id_petugas='$id_petugas'");
		return $sql->fetch_array();
	}

	function proses_edit($nama_petugas,$username,$password,$telp,$level,$id_petugas)
	{
		$sql = mysqli_query($this->koneksi,"UPDATE petugas set nama_petugas='$nama_petugas',username='$username',password='$password',telp='$telp',level='$level' where id_petugas='$id_petugas'");
		return $sql;
	}

	function hapus_petugas($id_petugas){
		$sql =  mysqli_query($this->koneksi, "DELETE FROM petugas where id_petugas='$id_petugas'");
		return $sql;
	}

	function generate_laporan(){
		$sql = mysqli_query($this->koneksi, "CALL tampil_pengaduan()");
		while ($s = mysqli_fetch_array($sql)) {
			$hasil[] = $s;
		}
		return $hasil;
	}

	function filter_tanggal($tgl_pengaduan1,$tgl_pengaduan2){
		$sql = mysqli_query($this->koneksi, "SELECT * FROM pengaduan where tgl_pengaduan between '$tgl_pengaduan1' and '$tgl_pengaduan2'");
		return $sql;
	}
	
}
