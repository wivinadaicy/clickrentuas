<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
$idpinjam = $_POST['idtolak'];
$alasan = $_POST['alasanTolak'];

$querytolak = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='4' WHERE id_peminjaman='$idpinjam'");

$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
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

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$idpinjam','$pinjam2_tanggal','$pinjam2_ruang','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','4','$id',now())");


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
    $pesannya = "Maaf peminjaman dengan kode $idpinjam ditolak. Dengan alasan: $alasan";

    $kirimpesan2 = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$idpinjam'");
    $cekpesannya2 = mysqli_fetch_array($kirimpesan2);
    $idpesannya = $cekpesannya2['id_pesan'];

    $insertdetailpesan = mysqli_query($koneksi, "INSERT INTO pesan_detail VALUES ('$jadihtgpsndtlnya','$idpesannya','$orangpinjam','$id',now(),'$pesannya','0')");

    $pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$pinjam2_orang'");
    echo $pinjam2_orang;
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
    
    $mail->Subject = "Peminjaman Kode: $idpinjam Ditolak";
    $msg="Maaf peminjaman dengan kode $idpinjam dan nama acara $pinjam2_acara ditolak. Dengan alasan: $alasan";  
    
    $mail->msgHTML("$msg");
    
    if (!$mail->send()) {
        
    } 
    else  {
        echo"berhasil";
    }
}


    header('location:hasilTolakPinjam.php');
?>