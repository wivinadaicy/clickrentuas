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
			<h2>Data Mahasiswa</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Mahasiswa</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<div class="container-fluid">
	<?php include('mahasiswa/modalTambahMahasiswa.php');?>
	<br>
	<hr>
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Nama Pengguna</th>
				<th>Angkatan</th>
				<th>Jurusan</th>
				<th>Semester</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from mahasiswa a JOIN pengguna b JOIN program_studi c ON a.id_pengguna = b.id_pengguna AND c.id_programStudi = a.id_programStudi WHERE b.status_delete = '0' AND b.status_pengguna = '4' AND status_daftar = '2' ");	
			while($data=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['id_mahasiswa']?></td>
				<td><?php echo $data['nama_pengguna']?></td>
				<td><?php echo $data['angkatan']?></td>
				<td><?php echo $data['nama_programStudi']?></td>
				<td><?php echo $data['semester']?></td>
				<td class="text-center">
					<a class="modal-with-form btn btn-default" href="#modaldetail<?php echo $data['id_mahasiswa'];?>"><i class='fa fa-eye'></i>
					</a>
					<a class="modal-with-form btn btn-warning" href="#modal<?php echo $data['id_mahasiswa'];?>"><i class='fa fa-edit'></i>
					</a>
					<a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default" href="#delete<?php echo $data['id_mahasiswa'];?>"><i class='fa fa-trash-o'></i></a>
				</td>
			</tr>
			<?php include('mahasiswa/modaldetailMahasiswa.php');?>
			<?php include('mahasiswa/modalEditMahasiswa.php');?>
			<?php include('mahasiswa/modalHapusMahasiswa.php');?>
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

		<?php 
		include('mahasiswa/scriptDetail.php');
		?>