<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['id'];

$queryv = "UPDATE pengguna SET waktu_delete=now(),status_delete='1', user_delete='$id' WHERE id_pengguna='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

$queryh = mysqli_query($koneksi, "SELECT * FROM pengguna join mahasiswa on mahasiswa.id_pengguna = pengguna.id_pengguna WHERE pengguna.id_pengguna='$idnya'");
$dataq = mysqli_fetch_array($queryh);

if($dataq['status_pengguna']=="4"){
    $idmhs = $dataq['id_mahasiswa'];
    $queryb = "UPDATE mahasiswa SET status_delete='1', user_delete='$id' WHERE id_mahasiswa='$idmhs'";
}

//header('location:../pengguna.php');
?>