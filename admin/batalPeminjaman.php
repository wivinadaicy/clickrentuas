<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php
$idpinjam = $_GET['idpinjam'];

$query = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='5' WHERE id_peminjaman='$idpinjam'");


$heleh = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$heleh2 = mysqli_num_rows($heleh);
$heleh3 = $heleh2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
$datapinjamaja = mysqli_fetch_array($datapinjam2);

$sss_tanggal= $datapinjamaja['tanggal_peminjaman'];
$sss_mulai= $datapinjamaja['waktu_mulai'];
$sss_selesai= $datapinjamaja['waktu_selesai'];
$sss_orang= $datapinjamaja['id_pengguna'];
$sss_acara= $datapinjamaja['acara'];
$sss_peserta= $datapinjamaja['jumlah_peserta'];
$sss_kategoriacara= $datapinjamaja['id_kategoriAcara'];
$sss_deskripsiacara= $datapinjamaja['deskripsi_acara'];
$sss_ruang= $datapinjamaja['id_ruangan'];

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$heleh3','$idpinjam','$sss_tanggal','$sss_ruang','$sss_mulai','$sss_selesai','$sss_orang','$sss_acara','$sss_peserta','$sss_kategoriacara','$sss_deskripsiacara','5','$id',now())");



header('location:hasilBatalPinjam.php');
?>