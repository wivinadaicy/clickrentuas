<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idkategoriacara'];
$jenisacara = $_POST['jenisacara'];

$query = "INSERT INTO kategori_acara VALUES ('$idnya','$jenisacara','$id',now(),'0','0','0','0','0')";

$jalanin = mysqli_query($koneksi,$query);
header('location:../kategoriAcara.php');
?>