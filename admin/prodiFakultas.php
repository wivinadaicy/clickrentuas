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
			<h2>Data of Major &amp;</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Major &amp; Faculty</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		


	<div class="row">
		<div class="col-sm-9"><h3 style="">Data of Major &amp; Faculty</h3></div>
		<div class="col-sm-3"><input type="text" placeholder="Search" id="cari" class="form-control" oninput="cekRuangan()"></div>
	</div>
	<table class="table table-bordered table-striped" id="datatable-ajax" data-url="assets/ajax/ajax-datatables-sample.json">
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
                        include('../koneksi.php');
                        $query = mysqli_query($koneksi, "SELECT * FROM fakultas join program_studi");
                        $baris = mysqli_num_rows($query);
                        $no = 1;
                        while($data = mysqli_fetch_array($query))
                        {
                ?>
             <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['judul_buku']; ?></td>
                        <td><?php echo $data['nama_pengarang']; ?></td>
                        <td>
                            <a href="detail-buku.php?id=<?php echo $data['id_buku'];?>">
                            <button type="button" class="btn btn-default ">
                            <span class="glyphicon glyphicon-search"></span> Detail </button></a>
                            
                            <a href="ubah-buku.php?id=<?php echo $data['id_buku'];?>">
                            <button type="button" class="btn btn-warning" style="margin-left:10px">
                            <span class="glyphicon glyphicon-pencil"></span>Edit</button></a>
                            
                            <a href="proses-hapus-buku.php?id=<?php echo $data['id_buku'];?>">
                            <button type="button" class="btn btn-danger" style="margin-left:10px">
                            <span class="glyphicon glyphicon-trash"></span>Delete</button></a>
                            
                        </td>
                    </tr>
		
		</tbody>
		
	</table>
	<?php
$querys = mysqli_query($koneksi, "SELECT * from fakultas JOIN program_studi on fakultas.id_fakultas = program_studi.id_fakultas WHERE program_studi.status_delete='0'");
while($data=mysqli_fetch_array($querys)){

		 include('prodiFakultas/modalDetail.php'); 
		 include('prodiFakultas/modalEdit.php'); 
		 include('prodiFakultas/modalHapus.php'); 

 } ?>

<br>
<br>

<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
		</div>

		<h2 class="panel-title">Deleted Major &amp; Faculty</h2>
	</header>
	<div class="panel-body">
		<table class="table table-striped mb-none">
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
			$query = mysqli_query($koneksi, "SELECT * from fakultas JOIN program_studi on fakultas.id_fakultas = program_studi.id_fakultas WHERE program_studi.status_delete='1'");
			while($data=mysqli_fetch_array($query)){
			?>
				<tr>
				<td> <?php echo $data['nama_ruangan'] ?></td>
				<td> <?php echo $data['nama_programStudi']?></td>
				<td> <?php echo $data['nama_fakultas'] ?></td>
				<td class="text-center">
					<a class="modal-sizes btn btn-warning mb-xs mt-xs mr-xs btn" data-toggle="tooltip" data-placement="top" title="Restore" href="#restore<?php echo $data["id_fakultas"]?>"><i class="fa fa-trash-o"></i></a>
					<a class="btn mb-xs mt-xs mr-xs btn btn-success"data-toggle="tooltip" data-placement="top" title="Log" href="ruanganLog.php?id=<?php echo $data['id_fakultas'];?>"><i class='fa fa-file'></i></a>
				</td>
            </tr>
						

<div id="restore<?php echo $data['id_ruangan'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Restore Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Are you sure you want to restore data from rooms with id <?php echo $data['id_ruangan'] ?>the name " <?php echo $data['nama_ruangan']?>" ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="ruangan/restore.php?id=<?php echo $data['id_ruangan'];?>">Restore</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>






			<?php 

			
		} ?>
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

<script>
function cekRuangan(){
  var jenisruangans = $("input[name='jenisruangan']:checked").val();
  var caris = $('#cari').val();

	$.ajax({
		type:"post",
		url:"ruanganAjax.php",
    dataType: "json",
		data: {jenisruangan:jenisruangans,cari:caris},
		success: function(response){
			$('#ruangann').empty();
			$('#ruangann').append(response);
		}
	});
}

window.onload = function() {
  cekRuangan();
};
</script>