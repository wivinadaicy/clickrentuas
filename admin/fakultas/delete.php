<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['id'];

$queryv = "UPDATE fakultas SET waktu_delete=now(),status_delete='1', user_delete='$id' WHERE id_fakultas='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_fakultas");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$s = mysqli_query($koneksi, "SELECT * FROM fakultas WHERE id_fakultas='$idnya'");
$ds = mysqli_fetch_array($s);

header('location:../fakultas.php');
?>