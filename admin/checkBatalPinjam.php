<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
$idpeminjaman = $_GET['idpeminjaman'];

$query = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='4' WHERE id_peminjaman='$idpeminjaman'");

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpeminjaman'");
$datakamu = mysqli_fetch_array($datapinjam2);

//datanya diambil2in
$pinjam2_tanggal= $datakamu['tanggal_peminjaman'];
$pinjam2_mulai= $datakamu['waktu_mulai'];
$pinjam2_selesai= $datakamu['waktu_selesai'];
$pinjam2_orang= $datakamu['id_pengguna'];
$pinjam2_acara= $datakamu['acara'];
$pinjam2_peserta= $datakamu['jumlah_peserta'];
$pinjam2_kategoriacara= $datakamu['id_kategoriAcara'];
$pinjam2_deskripsiacara= $datakamu['deskripsi_acara'];
$pinjam2_ruang= $datakamu['id_ruangan'];


//insert ke dalam log peminjaman
$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$idpeminjaman','$pinjam2_tanggal','$pinjam2_ruang','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','4','$id',now())");
if($status=='1'){
header('location:logPeminjaman.php');
}else{
    $link = "location:hasilLihatIgnore.php?idpeminjaman=$idpeminjaman";
    header($link);
}


?>