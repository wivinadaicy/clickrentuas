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

$query = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan JOIN kategori_acara ON pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan AND kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara WHERE status_peminjaman='0' AND id_peminjaman='$id_pinjam'");	
$data = mysqli_fetch_array($query);
?>

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Detail Peminjaman</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li>
                        <a href="peminjamanPending.php">
                            <span>Peminjaman Tunggu Approve</span>
                        </a>
                    </li>
                    <li><span>Detail Peminjaman</span></li>
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

                <h2 class="panel-title">Detail Peminjaman</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">ID Peminjaman</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="idpeminjaman"  id="idpeminjaman" class="form-control" value="<?php echo $id_pinjam ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Peminjaman</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="tanggalpeminjaman"  id="tanggalpeminjaman" class="form-control" value="<?php echo $data['tanggal_peminjaman'] ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Waktu Peminjaman</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="waktupeminjaman"  id="waktupeminjaman" class="form-control" value="<?php echo $data['waktu_mulai'] . " SAMPAI " . $data['waktu_selesai']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Ruangan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="ruanganpeminjaman"  id="ruanganpeminjaman" class="form-control" value="<?php echo $data['nama_ruangan'] . " SAMPAI " . $data['waktu_selesai']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Acara</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="acara"  id="acara" class="form-control" value="<?php echo $data['acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jumlah peserta</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jumlah_peserta']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kategori Acara</label>
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
                    <label class="col-sm-3 control-label">Kategori Acara</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <textarea id="deskripsiacara" name="deskripsiacara" class="form-control" disabled><?php echo $data['deskripsi_acara']?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <a href="#" id="tolak" class="btn btn-default  modal-sizes">Tolak</a>
                    <a href="#" id="approve" class="btn btn-primary modal-sizes">Approve</a>
                    </div>
                </div>
            </section>

</form>

<div class="row">
    <div class="col-lg-6">
        <section class="panel-body">
            <h4 class="center" style="font-weight:bold; color: green">Waiting List (Time&Room)</h4>
	        <hr>
            <table  class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Nomor Hp</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                        <a class="modal-with-form btn btn-default" href="#modaldetail<?php echo $data['id_pengguna'];?>"><i class='fa fa-eye'></i>
                        </a>
                        <a class="modal-with-form btn btn-warning" href="#modal<?php echo $data['id_pengguna'];?>"><i class='fa fa-edit'></i>
                        </a>
                        <a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default" href="#delete<?php echo $data['id_pengguna'];?>"><i class='fa fa-trash-o'></i></a>
                    </td>
                </tr>
                <?php include('pengguna/modaldetail.php');?>
                <?php include('pengguna/modalEdit.php');?>
                <?php include('pengguna/modalHapus.php');?>
                <?php } ?>
            </tbody>
        </table>
            </section>
        </div>



    <div class="col-lg-6">
        <section class="panel-body">
            asd
        </section>
    </div>
</div>

<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>
