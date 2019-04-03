<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php
$ruang2 = $_GET['idbaru'];
$ruang1 = $_GET['idlama'];
$pinjam1 = $_GET['pinjam1'];
$pinjam2 = $_GET['pinjam2'];

//set ruangan data
$setdata = mysqli_query($koneksi,
"UPDATE peminjaman SET peminjaman.id_ruangan='$ruang2' WHERE id_peminjaman='$pinjam1'");

$cblogpinjam = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam = mysqli_num_rows($cblogpinjam);
$jadibarislogpj = $bariscbpinjam+1;

$datapinjam1 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam1'");
$simpandatapinjam1 = mysqli_fetch_array($datapinjam1);

$pinjam1_tanggal= $simpandatapinjam1['tanggal_peminjaman'];
$pinjam1_mulai= $simpandatapinjam1['waktu_mulai'];
$pinjam1_selesai= $simpandatapinjam1['waktu_selesai'];
$pinjam1_orang= $simpandatapinjam1['id_pengguna'];
$pinjam1_acara= $simpandatapinjam1['acara'];
$pinjam1_peserta= $simpandatapinjam1['jumlah_peserta'];
$pinjam1_kategoriacara= $simpandatapinjam1['id_kategoriAcara'];
$pinjam1_deskripsiacara= $simpandatapinjam1['deskripsi_acara'];

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj','$pinjam1','$pinjam1_tanggal','$ruang2','$pinjam1_mulai','$pinjam1_selesai','$pinjam1_orang','$pinjam1_acara','$pinjam1_peserta','$pinjam1_kategoriacara','$pinjam1_deskripsiacara','0','$id',now())");
//insert ke logpeminjaman data



//set ruangan dato
$setdato = mysqli_query($koneksi,
"UPDATE peminjaman SET peminjaman.id_ruangan='$ruang1' WHERE id_peminjaman='$pinjam2'");

$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam2'");
$simpandatapinjam2 = mysqli_fetch_array($datapinjam2);

$pinjam2_tanggal= $simpandatapinjam2['tanggal_peminjaman'];
$pinjam2_mulai= $simpandatapinjam2['waktu_mulai'];
$pinjam2_selesai= $simpandatapinjam2['waktu_selesai'];
$pinjam2_orang= $simpandatapinjam2['id_pengguna'];
$pinjam2_acara= $simpandatapinjam2['acara'];
$pinjam2_peserta= $simpandatapinjam2['jumlah_peserta'];
$pinjam2_kategoriacara= $simpandatapinjam2['id_kategoriAcara'];
$pinjam2_deskripsiacara= $simpandatapinjam2['deskripsi_acara'];

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$pinjam2','$pinjam2_tanggal','$ruang1','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','0','$id',now())");
//insert ke logpeminjaman dato

$lokasipergi="location:detailPeminjamanTunggu.php?idpeminjaman=$pinjam1";
header($lokasipergi);
?>