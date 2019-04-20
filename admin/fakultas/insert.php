<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idfakultas'];
$namafakultas = $_POST['namafakultas'];

$query = "INSERT INTO fakultas VALUES ('$idnya','$namafakultas','$id',now(),'0','0','0','0','0')";

$jalanin = mysqli_query($koneksi,$query);
header('location:../fakultas.php');
?>