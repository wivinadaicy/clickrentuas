<?php
include('koneksi.php');
$email = $_POST['email'];

$query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$email'");
$hitung = mysqli_num_rows($query);

if($hitung>0){
    echo "1";
}else{
    echo "0";
}
?>