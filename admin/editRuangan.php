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
			<h2>Rooms</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><a href="ruangan.php"><span>Rooms</span></a></li>
					<li><span>Edit Room</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<?php
$idruang=$_GET['idruang'];

$query = mysqli_query($koneksi, "SELECT * from ruangan WHERE id_ruangan='$idruang'");
$data=mysqli_fetch_array($query);
?>
        <section class="panel">
        <form action="ruangan/update.php" method="post">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Edit Room</h2>
            </header>
            <div class="panel-body">
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idruangan"  class="form-control" value = "<?php echo $idruang?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room Name<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namaruangan"  id="namaruangan" class="form-control" placeholder="Insert Room Name" value="<?php echo $data['nama_ruangan'] ?>" required>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Type of Room<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jenisruangan" value="1" <?php if($data['jenis_ruangan']=="1"){echo "checked";} ?>>Laboratory &nbsp;&nbsp;
					<input type="radio" name="jenisruangan" value="2" <?php if($data['jenis_ruangan']=="2"){echo "checked";} ?> >Meeting Room
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Floor<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="lantai" name="lantai" class="form-control" placeholder="Insert Location" value="<?php echo $data['gedung_lantai'] ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Capacity<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="kapasitas"  id="stok" class="form-control" placeholder="Insert Capacity of the Room" required value="<?php echo $data['kapasitas'] ?>" required>
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-3 control-label">Description<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="deskripsi"  id="stok" class="form-control" placeholder="Insert Description of the Room" required value="<?php echo $data['deskripsi'] ?>" required>
				</div>
			</div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <a href="ruangan.php" id="simpanemail" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>
            </div>
</form>
                </section>

<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>