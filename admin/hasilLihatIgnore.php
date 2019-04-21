<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
<?php
$id_pinjam = $_GET['idpeminjaman'];

$query = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan JOIN kategori_acara ON pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan AND kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara WHERE id_peminjaman='$id_pinjam'");	
$data = mysqli_fetch_array($query);
?>

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Reservation Detail</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li>
                        <a href="peminjamanPending.php">
                            <span>Waiting to Approve</span>
                        </a>
                    </li>
                    <li><span>Reservation Detail</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<form>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Reservation Detail</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation ID</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i> <!--ganti-->
                            </span>
                            <input type="text" name="idpeminjaman"  id="idpeminjaman" class="form-control" value="<?php echo $id_pinjam ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation Date</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i> <!--ganti-->
                            </span>
                            <input type="text" name="tanggalpeminjaman"  id="tanggalpeminjaman" class="form-control" value="<?php echo $data['tanggal_peminjaman'] ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation Time</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i> <!--ganti-->
                            </span>
                            <input type="text" name="waktupeminjaman"  id="waktupeminjaman" class="form-control" value="<?php echo $data['waktu_mulai'] . " SAMPAI " . $data['waktu_selesai']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-desktop"></i> <!--ganti-->
                            </span>
                            <input type="text" name="ruanganpeminjaman"  id="ruanganpeminjaman" class="form-control" value="<?php echo $data['nama_ruangan'] ?>" disabled/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <a href="#detailRuang" class="btn btn-warning  modal-sizes"><i class="fa fa-eye"></i> Detail</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Event Name</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-gift"></i> <!--ganti-->
                            </span>
                            <input type="text" name="acara"  id="acara" class="form-control" value="<?php echo $data['acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category of Event</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jenis_acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Total Participants</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-group"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jumlah_peserta']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Event Description</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-comment"></i> <!--ganti-->
                            </span>
                            <textarea id="deskripsiacara" name="deskripsiacara" class="form-control" disabled><?php echo $data['deskripsi_acara']?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservator</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i> <!--ganti-->
                            </span>
                            <?php
                            $peminjamm = $data['id_pengguna'];
                            $peminjamnya = mysqli_query($koneksi, "SELECT * FROM pengguna where id_pengguna='$peminjamm'");
                            $datapeminjam = mysqli_fetch_array($peminjamnya);
                            $namapeminjam = $data['nama_lengkap'];
                            ?>
                            <input type="text" name="peminjam"  id="peminjam" class="form-control" value="<?php echo $namapeminjam?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <a href="index.php" id="approve" class="btn btn-primary">OK</a>
                    </div>
                </div>
            </section>


            <div id="detailRuang" class="modal-block modal-block-sm mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Room Details</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                        <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idruangan"  class="form-control" value = "<?php echo $idruang?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room Name<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namaruangan"  id="namaruangan" class="form-control" placeholder="Insert Room Name" value="<?php echo $data['nama_ruangan'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Type of Room<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jenisruangan" value="1" <?php if($data['jenis_ruangan']=="1"){echo "checked";} ?> disabled>Laboratory &nbsp;&nbsp;
					<input type="radio" name="jenisruangan" value="2" disabled <?php if($data['jenis_ruangan']=="2"){echo "checked";} ?> >Meeting Room
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Floor<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="lantai" name="lantai" class="form-control" placeholder="Insert Location" value="<?php echo $data['gedung_lantai'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Capacity<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="kapasitas"  id="stok" class="form-control" placeholder="Insert Capacity of the Room" required value="<?php echo $data['kapasitas'] ?>" readonly>
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-3 control-label">Description<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="deskripsi"  id="stok" class="form-control" placeholder="Insert Description of the Room" required value="<?php echo $data['deskripsi'] ?>" readonly>
				</div>
			</div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-dismiss">OK</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>
</form>




















<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>
