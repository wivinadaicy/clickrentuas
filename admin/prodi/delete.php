<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['idbrgnya'];

$queryv = "UPDATE program_studi SET waktu_delete=now(),status_delete='1', user_delete='$id' WHERE id_programStudi='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_programStudi");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$s = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_programStudi='$idnya'");
$ds = mysqli_fetch_array($s);


$namabarang = $ds['nama_barang'];
$jenisbarang = $ds['id_jenisBarang'];
$ruangan = $ds['id_ruangan'];
$merek = $ds['merek'];
$stok = $ds['stok_barang'];
$tanggal = $ds['tanggal_beli'];

/*$query2 = "INSERT INTO log_barang VALUES ('$baristambah', '$idnya','$ruangan','$jenisbarang','$namabarang','$merek','$stok','$tanggal','$id',now())";

$jalanin2 = mysqli_query($koneksi,$query2);
*/
header('location:../prodi.php');
?>