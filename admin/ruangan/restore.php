<?php include('../../session.php')?>
<?php include('../../koneksi.php'); ?>

<?php
$idruangan= $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE ruangan SET user_delete='$id', waktu_delete='0', status_delete='0' WHERE id_ruangan='$idruangan'");

header('location:../ruangan.php');
?>