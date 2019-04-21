<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idfakultas'];
$namafakultas = $_POST['namafakultas'];


$query = "UPDATE fakultas SET id_fakultas='$idnya', , nama_fakultas='$namafakultas', user_edit='$id', waktu_edit=now() WHERE id_fakultas='$idnya'";

$jalanin = mysqli_query($koneksi,$query);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_fakultas");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$query2 = "INSERT INTO log_fakultas VALUES ('$baristambah', '$idnya','$namafakultas','$id',now())";

$jalanin2 = mysqli_query($koneksi,$query2);


header('location:../fakultas.php');
?>