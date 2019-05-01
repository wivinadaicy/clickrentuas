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
$msg='
<!DOCTYPE html>
<html>
<head>
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
        <td bgcolor="#bbb7b7" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 5px 0;" class="logo">
                        <a href="http://litmus.com" target="_blank">
                            <img alt="Logo" src="../images/logo-sistech.png" width="220" height="80" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
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
                                  <a href="http://litmus.com" target="_blank"><img src="../images/computer.png" width="300" height="100" border="0" alt="Insert alt text here" style="display: block; padding: 0; color: #266e9c; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"></a>
                              </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>Nama Admin: ' . $nama . '<br>
                                            Pesan: 
                                            ' . $pesannya . '<br>
                                            Thankyou for contacting us!</td>
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
                                                        <td><img src="../images/cr.png" width="200"></td>
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
    echo"Sucess";
}

header('location:contactMessage.php');
?>