<?php include('../../session.php')?>
<?php include('../../koneksi.php'); ?>

<?php
$idprogramstudi= $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE program_studi SET user_delete='$id', waktu_delete='0', status_delete='0' WHERE id_programStudi ='$idprogramstudi'");

header('location:../prodi.php');
?>