<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php 

 
if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
$query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join kategori_acara join pengguna on pengguna.id_pengguna=peminjaman.id_pengguna AND kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE status_peminjaman='3' AND jenis_ruangan='2' order by peminjaman.waktu_edit desc"); // Get data from Database from demo table
 
 
    $delimiter = ",";
    $filename = "DATA_PJ_MEET-(" . date('Y-m-d') . ").csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers
    $fields = array('ID', 'Nama Acara','Tanggal Peminjaman' ,'Waktu Peminjaman' ,'Nama Ruangan', 'Jenis Ruangan', 'User Peminjam', 'Deskripsi Acara');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
            if($row['jenis_ruangan']=="1"){
                $jr = "Laboratorium"; 
            }else{
                $jr = "Ruang Meeting";
            }

        $lineData = array($row['id_peminjaman'], $row['acara'], $row['tanggal_peminjaman'], $row['waktu_mulai'] . " - " . $row['waktu_selesai'], $row['nama_ruangan'],$jr, $row['nama_lengkap'],$row['deskripsi_acara']);
        fputcsv($f, $lineData, $delimiter);
    }
     
    //move back to beginning of file
    fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
     
    //output all remaining data on a file pointer
    fpassthru($f);
 
 }
}

?>