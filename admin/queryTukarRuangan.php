<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php
$ruang2 = $_GET['idbaru'];
$ruang1 = $_GET['idlama'];
$pinjam1 = $_GET['pinjam1'];
$pinjam2 = $_GET['pinjam2'];

//set ruangan data
$setdata = mysqli_query($koneksi,
"UPDATE peminjaman SET peminjaman.id_ruangan='$ruang2' WHERE id_peminjaman='$pinjam1'");

$cblogpinjam = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam = mysqli_num_rows($cblogpinjam);
$jadibarislogpj = $bariscbpinjam+1;

$datapinjam1 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam1'");
$simpandatapinjam1 = mysqli_fetch_array($datapinjam1);

$pinjam1_tanggal= $simpandatapinjam1['tanggal_peminjaman'];
$pinjam1_mulai= $simpandatapinjam1['waktu_mulai'];
$pinjam1_selesai= $simpandatapinjam1['waktu_selesai'];
$pinjam1_orang= $simpandatapinjam1['id_pengguna'];
$pinjam1_acara= $simpandatapinjam1['acara'];
$pinjam1_peserta= $simpandatapinjam1['jumlah_peserta'];
$pinjam1_kategoriacara= $simpandatapinjam1['id_kategoriAcara'];
$pinjam1_deskripsiacara= $simpandatapinjam1['deskripsi_acara'];

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj','$pinjam1','$pinjam1_tanggal','$ruang2','$pinjam1_mulai','$pinjam1_selesai','$pinjam1_orang','$pinjam1_acara','$pinjam1_peserta','$pinjam1_kategoriacara','$pinjam1_deskripsiacara','0','$id',now())");
//insert ke logpeminjaman data



//set ruangan dato
$setdato = mysqli_query($koneksi,
"UPDATE peminjaman SET peminjaman.id_ruangan='$ruang1' WHERE id_peminjaman='$pinjam2'");

$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam2'");
$simpandatapinjam2 = mysqli_fetch_array($datapinjam2);

$pinjam2_tanggal= $simpandatapinjam2['tanggal_peminjaman'];
$pinjam2_mulai= $simpandatapinjam2['waktu_mulai'];
$pinjam2_selesai= $simpandatapinjam2['waktu_selesai'];
$pinjam2_orang= $simpandatapinjam2['id_pengguna'];
$pinjam2_acara= $simpandatapinjam2['acara'];
$pinjam2_peserta= $simpandatapinjam2['jumlah_peserta'];
$pinjam2_kategoriacara= $simpandatapinjam2['id_kategoriAcara'];
$pinjam2_deskripsiacara= $simpandatapinjam2['deskripsi_acara'];

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$pinjam2','$pinjam2_tanggal','$ruang1','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','0','$id',now())");
//insert ke logpeminjaman dato




$pinjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam1'");
$datapinjaman = mysqli_fetch_array($pinjaman);

if($datapinjaman['id_pengguna']==$id){

}else{

                        //insert ke pesan ke orang1
                        $kirimpesan = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$pinjam1'");
                        $hitungkirimpesan = mysqli_num_rows($kirimpesan);

                        if($hitungkirimpesan==0){
                            $hitungpsn = mysqli_query($koneksi, "SELECT * FROM pesan");
                            $htgpsn = mysqli_num_rows($hitungpsn);
                            $jadihtgpsn = $htgpsn+1;
                            $hitungpsnnya = "PS-" . $jadihtgpsn;

                            $pinjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam1'");
                            $datapinjaman = mysqli_fetch_array($pinjaman);


                            $namaacara = $datapinjaman['acara'];
                            $topikpesan = "Peminjaman: <b>$pinjam1</b> - Acara: <b>$namaacara</b>";

                            
                            $insertpesan = mysqli_query($koneksi, "INSERT INTO pesan VALUES ('$hitungpsnnya','$id','$topikpesan','$pinjam1')");
                        }
                        //disini dihapus datapinjamannya
                        

                            $hitungpsndtl = mysqli_query($koneksi, "SELECT * from pesan_detail");
                            $htgpsndtl = mysqli_num_rows($hitungpsndtl);
                            $jadihtgpsndtl = $htgpsndtl+1;
                            $jadihtgpsndtlnya = "PD-" . $jadihtgpsndtl;

                            $orangpinjam = $datapinjaman['id_pengguna'];
                            

                            //cekruangan
                        $liatruang = mysqli_query($koneksi, "SELECT * FROM ruangan where id_ruangan ='$ruang2'");
                        $dataliatruangan = mysqli_fetch_array($liatruang);
                        $namaruanganbaru = $dataliatruangan['nama_ruangan'];

                        $liatruanglama = mysqli_query($koneksi, "SELECT * FROM ruangan where id_ruangan ='$ruang1'");
                        $dataliatruanganlama = mysqli_fetch_array($liatruanglama);
                        $namaruanganlama = $dataliatruanganlama['nama_ruangan'];
                            //cekruang*
$acarah = mysqli_query($koneksi, "SELECT * from peminjaman where id_peminjaman='$pinjam1'");
$dacarah = mysqli_fetch_array($acarah);
$acaranya = $dacarah['acara'];

                            $pesannya = "Mohon maaf, peminjaman anda dengan kode: $pinjam1 dan nama acara: $acaranya ditukar ruangannya dari $namaruanganlama menjadi $namaruanganbaru. Penukaran dilakukan atas pertimbangan yang jelas. Jika Anda tidak setuju, silahkan membatalkan peminjaman.";

                            $hehe = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$pinjam1'");
                            $cekpesannya = mysqli_fetch_array($hehe);
                            $idpesannya = $cekpesannya['id_pesan'];
                        echo $idpesannya . "ini satu";
                            $insertdetailpesan = mysqli_query($koneksi, "INSERT INTO pesan_detail VALUES ('$jadihtgpsndtlnya','$idpesannya','$orangpinjam','$id',now(),'$pesannya','0')");
//selesai insert orang1

$pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$orangpinjam'");
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
    
    $mail->Subject = "Ruangan Peminjaman Kode: $pinjam1 Ditukar";
    $msg="Mohon maaf, peminjaman anda dengan kode: $pinjam1 dan nama acara: $acaranya ditukar ruangannya dari $namaruanganlama menjadi $namaruanganbaru. Penukaran dilakukan atas pertimbangan yang jelas. Jika Anda tidak setuju, silahkan membatalkan peminjaman.";  
    
    $mail->msgHTML("$msg");
    
    if (!$mail->send()) {
        
    } 
    else  {
        echo"berhasil";
    }
}




$pinjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam2'");
$datapinjaman = mysqli_fetch_array($pinjaman);

if($datapinjaman['id_pengguna']==$id){
 echo "ini punya orangnya sendiri";
}else{



    //insert ke pesan ke orang2
$kirimpesan2 = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$pinjam2'");
$hitungkirimpesan = mysqli_num_rows($kirimpesan2);

if($hitungkirimpesan==0){
    $hitungpsn = mysqli_query($koneksi, "SELECT * FROM pesan");
    $htgpsn = mysqli_num_rows($hitungpsn);
    $jadihtgpsn = $htgpsn+1;
    $hitungpsnnya = "PS-" . $jadihtgpsn;

    $pinjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$pinjam2'");
    $datapinjaman = mysqli_fetch_array($pinjaman);


    $namaacara = $datapinjaman['acara'];
    $topikpesan = "Peminjaman: <b>$pinjam2</b> - Acara: <b>$namaacara</b>";

    
    $insertpesan = mysqli_query($koneksi, "INSERT INTO pesan VALUES ('$hitungpsnnya','$id','$topikpesan','$pinjam2')");
}

//disini dihapus datapinjaman

    $hitungpsndtl = mysqli_query($koneksi, "SELECT * from pesan_detail");
    $htgpsndtl = mysqli_num_rows($hitungpsndtl);
    $jadihtgpsndtl = $htgpsndtl+1;
    $jadihtgpsndtlnya = "PD-" . $jadihtgpsndtl;

    $orangpinjam = $datapinjaman['id_pengguna'];
    

    //cekruangan
$liatruang = mysqli_query($koneksi, "SELECT * FROM ruangan where id_ruangan ='$ruang1'");
$dataliatruangan = mysqli_fetch_array($liatruang);
$namaruanganbaru = $dataliatruangan['nama_ruangan'];

$liatruanglama = mysqli_query($koneksi, "SELECT * FROM ruangan where id_ruangan ='$ruang2'");
$dataliatruanganlama = mysqli_fetch_array($liatruanglama);
$namaruanganlama = $dataliatruanganlama['nama_ruangan'];
    //cekruang*
    $acarah = mysqli_query($koneksi, "SELECT * from peminjaman where id_peminjaman='$pinjam2'");
$dacarah = mysqli_fetch_array($acarah);
$acaranya = $dacarah['acara'];
    $pesannya = "Mohon maaf, peminjaman anda dengan kode: $pinjam2 dan nama acara: $acaranya ditukar ruangannya dari $namaruanganlama menjadi $namaruanganbaru. Penukaran dilakukan atas pertimbangan yang jelas. Jika Anda tidak setuju, silahkan membatalkan peminjaman.";

    $hoho = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_peminjaman='$pinjam2'");
    $cekpesanny = mysqli_fetch_array($hoho);
    $idpesannyah = $cekpesanny['id_pesan'];

    $insertdetailpesan = mysqli_query($koneksi, "INSERT INTO pesan_detail VALUES ('$jadihtgpsndtlnya','$idpesannyah','$orangpinjam','$id',now(),'$pesannya','0')");
    
    $pengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$orangpinjam'");
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
    
    $mail->Subject = "Ruangan Peminjaman Kode: $pinjam2 Ditukar";
    $msg="Mohon maaf, peminjaman anda dengan kode: $pinjam2 dan nama acara: $acaranya ditukar ruangannya dari $namaruanganlama menjadi $namaruanganbaru. Penukaran dilakukan atas pertimbangan yang jelas. Jika Anda tidak setuju, silahkan membatalkan peminjaman.";  
    
    $mail->msgHTML("$msg");
    
    if (!$mail->send()) {
        
    } 
    else  {
        echo"berhasil";
    }
}



header('location:hasilTukarRuangan.php');
?>