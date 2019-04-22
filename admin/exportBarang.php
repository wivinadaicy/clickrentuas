<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php 

 
if(isset($_GET['export'])){
if($_GET['export'] == 'true'){
$query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0'"); // Get data from Database from demo table
 
 
    $delimiter = ",";
    $filename = "DATA_BARANG-(" . date('Y-m-d') . ").csv"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers
    $fields = array('ID', 'Nama Barang', 'Merek', 'Ruangan', 'Stok', 'Tanggal Beli');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $lineData = array($row['id_barang'], $row['nama_barang'], $row['merek'], $row['nama_ruangan'], $row['stok_barang'],date("d-m-Y", strtotime($row['tanggal_beli'])));
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