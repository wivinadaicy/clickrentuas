<?php
include('../koneksi.php');
include('../session.php');

$query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan on ruangan.id_ruangan=peminjaman.id_ruangan WHERE jenis_ruangan='1'  AND (status_peminjaman = '1' or status_peminjaman='3') group by peminjaman.id_ruangan");

$color = array('blue','green','orange','brown','maroon','navy','orange','crimson','coral','purple','darkviolet','indigo','deeppink','black','sienna');
$x=0;
while($row = mysqli_fetch_array($query))
{
    $idruangan=$row['id_ruangan'];
    $namaruangan=$row['nama_ruangan'];
    $pasangan[$x]= "<span style='background-color:" . $color[$x]. "; color: ". $color[$x] ."'>EVENT</span> - Ruangan: <b>" . $namaruangan ." (". $idruangan . ")</b><br>";
    $x++;
}

$kalimat='<h3>Keterangan:</h3>';
for($y = 0 ; $y< count($pasangan) ; $y++){
    $kalimat = $kalimat . $pasangan[$y];
}
echo json_encode($kalimat);
?>