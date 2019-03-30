<?php
include("../../koneksi.php");
$idmahasiswanya = $_POST['idmahasiswa'];
$idnya = $_POST['idpengguna'];
$namaprodinya = $_POST['namaprodi'];
$angkatannya = $_POST['angkatan'];
$semesternya= $_POST['semester'];
$totalsksnya = $_POST['totalsks'];
$ipknya = $_POST['ipk'];
$idx = $_POST['idx'];

$query = "INSERT INTO mahasiswa VALUES ('$idmahasiswanya', '$idnya', '$namaprodinya', '$angkatannya', '$semesternya', '$totalsksnya', '$ipknya', '$idx', now(), '0', '0', '0', '0', '0' )";

$jalanin = mysqli_query($koneksi,$query);
?>