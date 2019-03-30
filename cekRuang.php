<?php
include('koneksi.php');

session_start();
$email = $_SESSION['email'];
$password =$_SESSION['password'];
$nama = $_SESSION['nama'];
$jk = $_SESSION['jk'];
$id = $_SESSION['id'];
$alamat = $_SESSION['alamat'];
$nohp = $_SESSION['no_hp'];
$status= $_SESSION['status'];


$tanggalPinjam = $_POST['tanggal'];
$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];
$ruang = $_POST['ruang'];

$akalinMulai = strtotime("+1 minutes", strtotime($mulai));
$mulainya = date('h:i:s', $akalinMulai);

$akalinSelesai = strtotime("-1 minutes", strtotime($selesai));
$selesainya = date('h:i:s', $akalinSelesai);

$query = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE jenis_ruangan='$ruang' AND ruangan.id_ruangan NOT IN (SELECT peminjaman.id_ruangan FROM peminjaman WHERE peminjaman.tanggal_peminjaman = '$tanggalPinjam' and (peminjaman.waktu_mulai BETWEEN '$mulainya' and '$selesainya' or peminjaman.waktu_selesai BETWEEN '$mulainya' and '$selesainya') or peminjaman.waktu_mulai='$mulai' and peminjaman.waktu_selesai='$selesai' )");

$kalimat = '';
while($ruangsedia=mysqli_fetch_array($query)){
    $ruangannya = $ruangsedia['id_ruangan'];
    $querym= mysqli_query($koneksi, "SELECT * FROM peminjaman");
    $baris = mysqli_num_rows($querym);
    $barisbaru = $baris+1;

    $kalimat = $kalimat . "<a href='formBooking.php?tgl=$tanggalPinjam&start=$mulai&end=$selesai&room=$ruangannya&jenis=$ruang'><div class='col-12' style='background-color:black' id='" . $ruangsedia['id_ruangan'] . "'> id ruangnya = " . $ruangsedia['id_ruangan'] . "</div></a>";
    
}

echo json_encode($kalimat);
?>

