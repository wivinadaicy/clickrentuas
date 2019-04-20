<?php include('../../session.php')?>
<?php include('../../koneksi.php'); ?>

<?php
$idbarang= $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE barang SET user_delete='$id', waktu_delete='0', status_delete='0' WHERE id_barang='$idbarang'");

header('location:../barang.php');
?>