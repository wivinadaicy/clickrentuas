<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_POST['idpeng'];
$namanya = $_POST['namalengkap'];
$tgllahirnya = $_POST['tanggallahir'];
$emailnya = $_POST['email'];
$passwordnya = $_POST['katasandi'];
$nohpnya = $_POST['nomorhp'];
$statusnya = $_POST['statuspenggunas'];
$alamatnya = $_POST['alamat'];
$jknya = $_POST['jeniskelamin'];
$idx = $_POST['idx'];

$query = "INSERT INTO pengguna VALUES ('$idnya', '$emailnya', md5('$passwordnya'), '$namanya', '$jknya', '$tgllahirnya', '$alamatnya', '$nohpnya', curdate(), '$statusnya','2', '$idx', now(), '0', '0', '0', '0', '0' )";

$jalanin = mysqli_query($koneksi,$query);

if($statusnya=="4"){
    $idmhs = $_POST['nim'];
    $id_prgst =$_POST['programstudi'];
    $ang =$_POST['angkatan'];
    $sem =$_POST['semester'];
    $sks =$_POST['totalsks'];
    $ipk =$_POST['ipkterakhir'];

    $query2 = "INSERT INTO mahasiswa VALUES ('$idmhs','$idnya','$id_prgst','$ang','$sem','$sks','$ipk','$id',now(),'0','0','0','0','0')";

$jalanin2 = mysqli_query($koneksi,$query2);
}

require '../../smtp/PHPMailerAutoload.php';
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
$mail->addAddress($emailnya,$emailnya);

$mail->Subject = 'Selamat Bergabung di Click&Rent SISTech UPH';
//http://localhost/uasweb1/loginuser.php
$msg="Selamat! Akun ada '$namanya' di Click&Rent SISTech telah dibuat oleh admin. Silahkan klik link: http://tiny.cc/gtn24y untuk masuk ke Click&Rent SISTech! Selamat meminjam ruangan secara online ^_^" ;  

$mail->msgHTML("$msg");

if (!$mail->send()) {
    
} 
else  {
    echo"berhasil";
}
header('location:../pengguna.php');
?>