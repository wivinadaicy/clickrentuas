<?php include('session.php')?>
<?php include('koneksi.php'); ?>

<?php
    $tanggall = $_POST['tanggalpinjam'];
    $mulaii = $_POST['waktuMulai'];
    $selesaii = $_POST['waktuSelesai'];
    $jenisruangan = $_POST['jenisRuangan'];

    $ruangan = $_POST['namaruangan'];
    $cariruang = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE status_delete='0' AND nama_ruangan='$ruangan'");
    $dataruang = mysqli_fetch_array($cariruang);
    
    $idruang = $dataruang['id_ruangan'];
    
    $namaacara = $_POST['namaacara'];
    $jenisAcara = $_POST['jenisacara'];
    $jumlahpeserta = $_POST['jumlahpeserta'];
    $deskripsiAcara = $_POST['deskripsiacara'];
    
    $pj = mysqli_query($koneksi, "SELECT * FROM peminjaman");
    $hitungpj = mysqli_num_rows($pj);
    $jadipj = $hitungpj+1;

    $idpeminjamannya = "PJ-" . $jadipj;

    $query1 = mysqli_query($koneksi, "INSERT INTO peminjaman VALUES ('$idpeminjamannya','$tanggall','$idruang','$mulaii','$selesaii','$id','$namaacara','$jumlahpeserta','$jenisAcara','$deskripsiAcara','0','$id',now(),'0','0','0','0','0')");

$idpinjam="location:selesaiPinjam.php?idpinjam=$idpeminjamannya";
header($idpinjam);
?>