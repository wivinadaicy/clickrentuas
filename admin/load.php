<?php

//load.php
include('../koneksi.php');


$query = mysqli_query($koneksi, "SELECT * FROM peminjaman");

while($row = mysqli_fetch_array($query))
{
    $tanggal = $row['tanggal_peminjaman'];
    $gabungmulai = $row['tanggal_peminjaman'] . " " . $row["waktu_mulai"];
    $gabungselesai =$row['tanggal_peminjaman'] . " " . $row["waktu_selesai"];
 $data[] = array(
  'id'   => $row["id_peminjaman"],
  'title'   => $row["acara"],
  'start'   => $gabungmulai,
  'end'   => $gabungselesai
 );
}
echo json_encode($data);

?>
