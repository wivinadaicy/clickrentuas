<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idruangan'];
$namaruangan = $_POST['namaruangan'];
$jenisruangan = $_POST['jenisruangan'];
$lantai = $_POST['lantai'];
$kapasitas = $_POST['kapasitas'];
$tanggal = $_POST['tanggalbeli'];

$query = "INSERT INTO barang VALUES ('$idnya','$ruangan','$jenisruangan','$lantai','$kapasitas','$tanggal','$id',now(),'0','0','0','0','0')";

$jalanin = mysqli_query($koneksi,$query);
header('location:../ruangan.php');
?>