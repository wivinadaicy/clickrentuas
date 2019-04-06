<?php
	include('koneksi.php');
if(isset($_POST['login'])){
	$user = $_POST['email'];
	$pass = md5($_POST['password']);

	$query = mysqli_query($koneksi, "SELECT * from pengguna where email='$user' AND kata_sandi='$pass' AND status_daftar='2'");

	$baris = mysqli_num_rows($query);
	
	if($baris==1){
		session_start();
		
		$_SESSION['email'] = $user;
		$_SESSION['password'] = $pass;
		
		$data = mysqli_fetch_array($query);
		
		$_SESSION['nama']= $data['nama_lengkap'];
		$_SESSION['jk']= $data['jenis_kelamin'];
		$_SESSION['id']= $data['id_pengguna'];
		$_SESSION['alamat']= $data['alamat'];
		$_SESSION['no_hp']= $data['no_hp'];
		$_SESSION['status']= $data['status_pengguna'];
		
		header('location:index.php');
	}else{
		header('location:loginuser1.php');
	}
}
?>