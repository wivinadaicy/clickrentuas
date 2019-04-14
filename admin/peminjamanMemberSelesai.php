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
			<h2>Peminjaman</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Peminjaman</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Peminjaman Selesai</h2>
    </header>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover mb-none">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Acara</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                        <th>Jenis Ruangan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman join ruangan join pesan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan AND pesan.id_peminjaman = peminjaman.id_peminjaman WHERE id_pengguna='$id' AND status_peminjaman='3' order by peminjaman.waktu_edit desc");
                        $no=0;
if(mysqli_num_rows($query)==0){
    ?>
    <td colspan="7" style="text-align:center"><br><b>Tidak ada data</b></td>
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
                            <!--iconnya buat liat detail kayak biasa-->
                            <a href="#detailpeminjaman" class="modal-sizes"><i class="fa fa-trash-o"></i></a>
                            <!-- YANG INI BELUM JADI, iconnya buat print gitu-->
                            <a href="#cetakberkas" class="modal-sizes"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
<?php include('detailPeminjamanMember.php')?>




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