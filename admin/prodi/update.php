<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idprogramstudi'];
$namaprogramstudi = $_POST['namaprogramstudi'];
$idfakultas = $_POST['idfakultas'];

$query = "UPDATE program_studi SET id_programStudi='$ruangan', id_jenisBarang='$jenisbarang', nama_barang='$namabarang', merek='$merek', stok_barang='$stok', tanggal_beli='$tanggal', user_edit='$id', waktu_edit=now() WHERE id_programStudi='$idnya'";

$jalanin = mysqli_query($koneksi,$query);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_programStudi");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$query2 = "INSERT INTO log_programStudi VALUES ('$baristambah', '$idnya','$ruangan','$jenisbarang','$namabarang','$merek','$stok','$tanggal','$id',now())";

$jalanin2 = mysqli_query($koneksi,$query2);


header('location:../prodi.php');
?>