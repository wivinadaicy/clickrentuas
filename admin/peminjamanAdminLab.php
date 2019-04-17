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
        <h2 class="panel-title">Peminjaman Lab - Next Booking</h2>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pengguna join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan AND pengguna.id_pengguna = peminjaman.id_pengguna WHERE ruangan.jenis_ruangan='1' AND peminjaman.tanggal_peminjaman>=curdate() AND status_peminjaman='1' AND id_peminjaman not in (select id_peminjaman from peminjaman where tanggal_peminjaman=curdate() and waktu_selesai<= curtime())");
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
                        <td class=" actions-fade">
                        <a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#detailpinjamnya<?php echo $data['id_peminjaman'];?>"><i class="fa fa-eye"></i>
                        </a>
                            <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="PDF" href="cetakPeminjamanAkanDatang.php?idpinjam=<?php echo $data['id_peminjaman'] ?>" target="_blank" ><i class='fa fa-eye' ></i>
                            </a>
                        </td>
                    </tr>

<div id="selesaikan<?php echo $data['id_peminjaman'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Menyelesaikan Pinjaman</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Apakah anda yakin akan menyelesaikan peminjaman dengan acara "<?php echo $data['acara']?>" dan kode peminjaman: <?php echo $data['id_peminjaman'] ?> ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="querySelesaikan.php?id=<?php echo $data['id_peminjaman'];?>">Selesaikan</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>
<?php include('modalDetailPinjam.php');?>

                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


















<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Peminjaman Lab - Passed</h2>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pengguna join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan AND pengguna.id_pengguna = peminjaman.id_pengguna WHERE ruangan.jenis_ruangan='1' AND peminjaman.tanggal_peminjaman<=curdate() AND status_peminjaman='1' AND id_peminjaman not in (select id_peminjaman from peminjaman where tanggal_peminjaman=curdate() and waktu_selesai>= curtime())");
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
                        <td class=" actions-fade">
                        <a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#detailpinjamnya<?php echo $data['id_peminjaman'];?>"><i class="fa fa-eye"></i>
                        </a>
                            <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="PDF" href="cetakPeminjamanAkanDatang.php" target="_blank" ><i class='fa fa-eye' ></i>
                            </a>
                            <a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-default"data-toggle="tooltip" data-placement="top" title="Selesaikan" href="#selesaikan<?php echo $data['id_peminjaman'];?>"><i class='fa fa-trash-o'></i></a>
                        </td>
                    </tr>

<div id="selesaikan<?php echo $data['id_peminjaman'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Menyelesaikan Pinjaman</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Apakah anda yakin akan menyelesaikan peminjaman dengan acara "<?php echo $data['acara']?>" dan kode peminjaman: <?php echo $data['id_peminjaman'] ?> ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="querySelesaikan.php?id=<?php echo $data['id_peminjaman'];?>">Selesaikan</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>
<?php include('modalDetailPinjam.php');?>

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