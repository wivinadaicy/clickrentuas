<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idkategoriacara'];
$jenisacara = $_POST['jenisacara'];


$query = "UPDATE kategori_acara SET jenis_acara='$jenisacara', user_edit='$id', waktu_edit=now() WHERE id_kategoriAcara='$idnya'";

$jalanin = mysqli_query($koneksi,$query);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_kategori_acara");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$query2 = "INSERT INTO log_kategori_acara VALUES ('$baristambah', '$idnya','$namafakultas','$id',now())";

$jalanin2 = mysqli_query($koneksi,$query2);


header('location:../fakultas.php');
?>