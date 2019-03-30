<?php
include("../../koneksi.php");
$idnya = $_GET['id'];
$idx = $_SESSION['id'];

$queryv = "UPDATE mahasiswa SET status_delete='1', user_delete='$idx' WHERE id_mahasiswa='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

header('location:../mahasiswa.php');
?>