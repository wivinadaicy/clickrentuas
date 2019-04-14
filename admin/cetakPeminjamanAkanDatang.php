<?php
      ob_start();
      require('../tcpdf/tcpdf.php');
      include '../function_string.php';
      include('../koneksi.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);


      //$obj_pdf->SetFont('Courier','B', 20);
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);

      $obj_pdf->SetTitle("BUKU PEMINJAMAN"); //buat judul file
      $obj_pdf->AddPage('L', 'A5'); //potrait sama ukuran L atau P

      $query = mysqli_query($koneksi, "select * from buku where id_buku='44'");
      $no=0;
      $data = mysqli_fetch_array($query);

      $judulbuku = $data['judul_buku'];
      $namapengarang = $data['nama_pengarang'];

      $content = '<html>
<body>

<p><b>Judul Buku: '. $judulbuku.'</b></p>
<p><b>Nama Pengarang:'. $namapengarang .' </b></p>
<p></p>

</body>
</html>';

      $obj_pdf->SetFont('Courier','', 8); //untuk font, liat dokumentasui
      $obj_pdf->writeHTML($content); //yang keluarin html nya. Setfont nya harus diatas kontennya


      ob_end_clean();
      $obj_pdf->Output('web1.pdf', 'I'); //nama file
      ob_end_flush();

?>
