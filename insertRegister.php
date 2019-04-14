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

    if($statusnya==4){
        $nim = $_POST['nim'];
        $angkatan =$_POST['angkatan'];
        $semester=$_POST['semester'];
        $sks=$_POST['totalsks'];
        $ipk=$_POST['ipkterakhir'];
        $programstudi = $_POST['ps'];
        $query = "INSERT INTO pengguna VALUES ('$idnya', '$emailnya', md5('$passwordnya'), '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', curdate(), '$statusnya','0', '0', now(), '0', '0', '0', '0', '0' )";
        $jalanin = mysqli_query($koneksi,$query);
        $query2 = "INSERT INTO mahasiswa VALUES ('$nim', '$idnya', '$programstudi', '$angkatan', '$semester', '$sks', '$ipk', '0', now(), '0', '0', '0', '0', '0')";
        $jalanin2 = mysqli_query($koneksi,$query2);
    }
    if($statusnya==3){
        $query = "INSERT INTO pengguna VALUES ('$idnya', '$emailnya', md5('$passwordnya'), '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', curdate(), '$statusnya','0', '0', now(), '0', '0', '0', '0', '0' )";

        $jalanin = mysqli_query($koneksi,$query);
    }

require 'smtp/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$mail->Username = "clickrentsistech@gmail.com";
$mail->Password = "sistech123";

$mail->setFrom('clickrentsistech@gmail.com', 'clickrentsistech@gmail.com');
$mail->addAddress($emailnya, $emailnya );

$mail->Subject = 'Konfirmasi Email Anda';
$msg="Konfirmasi email Anda dengan klik link: http://localhost/uasWeb1/konfirmasiEmailDaftar.php?id=$idnya";  

$mail->msgHTML("$msg");

if (!$mail->send()) {
    
} 
else  {
    echo"berhasil";
}
header("location:tolongKonfirEmail.php?email=$emailnya");
}
}

?>