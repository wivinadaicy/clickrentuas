<?php
include('koneksi.php');
$tanggalPinjam = $_POST['tanggal'];
$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];
$ruang = $_POST['ruang'];

$akalinMulai = strtotime("+1 minutes", strtotime($mulai));
$mulainya = date('h:i:s', $akalinMulai);

$akalinSelesai = strtotime("-1 minutes", strtotime($selesai));
$selesainya = date('h:i:s', $akalinSelesai);

$query = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE ruangan.id_ruangan NOT IN (SELECT peminjaman.id_ruangan FROM peminjaman WHERE peminjaman.tanggal_peminjaman = '$tanggalPinjam' and (peminjaman.waktu_mulai BETWEEN '$mulainya' and '$selesainya' or peminjaman.waktu_selesai BETWEEN '$mulainya' and '$selesainya'))");

$kalimat = '';
while($ruangsedia=mysqli_fetch_array($query)){
    $kalimat = $kalimat . "<div class='col-4' style='background-color:black' id='" . $ruangsedia['id_ruangan'] . "'> id ruangnya = " . $ruangsedia['id_ruangan'] . "</div>";
}

echo json_encode($kalimat);
?>

