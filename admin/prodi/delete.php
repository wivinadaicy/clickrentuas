<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['id'];

$queryv = "UPDATE program_studi SET waktu_delete=now(),status_delete='1', user_delete='$id' WHERE id_programStudi='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_program_studi");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$s = mysqli_query($koneksi, "SELECT * FROM program_studi WHERE id_programStudi='$idnya'");
$ds = mysqli_fetch_array($s);


/*$query2 = "INSERT INTO log_barang VALUES ('$baristambah', '$idnya','$ruangan','$jenisbarang','$namabarang','$merek','$stok','$tanggal','$id',now())";

$jalanin2 = mysqli_query($koneksi,$query2);
*/
//header('location:../prodi.php');
?>