<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Pending Reservation: Laboratory</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li>
                        <a href="peminjamanPending.php">
                            <span>Waiting to approved  - Laboratory</span>
                        </a>
                    </li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		<h2 style="text-align:center">Laboratory</h2>
		<?php
		$harini = date("Y-m-d H:i");
		$jamini = date("H:i");
		echo $harini;
		echo $jamini;
		$queryh = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE tanggal_peminjaman <= '$harini' AND status_peminjaman<>'6' AND status_peminjaman='0' AND waktu_mulai <= '$jamini' order by peminjaman.waktu_add desc");

		while($datas = mysqli_fetch_array($queryh)){
			$idpinjam = $datas['id_peminjaman'];
			$queryt = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='6' WHERE id_peminjaman='$idpinjam'");
			
$cblogpinjam2 = mysqli_query($koneksi, "SELECT * FROM log_peminjaman");
$bariscbpinjam2 = mysqli_num_rows($cblogpinjam2);
$jadibarislogpj2 = $bariscbpinjam2+1;

$datapinjam2 = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idpinjam'");
$simpandatapinjam2 = mysqli_fetch_array($datapinjam2);

$pinjam2_tanggal= $simpandatapinjam2['tanggal_peminjaman'];
$pinjam2_mulai= $simpandatapinjam2['waktu_mulai'];
$pinjam2_selesai= $simpandatapinjam2['waktu_selesai'];
$pinjam2_orang= $simpandatapinjam2['id_pengguna'];
$pinjam2_acara= $simpandatapinjam2['acara'];
$pinjam2_peserta= $simpandatapinjam2['jumlah_peserta'];
$pinjam2_kategoriacara= $simpandatapinjam2['id_kategoriAcara'];
$pinjam2_deskripsiacara= $simpandatapinjam2['deskripsi_acara'];
$pinjam2_ruang= $simpandatapinjam2['id_ruangan'];

$setlogdata = mysqli_query($koneksi,
"INSERT INTO log_peminjaman values ('$jadibarislogpj2','$idpinjam','$pinjam2_tanggal','$pinjam2_ruang','$pinjam2_mulai','$pinjam2_selesai','$pinjam2_orang','$pinjam2_acara','$pinjam2_peserta','$pinjam2_kategoriacara','$pinjam2_deskripsiacara','6','$id',now())");
		}
		?>
<div class="container-fluid">
	<hr>
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th>Reservation Name</th>
                <th>Event</th>
				<th>Reservation Date</th>
				<th>Time</th>
				<th>Room Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan ON pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE ruangan.jenis_ruangan='1' AND status_peminjaman='0' ORDER BY peminjaman.waktu_add DESC");	
			$no=0;
			while($data=mysqli_fetch_array($query)){
				$no++;
			?>
			<tr>
				<td><?php echo $data['nama_lengkap']?></td>
				<td><?php echo $data['acara']?></td>
				<td><?php echo date("l, d M Y",strtotime($data['tanggal_peminjaman']))?></td>
				<td><?php echo $data['waktu_mulai'] . " - " . $data['waktu_selesai']?></td>
                <td><?php echo $data['nama_ruangan']?></td>
				<td class="text-center">
					<a class="btn btn-default" href="detailPeminjamanTunggu.php?idpeminjaman=<?php echo $data['id_peminjaman'];?>"><i class='fa fa-eye'></i> Detail
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	
		
<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>