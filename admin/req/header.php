		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../index.php" class="logo">
						<img src="../images/logo-sistech.png" height="40" alt="JSOFT Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<ul class="notifications">
						
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-envelope"></i>
								<?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(pesan_detail.id_pesanDetail) FROM pesan_detail WHERE pesan_detail.id_penggunaKe ='$id' AND status_pesan='0'");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(pesan_detail.id_pesanDetail)'];
								if($jumlah!=0){
									?>
								<span class="badge"><?php echo 
							$jumlah?></span>
								<?php } ?>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<?php
									if($jumlah!=0){
										?>
									<span class="pull-right label label-default"><?php echo 
							$jumlah?></span>
									<?php } ?>
									Messages
								</div>
			
								<div class="content">
									<ul>
<?php

$querypesan = mysqli_query($koneksi, "select * from pesan_detail join pesan on pesan.id_pesan = pesan_detail.id_pesan where pesan_detail.status_pesan='0' and id_penggunaKe='$id' ORDER BY tanggal_waktu DESC LIMIT 4");
if(mysqli_num_rows($querypesan)==0){
 ?>
 <p style="text-align:center">Tidak ada pesan baru</p>
 <?php
}else{

while($datapesan = mysqli_fetch_array($querypesan)){
	$idpesannya = $datapesan['id_pesan'];
?>
										<li>
											<a href="bukaPesan.php?idpesan=<?php echo $idpesannya?>" class="clearfix">
												<figure class="image">
<?php
$org = $datapesan['id_penggunaDari'];
$orangnya = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$org'");

$dataorang = mysqli_fetch_array($orangnya);

$jk = $dataorang['jenis_kelamin'];
if($jk=="l"){
	$foto = "../images/fotoprofil/male.png";
}else{
	$foto = "../images/fotoprofil/female.png";
}
?>

													<img src="<?php echo $foto?>" width="35px" alt="Joseph Doe Junior" class="img-circle" />
												</figure>
												<span class="title"><?php echo $dataorang['nama_lengkap'] ?></span>
												<span class="message"><?php echo $datapesan['pesan'] ?></span>
											</a>
										</li>
<?php } } ?>

										
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="pesan.php" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>

						<!--notif-->
						<?php
						if($status==1 || $status==2){
							?>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								<?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman WHERE peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5'");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
								<span class="badge"><?php echo $jumlah?> </span>
								<?php } ?>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
								<?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman WHERE peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5'");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
									<span class="pull-right label label-default"><?php echo $jumlah?></span>
									<?php } ?>
									Alerts
								</div>
			
								<div class="content">
									<ul>
<?php


$notif = mysqli_query($koneksi, "select * from peminjaman where peminjaman.status_peminjaman = '0' or peminjaman.status_peminjaman='5' order by waktu_add desc LIMIT 4");
$jumlahnotif = mysqli_num_rows($notif);
if($jumlahnotif=='0'){

?>
	<p style="text-align:center">Tidak ada notifikasi baru</p>
<?php
}else{
while($datanotif = mysqli_fetch_array($notif)){
?>
										<li>
											<a href="detailPeminjamanTunggu.php?idpeminjaman=<?php echo $datanotif['id_peminjaman'];?>" class="clearfix">
												<div class="image">
													<i class="fa fa-exclamation bg-success"></i>
												</div>
												<span class="title"><b>[<?php echo $datanotif['id_peminjaman']?>]</b> <?php echo $datanotif['acara']?></span>
												<span class="message">
													<?php
													if($datanotif['status_peminjaman']=="0"){
														$stas = "Peminjaman tunggu approve";
													}
													if($datanotif['status_peminjaman']=="5"){
														$stas = "Peminjaman dibatalkan";
													}
													echo $stas;
													?>
												</span>
											</a>
										</li>
										
<?php } }?>
									</ul>
													
									<hr />
			
									<div class="text-right">
										<a href="pendingLab.php" class="view-more">View All Lab Pending</a><br>
										<a href="pendingMeeting.php" class="view-more">View All MeetingRoom Pending</a>
									</div>
								</div>
							</div>
						</li>
						<?php }?>	
					</ul>
							
					<span class="separator"></span>
	
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<?php
								if($jk=="l"){
									$foto = "../images/fotoprofil/male.png";
								}else{
									$foto = "../images/fotoprofil/female.png";
								}
								?>
								<img src="<?php echo $foto ?>"/>
							</figure>
							<div class="profile-info">
								<span class="name"><?php echo $nama ?></span>
								<?php 
								$query = mysqli_query($koneksi, "SELECT * from pengguna WHERE id_pengguna='$id'");
								$data = mysqli_fetch_array($query);	
								
								if($data['status_pengguna']=="1"){
									$stat = "Super Admin";
								}else if($data['status_pengguna']=="2"){
									$stat = "Admin";
								}else if($data['status_pengguna']=="3"){
									$stat = "Member Dosen";
								}else{
									$stat = "member Mahasiswa";
								}
								?>
								<span class="role"><?php echo $stat?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a class="modal-sizes" role="menuitem" tabindex="-1" href="#lihatprofil"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="editProfile.php"><i class="fa fa-user"></i> Edit Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="settingProfile.php"><i class="fa fa-power-off"></i>Account Settings</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->