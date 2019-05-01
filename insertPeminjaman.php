<?php include('session.php')?>
<?php include('koneksi.php'); ?>

<?php
    $tanggall = $_POST['tanggalpinjam'];
    $mulaii = $_POST['waktuMulai'];
    $selesaii = $_POST['waktuSelesai'];
    $jenisruangan = $_POST['jenisRuangan'];

    $ruangan = $_POST['namaruangan'];
    $cariruang = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE status_delete='0' AND nama_ruangan='$ruangan'");
    $dataruang = mysqli_fetch_array($cariruang);
    
    $idruang = $dataruang['id_ruangan'];
    
    $namaacara = $_POST['namaacara'];
    $jenisAcara = $_POST['jenisacara'];
    $jumlahpeserta = $_POST['jumlahpeserta'];
    $deskripsiAcara = $_POST['deskripsiacara'];
    
    $pj = mysqli_query($koneksi, "SELECT * FROM peminjaman");
    $hitungpj = mysqli_num_rows($pj);
    $jadipj = $hitungpj+1;

    $idpeminjamannya = "PJ-" . $jadipj;

    $query1 = mysqli_query($koneksi, "INSERT INTO peminjaman VALUES ('$idpeminjamannya','$tanggall','$idruang','$mulaii','$selesaii','$id','$namaacara','$jumlahpeserta','$jenisAcara','$deskripsiAcara','0','$id',now(),'0','0','0','0','0')");

$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpeminjamannya'");
$simpandatapinjam2 = mysqli_fetch_array($datapinjam2);

$pinjam2_tanggal= $simpandatapinjam2['tanggal_peminjaman'];
$pinjam2_mulai= $simpandatapinjam2['waktu_mulai'];
$pinjam2_selesai= $simpandatapinjam2['waktu_selesai'];
$pinjam2_orang= $simpandatapinjam2['id_pengguna'];
$pinjam2_acara= $simpandatapinjam2['acara'];
$pinjam2_peserta= $simpandatapinjam2['jumlah_peserta'];
$pinjam2_kategoriacara= $simpandatapinjam2['id_kategoriAcara'];
$pinjam2_deskripsiacara= $simpandatapinjam2['deskripsi_acara'];
$pinjam2_ruang= $simpandatapinjam2['id_ruangan'];
/*
$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$idpeminjamannya','$pinjam2_tanggal','$pinjam2_ruang','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','0','$id',now())");

*/
$pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$pinjam2_orang'");
$datapengguna = mysqli_fetch_array($pengguna);
$emailnya = $datapengguna['email'];

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
    
    $mail->Subject = 'Peminjaman Dikirim';
    $msg='
    
    <!DOCTYPE html>
<html>
<head>
<title></title>

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
                            <img alt="Logo" src="images/logo-sistech.png" width="220" height="80" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
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
                                  <a href="http://litmus.com" target="_blank"><img src="images/computer.png" width="300" height="100" border="0" alt="Insert alt text here" style="display: block; padding: 0; color: #266e9c; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"></a>
                              </td>
                            </tr>
                            <tr>
                                <td>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #266e9c; padding-top: 5px;" class="padding-copy"><br>Your Reservation with <br>code: <b>'.$idpeminjamannya.'</b>
                                            <br><br>Event Name : <b>'.$pinjam2_acara.'</b> 
                                            <br>Date/Time: <b>'.$pinjam2_tanggal.' / '.$pinjam2_mulai.' -  '.$pinjam2_selesai.'</b> 
                                            <br><br> Has been sent for approval. We will sent you an email and notification for the confirmation.
                                            </td>
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
                                                        <td><img src="images/cr.png" width="200"></td>
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

$idpinjam="location:selesaiPinjam.php?idpinjam=$idpeminjamannya";
header($idpinjam);
?>