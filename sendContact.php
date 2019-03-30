<?php include('session.php')?>
<?php include('koneksi.php'); ?>

<?php

$nama=$_POST['name'];
$phone=$_POST['phone'];;
$email=$_POST['email'];;
$message=$_POST['message'];

if(isset($_POST['submitContact'])){
    $hitung= mysqli_query($koneksi, "SELECT * FROM log_pengguna");
    $baris = mysqli_num_rows($hitung);
    $baristambah = $baris+1;

    $query = mysqli_query($koneksi, "INSERT INTO contact VALUES ('$baristambah','$nama','$phone','$email','$message',now())");
    header('location:contactTerkirim.php');
}

?>