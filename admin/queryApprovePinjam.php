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
$msg="Selamat peminjaman dengan kode $idpinjam untuk acara $acaranyah sudah diterima. Gunakan fitur chatting di website http://localhost/uasweb1/admin/pesan_detail.php?idpesan=$idpinjam untuk menghubungi pengurus ruangan!";  

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
$msg="Maaf peminjaman dengan kode $pinjamtolak ditolak. Dengan alasan: karena waiting list";  

$mail->msgHTML("$msg");

if (!$mail->send()) {
    
} 
else  {
    echo"berhasil";
}

        }
        
    }
}

header('location:hasilApprovePinjam.php');
?>