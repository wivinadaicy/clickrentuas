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
			<h2>Data of Faculty</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Faculty</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

	<div class="row">
		<div class="col-sm-9"><h3 style="">Data of Faculty</h3></div>
        <?php include('fakultas/modalTambah.php');?>
	</div>
        
        
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
		
			<tr>
				<th>No.</th>
                <th>Faculty</th>
				<th>Action</th>
			</tr>

		</thead>
		<tbody>
             <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM fakultas where status_delete='0'");
                        $baris = mysqli_num_rows($query);
						$no = 1;
						if(mysqli_num_rows($query)==0){

						}
                        while($data = mysqli_fetch_array($query))
                        {
                ?>
             <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_fakultas']; ?></td>
                        <td>
                          <a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#modaldetail<?php echo $data['id_fakultas'];?>"><i class='fa fa-eye'></i>
                          </a>
                          <a class="modal-with-form btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" href="#modal<?php echo $data['id_fakultas'];?>"><i class='fa fa-edit'></i>
                         </a>
                         <a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default"data-toggle="tooltip" data-placement="top" title="Delete" href="#delete<?php echo $data['id_fakultas'];?>"><i class='fa fa-trash-o'></i></a>
						 <?php if($status=="1"){?>
                         <a class="btn mb-xs mt-xs mr-xs btn btn-success"data-toggle="tooltip" data-placement="top" title="Log" href="fakultasLog.php?id=<?php echo $data['id_fakultas'];?>"><i class='fa fa-file'></i></a>
						 <?php } ?>
                        </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
        </table>
            <?php 
        $querys = mysqli_query($koneksi, "SELECT * from fakultas  WHERE status_delete='0'");
        while($data=mysqli_fetch_array($querys)){
                 include('fakultas/modalDetail.php'); 
                 include('fakultas/modalEdit.php'); 
                 include('fakultas/modalHapus.php'); 
        } ?>
            
		
		
        <br>
        <br>
		<?php if($status=="1"){?>
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
		</div>

		<h2 class="panel-title">Deleted Faculty</h2>
         <h5>Faculties data that deleted temporary from the table above (can be restore)</h5>
	</header>
	<div class="panel-body">
		<table  class="table table-bordered table-striped mb-none" id="datatable-default2">
			<thead>
				<tr>
					<th>No.</th>
					<th>Faculty</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
                
            <?php
			$query = mysqli_query($koneksi, "SELECT * FROM fakultas  WHERE fakultas.status_delete='1'");
			$no = 1;
			while($data=mysqli_fetch_array($query)){
			?>
                
                <tr>
					<td> <?php echo $no;?></td>
					<td> <?php echo $data['nama_fakultas'] ?></td>
					<td class="text-center">
						<a class="modal-sizes btn btn-primary mb-xs mt-xs mr-xs btn" data-toggle="tooltip" data-placement="top" title="Restore" href="#restore<?php echo $data["id_fakultas"]?>"><i class="fa fa-recycle"></i></a>
						<a class="btn mb-xs mt-xs mr-xs btn btn-success"data-toggle="tooltip" data-placement="top" title="Log" href="fakultasLog.php?id=<?php echo $data['id_fakultas'];?>"><i class="fa fa-file"></i></a>
					</td>
                </tr>
				<div id="restore<?php echo $data['id_fakultas'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Restore Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Are you sure you want to restore data from faculty with id <?php echo $data['id_fakultas'] ?>the name " <?php echo $data['nama_fakultas']?>" ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="fakultas/restore.php?id=<?php echo $data['id_fakultas'];?>">Restore</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>
<?php 

			
		} }?>
                </tbody>
		</table>
     
        
            
						



	
			
			


	</div>
</section>
<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>