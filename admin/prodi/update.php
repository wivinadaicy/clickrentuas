<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idprogramstudi'];
$namaprogramstudi = $_POST['namaprogramstudi'];
$idfakultas = $_POST['fakultas'];

$query = "UPDATE program_studi SET nama_programStudi = '$namaprogramstudi', id_fakultas='$idfakultas' , user_edit='$id', waktu_edit=now() WHERE id_programStudi='$idnya'";

$jalanin = mysqli_query($koneksi,$query);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_program_studi");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$query2 = "INSERT INTO log_program_studi VALUES ('$baristambah', '$idnya','$namaprogramstudi','$idfakultas','$id',now())";

$jalanin2 = mysqli_query($koneksi,$query2);


header('location:../prodi.php');
?>