<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['id'];

$queryv = "UPDATE ruangan SET waktu_delete=now(),status_delete='1', user_delete='$id' WHERE id_ruangan='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_ruangan");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$s = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE id_ruangan='$idnya'");
$ds = mysqli_fetch_array($s);

$namaruangan = $ds['nama_ruangan'];
$jenisruangan = $ds['jenis_ruangan'];
$lantai = $ds['gedung_lantai'];
$kapasitas = $ds['kapasitas'];



$query2 = "INSERT INTO log_ruangan VALUES ('$baristambah', '$idnya','$namaruangan','$jenisruangan','$lantai','$kapasitas')";

$jalanin2 = mysqli_query($koneksi,$query2);

//header('location:../pengguna.php');
?>