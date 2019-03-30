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
			<h2>User Data</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>User</span></li>
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
				<th>Full Name</th>
				<th>Date of Birth</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = mysqli_query($koneksi, "SELECT * from pengguna WHERE status_delete='0' AND status_daftar='2'");	
			while($data=mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['nama_lengkap']?></td>
				<td><?php echo $data['tanggal_lahir']?></td>
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
					<a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#modaldetail<?php echo $data['id_pengguna'];?>"><i class='fa fa-eye'></i>
					</a>
					<a class="modal-with-form btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" href="#modal<?php echo $data['id_pengguna'];?>"><i class='fa fa-edit'></i>
					</a>
					<a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default"data-toggle="tooltip" data-placement="top" title="Delete" href="#delete<?php echo $data['id_pengguna'];?>"><i class='fa fa-trash-o'></i></a>
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
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>

		<?php 
		include('pengguna/scriptDetail.php');
		?>

<script>
function cekEmail(){
	$(document).ready(function(){
	var email2 = $("#email").val();
	
	$.ajax({
		type:"post",
		url:"../cekemailAjax.php",
		dataType: "JSON",
		data: {email:email2},
		success: function(respond){
			if(respond==1){
				$("#tambah").hide();
				$("#cekemailnya").html("*Email sudah terdaftar");
			}else{
				$("#tambah").show();
				$("#cekemailnya").empty();
				document.getElementById('dua').style.pointerEvents = 'none';
				document.getElementById('tiga').style.pointerEvents = 'none';
				document.getElementById('empat').style.pointerEvents = 'none';
			}
			
		}
	});
});
}

</script>
        
<script>      
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>