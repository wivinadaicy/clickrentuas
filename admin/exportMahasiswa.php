<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php 

 
if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
$query = mysqli_query($koneksi, "SELECT * from mahasiswa join pengguna  join program_studi on pengguna.id_pengguna=mahasiswa.id_pengguna AND program_studi.id_programStudi = mahasiswa.id_programStudi WHERE mahasiswa.status_delete='0'"); // Get data from Database from demo table
 
 
    $delimiter = ",";
    $filename = "DATA_MAHASISWA-(" . date('Y-m-d') . ").csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers
    $fields = array('NIM', 'Nama Lengkap', 'Program Studi', 'Angkatan', 'Semester', 'Total SKS', 'IPK Terakhir');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
        $lineData = array($row['id_mahasiswa'], $row['nama_lengkap'], $row['nama_programStudi'], $row['angkatan'], $row['semester'],$row['total_sks'],$row['ipk_terakhir']);
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