<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
    $em = $_POST['email'];
    $pas = $_POST['password'];

        $query = mysqli_query($koneksi, "SELECT * FROM pengguna where id_pengguna = '$id' AND kata_sandi = md5('$pas')");

        $row = mysqli_num_rows($query);

        if($row==1){
            $emailama = mysqli_query($koneksi, "SELECT * FROM pengguna where id_pengguna='$id'");
            $data = mysqli_fetch_array($emailama);
            $emaillama = $data['email'];


            $ganti = mysqli_query($koneksi, "UPDATE pengguna set email='$em' WHERE id_pengguna='$id'");

            //insert into log pengguna
$cek = mysqli_query($koneksi, "SELECT * FROM log_pengguna");
$hitungcek = mysqli_num_rows($cek);
$ceklog = $hitungcek + 1;

$pengguna_log = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$id'");
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

$queryinsertpengguna = mysqli_query($koneksi, "INSERT INTO log_pengguna VALUES('$ceklog','$id','$log_email','$log_pass','$log_nama','$log_jk','$log_tgl','$log_alamat','$log_hp','$log_masuk','$log_status','$log_daftar','$id',now())");
        
            $_SESSION['email'] =$em;
            $email = $_SESSION['email'];
            

require '../smtp/PHPMailerAutoload.php';
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
$mail->addAddress($email, $email );

$mail->Subject = "Email Berhasil Diganti";
$msg="Email akun anda di Click & Rent SISTech telah diganti dari $emaillama menjadi $email";  

$mail->msgHTML("$msg");

if (!$mail->send()) {

} 
else  {
    echo"berhasil";
}
header("location:../logout.php");
        }else{
            header("location:index.php");
        }

    



?>