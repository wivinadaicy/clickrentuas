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
			<h2>Peminjaman</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
                    <li><span>Peminjaman</span></li>
                    <li><span>Peminjaman Laboratorium</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Peminjaman Lab</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover mb-none">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Acara</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                        <th>Nama Peminjam</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pesan join kategori_acara join pengguna on pengguna.id_pengguna=peminjaman.id_pengguna AND kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan AND pesan.id_peminjaman = peminjaman.id_peminjaman WHERE ruangan.jenis_ruangan='1' AND status_peminjaman='1'");
                        $no=0;
if(mysqli_num_rows($query)==0){
    ?>
    <td colspan="7" style="text-align:center"><br><b>Tidak ada data</b></td>
<?php
}else{

                        while($data=mysqli_fetch_array($query)){
                            $no++;
                            $time = $data['tanggal_peminjaman'];
                            $times = date("l, d F Y",strtotime($time));

                            $mulai = date("H:i",strtotime($data['waktu_mulai']));
                            $selesai = date("H:i",strtotime($data['waktu_selesai']));

                        ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['acara'] ?></td>
                        <td><?php echo $times ?></td>
                        <td><?php echo $mulai . " - " . $selesai ?></td>
                        <td><?php echo $data['nama_ruangan'] ?></td>
                        <td><?php echo $data['nama_lengkap'] ?></td>
                        <td class="actions-hover actions-fade">
                           <!-- nantidulu -->
                        </td>
                    </tr>
<?php include('detailPeminjamanMember.php')?>


<div id="chatadmin" class="modal-block modal-full-color modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Chat dengan pengurus?</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-icon">
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="modal-text">
                    <p><!-- edit disini -->
                    Apakah anda ingin melakukan percakapan teks dengan pengurus peminjaman Anda? <br>Data admin:
                    <br>
                    <?php
                    $idpesan=$data['id_pesan'];
                    $adminny = mysqli_query($koneksi, "SELECT * FROM pesan_detail join pengguna on pengguna.id_pengguna = pesan_detail.id_penggunaDari where id_pesan='$idpesan' AND pesan_detail.id_penggunaDari <> '$id' AND pesan_detail.pesan LIKE 'Selamat%' order by tanggal_waktu asc");
                    $dataadmin = mysqli_fetch_array($adminny);
                    $pengurus = $dataadmin['nama_lengkap'];
                    ?>
                    Nama : <b><?php echo $pengurus ?> <br></b>
                        </p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                <div class="col-md-12 text-right">
                        <a class="btn btn-primary" href="bukaPesan.php?idpesan=<?php echo $idpesan?>">OK</a>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</div>


                    <div id="batalkanpinjaman" class="modal-block modal-full-color modal-block-warning mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Batalkan Peminjaman</h2>
                        </header>
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="modal-icon">
                                    <i class="fa fa-warning"></i>
                                </div>
                                <div class="modal-text">
                                    <h4>Warning</h4>
                                    <p>Apakah Anda yakin akan membatalkan peminjaman?</p>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                <a class="btn btn-primary" href="batalPeminjaman.php?idpinjam=<?php echo $data['id_peminjaman']?>">OK</a>
                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                </div>
                            </div>
                        </footer>
                    </section>
                </div>



                    <?php }} ?>
                </tbody>
            </table>
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