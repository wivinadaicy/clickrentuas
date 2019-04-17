<?php 
include("../koneksi.php");
include("../session.php");

$jenisbarangs = $_POST['jenisbarangs'];
$ruangans = $_POST['ruangans'];

$kalimat = '';
if($jenisbarangs=="semua" && $ruangans=="semua"){
    $query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0'");
    while($dato=mysqli_fetch_array($query)){
        $kalimat = $kalimat . "
        
<tr>
				<td> " . $dato['nama_barang'] . "</td>
				<td> " . $dato['merek'] . "</td>
				<td> " . $dato['stok_barang'] . "</td>
				<td> " . $dato['nama_ruangan'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='#modaldetail" . $dato['id_barang'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='#modal" . $dato['id_barang'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default' data-toggle='tooltip' data-placement='top' title='Delete' href='#delete" . $dato['id_barang'] . "'><i class='fa fa-trash-o'></i></a>
				</td>
            </tr>
        ";
    }
    echo json_encode($kalimat);
}

if($jenisbarangs=="semua" && $ruangans!="semua"){
    $query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND ruangan.id_ruangan = '$ruangans'");
    while($dato=mysqli_fetch_array($query)){
        $kalimat = $kalimat . "
        
<tr>
				<td> " . $dato['nama_barang'] . "</td>
				<td> " . $dato['merek'] . "</td>
				<td> " . $dato['stok_barang'] . "</td>
				<td> " . $dato['nama_ruangan'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='#modaldetail" . $dato['id_barang'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='#modal" . $dato['id_barang'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default' data-toggle='tooltip' data-placement='top' title='Delete' href='#delete" . $dato['id_barang'] . "'><i class='fa fa-trash-o'></i></a>
				</td>
            </tr>
        ";
    }
    echo json_encode($kalimat);
}

if($ruangans=="semua" && $jenisbarangs!="semua"){
    $query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND id_jenisBarang = '$jenisbarangs'");
    while($dato=mysqli_fetch_array($query)){
        $kalimat = $kalimat . "
        
<tr>
				<td> " . $dato['nama_barang'] . "</td>
				<td> " . $dato['merek'] . "</td>
				<td> " . $dato['stok_barang'] . "</td>
				<td> " . $dato['nama_ruangan'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='#modaldetail" . $dato['id_barang'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='#modal" . $dato['id_barang'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default' data-toggle='tooltip' data-placement='top' title='Delete' href='#delete" . $dato['id_barang'] . "'><i class='fa fa-trash-o'></i></a>
				</td>
            </tr>
        ";
    }
    echo json_encode($kalimat);
}

if($jenisbarangs!="semua" && $ruangans!="semua"){
    $query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND id_jenisBarang = '$jenisbarangs' AND ruangan.id_ruangan = '$ruangans'");
    while($dato=mysqli_fetch_array($query)){
        $kalimat = $kalimat . "
        
<tr>
				<td> " . $dato['nama_barang'] . "</td>
				<td> " . $dato['merek'] . "</td>
				<td> " . $dato['stok_barang'] . "</td>
				<td> " . $dato['nama_ruangan'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='#modaldetail" . $dato['id_barang'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='#modal" . $dato['id_barang'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default' data-toggle='tooltip' data-placement='top' title='Delete' href='#delete" . $dato['id_barang'] . "'><i class='fa fa-trash-o'></i></a>
				</td>
            </tr>
        ";
    }
    echo json_encode($kalimat);
}



?>