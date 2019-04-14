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

$query = "UPDATE barang SET id_ruangan='$ruangan', id_jenisBarang='$jenisbarang', nama_barang='$namabarang', merek='$merek', stok_barang='$stok', tanggal_beli='$tanggal', user_edit='$id', waktu_edit=now()";

$jalanin = mysqli_query($koneksi,$query);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_barang");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$query2 = "INSERT INTO log_barang VALUES ('$baristambah', '$idnya','$ruangan','$jenisbarang','$namabarang','$merek','$stok','$tanggal','$id',now())";

$jalanin2 = mysqli_query($koneksi,$query2);


header('location:../barang.php');
?>