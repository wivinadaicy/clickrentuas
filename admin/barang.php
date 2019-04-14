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
			<h2>Data Barang</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Barang</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<div class="container-fluid">
<h4>Jenis Barang: 
	<select>
		<?php
		$jb = mysqli_query($koneksi, "SELECT * FROM jenis_barang");
		while($djb = mysqli_fetch_array($jb)){
		?>
		<option value="<?php echo $djb['id_jenisBarang'] ?>"><?php echo $djb['nama_jenisBarang'] ?></option>
		<?php } ?>
	</select>
</h4>
	<?php include('barang/modalTambah.php');?>
	<br>
	<hr>
	<h3>Data Barang</h3>
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th>Nama Barang</th>
				<th>Merek</th>
				<th>Stok</th>
				<th>Ruangan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0'");	
			while($data=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['nama_barang'] ?></td>
				<td><?php echo $data['merek'] ?></td>
				<td><?php echo $data['stok_barang'] ?></td>
				<td><?php echo $data['nama_ruangan'] ?></td>
				<td class="text-center">
					<a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#modaldetail<?php echo $data['id_barang'];?>"><i class='fa fa-eye'></i>
					</a>
					<a class="modal-with-form btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" href="#modal<?php echo $data['id_barang'];?>"><i class='fa fa-edit'></i>
					</a>
					<a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default"data-toggle="tooltip" data-placement="top" title="Delete" href="#delete<?php echo $data['id_barang'];?>"><i class='fa fa-trash-o'></i></a>
					<a class="btn mb-xs mt-xs mr-xs btn btn-success"data-toggle="tooltip" data-placement="top" title="Log" href="penggunaLog.php?id=<?php echo $data['id_pengguna'];?>"><i class='fa fa-trash-o'></i></a>
				</td>
			</tr>
			<?php include('barang/modaldetail.php');?>
			<?php include('barang/modalEdit.php');?>
			<?php include('barang/modalHapus.php');?>
			<?php } ?>
		</tbody>
	</table>
</div>
<br>
<br>
<div class="container-fluid">
	<br>
	<h3>Data Barang (deleted)</h3>
	<hr>
	<table  class="table table-bordered table-striped mb-none" id="datatable-default2">
		<thead>
			<tr>
				<th>Full Name</th>
				<th>Email</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='1'");	
			while($data=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['nama_barang'] ?></td>
				<td><?php echo $data['merek'] ?></td>
				<td><?php echo $data['stok_barang'] ?></td>
				<td><?php echo $data['nama_ruangan'] ?></td>
				<td class="text-center">
					<a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#modaldetail<?php echo $data['id_barang'];?>"><i class='fa fa-eye'></i>
				</td>
			</tr>
			<?php include('barang/modaldetail.php');?>
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
