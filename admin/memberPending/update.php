<?php
include("../../koneksi.php");
$idnya = $_POST['idpengguna'];
$namanya = $_POST['namalengkap'];
$tgllahirnya = $_POST['tanggallahir'];
$emailnya = $_POST['email'];
$passwordnya = $_POST['katasandi'];
$nohpnya = $_POST['nomorhp'];
$statusnya = $_POST['statuspengguna'];
$alamatnya = $_POST['alamat'];
$jknya = $_POST['jk'];
$idx = $_POST['idx'];


$query = "UPDATE pengguna SET email='$emailnya', kata_sandi=md5('$passwordnya'), nama_lengkap='$namanya', jenis_kelamin='$jknya', tanggal_lahir='$tgllahirnya', alamat='$alamatnya', no_hp='$nohpnya', status_pengguna='$statusnya', user_edit='$idx', waktu_edit=now() WHERE id_pengguna='$idnya'";

$jalanin = mysqli_query($koneksi,$query);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_pengguna");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$query2 = "INSERT INTO log_pengguna VALUES ('$baristambah','$idnya', '$emailnya', '$passwordnya', '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', curdate(), '$statusnya', '$idx', now())";

$jalanin2 = mysqli_query($koneksi,$query2);
?>