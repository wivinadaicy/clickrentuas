<?php 
include("../koneksi.php");
include("../session.php");

$jenisruangan = $_POST['jenisruangan'];

$kalimat = '';
if($jenisruangan=="semua"){
    $query = mysqli_query($koneksi, "SELECT * from ruangan WHERE ruangan.status_delete='0'");
    while($dato=mysqli_fetch_array($query)){
		if($dato['jenis_ruangan']=="1"){
			$jr = "Laboratory";
		}else{
			$jr="Meeting Room";
		}
        $kalimat = $kalimat . "
        
<tr>
				<td> " . $dato['nama_ruangan'] . "</td>
				<td> " . $jr . "</td>
				<td> " . $dato['gedung_lantai'] . "</td>
				<td> " . $dato['kapasitas'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='#modaldetail" . $dato['id_ruangan'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='#modal" . $dato['id_ruangan'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default' data-toggle='tooltip' data-placement='top' title='Delete' href='#delete" . $dato['id_ruangan'] . "'><i class='fa fa-trash-o'></i></a>
				</td>
            </tr>
        ";
    }
    echo json_encode($kalimat);
}else{
	$query = mysqli_query($koneksi, "SELECT * from ruangan WHERE ruangan.status_delete='0' AND ruangan.jenis_ruangan='$jenisruangan'");
    while($dato=mysqli_fetch_array($query)){
		if($dato['jenis_ruangan']=="1"){
			$jr = "Laboratory";
		}else{
			$jr="Meeting Room";
		}
        $kalimat = $kalimat . "
        
<tr>
				<td> " . $dato['nama_ruangan'] . "</td>
				<td> " . $jr . "</td>
				<td> " . $dato['gedung_lantai'] . "</td>
				<td> " . $dato['kapasitas'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='#modaldetail" . $dato['id_ruangan'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='#modal" . $dato['id_ruangan'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default' data-toggle='tooltip' data-placement='top' title='Delete' href='#delete" . $dato['id_ruangan'] . "'><i class='fa fa-trash-o'></i></a>
				</td>
            </tr>
        ";
	}
	echo json_encode($kalimat);
}




?>