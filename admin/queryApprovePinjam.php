<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
$idpinjam = $_GET['idpinjam'];

//ubah status jadi 1 (artinya terpinjam)
$queryterima = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='1', user_edit='$id', waktu_edit=now() WHERE id_peminjaman='$idpinjam'");

//ngambil barisanya log_peminjaman ada berapa, untuk primary key
$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

//mau ngambildata peminjaman untuk masuk ke log_peminjaman
$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
$datakamu = mysqli_fetch_array($datapinjam2);

//datanya diambil2in
$pinjam2_tanggal= $datakamu['tanggal_peminjaman'];
$pinjam2_mulai= $datakamu['waktu_mulai'];
$pinjam2_selesai= $datakamu['waktu_selesai'];
$pinjam2_orang= $datakamu['id_pengguna'];
$pinjam2_acara= $datakamu['acara'];
$pinjam2_peserta= $datakamu['jumlah_peserta'];
$pinjam2_kategoriacara= $datakamu['id_kategoriAcara'];
$pinjam2_deskripsiacara= $datakamu['deskripsi_acara'];
$pinjam2_ruang= $datakamu['id_ruangan'];


//insert ke dalam log peminjaman
$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$idpinjam','$pinjam2_tanggal','$pinjam2_ruang','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','1','$id',now())");



