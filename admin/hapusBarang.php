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
			<h2>Edit Profile</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Edit Profile</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<?php
$idbarangg=$_GET['idbrgnya'];

$query = mysqli_query($koneksi, "SELECT * from barang join ruangan on ruangan.id_ruangan = barang.id_ruangan WHERE barang.status_delete='0' AND id_barang='$idbarangg'");
$data=mysqli_fetch_array($query);
?>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Change email</h2>
            </header>
            <div class="panel-body">
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Item ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idbarang"  class="form-control" value = "<?php echo $data['id_barang'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Item Name<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namabarang"  id="namabarang" class="form-control" placeholder="ketik nama barang" readonly value = "<?php echo $data['nama_barang'] ?>">
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Type of Item<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jenisbarang" value="1"  <?php if($data['id_jenisBarang']=="1"){echo "checked";} ?>  disabled>Software &nbsp;&nbsp;
					<input type="radio" name="jenisbarang" value="2"<?php if($data['id_jenisBarang']=="2"){echo "checked";} ?>  disabled>Hardware &nbsp;&nbsp;
					<input type="radio" name="jenisbarang" value="3"<?php if($data['id_jenisBarang']=="3"){echo "checked";} ?>  disabled>Etc
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Room<span class="required">*</span></label>
				<div class="col-sm-9">
					<select name="ruangan" disabled>
					<?php
					$r = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE status_delete='0'");
					while($dr = mysqli_fetch_array($r)){
					?>
						<option value="<?php echo $dr['id_ruangan'] ?>" <?php if($dr['id_ruangan']==$data['id_ruangan']){echo "selected";} ?>><?php echo $dr['nama_ruangan'] ?></option>
					<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Brand<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="merek" name="merek" class="form-control" placeholder="ketik merek barang" value = "<?php echo $data['merek'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Stock<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="stok"  id="stok" class="form-control" placeholder="masukkan stok barang" readonly value = "<?php echo $data['stok_barang'] ?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Purchased Date<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggalbeli"  id="tanggalbeli" class="form-control" readonly value = "<?php echo $data['tanggal_beli'] ?>" >
				</div>
			</div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <a href="barang.php" id="simpanemail" class="btn btn-default">Back</a>
                    <a href="barang/delete.php?idbrgnya=<?php echo $idbarangg?>" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>

                </section>

<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>