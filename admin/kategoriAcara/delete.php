<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['id'];

$queryv = "UPDATE kategori_acara SET waktu_delete=now(),status_delete='1', user_delete='$id' WHERE id_kategoriAcara='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_kategori_acara");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$s = mysqli_query($koneksi, "SELECT * FROM kategori_acara WHERE id_kategoriAcara='$idnya'");
$ds = mysqli_fetch_array($s);

header('location:../kategoriAcara.php');
?>