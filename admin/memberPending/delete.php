<?php
include("../../koneksi.php");
$idnya = $_GET['id'];
$idx = $_SESSION['id'];

$queryv = "UPDATE pengguna SET status_delete='1', user_delete='$idx' WHERE id_pengguna='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

header('location:../pengguna.php');
?>