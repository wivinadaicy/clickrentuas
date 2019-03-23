<?php
session_start();
$email = $_SESSION['email'];
$password =$_SESSION['password'];
$nama = $_SESSION['nama'];
$jk = $_SESSION['jk'];
$id = $_SESSION['id'];
$alamat = $_SESSION['alamat'];
$nohp = $_SESSION['no_hp'];
$status= $_SESSION['status'];

include('../koneksi.php');
?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Data Pengguna</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Pengguna</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<div class="container-fluid">
	<?php include('pengguna/modalTambah.php');?>
	<br>
	<hr>
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th>Nama Lengkap</th>
				<th>Tanggal Lahir</th>
				<th>Email</th>
				<th>Nomor Hp</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from pengguna a join status b ON a.status_pengguna = b.id_status WHERE status_delete='0'");	
			while($data=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['nama_lengkap']?></td>
				<td><?php echo $data['tanggal_lahir']?></td>
				<td><?php echo $data['email']?></td>
				<td><?php echo $data['no_hp']?></td>
				<td><?php echo $data['nama_status']?></td>
				<td class="text-center">
					<a class="modal-with-form btn btn-default" href="#modaldetail<?php echo $data['id_pengguna'];?>"><i class='fa fa-eye'></i>
					</a>
					<a class="modal-with-form btn btn-warning" href="#modal<?php echo $data['id_pengguna'];?>"><i class='fa fa-edit'></i>
					</a>
					<a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default" href="#delete<?php echo $data['id_pengguna'];?>"><i class='fa fa-trash-o'></i></a>
				</td>
			</tr>
			<?php include('pengguna/modaldetail.php');?>
			<?php include('pengguna/modalEdit.php');?>
			<?php include('pengguna/modalHapus.php');?>
			<?php } ?>
		</tbody>
	</table>
</div>
		
		
<!--*****************************-->
<?php include('req/endtitle.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>

		<?php 
		include('pengguna/scriptDetail.php');
		?>