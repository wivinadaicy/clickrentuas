<?php
include("../session.php");
include("../koneksi.php");
if(isset($_POST['simpanprofil'])){
    $idnya = $_POST['penggunaid'];
    $namanya = $_POST['namalengkap'];
    $tgllahirnya = $_POST['tanggallahir'];
    $nohpnya = $_POST['nomorhp'];
    $statusnya = $_POST['statuspengguna'];
    $alamatnya = $_POST['alamat'];
    $jknya = $_POST['jk'];

    $query = "UPDATE pengguna SET nama_lengkap='$namanya', jenis_kelamin='$jknya', tanggal_lahir='$tgllahirnya', alamat='$alamatnya', no_hp='$nohpnya', status_pengguna='$statusnya', user_edit='$idnya', waktu_edit=now() WHERE id_pengguna='$idnya'";

    $jalanin = mysqli_query($koneksi,$query);

    $hitung= mysqli_query($koneksi, "SELECT * FROM log_pengguna");
    $baris = mysqli_num_rows($hitung);
    $baristambah = $baris+1;

    $ambil = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$idnya'");
    $datambil = mysqli_fetch_array($ambil);

    $sandi = $datambil['kata_sandi'];
    $daftar = $datambil['status_daftar'];

    $query2 = "INSERT INTO log_pengguna VALUES ('$baristambah','$idnya', '$email', '$sandi', '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', curdate(), '$statusnya','$daftar', '$idnya', now())";

    $jalanin2 = mysqli_query($koneksi,$query2);

    $_SESSION['nama']= $namanya;
    $_SESSION['jk']=$jknya;
    $_SESSION['id']=$idnya;
    $_SESSION['alamat']=$alamatnya;
    $_SESSION['no_hp']=$nohpnya;
    $_SESSION['status']=$statusnya;

    $email = $_SESSION['email'];
    $password =$_SESSION['password'];
    $nama = $_SESSION['nama'];
    $jk = $_SESSION['jk'];
    $id = $_SESSION['id'];
    $alamat = $_SESSION['alamat'];
    $nohp = $_SESSION['no_hp'];
    $status= $_SESSION['status'];

    if($statusnya==4){
        $nim = $_POST['nim'];
        $programstudi = $_POST['programstudi'];
        $angkatan = $_POST['angkatan'];
        $semester = $_POST['semester'];
        $sks = $_POST['sks'];
        $ipk = $_POST['ipk'];
        $qmhs = mysqli_query($koneksi, "UPDATE mahasiswa SET id_programStudi='$programstudi', angkatan='$angkatan', semester='$semester', total_sks='$sks', ipk_terakhir='$ipk', user_edit='$idnya', waktu_edit=now() WHERE id_mahasiswa='$nim'");

$barismhs = mysqli_query($koneksi, "SELECT * FROM log_mahasiswa");
$hitungbarismhs = mysqli_num_rows($barismhs);
$jadilogmhs = $hitungbarismhs +1;

        $insertlogmhs = mysqli_query($koneksi, "INSERT INTO log_mahasiswa VALUES ('$jadilogmhs','$nim','$id','$programstudi','$angkatan','$semester','$sks','$ipk','$id',now())");
    }

    header('location:index.php');
}
?>