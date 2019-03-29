<?php
include("../../koneksi.php");
$idnya = $_GET['id'];
$idx = $_SESSION['id'];

$queryv = "UPDATE pengguna SET status_daftar='2', user_edit = '$idx', waktu_edit=now() WHERE id_pengguna='$idnya'    ";

$jalanin = mysqli_query($koneksi,$queryv);

header('location:../memberPending.php');
?>