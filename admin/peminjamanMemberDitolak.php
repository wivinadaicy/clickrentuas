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
					<li><span>Denied Reservation</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Dennied Reservation</h2>
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
                        <th>Type of Room</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pesan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_pengguna='USER-2' AND status_peminjaman='4' AND peminjaman.id_peminjaman NOT IN (SELECT log_peminjaman.id_peminjaman FROM log_peminjaman WHERE log_peminjaman.status_peminjaman='5') order by peminjaman.waktu_edit desc");
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
                        <td><?php echo $kategori ?></td>
                        <td class="actions-hover actions-fade">
                        <?php 
                        $idp = $data['id_peminjaman'];
                        $qq = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idp'");
                        $dqq = mysqli_fetch_array($qq);
                        if($dqq['user_edit']!=$id){
                        ?>
                            <!--chat admin, ganti iconnya ver-->
                            <a href="#chatadmin" class="modal-sizes" data-toggle="tooltip" data-placement="top" title="Chat" ><i class="fa fa-envelope"></i></a>
                        <?php
                        }
                        ?>
                        </td>
                    </tr>
                    <?php include('detailPeminjamanMember.php')?>
<?php
$pesann = mysqli_query($koneksi, "SELECT * FROM pesan join pengguna on pengguna.id_pengguna=pesan.id_penggunaKirimPesan WHERE id_peminjaman='$idp'");
?>
<div id="chatadmin" class="modal-block modal-full-color modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Chat with staff</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-icon">
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="modal-text">
                    <p><!-- edit disini -->
                    Do you want to make a conversation with the staff?
                    <br>Admin Data:
                    <?php
                    $dataadmin = mysqli_fetch_array($pesann);
                    $pengurus = $dataadmin['nama_lengkap'];
                    ?>
                    Name : <b><?php echo $pengurus ?> <br></b>
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