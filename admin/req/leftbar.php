<div class="inner-wrapper">
	<!-- start: sidebar -->
	<aside id="sidebar-left" class="sidebar-left">

		<div class="sidebar-header">
			<div class="sidebar-title">
				Navigation
			</div>
			<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>

		<div class="nano">
			<div class="nano-content">
				<nav id="menu" class="nav-main" role="navigation">
<!--MENU MENU UNTUK SIDE BAR:

<span class="pull-right label label-primary">182</span>

-->
					<?php
					$query = "SELECT * FROM pengguna WHERE status_delete ='0' AND email='$email' AND kata_sandi='$password'";
					$eksekusi = mysqli_query($koneksi, $query);
					
					$data = mysqli_fetch_array($eksekusi);
					
					if($data['status_pengguna']==1){
					?>
					<ul class="nav nav-main">
						<li class="nav-active">
							<a href="index.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
						<a href="pesan.php">
							<?php
							$ceknotifmail = mysqli_query($koneksi, "SELECT count(pesan_detail.id_pesanDetail) FROM pesan_detail WHERE pesan_detail.id_penggunaKe ='$id' AND status_pesan='0'");

							$datamail = mysqli_fetch_array($ceknotifmail);
							$jumlah = $datamail['count(pesan_detail.id_pesanDetail)'];
							if($jumlah!=0){
?>
							<span class="pull-right label label-primary"><?php echo 
							$jumlah?></span>

							<?php } ?>

							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span>Pesan</span>
						</a>
						</li>
						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"></i>
								<span>Master Data</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="pengguna.php">
										 Pengguna
									</a>
								</li>
								<li>
									<a href="mahasiswa.php">
										 Mahasiswa
									</a>
								</li>
								<li>
									<a href="">
										 Program Studi &amp; Fakultas
									</a>
								</li>
								<li>
									<a href="">
										 Ruangan &amp; Jenis Ruangan
									</a>
								</li>
								<li>
									<a href="barang.php">
										 Barang
									</a>
								</li>
								<li>
									<a href="">
										 Kategori Acara
									</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="memberPending.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>New Member Pending</span>
								<?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(pengguna.id_pengguna) FROM pengguna WHERE status_daftar= '1'");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(pengguna.id_pengguna)'];
								if($jumlah!=0){
									?>
									   &nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah?></span>
									<?php } ?>
							</a>
						</li>

						<hr class="separator" />

						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"></i>
								
								<span>Jadwal</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="jadwalLab.php">
										 Laboratorium
										 
									</a>
								</li>
								<li>
									<a href="">
										 Ruang Meeting
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"> </i>
								<span>Peminjaman Pending </span>
								<?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman WHERE peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5'");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
									   &nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah?></span>
									<?php } ?>
								

							</a>
							<ul class="nav nav-children">
								<li>
									<a href="pendingLab.php">
										 Laboratorium
										 <?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan on ruangan.id_ruangan = peminjaman.id_ruangan WHERE jenis_ruangan= '1' AND (peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5')");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
									   &nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah?></span>
									<?php } ?>
									</a>
								</li>
								<li>
									<a href="pendingMeeting.php">
										 Ruang Meeting
										 <?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan on ruangan.id_ruangan = peminjaman.id_ruangan WHERE jenis_ruangan= '2' AND (peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5')");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
									   &nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah?></span>
									<?php } ?>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"></i>
								
								<span>Peminjaman</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="peminjamanAdminLab.php">
										 Laboratorium
										 
									</a>
								</li>
								<li>
									<a href="">
										 Ruang Meeting
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Selesai</span>
							</a>
						</li>
						<li>
							<a href="logPeminjaman.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Log Peminjaman</span>
							</a>
						</li>
