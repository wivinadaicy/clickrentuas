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
<div class="panel-body">
<table>
<tr>
<td>Jenis Barang&nbsp; &nbsp; &nbsp;</td> 
		<td>: &nbsp; &nbsp; &nbsp;
		<input type="radio" value="semua" name="jenisbarang" checked onclick="cekBarang()"> Semua &nbsp; &nbsp; &nbsp; 
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
		Ruangan
	</td>
	<td>: &nbsp; &nbsp; &nbsp;
	<select name="ruangans" id="ruangans" onchange="cekBarang()">
	<option value="semua">Semua</option>
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
		<tbody id="barangg">

		
		</tbody>
		
	</table>
	<?php
$querys = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0'");
while($data=mysqli_fetch_array($querys)){

		 include('barang/modalDetail.php'); 
		 include('barang/modalEdit.php'); 
		 include('barang/modalHapus.php'); 

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