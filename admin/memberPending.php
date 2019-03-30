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
			<h2>Data Pending Member</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Pending Member</span></li>
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
				<th>Full Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from pengguna WHERE status_delete='0' AND status_daftar='1'");	
			while($data=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['nama_lengkap']?></td>
				<td><?php echo $data['email']?></td>
				<td><?php echo $data['no_hp']?></td>
				<?php
						   if($data['status_pengguna']=="1"){
							   $statusnya = "Super Admin";
						   }else if($data['status_pengguna']=="2"){
							   $statusnya = "Admin";
						   }else if($data['status_pengguna']=="3"){
								$statusnya = "Member Dosen";
						   }else{
								$statusnya = "Member Mahasiswa";
						   }
						?>
				<td><?php echo $statusnya?></td>
				<td class="text-center">
					<a class="modal-with-form mb-xs mt-xs mr-xs btn btn-default" href="#modaldetail<?php echo $data['id_pengguna'];?>"><i class='fa fa-eye'></i>
					</a>
					<a class="mb-xs mt-xs mr-xs modal-sizes btn btn-success" href="#modalterima<?php echo $data['id_pengguna'];?>"><i class='fa fa-check'></i>
					</a>
					<a class="mb-xs mt-xs mr-xs modal-sizes btn btn-danger" href="#delete<?php echo $data['id_pengguna'];?>"><i class='fa fa-times'></i></a>
				</td>
			</tr>
			<?php include('memberPending/modaldetail.php');?>
			<?php include('memberPending/modalTerima.php');?>
			<?php include('memberPending/modalHapus.php');?>
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
		include('pengguna/scriptDetail.php');
		?>

