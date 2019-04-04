<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
$idpinjam = $_GET['idpinjam'];

$querytolak = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='4' WHERE id_peminjaman='$idpinjam'");

$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
$simpandatapinjam2 = mysqli_fetch_array($datapinjam2);

$pinjam2_tanggal= $simpandatapinjam2['tanggal_peminjaman'];
$pinjam2_mulai= $simpandatapinjam2['waktu_mulai'];
$pinjam2_selesai= $simpandatapinjam2['waktu_selesai'];
$pinjam2_orang= $simpandatapinjam2['id_pengguna'];
$pinjam2_acara= $simpandatapinjam2['acara'];
$pinjam2_peserta= $simpandatapinjam2['jumlah_peserta'];
$pinjam2_kategoriacara= $simpandatapinjam2['id_kategoriAcara'];
$pinjam2_deskripsiacara= $simpandatapinjam2['deskripsi_acara'];
$pinjam2_ruang= $simpandatapinjam2['id_ruangan'];

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$idpinjam','$pinjam2_tanggal','$pinjam2_ruang','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','4','$id',now())");

$kirimpesan = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$idpinjam'");
$hitungkirimpesan = mysqli_num_rows($kirimpesan);

if($hitungkirimpesan==0){
    $hitungpsn = mysqli_query($koneksi, "SELECT * FROM pesan");
    $htgpsn = mysqli_num_rows($hitungpsn);
    $jadihtgpsn = $htgpsn+1;
    $hitungpsnnya = "PS-" . $jadihtgpsn;

    $pinjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
    $datapinjaman = mysqli_fetch_array($pinjaman);


    $namaacara = $datapinjaman['acara'];
    $topikpesan = "Peminjaman Acara: $namaacara ($idpinjam)";
    $insertpesan = mysqli_query($koneksi, "INSERT INTO pesan VALUES ('$hitungpsnnya','$id','$topikpesan','$idpinjam')");
}

    $hitungpsndtl = mysqli_query($koneksi, "SELECT * from pesan_detail");
    $htgpsndtl = mysqli_num_rows($hitungpsndtl);
    $jadihtgpsndtl = $htgpsndtl+1;
    $jadihtgpsndtlnya = "PD-" . $jadihtgpsndtl;

    $orangpinjam = $datapinjaman['id_pengguna'];
    $alasan = $_GET['alasanTolak']; 
    $pesannya = "Maaf peminjaman dengan kode $idpinjam ditolak. Dengan alasan: $alasan";

    $insertdetailpesan = mysqli_query($koneksi, "INSERT INTO pesan_detail VALUES ('$jadihtgpsndtlnya','$jadihtgpsn','$orangpinjam','$id',now(),'$pesannya','0')");


?>