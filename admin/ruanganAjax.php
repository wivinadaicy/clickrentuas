<?php 
include("../koneksi.php");
include("../session.php");

$jenisruangan = $_POST['jenisruangan'];
$cari = $_POST['cari'];

$kalimat = '';
if($jenisruangan=="semua"){
	if($cari==""){
		$query = mysqli_query($koneksi, "SELECT * from ruangan WHERE ruangan.status_delete='0'");
	}else{
		$query = mysqli_query($koneksi, "SELECT * from ruangan WHERE ruangan.status_delete='0' AND (nama_ruangan LIKE '%$cari%' or gedung_lantai LIKE '%$cari%' or kapasitas LIKE '%$cari%')");
	}
   
	if(mysqli_num_rows($query)==0){
		echo json_encode('<td colspan="4" style="font-weight:bold; text-align:center">Tidak ada data</td>');
	}else{
		while($data=mysqli_fetch_array($query)){
			if($data['jenis_ruangan']=="1"){
				$jr = "Laboratory";
			}else{
				$jr="Meeting Room";
			}
			$kalimat = $kalimat . "
			
				<tr>
					<td> " . $data['nama_ruangan'] . "</td>
					<td> " . $jr . "</td>
					<td> " . $data['gedung_lantai'] . "</td>
					<td> " . $data['kapasitas'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='detailRuangan.php?idruang=" . $data['id_ruangan'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='editRuangan.php?idruang=" . $data['id_ruangan'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs btn' data-toggle='tooltip' data-placement='top' title='Delete' href='hapusRuangan.php?idruang=".$data['id_ruangan']."'><i class='fa fa-trash-o'></i></a>
					";
					if($status=="1"){
					$kalimat = $kalimat . "
					<a class='btn mb-xs mt-xs mr-xs btn btn-success'data-toggle='tooltip' data-placement='top' title='Log' href='ruanganLog.php?id=" . $data['id_ruangan']. "'><i class='fa fa-file'></i></a>
					";}
					$kalimat = $kalimat ."
				</td>
			</tr>
			";
		}
		echo json_encode($kalimat);
	}

    
}else{
	if($cari==""){
		$query = mysqli_query($koneksi, "SELECT * from ruangan WHERE ruangan.status_delete='0' AND ruangan.jenis_ruangan='$jenisruangan'");
	}else{
		$query = mysqli_query($koneksi, "SELECT * from ruangan WHERE ruangan.status_delete='0' AND ruangan.jenis_ruangan='$jenisruangan' AND (nama_ruangan LIKE '%$cari%' or gedung_lantai LIKE '%$cari%' or kapasitas LIKE '%$cari%')");
	}
	
    if(mysqli_num_rows($query)==0){
		echo json_encode('<td colspan="4" style="font-weight:bold; text-align:center">Tidak ada data</td>');
	}else{
		while($data=mysqli_fetch_array($query)){
			if($data['jenis_ruangan']=="1"){
				$jr = "Laboratory";
			}else{
				$jr="Meeting Room";
			}
			$kalimat = $kalimat . "
			
				<tr>
					<td> " . $data['nama_ruangan'] . "</td>
					<td> " . $jr . "</td>
					<td> " . $data['gedung_lantai'] . "</td>
					<td> " . $data['kapasitas'] . "</td>
				<td class='text-center'>
					<a class='modal-with-form btn btn-default' data-toggle='tooltip' data-placement='top' title='Detail' href='detailRuangan.php?idruang=" . $data['id_ruangan'] . "'><i class='fa fa-eye'></i>
					</a>
					<a class='modal-with-form btn btn-warning' data-toggle='tooltip' data-placement='top' title='Edit' href='editRuangan.php?idruang=" . $data['id_ruangan'] . "'><i class='fa fa-edit'></i>
					</a>
					<a class='btn btn-danger mb-xs mt-xs mr-xs btn' data-toggle='tooltip' data-placement='top' title='Delete' href='hapusRuangan.php?idruang=".$data['id_ruangan']."'><i class='fa fa-trash-o'></i></a>
					";
					if($status=="1"){
					$kalimat = $kalimat . "
					<a class='btn mb-xs mt-xs mr-xs btn btn-success'data-toggle='tooltip' data-placement='top' title='Log' href='ruanganLog.php?id=" . $data['id_ruangan']. "'><i class='fa fa-file'></i></a>
					";}
					$kalimat = $kalimat ."
				</td>
			</tr>
			";
		}
		echo json_encode($kalimat);
	}
}




?>