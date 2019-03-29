<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
if(isset($_POST['simpanemail'])){
    $em = $_POST['email'];
    $pas = $_POST['password'];

    if($em==$email){
        echo json_encode('1');
    }else{
        $query = mysqli_query($koneksi, "SELECT * FROM pengguna where id_pengguna = '$id' AND kata_sandi = md5('$pas')");

        $row = mysqli_num_rows($query);

        if($row==1){
            $ganti = mysqli_query($koneksi, "UPDATE pengguna set email='$em' WHERE id_pengguna='$id'");

            $hitung= mysqli_query($koneksi, "SELECT * FROM log_pengguna");
            $baris = mysqli_num_rows($hitung);
            $baristambah = $baris+1;

            $ambil = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$idnya'");
            $datambil = mysqli_fetch_array($ambil);


            $updet = mysqli_query($koneksi, "INSERT INTO log_pengguna VALUES ('$baristambah','$id', '$em', md5('$password'), '$nama', '$jk', '$datambil[tanggal_lahir]'',  '$alamat', '$nohp', '$datambil[tanggal_masuk]'', '$statusnya', '$id', now())");
        }
    }

    



}
?>