<?php
include('koneksi.php');
$mulai = $_POST['mulai'];

$query = mysqli_query($koneksi, "SELECT DISTINCT waktu_selesai FROM waktu_jadwal WHERE waktu_selesai > '$mulai'");

$kalimat = '';
while($data = mysqli_fetch_array($query)){
     $kalimat = $kalimat . "<option value='" . $data['waktu_selesai'] . "'>" . $data['waktu_selesai'] . "</option>";
}

echo json_encode($kalimat);

?>   