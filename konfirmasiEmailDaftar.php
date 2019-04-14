<?php include('koneksi.php'); ?>
<?php
$idpengguna=$_GET['id'];
$query = mysqli_query($koneksi,"UPDATE pengguna SET status_daftar='1' WHERE id_pengguna='$idpengguna'");

//insert into log pengguna
$cek = mysqli_query($koneksi, "SELECT * FROM log_pengguna");
$hitungcek = mysqli_num_rows($cek);
$ceklog = $hitungcek + 1;

$pengguna_log = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$idpengguna'");
$log = mysqli_fetch_array($pengguna_log);

$log_email= $log['email'];
$log_pass= $log['kata_sandi'];
$log_nama= $log['nama_lengkap'];
$log_jk= $log['jenis_kelamin'];
$log_tgl= $log['tanggal_lahir'];
$log_alamat= $log['alamat'];
$log_hp= $log['no_hp'];
$log_masuk= $log['tanggal_masuk'];
$log_status= $log['status_pengguna'];
$log_daftar = 1;

$queryinsertpengguna = mysqli_query($koneksi, "INSERT INTO log_pengguna VALUES('$ceklog','$idpengguna','$log_email','$log_pass','$log_nama','$log_jk','$log_tgl','$log_alamat','$log_hp','$log_masuk','$log_status','$log_daftar','0',now())");


header('location:berhasilKonfirmasiEmail.php');
?>