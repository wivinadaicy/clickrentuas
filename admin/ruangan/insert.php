<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idruangan'];
$namaruangan = $_POST['namaruangan'];
$jenisruangan = $_POST['jenisruangan'];
$lantai = $_POST['lantai'];
$kapasitas = $_POST['kapasitas'];
$deskripsi = $_POST['deskripsi'];



$query = "INSERT INTO ruangan VALUES ('$idnya','$namaruangan','$jenisruangan','$lantai','$kapasitas','$deskripsi','$id',now(),'0','0','0','0','0')";


$jalanin = mysqli_query($koneksi,$query);

/*$hitungbaris =mysqli_query($koneksi, "SELECT * FROM log_ruangan");
$berapa= mysqli_num_rows($hitungbaris);
$jadi = $berapa+1;

$log = mysqli_query ($koneksi, "INSERT INTO log_ruangan VALUES ('$jadi','$idnya','$namaruangan','$jenisruangan','$lantai','$kapasitas','$deskripsi','$id',now()) ");*/
    
header('location:../ruangan.php');
?>