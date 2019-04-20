<?php

//load.php
include('../koneksi.php');


$query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan on ruangan.id_ruangan=peminjaman.id_ruangan WHERE jenis_ruangan='2' AND (status_peminjaman = '1' or status_peminjaman='3') group by peminjaman.id_ruangan");

$color = array('red','blue','green','orange','brown','maroon','navy','orange','crimson','coral','purple','darkviolet','indigo','deeppink','black','sienna');
$x=0;
while($row = mysqli_fetch_array($query))
{
    $idruangan=$row['id_ruangan'];
    $warna= $color[$x];
    $query2 = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan on ruangan.id_ruangan=peminjaman.id_ruangan WHERE peminjaman.id_ruangan='$idruangan'");
    while($rows = mysqli_fetch_array($query2)){
        $tanggal = $rows['tanggal_peminjaman'];
        $gabungmulai = $rows['tanggal_peminjaman'] . " " . $rows["waktu_mulai"];
        $gabungselesai =$rows['tanggal_peminjaman'] . " " . $rows["waktu_selesai"];
    $data[] = array(
    'id'   => $rows["id_peminjaman"],
    'title'   => $rows["acara"],
    'start'   => $gabungmulai,
    'end'   => $gabungselesai,
    'color' => $warna,
        );
    }
    $x++;
}
echo json_encode($data);

?>
