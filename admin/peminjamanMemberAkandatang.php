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
					<li><span>Upcoming Reservation</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Upcoming Reservation</h2>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan  join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_pengguna='$id' AND peminjaman.tanggal_peminjaman>=curdate() AND status_peminjaman='1' AND id_peminjaman not in (select id_peminjaman from peminjaman where tanggal_peminjaman=curdate() and waktu_selesai<= curtime()) order by tanggal_peminjaman asc");
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
                        <?php 
                        $idp = $data['id_peminjaman'];
                        $qq = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$idp'");
                        $dqq = mysqli_fetch_array($qq);
                        if($dqq['user_edit']!=$id){
                        ?>
                            <!--chat admin, ganti iconnya ver-->
                            <a href="#chatadmin<?php echo $data['id_peminjaman'] ?>" class="modal-sizes" data-toggle="tooltip" data-placement="top" title="Chat" ><i class="fa fa-envelope"></i></a>
                        <?php
                        }
                        ?>
                            
                            
                            <!-- YANG INI BELUM JADI, iconnya buat print gitu-->
                            <a href="cetakPeminjamanAkanDatang.php?idpinjam=<?php echo $data['id_peminjaman'] ?>" class="btn btn-primary" target="_blank" data-toggle="tooltip" data-placement="top" title="Print" ><i class="fa fa-download"></i></a>

                            <!--iconnya buat liat detail kayak biasa-->
                            <a href="#detailpeminjaman<?php echo $data['id_peminjaman']  ?>" class="modal-sizes btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" ><i class="fa fa-eye"></i></a>
                        

                            <!--batalkan peminjaman, ganti iconnya ver-->
                            <a href="#batalkanpinjaman" class="delete-row modal-sizes btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel" ><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
<?php include('detailPeminjamanMember.php')?>

<?php
$pesann = mysqli_query($koneksi, "SELECT * FROM pesan join pengguna on pengguna.id_pengguna=pesan.id_penggunaKirimPesan WHERE id_peminjaman='$idp'");
?>
<div id="chatadmin<?php echo $data['id_peminjaman'] ?>" class="modal-block modal-full-color modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Chat with Staff</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-icon">
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="modal-text">
                    <p><!-- edit disini -->
                    Do you want to make a conversation with staff? <br>Admin Data:
                    <br>
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
                <?php 
                $ahg = $data['id_peminjaman'];
                $pesannn = mysqli_query($koneksi, "SELECT * FROM pesan where id_peminjaman='$ahg'");
                $dpesannn = mysqli_fetch_array($pesannn);
                ?>
                        <a class="btn btn-primary" href="bukaPesan.php?idpesan=<?php echo $dpesannn['id_pesan']?>">OK</a>
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