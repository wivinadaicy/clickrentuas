<?php

//load.php
include('../koneksi.php');


$query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan on ruangan.id_ruangan=peminjaman.id_ruangan WHERE (status_peminjaman = '1' or status_peminjaman='3') AND peminjaman.id_peminjaman not in (select peminjaman.id_peminjaman from peminjaman where status_peminjaman='0' OR status_peminjaman='4' OR status_peminjaman='5' OR status_peminjaman='6') group by peminjaman.id_ruangan");

$color = array('blue','green','orange','brown','maroon','navy','orange','crimson','coral','purple','darkviolet','indigo','deeppink','black','sienna');
$x=0;
while($row = mysqli_fetch_array($query))
{
    $idruangan=$row['id_ruangan'];
    $warna= $color[$x];
    $query2 = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan on ruangan.id_ruangan=peminjaman.id_ruangan WHERE peminjaman.id_ruangan='$idruangan' AND peminjaman.id_peminjaman not in (select peminjaman.id_peminjaman from peminjaman where status_peminjaman='0' OR status_peminjaman='4' OR status_peminjaman='5' OR status_peminjaman='6')");
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
