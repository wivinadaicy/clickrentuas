<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['idruang'];



$query = "UPDATE ruangan SET user_delete='$id', waktu_delete=now(), status_delete='1' WHERE id_ruangan='$idnya'";


$jalanin = mysqli_query($koneksi,$query);

/*$hitungbaris =mysqli_query($koneksi, "SELECT * FROM log_ruangan");
$berapa= mysqli_num_rows($hitungbaris);
$jadi = $berapa+1;

$log = mysqli_query ($koneksi, "INSERT INTO log_ruangan VALUES ('$jadi','$idnya','$namaruangan','$jenisruangan','$lantai','$kapasitas','$deskripsi','$id',now()) ");*/

header('location:../ruangan.php');
?>