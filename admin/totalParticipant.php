<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php 
$ruang = $_POST['ruangans'];
$query = mysqli_query($koneksi, "SELECT * FROM ruangan where id_ruangan='$ruang'");
$dquery = mysqli_fetch_array($query);

$totalorg = $dquery['kapasitas'];

echo json_encode($totalorg);

?>