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
			<h2>My Reservation</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Pending Reservation</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Pending Reservation</h2>
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
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $hariini = date('Y-m-d');
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan=peminjaman.id_ruangan  WHERE status_peminjaman='0' AND id_pengguna='$id' order by peminjaman.waktu_add desc");
                        $no=0;
if(mysqli_num_rows($query)==0){
    ?>
    <td colspan="7" style="text-align:center"><br><b>No data</b></td>
<?php
}else{

                        while($data=mysqli_fetch_array($query)){
                            $no++;
                            $time = $data['tanggal_peminjaman'];
                            $times = date("l, d F Y",strtotime($time));

                            $mulai = date("H:i",strtotime($data['waktu_mulai']));
                            $selesai = date("H:i",strtotime($data['waktu_selesai']));

                            $jenisr = $data['jenis_ruangan'];
                            if($jenisr=="1"){
                                $kategori = "Laboratorium";
                            }else{
                                $kategori = "Meeting Room";
                            }
                        ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['acara'] ?></td>
                        <td><?php echo $times ?></td>
                        <td><?php echo $mulai . " - " . $selesai ?></td>
                        <td><?php echo $data['nama_ruangan'] ?></td>
                        
                        <td class=" actions-fade">
                            <!--iconnya buat liat detail kayak biasa-->
                            <a href="#detailpeminjaman" class="modal-sizes btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" ><i class="fa fa-eye"></i></a>
                        
                        </td>
                    </tr>
<?php include('detailPeminjamanMember.php')?>



                    <div id="batalkanpinjaman" class="modal-block modal-full-color modal-block-warning mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Cancel Reservation</h2>
                        </header>
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="modal-icon">
                                    <i class="fa fa-warning"></i>
                                </div>
                                <div class="modal-text">
                                    <h4>Warning</h4>
                                    <p>Are you sure to cancel the reservation?</p>
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