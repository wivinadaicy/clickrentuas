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
			<h2>Data of Rooms</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Rooms</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<div class="container-fluid">
<div class="panel-body">
<table>
<tr>
<td>Type of Rooms</td> 
		<td>: &nbsp; &nbsp; &nbsp;
		<input type="radio" value="semua" name="jenisruangan" checked onclick="cekRuangan()"> All &nbsp; &nbsp; 
		<input type="radio" value="1"  onclick="cekRuangan()" name="jenisruangan">Laboratory &nbsp; &nbsp; &nbsp;
		<input type="radio" value="2"  onclick="cekRuangan()" name="jenisruangan">Meeting Room &nbsp; &nbsp; &nbsp;
		</td>
</tr>
		
</table>
</div>
<br>
	<?php include('ruangan/modalTambah.php');?>
	<br>
	<hr>
	<h3>Data of Items</h3>
	<table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
		
			<tr>
				<th>Room Name</th>
				<th>Type of Room</th>
				<th>Location</th>
				<th>Capacity</th>
				<th>Action</th>
			</tr>

		</thead>
		<tbody id="barangg">

		
		</tbody>
		
	</table>
	<?php
$querys = mysqli_query($koneksi, "SELECT * from ruangan WHERE ruangan.status_delete='0'");
while($data=mysqli_fetch_array($querys)){

		 include('ruangan/modalDetail.php'); 
		 include('ruangan/modalEdit.php'); 
		 include('ruangan/modalHapus.php'); 

 } ?>
</div>
<br>
<br>

<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>

<script>
function cekBarang(){
  var ruangans = $('#ruangans').children("option:selected").val();
  var jenisbarangs = $("input[name='jenisbarang']:checked").val();

	$.ajax({
		type:"post",
		url:"barangAjax.php",
    dataType: "json",
		data: {ruangans:ruangans, jenisbarangs:jenisbarangs},
		success: function(response){
			$('#barangg').empty();
			$('#barangg').append(response);
		}
	});
}

window.onload = function() {
  cekBarang();
};
</script>