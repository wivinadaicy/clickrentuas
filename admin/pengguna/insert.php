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
    $id_prgst =$_POST['ps'];
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
$msg='
    
    <!DOCTYPE html>
<html>
<head>
<title>A Responsive Email Template</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
        	max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
     		padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>

</head>
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#333333" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 5px 0;" class="logo">
                        <a href="http://litmus.com" target="_blank">
                            <img alt="Logo" src="../../images/logo-sistech.png" width="220" height="80" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            
        </td>
    </tr>
    <tr>
        <td bgcolor="#D8F1FF" align="center" style="padding: 10px 10px 50px 15px;" class="section-padding">
        
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                   
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              	<td align="center" class="padding">
                                  <a href="http://litmus.com" target="_blank"><img src="../../images/account.png" width="300" height="100" border="0" alt="Insert alt text here" style="display: block; padding: 0; color: #266e9c; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"></a>
                              </td>
                            </tr>
                            <tr>
                                <td>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #266e9c; padding-top: 5px;" class="padding-copy">Congratulations! Your account, '.$namanya.' on Click&Rent SISTech has been created by the admin. Please click the button:</td>
                                        </tr>
                                        <tr>
                                        <td align="center" style="border-radius: 3px;" bgcolor="#256F9C"><a href="http://tiny.cc/gtn24y " target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" class="mobile-button">Go to Website</a></td>
                                        </tr>
                                        <tr align="center" style="font-size:14px;">
                                         Enjoy the online reservation !
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    </table>
     <td bgcolor="#ffffff" style="padding: 25px 15px 70px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table" style="padding-left: 20px;">
               
                                <td>
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="50px">
                                        <tr>
                                            <td align="left" style="padding-top: 25px; font-size: 12 px; " class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td><img src="../../images/cr.png" width="200"></td>
                                                        <td>Best regards,<br>
                                                        Click <span style="color:red;">&amp;</span>Rent<br>Address:<br>
                                                        Jl. MH. Thamrin Boulevard 1100,<br>
                                                            Klp. Dua, Karawaci, Tangerang,<br> Banten 15811</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            
                        </table>
                    </td>
</body>
</html>
  ';

$mail->msgHTML("$msg");

if (!$mail->send()) {
    
} 
else  {
    echo"berhasil";
}
header('location:../pengguna.php');
?>