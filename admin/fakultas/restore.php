<?php include('../../session.php')?>
<?php include('../../koneksi.php'); ?>

<?php
$idfakultas= $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE fakultas SET user_delete='$id', waktu_delete='0', status_delete='0' WHERE id_fakultas='$idfakultas'");

header('location:../fakultas.php');
?>