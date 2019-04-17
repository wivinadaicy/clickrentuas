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
<td>Type of Rooms&nbsp; &nbsp; &nbsp;</td> 
		<td>: &nbsp; &nbsp; &nbsp;
		<input type="radio" value="semua" name="jenisruangan" checked onclick="cekRuangan()"> All &nbsp; &nbsp; 
		<?php
		$jb = mysqli_query($koneksi, "SELECT * FROM jenis_ruangan");
		while($djb = mysqli_fetch_array($jb)){
		?>
		<input type="radio" value="<?php echo $djb['id_ruangan'] ?>"  onclick="cekRuangan()" name="jenisruangan"> <?php echo $djb['nama_ruangan'] ?> &nbsp; &nbsp; &nbsp;
		<?php } ?>
		</td>
</tr>
<tr>
	<td>
		Rooms
	</td>
	<td>: &nbsp; &nbsp; &nbsp;
	<select name="ruangans" id="ruangans" onchange="cekRuangan()">
	<option value="semua">All</option>
			<?php
			$dr= mysqli_query($koneksi, "SELECT * FROM ruangan WHERE status_delete='0'");
			while($ddr = mysqli_fetch_array($dr)){
			?>
				<option value="<?php echo $ddr['id_ruangan'] ?>"><?php echo $ddr['nama_ruangan'] ?></option>
			<?php } ?>
			</select>
	</td>
</tr>

		
</table>
</div>
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