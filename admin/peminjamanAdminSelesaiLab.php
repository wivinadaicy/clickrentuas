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
			<h2>Laboratory Reservation</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
                    <li><span>Finished Reservation</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Laboratory Finished Reservation</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
        <a class="btn btn-info" href="exportSelesaiLab.php?export=true">Export to .csv</a>
<br>
<hr>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join kategori_acara join pengguna on pengguna.id_pengguna=peminjaman.id_pengguna AND kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE status_peminjaman='3' AND jenis_ruangan='1' order by peminjaman.waktu_edit desc");
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