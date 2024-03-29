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
			<h2>Data of Items</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Master Data</span></li>
					<li><span>Items</span></li>
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
<td>Type of Items&nbsp; &nbsp; &nbsp;</td> 
		<td>: &nbsp; &nbsp; &nbsp;
		<input type="radio" value="semua" name="jenisbarang" checked onclick="cekBarang()"> All &nbsp; &nbsp; &nbsp; 
		<?php
		$jb = mysqli_query($koneksi, "SELECT * FROM jenis_barang");
		while($djb = mysqli_fetch_array($jb)){
		?>
		<input type="radio" value="<?php echo $djb['id_jenisBarang'] ?>"  onclick="cekBarang()" name="jenisbarang"> <?php echo $djb['nama_jenisBarang'] ?> &nbsp; &nbsp; &nbsp;
		<?php } ?>
		</td>
</tr>
<tr>
	<td>
		Rooms
	</td>
	<td>: &nbsp; &nbsp; &nbsp;
	<select name="ruangans" id="ruangans" onchange="cekBarang()">
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
<br>
<a class="btn btn-info" href="exportBarang.php?export=true">Export to .csv</a>
	<?php include('barang/modalTambah.php');?>
	<br>
	<hr>
	<div class="row">
		<div class="col-sm-9"><h3 style="">Data of Items</h3></div>
		<div class="col-sm-3"><input type="text" placeholder="Search" id="cari" class="form-control" oninput="cekBarang()"></div>
	</div>
	<div class="table-responsive">
	<table class="table table-striped mb-none">
		<thead>
			<tr>
				<th>Item Name</th>
				<th>Brand</th>
				<th>Stock</th>
				<th>Room</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="barangg">

		</tbody>
	</table>
	</div>

	<?php/*
$querys = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0'");
while($data=mysqli_fetch_array($querys)){

		 include('barang/modalDetail.php'); 
		 include('barang/modalEdit.php'); 
		 include('barang/modalHapus.php'); 

 } */?>
</div>
<br>
<br>



<?php if($status=="1"){?>
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
		</div>

		<h2 class="panel-title">Deleted Items</h2>
        <h5>Items data that deleted temporary from the table above (can be restore)</h5>
	</header>
	<div class="panel-body">
		<table class="table table-striped mb-none">
			<thead>
				<tr>
					<th>Item Name</th>
					<th>Brand</th>
					<th>Stock</th>
					<th>Room</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='1'");

			if(mysqli_num_rows($query)==0){ ?>
				<td colspan="4" style="font-weight:bold; text-align:center">No Data</td>
			<?php
			}

			while($data=mysqli_fetch_array($query)){
			?>
				<tr>
				<td> <?php echo $data['nama_barang'] ?></td>
				<td> <?php echo $data['merek'] ?></td>
				<td> <?php echo $data['stok_barang'] ?></td>
				<td> <?php echo $data['nama_ruangan'] ?></td>
				<td class="text-center">
					<a class="modal-sizes btn btn-primary mb-xs mt-xs mr-xs btn" data-toggle="tooltip" data-placement="top" title="Restore" href="#restore<?php echo $data["id_barang"]?>"><i class="fa fa-recycle"></i></a>
					<a class="btn mb-xs mt-xs mr-xs btn btn-success"data-toggle="tooltip" data-placement="top" title="Log" href="barangLog.php?id=<?php echo $data['id_barang'];?>"><i class='fa fa-file'></i></a>
				</td>
            </tr>

						<div id="restore<?php echo $data['id_barang'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Restore Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Are you sure you want to restore data from items with id <?php echo $data['id_barang'] ?> the name " <?php echo $data['nama_barang']?>" ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="barang/restore.php?id=<?php echo $data['id_barang'];?>">Restore</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>
			<?php } ?>
			</tbody>
		</table>


	</div>
</section>
<?php } ?>
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
  var caris = $('#cari').val();

	$.ajax({
		type:"post",
		url:"barangAjax.php",
    dataType: "json",
		data: {ruangans:ruangans, jenisbarangs:jenisbarangs, cari:caris},
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




