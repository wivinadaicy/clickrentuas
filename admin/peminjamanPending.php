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
			<h2>Peminjaman Pending</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li>
                        <a href="peminjamanPending.php">
                            <span>Peminjaman Tunggu Approve</span>
                        </a>
                    </li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<div class="container-fluid">
	<br>
	<hr>
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th>Nama Peminjam</th>
                <th>Acara</th>
				<th>Tanggal Peminjaman</th>
				<th>Waktu</th>
				<th>Nama Ruangan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan ON pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE status_peminjaman='0' ORDER BY tanggal_peminjaman ASC");	
			while($data=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['nama_lengkap']?></td>
				<td><?php echo $data['acara']?></td>
				<td><?php echo $data['tanggal_peminjaman']?></td>
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