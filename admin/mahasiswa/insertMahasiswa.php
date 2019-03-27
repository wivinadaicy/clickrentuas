<?php
include("../../koneksi.php");
$idmahasiswanya = $_POST['idmahasiswa'];
$idnya = $_POST['idpengguna'];
$idprodinya = $_POST['idprodi'];
$angkatannya = $_POST['angkatan'];
$semesternya= $_POST['semester'];
$totalsksnya = $_POST['totalsks'];
$ipknya = $_POST['ipk'];
$idx = $_POST['idx'];

$query = "INSERT INTO pengguna VALUES ('$idmahasiswanya', '$idnya', '$idprodinya', '$angkatannya', '$semesternya', '$totalsksnya', '$ipknya', '$idx', now(), '0', '0', '0', '0', '0' )";

$jalanin = mysqli_query($koneksi,$query);
?>