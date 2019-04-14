<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idpengguna'];
$namanya = $_POST['namalengkap'];
$tgllahirnya = $_POST['tanggallahir'];
$emailnya = $_POST['email'];
$nohpnya = $_POST['nomorhp'];
$statusnya = $_POST['statuspengguna'];
$alamatnya = $_POST['alamat'];
$jknya = $_POST['jeniskelamin'];
$sebelum = $_POST['statussebelum'];
 echo $statusnya;

$query = "UPDATE pengguna SET email='$emailnya',nama_lengkap='$namanya', jenis_kelamin='$jknya', tanggal_lahir='$tgllahirnya', alamat='$alamatnya', no_hp='$nohpnya', status_pengguna='$statusnya', user_edit='$id', waktu_edit=now() WHERE id_pengguna='$idnya'";

$jalanin = mysqli_query($koneksi,$query);

if($sebelum !="4" && $statusnya=="4"){
    $idmhs = $_POST['nim'];
    $id_prgst =$_POST['programstudi'];
    $ang =$_POST['angkatan'];
    $sem =$_POST['semester'];
    $sks =$_POST['sks'];
    $ipk =$_POST['ipk'];

    $query2 = "INSERT INTO mahasiswa VALUES ('$idmhs','$idnya','$id_prgst','$ang','$sem','$sks','$ipk','$id',now(),'0','0','0','0','0')";

$jalanin2 = mysqli_query($koneksi,$query2);
}

if($sebelum == "4" && $statusnya=="4"){
    $idmhs = $_POST['nim'];
    $id_prgst =$_POST['programstudi'];
    $ang =$_POST['angkatan'];
    $sem =$_POST['semester'];
    $sks =$_POST['sks'];
    $ipk =$_POST['ipk'];

    $updatemhs = mysqli_query($koneksi, "UPDATE mahasiswa SET id_programStudi='$id_prgst', angkatan='$ang', semester='$sem', total_sks='$sks', ipk_terakhir='$ipk', user_edit='$id', waktu_Edit=now()");

$hitunglg = mysqli_query($koneksi, "SELECT * FROM log_mahasiswa");
$jadi = mysqli_num_rows($hitunglg) + 1;

    $queryyyy = "INSERT INTO log_mahasiswa VALUES ('$jadi','$idmhs','$idnya','$id_prgst','$ang','$sem','$sks','$ipk','$id',now(),'0','0','0','0','0')";

$jalanin2 = mysqli_query($koneksi,$queryyyy);
}

$hitung= mysqli_query($koneksi, "SELECT * FROM log_pengguna");
$baris = mysqli_num_rows($hitung);
$baristambah = $baris+1;

$asd = mysqli_query($koneksi, "SELECT * FROM pengguna where id_pengguna='$idnya'");
$datasd = mysqli_fetch_array($asd);

$passw = $datasd['kata_sandi'];
$tglmsk = $datasd['tanggal_masuk'];

$query2 = "INSERT INTO log_pengguna VALUES ('$baristambah','$idnya', '$emailnya', md5('$passw'), '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', '$tglmsk', '$statusnya','2', '$id', now())";

$jalanin2 = mysqli_query($koneksi,$query2);


//header('location:../pengguna.php');
?>