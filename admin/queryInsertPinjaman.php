<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
    $tanggall = $_POST['tanggalpinjam'];
    $mulaii = $_POST['waktuMulai'];
    $selesaii = $_POST['waktuSelesai'];
    $jenisruangan = $_POST['jenisRuangan'];
    if($jenisruangan=="Laboratory"){
        $jenisruangan = "1";
    }else{
        $jenisruangan = "2";
    }

    $ruangan = $_POST['namaruangan'];
    /*$cariruang = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE status_delete='0' AND nama_ruangan='$ruangan'");
    $dataruang = mysqli_fetch_array($cariruang);
    
    $idruang = $dataruang['id_ruangan'];*/
    
    $namaacara = $_POST['namaacara'];
    $jenisAcara = $_POST['jenisacara'];
    $jumlahpeserta = $_POST['jumlahpeserta'];
    $deskripsiAcara = $_POST['deskripsiacara'];
    
    $pj = mysqli_query($koneksi, "SELECT * FROM peminjaman");
    $hitungpj = mysqli_num_rows($pj);
    $jadipj = $hitungpj+1;

    $idpeminjamannya = "PJ-" . $jadipj;

    $query1 = mysqli_query($koneksi, "INSERT INTO peminjaman VALUES ('$idpeminjamannya','$tanggall','$ruangan','$mulaii','$selesaii','$id','$namaacara','$jumlahpeserta','$jenisAcara','$deskripsiAcara','1','$id',now(),'0','0','0','0','0')");

$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpeminjamannya'");
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
/*
$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$idpeminjamannya','$pinjam2_tanggal','$pinjam2_ruang','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','1','$id',now())");

*/
if($jenisruangan=="1"){
    $lokasi ="location:jadwalLab.php";
}else{
    $lokasi ="location:jadwalMeeting.php";
}

header($lokasi);
?>