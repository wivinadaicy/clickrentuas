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
			<h2>Log Peminjaman</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
                    <li><span>Peminjaman</span></li>
                    <<li><a href="logPeminjaman.php"><span>Log Peminjaman</span></a></li>
                    <li><span>Log Peminjaman</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
    <?php $idpem = $_GET['id']?>
        <h2 class="panel-title">Log Peminjaman <?php echo $_GET['id'] ?></h2>
    </header>
    <div class="panel-body">
    <?php
    $add = mysqli_query($koneksi, "SELECT peminjaman.waktu_add, pengguna.nama_lengkap, pengguna.id_pengguna FROM peminjaman join pengguna on pengguna.id_pengguna=peminjaman.user_add WHERE id_peminjaman='$idpem'");
    $riw = mysqli_fetch_array($add);
    ?>
    <h5><b>Tanggal Input:</b> <?php echo date("d M Y | H:i",strtotime($riw['waktu_add']))?> WIB</h5>
    <h5><b>User Input:</b> <?php echo $riw['nama_lengkap'] . " (" .$riw['id_pengguna'] . ")" ?></h4>
    <?php
    ?>
        <div class="table-responsive">
        <table class="table table-striped table-no-more table-bordered  mb-none">
									<thead>
										<tr>
											<th style="width: 10%"><span class="text-normal text-sm">Status</span></th>
											<th style="width: 15%"><span class="text-normal text-sm">Date</span></th>
                                            <th style="width: 15%"><span class="text-normal text-sm">Ruangan</span></th>
											<th><span class="text-normal text-sm">Admin</span></th>
										</tr>
									</thead>
									<tbody class="log-viewer">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT status_peminjaman, log_peminjaman.waktu_edit, ruangan.nama_ruangan, pengguna.nama_lengkap FROM log_peminjaman join pengguna join ruangan on ruangan.id_ruangan = log_peminjaman.id_ruangan AND pengguna.id_pengguna = log_peminjaman.user_edit WHERE id_peminjaman='$idpem' order by log_peminjaman.waktu_edit asc");
                                    if(mysqli_num_rows($query)==0){ ?>
                                        <tr>
                                            <td colspan="4" style="text-align:center">Tidak ada data</td>
                                        </tr>
                                    <?php
                                    }
                                    while($data=mysqli_fetch_array($query)){
                                    ?>
										<tr>
											<td>
                                                <?php
                                                if($data['status_peminjaman']==0){
                                                    $status = "Pending";
                                                }else if($data['status_peminjaman']==1){
                                                    $status = "Diterima";
                                                }else if($data['status_peminjaman']==3){
                                                    $status = "Selesai";
                                                }else if($data['status_peminjaman']==4){
                                                    $status = "Tidak Approve";
                                                }else if($data['status_peminjaman']==5){
                                                    $status = "Dibatalkan";
                                                }else{
                                                    $status = "Time Out";
                                                }
                                                echo $status;
                                                ?>
											</td>
											<td>
                                                <?php 
                                                
                                                echo date("d M Y | H:i",strtotime($data['waktu_edit'])) ?>
											</td>
                                            <td>
                                                <?php 
                                                 echo $data['nama_ruangan'];
                                                ?>
											</td>
											<td>
                                                <?php 
                                                 echo $data['nama_lengkap'];
                                                ?>
											</td>
										</tr>
                                    <?php } ?>
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