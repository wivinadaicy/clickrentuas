<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php
$idpesan = $_GET['idcontact'];

$cek = mysqli_query($koneksi, "SELECT * FROM contact WHERE id_contact='$idpesan'");
$dcek = mysqli_fetch_array($cek);

if($dcek['status_pesan']=='0'){
    $query = mysqli_query($koneksi, "UPDATE contact SET status_pesan='1' WHERE id_contact='$idpesan'");
}


$lokasi= "location:contactDetail.php?idcontact=$idpesan";
    header($lokasi);

?>