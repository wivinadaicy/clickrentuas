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
      $obj_pdf->AddPage('L', 'A4'); //potrait sama ukuran L atau P

      //query
      
      //konten
      $content = '...';
//font
//writehtml
      //$obj_pdf->SetFont('Courier','', 8); //untuk font, liat dokumentasui
      $obj_pdf->writeHTML($content); //yang keluarin html nya. Setfont nya harus diatas kontennya


      ob_end_clean();
      $namafile = "BUKTI_PINJAM_$idpinjam";
      $obj_pdf->Output($namafile, 'I'); //nama file
      ob_end_flush();

?>
