<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idbarang'];
$namabarang = $_POST['namabarang'];
$jenisbarang = $_POST['jenisbarang'];
$ruangan = $_POST['ruangan'];
$merek = $_POST['merek'];
$stok = $_POST['stok'];
$tanggal = $_POST['tanggalbeli'];

$query = "INSERT INTO barang VALUES ('$idnya','$ruangan','$jenisbarang','$namabarang','$merek','$stok','$tanggal','$id',now(),'0','0','0','0','0')";

$jalanin = mysqli_query($koneksi,$query);
header('location:../barang.php');
?>