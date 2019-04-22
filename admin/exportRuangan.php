<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php 

 
if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
$query = mysqli_query($koneksi, "SELECT * from ruangan WHERE status_delete='0'"); // Get data from Database from demo table
 
 
    $delimiter = ",";
    $filename = "DATA_RUANGAN-(" . date('Y-m-d') . ").csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers
    $fields = array('ID', 'Nama Ruangan', 'Jenis Ruangan', 'Gedung', 'Kapasitas', 'Deskripsi');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        if($row['jenis_ruangan']=="1"){
            $jr = "Laboratorium"; 
        }else{
            $jr = "Ruang Meeting";
        }
        
        $lineData = array($row['id_ruangan'], $row['nama_ruangan'], $jr, $row['gedung_lantai'], $row['kapasitas'],$row['deskripsi']);
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