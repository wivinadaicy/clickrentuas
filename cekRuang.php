<?php
include('koneksi.php');

session_start();
$email = $_SESSION['email'];
$password =$_SESSION['password'];
$nama = $_SESSION['nama'];
$jk = $_SESSION['jk'];
$id = $_SESSION['id'];
$alamat = $_SESSION['alamat'];
$nohp = $_SESSION['no_hp'];
$status= $_SESSION['status'];


$tanggalPinjam = $_POST['tanggal'];
$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];
$ruang = $_POST['ruang'];


$query = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE ruangan.jenis_ruangan='$ruang' AND ruangan.id_ruangan NOT IN (SELECT peminjaman.id_ruangan FROM peminjaman WHERE peminjaman.status_peminjaman>0 AND peminjaman.tanggal_peminjaman = '$tanggalPinjam' AND ( ((peminjaman.waktu_mulai > '$mulai') AND (peminjaman.waktu_mulai<'$selesai')) OR ((peminjaman.waktu_mulai<= '$mulai') AND (peminjaman.waktu_selesai>='$selesai')) OR ((peminjaman.waktu_mulai = '$mulai') AND (peminjaman.waktu_selesai<'$selesai')) OR ((peminjaman.waktu_mulai < '$mulai') AND (peminjaman.waktu_selesai>'$mulai') AND (peminjaman.waktu_selesai<'$selesai')) ))");

$kalimat = '<div class="col-lg-12"><h3 style="text-align:center; font-weight:bold; background-color:grey; color:white">Available Rooms</h3></div>';

if(mysqli_num_rows($query)==0){
    $kalimat = $kalimat . "<h3 style='text-align:center; font-weight:bold; padding-left:310px;'>No room available! Please check another date/time.</h3>";
}else{
while($ruangsedia=mysqli_fetch_array($query)){
    $ruangannya = $ruangsedia['id_ruangan'];
    $querym= mysqli_query($koneksi, "SELECT * FROM peminjaman");
    $baris = mysqli_num_rows($querym);
    $barisbaru = $baris+1;
     $kalimat = $kalimat . 
  "<div class='col-lg-4' id='" . $ruangsedia['id_ruangan'] . "'>
        <div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>". $ruangsedia['nama_ruangan'] ."</h5>
                <p class='card-text'>
                Location : ". $ruangsedia['gedung_lantai']."<br>
                Capacity : ". $ruangsedia['kapasitas'] ." <br>
                Description : ". $ruangsedia['deskripsi'] ."<br><br>
                Items Included:<br>
                ";
    
    $query2=mysqli_query($koneksi, "SELECT * FROM barang JOIN ruangan on barang.id_ruangan = ruangan.id_ruangan WHERE ruangan.id_ruangan='$ruangannya'");
    while($dataquery2=mysqli_fetch_array($query2)){
        
    
        $kalimat = $kalimat ."
        ". $dataquery2['nama_barang'] . " ( " . $dataquery2['kapasitas'].") - ".$dataquery2['merek']."<br>";
    }
    
    
        $kalimat = $kalimat . "   </p>
                <a href='formBooking.php?tgl=$tanggalPinjam&start=$mulai&end=$selesai&room=$ruangannya&jenis=$ruang' class='btn btn-dark'>Booking</a>
            </div>
        </div>
    </div>";
    
    
    
    
    
 
    
    
    
    
    
    
}



}
echo json_encode($kalimat);
?>

