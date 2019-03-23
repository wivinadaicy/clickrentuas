<?php
if(isset($_POST['regis'])){
include("koneksi.php");
$namanya = $_POST['namalengkap'];
$tgllahirnya = $_POST['tanggallahir'];
$emailnya = $_POST['email'];
$passwordnya = $_POST['katasandi'];
$nohpnya = $_POST['nohp'];
$statusnya = $_POST['profesi'];
$alamatnya = $_POST['alamat'];
$jknya = $_POST['jeniskelamin'];

$cekemail= mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$emailnya'");

$hitung = mysqli_num_rows($cekemail);

if($hitung==0){
    $hitungbaris=mysqli_query($koneksi, "SELECT * FROM pengguna");
    $berapa = mysqli_num_rows($hitungbaris);
    $jadi = $berapa+1;

    $idnya= "USER-" . $jadi;

    $query = "INSERT INTO pengguna VALUES ('$idnya', '$emailnya', md5('$passwordnya'), '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', curdate(), '$statusnya', '0', now(), '0', '0', '0', '0', '0' )";

    $jalanin = mysqli_query($koneksi,$query);

    if($statusnya=="4"){
        $nim = $_POST['nim'];
        $angkatan =$_POST['angkatan'];
        $semester=$_POST['semester'];
        $sks=$_POST['totalsks'];
        $ipk=$_POST['ipkterakhir'];
        $programstudi = $_POST['ps'];
        $query2 = "INSERT INTO mahasiswa VALUES ('$nim', $idnya, $programstudi, $angkatan, $semester, $sks, $ipk, $idnya, now(), '0', '0', '0', '0', '0'"

        $jalanin2 = mysqli_query($koneksi,$query2);
    }
/*    
$msg = "Konfirmasi email anda di http://localhost/uasweb1/konfirmasiEmail.php?id=$idnya"; 
//awalnya status 0, nanti ini diubah jadi 1 statusnya

$msg = wordwrap($msg,70);
mail($emailnya,"Click&Rent: Konfirmasi Email Anda",$msg);
*/
header("location:index.php");
}else{

}
}

?>