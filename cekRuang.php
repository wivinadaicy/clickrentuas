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

$akalinMulai = strtotime("+1 minutes", strtotime($mulai));
$mulainya = date('h:i:s', $akalinMulai);

$akalinSelesai = strtotime("-1 minutes", strtotime($selesai));
$selesainya = date('h:i:s', $akalinSelesai);


$query = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE ruangan.jenis_ruangan='$ruang' AND ruangan.id_ruangan NOT IN 
(SELECT peminjaman.id_ruangan FROM peminjaman WHERE peminjaman.status_peminjaman>0 AND peminjaman.tanggal_peminjaman = '$tanggalPinjam' AND 
(
    ((peminjaman.waktu_mulai > '$mulainya') AND (peminjaman.waktu_mulai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai<= '$mulainya') AND (peminjaman.waktu_selesai>='$selesainya'))
                OR
                ((peminjaman.waktu_mulai = '$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai < '$mulainya') AND (peminjaman.waktu_selesai>'$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
    
    ))");

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
                Description : ". $ruangsedia['deskripsi'] ."<br>
                </p>
                <a href='formBooking.php?tgl=$tanggalPinjam&start=$mulai&end=$selesai&room=$ruangannya&jenis=$ruang' class='btn btn-dark'>Booking</a>
            </div>
        </div>
    </div>";
    
}



}
echo json_encode($kalimat);
?>

