<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php
$pesanchat = $_POST['pesanchat'];
$idpesan = $_POST['idPesan'];

if($pesanchat==""){
    echo json_encode(0);
}else{

$hitungpsndtl = mysqli_query($koneksi, "SELECT * from pesan_detail");
$htgpsndtl = mysqli_num_rows($hitungpsndtl);
$jadihtgpsndtl = $htgpsndtl+1;
$jadihtgpsndtlnya = "PD-" . $jadihtgpsndtl;

$carilawan = mysqli_query($koneksi, "SELECT * FROM pesan_detail WHERE id_pesan='$idpesan' ORDER BY tanggal_waktu DESC LIMIT 1");
$datalawan = mysqli_fetch_array($carilawan);

$datake= $datalawan['id_penggunaKe'];
$datadari = $datalawan['id_penggunaDari'];

if($datake==$id){
    $idpengke= $datalawan['id_penggunaDari'];
}

if($datadari==$id){
    $idpengke= $datalawan['id_penggunaKe'];
}

$query = mysqli_query($koneksi, "INSERT INTO pesan_detail VALUES('$jadihtgpsndtlnya','$idpesan','$idpengke','$id',now(),'$pesanchat','0')");

if($jk=="l"){
	$foto = "../images/fotoprofil/male.png";
}else{
	$foto = "../images/fotoprofil/female.png";
}

$ambilbalik=mysqli_query($koneksi, "SELECT * FROM pesan_detail WHERE id_pesan='$idpesan'");
$databilblik = mysqli_fetch_array($ambilbalik);

$jam = $databilblik['tanggal_waktu'];
$kalimat=
"<div class='row msg_container base_sent'>
<div class='col-md-10 col-xs-10'>
    <div class='messages msg _sent'>
        <p style='text-align:right'>
            $pesanchat

        </p>
        <time> <p style='text-align:right'><b>Saya</b> • $jam</p></time>
    </div>
</div>
<div class='col-md-1 col-xs-2 avatar'>
    <img class='imgnya' src='$foto' class=' img-responsive '>
</div>
</div>";

echo json_encode($kalimat);
}
?>