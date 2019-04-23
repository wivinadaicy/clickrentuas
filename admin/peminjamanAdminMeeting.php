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
			<h2>Reservation</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
                    <li><span>Reservation</span></li>
                    <li><span>Meeting Room Reservation</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Meeting Room Reservation - Next Booking</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover mb-none">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Reservator</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pengguna join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan AND pengguna.id_pengguna = peminjaman.id_pengguna WHERE ruangan.jenis_ruangan='2' AND peminjaman.tanggal_peminjaman>=curdate() AND status_peminjaman='1' AND id_peminjaman not in (select id_peminjaman from peminjaman where tanggal_peminjaman=curdate() and waktu_selesai<= curtime()) order by tanggal_peminjaman asc");
                        $no=0;
if(mysqli_num_rows($query)==0){
    ?>
    <td colspan="7" style="text-align:center"><br><b>No Data</b></td>
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
                            <a class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="PDF" href="cetakPeminjamanAkanDatang.php?idpinjam=<?php echo $data['id_peminjaman'] ?>" target="_blank" ><i class='fa fa-download' ></i>
                            </a>
                        </td>
                    </tr>

<div id="selesaikan<?php echo $data['id_peminjaman'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Finish Reservation</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Are you sure that you will finish the reservation with name "<?php echo $data['acara']?>" and reservation code: <?php echo $data['id_peminjaman'] ?> ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="querySelesaikan.php?id=<?php echo $data['id_peminjaman'];?>">Finish</a>
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
        <h2 class="panel-title">Meeting Room Reservation - Passed</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover mb-none">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Reservator</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pengguna join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan AND pengguna.id_pengguna = peminjaman.id_pengguna WHERE ruangan.jenis_ruangan='2' AND status_peminjaman='1' AND id_peminjaman not in (select id_peminjaman from peminjaman where tanggal_peminjaman>=curdate()) or id_peminjaman in (select id_peminjaman from peminjaman where waktu_selesai<=curtime() and tanggal_peminjaman=curdate()) and status_peminjaman='1'  order by tanggal_peminjaman desc");
                        $no=0;
if(mysqli_num_rows($query)==0){
    ?>
    <td colspan="7" style="text-align:center"><br><b>No Data</b></td>
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
                            <a class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="PDF" href="cetakPeminjamanAkanDatang.php?idpinjam=<?php echo $data['id_peminjaman'] ?>" target="_blank" ><i class='fa fa-download' ></i>
                            </a>
                            <a class="btn btn-danger mb-xs mt-xs mr-xs modal-sizes btn btn-danger"data-toggle="tooltip" data-placement="top" title="Finish" href="#selesaikan<?php echo $data['id_peminjaman'];?>"><i class='fa fa-trash-o'></i></a>
                        </td>
                    </tr>

<div id="selesaikan<?php echo $data['id_peminjaman'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Finish Reservation</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Are you sure that you will finish the reservation with name "<?php echo $data['acara']?>" and reservation code: <?php echo $data['id_peminjaman'] ?> ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="querySelesaikan.php?id=<?php echo $data['id_peminjaman'];?>">Finish</a>
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