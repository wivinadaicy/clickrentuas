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

$query = "INSERT INTO pengguna VALUES ('$idnya', '$emailnya', md5('$passwordnya'), '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', curdate(), '$statusnya','2', '$idx', now(), '0', '0', '0', '0', '0' )";

$jalanin = mysqli_query($koneksi,$query);
?>