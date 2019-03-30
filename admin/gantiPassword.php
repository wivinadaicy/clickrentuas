<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php

$passlama = $_POST['passlama'];
$passbaru = $_POST['passbaru'];
$passkonfir = $_POST['passkonfir'];

    $ambil = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$id'");
    $datambil = mysqli_fetch_array($ambil);

    if($datambil['kata_sandi']==md5($passlama)){
        $query = mysqli_query($koneksi, "UPDATE pengguna SET kata_sandi = md5('$passbaru') WHERE id_pengguna='$id'");

        $hitung= mysqli_query($koneksi, "SELECT * FROM log_pengguna");
        $baris = mysqli_num_rows($hitung);
        $baristambah = $baris+1;

        $updet = mysqli_query($koneksi, "INSERT INTO log_pengguna VALUES ('$baristambah','$id', '$em', md5('$passbaru'), '$nama', '$jk', '$datambil[tanggal_lahir]'',  '$alamat', '$nohp', '$datambil[tanggal_masuk]', '$status', '$id', now())");
            
        $_SESSION['password'] =$passbaru;
        $password = $_SESSION['password'];
        header("location:../logout.php");
        }else{
            header("location:index.php");
        }
    

?>