<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idruangan'];
$namaruangan = $_POST['namaruangan'];
$jenisruangan = $_POST['jenisruangan'];
$lantai = $_POST['lantai'];
$kapasitas = $_POST['kapasitas'];
$deskripsi = $_POST['deskripsi'];



$query = "UPDATE ruangan SET nama_ruangan='$namaruangan', jenis_ruangan='$jenisruangan', gedung_lantai='$lantai', kapasitas='$kapasitas', deskripsi='$deskripsi',user_edit='$id', waktu_edit=now() WHERE id_ruangan='$idnya'";


$jalanin = mysqli_query($koneksi,$query);

$hitungbaris =mysqli_query($koneksi, "SELECT * FROM log_ruangan");
$berapa= mysqli_num_rows($hitungbaris);
$jadi = $berapa+1;

$log = mysqli_query ($koneksi, "INSERT INTO log_ruangan VALUES ('$jadi','$idnya','$namaruangan','$jenisruangan','$lantai','$kapasitas','$deskripsi','$id',now()) ");

header('location:../ruangan.php');
?>