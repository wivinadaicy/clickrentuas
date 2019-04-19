<?php
include('../koneksi.php');
include('../session.php');

$query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan on ruangan.id_ruangan=peminjaman.id_ruangan WHERE jenis_ruangan='1' group by peminjaman.id_ruangan");

$color = array('red','blue','green','orange','brown','maroon','navy','orange','crimson','coral','purple','darkviolet','indigo','deeppink','black','sienna');
$x=0;
while($row = mysqli_fetch_array($query))
{
    $idruangan=$row['id_ruangan'];
    $namaruangan=$row['nama_ruangan'];
    $pasangan[$x]= "Warna: <span style='color:white; background-color:" . $color[$x]. ">EVENT</span>- Ruangan: " . $namaruangan ." (". $id_ruangan . ")<br>";
    $x++;
}

?>