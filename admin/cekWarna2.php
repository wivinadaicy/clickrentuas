
<?php
include('../koneksi.php');
include('../session.php');

$query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan on ruangan.id_ruangan=peminjaman.id_ruangan WHERE (status_peminjaman = '1' or status_peminjaman='3') AND peminjaman.id_peminjaman not in (select peminjaman.id_peminjaman from peminjaman where status_peminjaman='0' OR status_peminjaman='4' OR status_peminjaman='5' OR status_peminjaman='6') group by peminjaman.id_ruangan");

$color = array('red','blue','green','orange','brown','maroon','navy','orange','crimson','coral','purple','darkviolet','indigo','deeppink','black','sienna');
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