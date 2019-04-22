<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idprogramstudi'];
$namaprogramstudi = $_POST['namaprogramstudi'];
$idfakultas = $_POST['fakultas'];

$query = "INSERT INTO program_studi VALUES ('$idnya','$namaprogramstudi','$idfakultas','$id',now(),'0','0','0','0','0')";

$jalanin = mysqli_query($koneksi,$query);
header('location:../prodi.php');
?>