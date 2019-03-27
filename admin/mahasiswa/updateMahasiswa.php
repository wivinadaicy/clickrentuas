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


$query = "UPDATE pengguna SET angkatan='$angkatannya', semester='$semesternya', total_sks='$totalsksnya', jenis_kelamin='$jknya', tanggal_lahir='$tgllahirnya', ipk_terakhir='$ipknya', user_edit='$idx', waktu_edit=now() WHERE id_mahasiswa='$idmahasiswanya'";

$jalanin = mysqli_query($koneksi,$query);

$hitung= mysqli_query($koneksi, "SELECT * FROM log_mahasiswa");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$query2 = "INSERT INTO log_mahasiswa VALUES ('$baristambah', '$idmahasiswanya', '$idnya', '$idprodinya', '$angkatannya', '$semesternya', '$totalsksnya', '$ipknya','$idx', now())";

$jalanin2 = mysqli_query($koneksi,$query2);
?>