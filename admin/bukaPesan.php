<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php
$idpesan = $_GET['idpesan'];

$querycek = mysqli_query($koneksi, "select * from pesan_detail WHERE id_pesan='$idpesan' ORDER BY tanggal_waktu DESC LIMIT 1");
$dataquerycek=mysqli_fetch_array($querycek);

$penggunadari = $dataquerycek['id_penggunaDari'];
$penggunake = $dataquerycek['id_penggunaKe'];

if($penggunake==$id){
    $query = mysqli_query($koneksi, "UPDATE pesan_detail SET status_pesan='1' WHERE id_pesan='$idpesan'");
}

$lokasi= "location:pesan_detail.php?idpesan=$idpesan";
    header($lokasi);

?>