if($pinjam2_orang==$id){

}else{


$kirimpesan = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$idpinjam'");
$hitungkirimpesan = mysqli_num_rows($kirimpesan);

if($hitungkirimpesan==0){
    $hitungpsn = mysqli_query($koneksi, "SELECT * FROM pesan");
    $htgpsn = mysqli_num_rows($hitungpsn);
    $jadihtgpsn = $htgpsn+1;
    $hitungpsnnya = "PS-" . $jadihtgpsn;

    $pinjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
    $datapinjaman = mysqli_fetch_array($pinjaman);


    $namaacara = $datapinjaman['acara'];
    $topikpesan = "Peminjaman: <b>$idpinjam</b> - Acara: <b>$namaacara</b>";
    $insertpesan = mysqli_query($koneksi, "INSERT INTO pesan VALUES ('$hitungpsnnya','$id','$topikpesan','$idpinjam')");
}

$pinjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
$datapinjaman = mysqli_fetch_array($pinjaman);

    $hitungpsndtl = mysqli_query($koneksi, "SELECT * from pesan_detail");
    $htgpsndtl = mysqli_num_rows($hitungpsndtl);
    $jadihtgpsndtl = $htgpsndtl+1;
    $jadihtgpsndtlnya = "PD-" . $jadihtgpsndtl;

    $orangpinjam = $datapinjaman['id_pengguna'];
    $acaranyah = $datapinjaman['acara'];
    $pesannya = "Selamat peminjaman dengan kode $idpinjam untuk acara $acaranyah sudah diterima. Gunakan fitur chatting ini untuk menghubungi pengurus ruangan!";

    $kirimppp = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$idpinjam'");
$hitungkirimpesan = mysqli_num_rows($kirimppp);
    $cekpesannya = mysqli_fetch_array($kirimppp);
    $idpesannya = $cekpesannya['id_pesan'];

    $insertdetailpesan = mysqli_query($koneksi, "INSERT INTO pesan_detail VALUES ('$jadihtgpsndtlnya','$idpesannya','$orangpinjam','$id',now(),'$pesannya','0')");

    $orang = mysqli_query($koneksi,"SELECT * from peminjaman join pesan join pesan_detail on pesan.id_peminjaman = peminjaman.id_peminjaman AND pesan_detail.id_pesan = pesan.id_pesan where peminjaman.id_peminjaman='$idpinjam'");
    $h = mysqli_fetch_array($orang);
    if($h['id_penggunaKe']==$h['id_pengguna']){
        $kepada = $h['id_penggunaKe'];
    }else{
        $kepada = $h['id_penggunaDari'];
    }
$pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$kepada'");
$datapengguna = mysqli_fetch_array($pengguna);
$emailnya = $datapengguna['email'];

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

$mail->Subject = "Peminjaman Kode: $idpinjam Diterima";
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
        <td bgcolor="#333333" align="center">
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
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #266e9c; padding-top: 5px;" class="padding-copy">
                                                Congratulations your reservation with code'.$idpinjam.' for '.$acaranyah.' has been confirmed. Use your chatting feature on http://localhost/uasweb1/admin/pesan_detail.php?idpesan=$idpinjam to contact the staff!
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
</html>';  

$mail->msgHTML("$msg");

if (!$mail->send()) {
    
} 
else  {
    echo"berhasil";
}

}






    //query untuk tolakcuy
  $ruangans = $datakamu['id_ruangan'];
    $tanggals = $datakamu['tanggal_peminjaman'];
    $mulainya = $datakamu['waktu_mulai'];
    $selesainya = $datakamu['waktu_selesai'];

    $querycuy = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan ON pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE status_peminjaman='0' AND peminjaman.tanggal_peminjaman='$tanggals' AND peminjaman.id_ruangan='$ruangans' AND 
            peminjaman.id_peminjaman IN (SELECT peminjaman.id_peminjaman FROM peminjaman WHERE peminjaman.status_peminjaman='0' AND peminjaman.tanggal_peminjaman='$tanggals' AND 
                                  
            (
                ((peminjaman.waktu_mulai > '$mulainya') AND (peminjaman.waktu_mulai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai<= '$mulainya') AND (peminjaman.waktu_selesai>='$selesainya'))
                OR
                ((peminjaman.waktu_mulai = '$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai < '$mulainya') AND (peminjaman.waktu_selesai>'$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
            
            )) AND peminjaman.id_peminjaman NOT IN (SELECT peminjaman.id_peminjaman FROM peminjaman WHERE peminjaman.id_peminjaman='$idpinjam')");	

    $hitungcuy = mysqli_num_rows($querycuy);
    
    if($hitungcuy==0){
        echo "MANTAP GAK ADA YANG DITOLAK ! <br><br>";
    }else{
        while($doto=mysqli_fetch_array($querycuy)){
            $pinjamtolak = $doto['id_peminjaman'];
            echo $pinjamtolak . "<br><br>";
            $querytolak = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='4', user_edit='$id', waktu_edit=now() WHERE id_peminjaman='$pinjamtolak'");

            $heleh = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
            $heleh2 = mysqli_num_rows($heleh);
            $heleh3 = $heleh2+1;

            $datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjamtolak'");
            $datapinjamaja = mysqli_fetch_array($datapinjam2);

            $sss_tanggal= $datapinjamaja['tanggal_peminjaman'];
            $sss_mulai= $datapinjamaja['waktu_mulai'];
            $sss_selesai= $datapinjamaja['waktu_selesai'];
            $sss_orang= $datapinjamaja['id_pengguna'];
            $sss_acara= $datapinjamaja['acara'];
            $sss_peserta= $datapinjamaja['jumlah_peserta'];
            $sss_kategoriacara= $datapinjamaja['id_kategoriAcara'];
            $sss_deskripsiacara= $datapinjamaja['deskripsi_acara'];
            $sss_ruang= $datapinjamaja['id_ruangan'];

            $setlogdata = mysqli_query($koneksi,
            "INSERT INTO log_peminjaman values ('$heleh3','$pinjamtolak','$sss_tanggal','$sss_ruang','$sss_mulai','$sss_selesai','$sss_orang','$sss_acara','$sss_peserta','$sss_kategoriacara','$sss_deskripsiacara','4','$id',now())");


        if($sss_orang==$id){

        }else{
            $lihatpesan = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$pinjamtolak'");
            $datapesantolak = mysqli_num_rows($lihatpesan);

            if($datapesantolak==0){
                $pesanq = mysqli_query($koneksi, "SELECT * FROM pesan");
                $pesanqq = mysqli_num_rows($pesanq);
                $hitungq = $pesanqq+1;
                $qpesan = "PS-" . $hitungq;

                $topikpesan = "Peminjaman: <b>$idpinjam</b> - Acara: <b>$namaacara</b>";

                $queryinsertpesan = mysqli_query($koneksi, "INSERT INTO pesan VALUES('$qpesan','$id','$topikpesan','$pinjamtolak')");
            }

            $caripesan = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$pinjamtolak'");
            $datacaripesan = mysqli_fetch_array($caripesan);

            $idpesany = $datacaripesan['id_pesan'];
echo "hehe->".$idpesany . "<-hehe";

            $hitungpsndtl = mysqli_query($koneksi, "SELECT * from pesan_detail");
            $htgpsndtl = mysqli_num_rows($hitungpsndtl);
            $jadihtgpsndtl = $htgpsndtl+1;
            $jadihtgpsndtlnya = "PD-" . $jadihtgpsndtl;


            $namaacaranya = $datapinjamaja['acara'];

            $pesannya = "Maaf peminjaman dengan kode $pinjamtolak dan nama acara $namaacaranya ditolak. Dengan alasan: karena waiting list";

            $insertdetailpesan = mysqli_query($koneksi, "INSERT INTO pesan_detail VALUES ('$jadihtgpsndtlnya','$idpesany','$sss_orang','$id',now(),'$pesannya','0')");

            $orang = mysqli_query($koneksi,"SELECT * from peminjaman join pesan join pesan_detail on pesan.id_peminjaman = peminjaman.id_peminjaman AND pesan_detail.id_pesan = pesan.id_pesan where peminjaman.id_peminjaman='$pinjamtolak'");
            $h = mysqli_fetch_array($orang);
            if($h['id_penggunaKe']==$h['id_pengguna']){
                $kepada = $h['id_penggunaKe'];
            }else{
                $kepada = $h['id_penggunaDari'];
            }

$pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$kepada'");
$datapengguna = mysqli_fetch_array($pengguna);
$emailnya = $datapengguna['email'];

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

$mail->Subject = "Peminjaman Kode: $pinjamtolak Ditolak";
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
        <td bgcolor="#333333" align="center">
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
                                  <a href="http://litmus.com" target="_blank"><img src="images/tolak.png" width="300" height="100" border="0" alt="Insert alt text here" style="display: block; padding: 0; color: #266e9c; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;" class="img-max"></a>
                              </td>
                            </tr>
                            <tr>
                                <td>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #266e9c; padding-top: 5px;" class="padding-copy">Sorry, your reservation with code '.$pinjamtolak.' is dennied. Because of the waiting list
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

        }
        
    }
}

//header('location:hasilApprovePinjam.php');
?>