<?php 
include("../koneksi.php");
include("../session.php");

$jenisbarangs = $_POST['jenisbarangs'];
$cari = $_POST['cari'];
$ruangans = $_POST['ruangans'];

$kalimat = '';
if($jenisbarangs=="semua" && $ruangans=="semua"){
	if($cari==""){
		$query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0'");
	}else{
		$query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND (nama_barang LIKE '%$cari%' or merek LIKE '%$cari%' or stok_barang  LIKE '%$cari%' OR nama_ruangan  LIKE '%$cari%')");
	}
    while($data=mysqli_fetch_array($query)){
        $kalimat = $kalimat . "
        
			<tr>
				<td> " . $data['nama_barang'] . "</td>
				<td> " . $data['merek'] . "</td>
				<td> " . $data['stok_barang'] . "</td>
				<td> " . $data['nama_ruangan'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='detailBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='editBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs btn' data-toggle='tooltip' data-placement='top' title='Delete' href='hapusBarang.php?idbrgnya=".$data['id_barang']."'><i class='fa fa-trash-o'></i></a>
				</td>
            </tr>
        ";
    }
    echo json_encode($kalimat);
}

if($jenisbarangs=="semua" && $ruangans!="semua"){
	if($cari==""){
		$query1 = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND ruangan.id_ruangan = '$ruangans'");
	}else{
		$query1 = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND ruangan.id_ruangan = '$ruangans'  AND (nama_barang LIKE '%$cari%' or merek LIKE '%$cari%' or stok_barang  LIKE '%$cari%' OR nama_ruangan  LIKE '%$cari%')");
	}
    
    while($datas=mysqli_fetch_array($query1)){
        $kalimat = $kalimat . "
        
		<tr>
		<td> " . $data['nama_barang'] . "</td>
		<td> " . $data['merek'] . "</td>
		<td> " . $data['stok_barang'] . "</td>
		<td> " . $data['nama_ruangan'] . "</td>
		<td class='text-center'>
			<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='detailBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-eye'></i>
			</a>
			<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='editBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-edit'></i>
			</a>
			<a class='btn btn-danger mb-xs mt-xs mr-xs btn' data-toggle='tooltip' data-placement='top' title='Delete' href='hapusBarang.php?idbrgnya=".$data['id_barang']."'><i class='fa fa-trash-o'></i></a>
		</td>
	</tr>
        ";
    }
    echo json_encode($kalimat);
}

if($ruangans=="semua" && $jenisbarangs!="semua"){
	if($cari==""){
		$query2 = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND id_jenisBarang = '$jenisbarangs'");
	}else{
		$query2 = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND id_jenisBarang = '$jenisbarangs' AND (nama_barang LIKE '%$cari%' or merek LIKE '%$cari%' or stok_barang  LIKE '%$cari%' OR nama_ruangan  LIKE '%$cari%')");
	}
    
    while($data=mysqli_fetch_array($query2)){
        $kalimat = $kalimat . "
        
		<tr>
		<td> " . $data['nama_barang'] . "</td>
		<td> " . $data['merek'] . "</td>
		<td> " . $data['stok_barang'] . "</td>
		<td> " . $data['nama_ruangan'] . "</td>
		<td class='text-center'>
			<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='detailBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-eye'></i>
			</a>
			<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='editBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-edit'></i>
			</a>
			<a class='btn btn-danger mb-xs mt-xs mr-xs btn' data-toggle='tooltip' data-placement='top' title='Delete' href='hapusBarang.php?idbrgnya=".$data['id_barang']."'><i class='fa fa-trash-o'></i></a>
		</td>
	</tr>
        ";
    }
    echo json_encode($kalimat);
}

if($jenisbarangs!="semua" && $ruangans!="semua"){
	if($cari==""){
		$query3 = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND id_jenisBarang = '$jenisbarangs' AND ruangan.id_ruangan = '$ruangans'");
	}else{
		$query3 = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND id_jenisBarang = '$jenisbarangs' AND ruangan.id_ruangan = '$ruangans' AND (nama_barang LIKE '%$cari%' or merek LIKE '%$cari%' or stok_barang  LIKE '%$cari%' OR nama_ruangan  LIKE '%$cari%')");
	}
    while($data=mysqli_fetch_array($query3)){
        $kalimat = $kalimat . "
        
		<tr>
		<td> " . $data['nama_barang'] . "</td>
		<td> " . $data['merek'] . "</td>
		<td> " . $data['stok_barang'] . "</td>
		<td> " . $data['nama_ruangan'] . "</td>
		<td class='text-center'>
			<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='detailBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-eye'></i>
			</a>
			<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='editBarang.php?idbrgnya=" . $data['id_barang'] . "'><i class='fa fa-edit'></i>
			</a>
			<a class='btn btn-danger mb-xs mt-xs mr-xs btn' data-toggle='tooltip' data-placement='top' title='Delete' href='hapusBarang.php?idbrgnya=".$data['id_barang']."'><i class='fa fa-trash-o'></i></a>
		</td>
	</tr>
        ";
    }
    echo json_encode($kalimat);
}


?>