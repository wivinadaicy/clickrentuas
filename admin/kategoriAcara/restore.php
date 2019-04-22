<?php include('../../session.php')?>
<?php include('../../koneksi.php'); ?>

<?php
$idkategoriacara= $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE kategori_acara SET user_delete='$id', waktu_delete='0', status_delete='0' WHERE id_kategoriAcara='$idkategoriacara'");

header('location:../kategoriAcara.php');
?>