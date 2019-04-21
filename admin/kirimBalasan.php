<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
$idcontact= $_POST['idcontact'];
$pesannya = $_POST['pesannya'];
$subject = $_POST['subject'];

$query = mysqli_query($koneksi, "UPDATE contact SET status_pesan='2', replied_by='$id' WHERE id_contact='$idcontact'");


$cek = mysqli_query($koneksi, "SELECT * FROM contact WHERE id_contact='$idcontact'");
$dcek = mysqli_fetch_array($cek);

$emailnya = $dcek['email'];
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
$mail->addAddress($emailnya, $emailnya );

$mail->Subject = $subject;
$msg='Nama Admin: ' . $nama . '<br>
Pesan: 
' . $pesannya . '<br>
Thankyou for contacting us!
';  

$mail->msgHTML("$msg");

if (!$mail->send()) {
    
} 
else  {
    echo"Sucess";
}

header('location:contactMessage.php');
?>