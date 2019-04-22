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
			<h2>Reservation Log</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
                    <li><span>Reservation Log</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>ID</th>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pengguna on ruangan.id_ruangan = peminjaman.id_ruangan AND pengguna.id_pengguna=peminjaman.id_pengguna ORDER BY peminjaman.waktu_edit DESC");
if(mysqli_num_rows($query)==0){
    ?>
    <td colspan="7" style="text-align:center"><br><b>No Data</b></td>
<?php
}else{

                        while($data=mysqli_fetch_array($query)){
                            $time = $data['tanggal_peminjaman'];
                            $times = date("l, d F Y",strtotime($time));

                            $mulai = date("H:i",strtotime($data['waktu_mulai']));
                            $selesai = date("H:i",strtotime($data['waktu_selesai']));

                        ?>
                    <tr>
                        <td><?php echo $data['id_peminjaman'] ?></td>
                        <td><?php echo $data['acara'] ?></td>
                        <td><?php echo $times ?></td>
                        <td><?php echo $mulai . " - " . $selesai ?></td>
                        <td><?php echo $data['nama_ruangan'] ?></td>
                        <td><?php echo $data['nama_lengkap'] ?></td>
                        <td>
                           <a href="lihatLog.php?id=<?php echo $data['id_peminjaman'] ?>" class="btn btn-success"><i class='fa fa-file'></i> Log</a>
                        </td>
                    </tr>


                    <?php }} ?>
                </tbody>
            </table>
        </div>
<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>