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
			<h2>Data of Major</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Major</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

	<div class="row">
		<div class="col-sm-9"><h3 style="">Data of Major</h3></div>
        <?php include('prodi/modalTambah.php');?>
	</div>
        
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
		
			<tr>
				<th>No.</th>
                <th>Major</th>
                <th>Faculty</th>
				<th>Action</th>
			</tr>

		</thead>
		<tbody>
             <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM program_studi JOIN fakultas on program_studi.id_fakultas = fakultas.id_fakultas WHERE program_studi.status_delete ='0'");
                        $baris = mysqli_num_rows($query);
                        $no = 1;
                        while($data = mysqli_fetch_array($query))
                        {
                ?>
             <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_programStudi']; ?></td>
                        <td><?php echo $data['nama_fakultas']; ?></td>
                        <td>
						<a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#modaldetail<?php echo $data['id_programStudi'];?>"><i class='fa fa-eye'></i>
                          </a>
                          <a class="modal-with-form btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" href="#modal<?php echo $data['id_programStudi'];?>"><i class='fa fa-edit'></i>
                         </a>
                         <a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default"data-toggle="tooltip" data-placement="top" title="Delete" href="#delete<?php echo $data['id_programStudi'];?>"><i class='fa fa-trash-o'></i></a>

						 <?php if($status=="1"){?>
						 
                         <a class="btn mb-xs mt-xs mr-xs btn btn-success"data-toggle="tooltip" data-placement="top" title="Log" href="prodiLog.php?id=<?php echo $data['id_programStudi'];?>"><i class='fa fa-file'></i></a>
						 <?php } ?>
                        </td>
             </tr>
		<?php $no++; 
	include('prodi/modalDetail.php'); 
	include('prodi/modalEdit.php'); 
	include('prodi/modalHapus.php'); 
	
	} ?>
		</tbody>
		
	</table>

        <br>
        <br>

<?php if($status=="1"){ ?>
		<table  class="table table-bordered table-striped mb-none" id="datatable-default2">
		<thead>
		
			<tr>
				<th>No.</th>
                <th>Major</th>
                <th>Faculty</th>
				<th>Action</th>
			</tr>

		</thead>
		<tbody>
             <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM program_studi JOIN fakultas on program_studi.id_fakultas = fakultas.id_fakultas WHERE program_studi.status_delete ='1'");
                        $baris = mysqli_num_rows($query);
                        $no = 1;
                        while($data = mysqli_fetch_array($query))
                        {
                ?>
             <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_programStudi']; ?></td>
                        <td><?php echo $data['nama_fakultas']; ?></td>
                        <td>
						<a class="modal-sizes btn btn-warning mb-xs mt-xs mr-xs btn" data-toggle="tooltip" data-placement="top" title="Restore" href="#restore<?php echo $data["id_programStudi"]?>"><i class="fa fa-trash-o"></i></a>
						 
                         <a class="btn mb-xs mt-xs mr-xs btn btn-success"data-toggle="tooltip" data-placement="top" title="Log" href="prodiLog.php?id=<?php echo $data['id_programStudi'];?>"><i class='fa fa-file'></i></a>
                        </td>
             </tr>

			 <div id="restore<?php echo $data['id_programStudi'];?>" class="modal-block modal-block-sm mfp-hide">
				<section class="panel">
					<header class="panel-heading">
						<h2 class="panel-title">Restore Data</h2>
					</header>
					<div class="panel-body">
						<div class="modal-wrapper">
							<div class="modal-text">
								<p>Are you sure you want to restore data from program studi with id <?php echo $data['id_programStudi'] ?> and name " <?php echo $data['nama_programStudi']?>" ?</p>
							</div>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-12 text-right">
								<a class="btn btn-primary hapus" href="prodi/restore.php?id=<?php echo $data['id_programStudi'];?>">Restore</a>
								<button class="btn btn-default modal-dismiss">Cancel</button>
							</div>
						</div>
					</footer>
				</section>
			</div>
		<?php $no++; 
	



	
	} ?>
		</tbody>
		
	</table>
<?php } ?>
<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>