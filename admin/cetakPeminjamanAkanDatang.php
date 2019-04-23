<?php
      ob_start();
      require('../tcpdf/tcpdf.php');
      include '../function_string.php';
      include('../koneksi.php');
      include('../session.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);


      //$obj_pdf->SetFont('Courier','B', 20);
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);

      $idpinjam = $_GET['idpinjam'];

    

      $obj_pdf->SetTitle("Bukti Peminjaman KODE: $idpinjam"); //buat judul file
      $obj_pdf->AddPage('P', 'A4'); //potrait sama ukuran L atau P

      //query
      $query= mysqli_query($koneksi, "SELECT * from pengguna JOIN peminjaman JOIN ruangan on pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_peminjaman='$idpinjam'");
      $query2= mysqli_query($koneksi, "SELECT * FROM `log_peminjaman` WHERE status_peminjaman='1' AND id_peminjaman='$idpinjam' limit 1 ");
      
      $dataquery1= mysqli_fetch_array($query); 
      $dataquery2=mysqli_fetch_array($query2);
      //$dataquery3=mysqli_fetch_array($query3);

      $tanggalbuat=date("l, d F Y",strtotime($dataquery2['waktu_edit'])); 
      $namalengkap= $dataquery1['nama_lengkap'];
      $emailpengguna= $dataquery1['email'];
      $deskripsi= $dataquery2['deskripsi_acara'];
      $tanggalpeminjaman =date("l, d F Y",strtotime($dataquery2['tanggal_peminjaman']));
      $namaruangan= $dataquery1['nama_ruangan'];
      $jenisruangan= $dataquery1['jenis_ruangan'];
        if($jenisruangan=="1"){
            $jenisr="Laboratory";
            $linkfoto= '<img src="../images/uph9.png" width="220" />' ;
        }
        else{
            $jenisr="Meeting Room";
            $linkfoto= '<img src="../images/meetroom1.jpg" width="220" />';
        }
        
      $lokasi =$dataquery1['gedung_lantai'];
      $kapasitas = $dataquery1['kapasitas'];
     

      


      
      //konten
      $content = '
      <html>
      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Click &amp; Rent &mdash; SISTech UPH </title>
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
          <link rel="stylesheet" href="../css/bootstrap.min.css">
          <link rel="stylesheet" href="../css/style.css">
          
         
      </head>
      
        <body style="font-family: Playfair Display, serif; font-size: 12px;">
            <table style="padding-top:5px; padding-bottom:5px;">
            <tr>
               <td><img src="../images/logo-sistech.png" height="40" /></td>
               <td style="font-size:24px" align="right">Click <span style="color:red;">&amp;</span> Rent</td>
            </tr>
            
            <br>
          
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            
            <tr>
                <td colspan="2" bgcolor="#fe9292"><b>Booking ID: '.$idpinjam.'<br>Created on '.$tanggalbuat.' </b></td>
            </tr>
            <br>
            <tr>
                <td colspan="2"><h1 align="center"> Reservation Invoice </h1></td>
            </tr>
            <br>
            <tr>
                <td>Jl. MH. Thamrin Boulevard 1100,<br>Klp. Dua, Karawaci, <br>Tangerang, Banten 15811</td>
                <td align="right">'.$namalengkap.'<br> '.$emailpengguna.'</td>
            </tr>
            <br>
            <tr>
                <td colspan="2" bgcolor="#fe9292"><b>Booking Details</b></td>
            </tr>
            <tr bgcolor="#ffdfdf">
                <td>Event Description</td>
                <td align="right">'.$deskripsi.'</td>
            </tr>
            <tr bgcolor="#ffdfdf">
                 <td>Reservation Date</td>
                 <td align="right">'.$tanggalpeminjaman.'</td>
            </tr>
            <br>
            <tr>
                <td colspan="2" bgcolor="#fe9292"><b>Room Details</b></td>
            </tr>
            <tr bgcolor="#ffdfdf">
                <td rowspan="4" align="center">'.$linkfoto.'</td>
                <td>Room Name:<br>'.$namaruangan.' </td>
                
            </tr>
            <tr bgcolor="#ffdfdf">
                 <td>Type of Room:<br>'.$jenisr.'</td>
            </tr>
            <tr bgcolor="#ffdfdf">
                 <td>Location:<br>'.$lokasi.'</td>
            </tr>
            <tr bgcolor="#ffdfdf">
                 <td>Capacity:<br>'.$kapasitas.'</td>
            </tr>
            
            <tr>
            <td colspan="2" style="font-size:10px;">*Don&#39;t forget to bring your Invoice when you want to use your room!</td>
            </tr>
            <br>
            <tr>
            <td colspan="2" align="right"><img src="../images/booked.png" width="150"></td>
            </tr>



            
            
            
            
           </table>
        </body>
        </html>
      
      
      
      ';
//font
//writehtml
      //$obj_pdf->SetFont(Courier','', 8); //untuk font, liat dokumentasui
      $obj_pdf->writeHTML($content); //yang keluarin html nya. Setfont nya harus diatas kontennya


      ob_end_clean();
      $namafile = "BUKTI_PINJAM_$idpinjam";
      $obj_pdf->Output($namafile, 'I'); //nama file
      ob_end_flush();

?>
