<?php
include("../../koneksi.php");
$idnya = $_GET['id'];
$idx = $_SESSION['id'];

$queryv = "UPDATE pengguna SET status_delete='1', user_delete='$idx' WHERE id_pengguna='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

//insert into log pengguna
$cek = mysqli_query($koneksi, "SELECT * FROM log_pengguna");
$hitungcek = mysqli_num_rows($cek);
$ceklog = $hitungcek + 1;

$pengguna_log = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$idnya'");
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
$log_daftar = 2;

$queryinsertpengguna = mysqli_query($koneksi, "INSERT INTO log_pengguna VALUES('$ceklog','$idnya','$log_email','$log_pass','$log_nama','$log_jk','$log_tgl','$log_alamat','$log_hp','$log_masuk','$log_status','$log_daftar','$id',now())");

if($log_status=="4"){
$querym = "UPDATE mahasiswa SET status_delete='1', user_delete='$idx' WHERE id_pengguna='$idnya'";

$jalanins = mysqli_query($koneksi,$querym);
}
header('location:../pengguna.php');
?>