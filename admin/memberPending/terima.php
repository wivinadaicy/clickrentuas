<?php
include("../../koneksi.php");
include("../../session.php");
$idnya = $_GET['id'];
$idx = $_SESSION['id'];

$queryv = "UPDATE pengguna SET status_daftar='2', user_edit = '$idx', waktu_edit=now() WHERE id_pengguna='$idnya'";

$jalanin = mysqli_query($koneksi,$queryv);

//insert into log pengguna
$cek = mysqli_query($koneksi, "SELECT * FROM log_pengguna");
$hitungcek = mysqli_num_rows($cek);
$ceklog = $hitungcek + 1;

$pengguna_log = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$idnya'");
$log = mysqli_fetch_array($pengguna_log);

$log_email= $log['email'];
$log_pass= $log['kata_sandi'];
$log_nama= $log['nama_lengkap'];
$log_jk= $log['jenis_kelamin'];
$log_tgl= $log['tanggal_lahir'];
$log_alamat= $log['alamat'];
$log_hp= $log['no_hp'];
$log_masuk= $log['tanggal_masuk'];
$log_status= $log['status_pengguna'];
$log_daftar = 2;

$queryinsertpengguna = mysqli_query($koneksi, "INSERT INTO log_pengguna VALUES('$ceklog','$idnya','$log_email','$log_pass','$log_nama','$log_jk','$log_tgl','$log_alamat','$log_hp','$log_masuk','$log_status','$log_daftar','$id',now())");

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
$mail->addAddress($log_email,$log_email);

$mail->Subject = 'Selamat Bergabung di Click&Rent SISTech UPH';
//http://localhost/uasweb1/loginuser.php
$msg="Selamat! Akun ada '$log_nama' di Click&Rent SISTech telah dikonfirmasi oleh admin. Silahkan klik link: http://tiny.cc/gtn24y untuk masuk ke Click&Rent SISTech! Selamaat meminjam ruangan secara online ^_^" ;  

$mail->msgHTML("$msg");

if (!$mail->send()) {
    
} 
else  {
    echo"berhasil";
}

header('location:../memberPending.php');
?>