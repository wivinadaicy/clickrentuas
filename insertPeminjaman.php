<?php include('session.php')?>
<?php include('koneksi.php'); ?>

<?php
$tanggal = $_POST['tanggalpinjam'];
$mulai = $_POST['waktuMulai'];
$selesai = $_POST['waktuSelesai'];
$jenisruangan = $_POST['jenisRuangan'];

if($jenisruangan=="Laboratorium"){
    $jenisR = "1";
}else{
    $jenisR= "2";
}

$ruangan = $_POST['jenisRuangan'];
$cariruang = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE status_delete='0' AND nama_ruangan='$ruangan'");
$dataruang = mysqli_fetch_array($cariruang);

$idruang = $dataruang['id_ruangan'];

$namaacara = $_POST['namaacara'];
$jenisAcara = $_POST['jenisacara'];
$jumlahpeserta = $_POST['jumlahpeserta'];
$deskripsiAcara = $_POST['deskripsiacara'];

$pj = mysqli_query($koneksi, "SELECT * FROM peminjaman");
$hitungpj = mysqli_fetch_array($pj);
$jadipj = $hitungpj+1;

if(isset($_POST['book'])){
    $query1 = mysqli_query($koneksi,
  "INSERT INTO peminjaman VALUES('PJ-$jadipj','$tanggal','$idruang','$mulai','$selesai','$id','$namaacara','$jumlahpeserta','$jenisAcara','$deskripsiAcara','$id',now(),'0','0','0','0','0')");


}

?>