<hr class="separator">
<li>
							<a href="peminjamanMemberAkanDatang.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Akan Datang</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberDitolak.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Ditolak</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberDibatalkan.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Dibatalkan</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberSelesai.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Selesai</span>
							</a>
						</li>
			
					</ul>
					<?php }else if($data['status_pengguna']=="2"){ ?>
					<ul class="nav nav-main">
						<li class="nav-active">
							<a href="index.html">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
						<a href="pesan.php">
							<?php
							$ceknotifmail = mysqli_query($koneksi, "SELECT count(pesan_detail.id_pesanDetail) FROM pesan_detail WHERE pesan_detail.id_penggunaKe ='$id' AND status_pesan='0'");

							$datamail = mysqli_fetch_array($ceknotifmail);
							$jumlah = $datamail['count(pesan_detail.id_pesanDetail)'];
							if($jumlah!=0){
?>
							<span class="pull-right label label-primary"><?php echo 
							$jumlah?></span>

							<?php } ?>

							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span>Pesan</span>
						</a>
						</li>
						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"></i>
								<span>Master Data</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="">
										 Ruangan &amp; Jenis Ruangan
									</a>
								</li>
								<li>
									<a href="">
										 Barang &amp; Jenis Barang
									</a>
								</li>
								<li>
									<a href="">
										 Kategori Acara
									</a>
								</li>
							</ul>
						</li>

						<hr class="separator" />

						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"></i>
								
								<span>Jadwal</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="jadwalLab.php">
										 Laboratorium
										 
									</a>
								</li>
								<li>
									<a href="">
										 Ruang Meeting
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"> </i>
								<span>Peminjaman Pending </span>
								<?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman WHERE peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5'");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
									   &nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah?></span>
									<?php } ?>
								

							</a>
							<ul class="nav nav-children">
								<li>
									<a href="pendingLab.php">
										 Laboratorium
										 <?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan on ruangan.id_ruangan = peminjaman.id_ruangan WHERE jenis_ruangan= '1' AND (peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5')");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
									   &nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah?></span>
									<?php } ?>
									</a>
								</li>
								<li>
									<a href="pendingMeeting.php">
										 Ruang Meeting
										 <?php
								$ceknotifmail = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan on ruangan.id_ruangan = peminjaman.id_ruangan WHERE jenis_ruangan= '2' AND (peminjaman.status_peminjaman ='0' or peminjaman.status_peminjaman='5')");

								$datamail = mysqli_fetch_array($ceknotifmail);
								$jumlah = $datamail['count(peminjaman.id_peminjaman)'];
								if($jumlah!=0){
									?>
									   &nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah?></span>
									<?php } ?>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"></i>
								
								<span>Peminjaman</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="peminjamanAdminLab.php">
										 Laboratorium
										 
									</a>
								</li>
								<li>
									<a href="">
										 Ruang Meeting
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Selesai</span>
							</a>
						</li>
						<hr class="separator">
<li>
							<a href="peminjamanMemberAkanDatang.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Akan Datang</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberDitolak.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Ditolak</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberDibatalkan.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Dibatalkan</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberSelesai.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Selesai</span>
							</a>
						</li>
			
					</ul>
					<?php }else{  ?>
					<ul class="nav nav-main">
						<li class="nav-active">
							<a href="index.html">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
						<a href="pesan.php">
							<?php
							$ceknotifmail = mysqli_query($koneksi, "SELECT count(pesan_detail.id_pesanDetail) FROM pesan_detail WHERE pesan_detail.id_penggunaKe ='$id' AND status_pesan='0'");

							$datamail = mysqli_fetch_array($ceknotifmail);
							$jumlah = $datamail['count(pesan_detail.id_pesanDetail)'];
							if($jumlah!=0){
?>
							<span class="pull-right label label-primary"><?php echo 
							$jumlah?></span>

							<?php } ?>

							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span>Pesan</span>
						</a>
						</li>

						<hr class="separator" />

						<li class="nav-parent">
							<a>
								<i class="fa fa-copy" aria-hidden="true"></i>
								<span>Jadwal</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="">
										 Laboratorium
									</a>
								</li>
								<li>
									<a href="">
										 Ruang Meeting
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="peminjamanMemberAkanDatang.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Akan Datang</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberDitolak.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Ditolak</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberDibatalkan.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Dibatalkan</span>
							</a>
						</li>
						<li>
							<a href="peminjamanMemberSelesai.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Selesai</span>
							</a>
						</li>

			
					</ul>
					<?php } ?>
				</nav>

			</div>
		</div>
	</aside>
	<!-- end: sidebar -->