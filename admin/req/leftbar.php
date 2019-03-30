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
							<a href="index.html">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
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
						<li>
							<a href="memberPending.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>New Member Pending</span>
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
						<li>
							<a href="peminjamanPending.php">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Tunggu Approve</span>
							</a>
						</li>
						<li>
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman</span>
							</a>
						</li>
						<li>
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Selesai</span>
							</a>
						</li>
						<li>
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Log Peminjaman</span>
							</a>
						</li>

			

						<!--
						<li class="nav-parent">
							<a>
								<i class="fa fa-align-left" aria-hidden="true"></i>
								<span>Menu Levels</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a>First Level</a>
								</li>
								<li class="nav-parent">
									<a>Second Level</a>
									<ul class="nav nav-children">
										<li class="nav-parent">
											<a>Third Level</a>
											<ul class="nav nav-children">
												<li>
													<a>Third Level Link #1</a>
												</li>
												<li>
													<a>Third Level Link #2</a>
												</li>
											</ul>
										</li>
										<li>
											<a>Second Level Link #1</a>
										</li>
										<li>
											<a>Second Level Link #2</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="http://themeforest.net/item/JSOFT-responsive-html5-template/4106987?ref=JSOFT" target="_blank">
								<i class="fa fa-external-link" aria-hidden="true"></i>
								<span>Front-End <em class="not-included">(Not Included)</em></span>
							</a>
						</li>-->
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
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
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
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman Tunggu Approve</span>
							</a>
						</li>
						<li>
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman</span>
							</a>
						</li>
						<li>
							<a href="">
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
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
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
							<a href="">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Peminjaman</span>
							</a>
						</li>
						<li>
							<a href="">
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