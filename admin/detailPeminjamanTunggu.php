<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
<?php
$id_pinjam = $_GET['idpeminjaman'];

$query = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan JOIN kategori_acara ON pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan AND kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara WHERE status_peminjaman='0' AND id_peminjaman='$id_pinjam'");	
$data = mysqli_fetch_array($query);
?>

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Detail Peminjaman</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li>
                        <a href="peminjamanPending.php">
                            <span>Peminjaman Tunggu Approve</span>
                        </a>
                    </li>
                    <li><span>Detail Peminjaman</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<form>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Detail Peminjaman</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">ID Peminjaman</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="idpeminjaman"  id="idpeminjaman" class="form-control" value="<?php echo $id_pinjam ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Peminjaman</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="tanggalpeminjaman"  id="tanggalpeminjaman" class="form-control" value="<?php echo $data['tanggal_peminjaman'] ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Waktu Peminjaman</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="waktupeminjaman"  id="waktupeminjaman" class="form-control" value="<?php echo $data['waktu_mulai'] . " SAMPAI " . $data['waktu_selesai']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Ruangan</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="ruanganpeminjaman"  id="ruanganpeminjaman" class="form-control" value="<?php echo $data['nama_ruangan'] ?>" disabled/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <a href="#detailRuang" class="btn btn-warning  modal-sizes"><i class="fa fa-eye"></i> Detail</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Acara</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="acara"  id="acara" class="form-control" value="<?php echo $data['acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kategori Acara</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jenis_acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jumlah peserta</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jumlah_peserta']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Deskripsi Acara</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <textarea id="deskripsiacara" name="deskripsiacara" class="form-control" disabled><?php echo $data['deskripsi_acara']?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <a href="#tolak" id="tolakan" class="modal-with-form  btn btn-default">Tolak</a>
                    <a href="#terima" id="approve" class="btn btn-primary modal-sizes">Approve</a>
                    </div>
                </div>
            </section>


            <div id="detailRuang" class="modal-block modal-block-sm mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Detail Ruangan</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p><!-- edit disini --></p>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-dismiss">OK</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>
</form>

<div id="tolak" class="modal-block modal-block-md mfp-hide">
            <section class="panel">
                    <form method="get" action = "queryTolakPinjam.php">
                <header class="panel-heading">
                    <h2 class="panel-title">Tolak Peminjaman <?php echo $data['id_peminjaman']?></h2>
                </header>
                <div class="panel-body">
                <h4>
                Acara &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b><?php echo $data['acara']?></b>
                <br>
                Nama Peminjam&nbsp;: <b><?php echo $data['nama_lengkap']?></b>
                </h4>
                <hr>
                <h5>Pesan untuk peminjam</h5>
                <input type="hidden" name="idpinjam" value="<?php echo $id_pinjam?>">
                    <div class="form-group mt-lg">
                        <div class="col-sm-12">
                            <input type="text" name="alasanTolak"  class="form-control" placeholder="Ketik alasan penolakan">
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" name="tolak" id="tolakk" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                        </div>
                    </div>
                </footer>
                    </form>
            </section>
        </div>
















<div class="row">
    <div class="col-lg-6">
        <section class="panel-body">
            <h4 class="center" style="font-weight:bold; color: green">Waiting List (Time&Room)</h4>
            <p>Tanggal: <b><?php echo $data['tanggal_peminjaman'] ?></b></p>
            <p>Ruangan: <b><?php echo $data['nama_ruangan'] ?></b></p>
	        <hr>
            <table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th>Nama Peminjam</th>
                <th>Acara</th>
				<th>Waktu</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
            $ruangans = $data['id_ruangan'];
            $tanggals = $data['tanggal_peminjaman'];
            $mulainya = $data['waktu_mulai'];
            $selesainya = $data['waktu_selesai'];

        /*    $ml = strtotime("+1 minutes", strtotime($mulainya));
            $mulainya1 = date('h:i', $ml);

            $sl = strtotime("-1 minutes", strtotime($selesainya));
            $selesainya1 = date('h:i', $sl);*/

$tolakcuy='';
			$query = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan ON pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE status_peminjaman='0' AND peminjaman.tanggal_peminjaman='$tanggals' AND peminjaman.id_ruangan='$ruangans' AND 
            
            peminjaman.id_peminjaman IN (SELECT peminjaman.id_peminjaman FROM peminjaman WHERE peminjaman.status_peminjaman='0' AND peminjaman.tanggal_peminjaman='$tanggals' AND 
            
                                         
                                         
            (
                ((peminjaman.waktu_mulai > '$mulainya') AND (peminjaman.waktu_mulai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai<= '$mulainya') AND (peminjaman.waktu_selesai>='$selesainya'))
                OR
                ((peminjaman.waktu_mulai = '$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai < '$mulainya') AND (peminjaman.waktu_selesai>'$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
            
             
             
            )) AND peminjaman.id_peminjaman NOT IN (SELECT peminjaman.id_peminjaman FROM peminjaman WHERE peminjaman.id_peminjaman='$id_pinjam')");	
			while($dats=mysqli_fetch_array($query)){
                if(mysqli_num_rows($query)=="0"){
                    $tolakcuy = "<p style='text-align:center;font-weight:bold'>Tidak ada peminjaman yang akan ditolak!</p>";
                }else{
                    $tolakcuy = $tolakcuy . "*) Nama Acara: <b> " . $dats['acara']. "</b> dengan Nama Peminjam: <b>". $dats['nama_lengkap'] . "</b> dan pada tanggal <b>". $dats['tanggal_peminjaman'] ."</b>, pukul <b>". $dats['waktu_mulai'] . " - " . $dats['waktu_selesai'] ."</b>.<br>"; 
                }
			?>
			<tr>
				<td><?php echo $dats['nama_lengkap']?></td>
				<td><?php echo $dats['acara']?></td>
				<td><?php echo $dats['waktu_mulai'] . " - " . $dats['waktu_selesai']?></td>
				<td class="text-center">
					<a class="btn btn-default" href="detailPeminjamanTunggu.php?idpeminjaman=<?php echo $dats['id_peminjaman'];?>"><i class='fa fa-eye'></i> Detail
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
            </section>
        </div>


        <div id="terima" class="modal-block modal-block-lg mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Terima Peminjaman <?php echo $data['id_peminjaman'] ?></h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                Apakah Anda yakin menerima peminjaman <b>'<?php echo $data['id_peminjaman'] ?>'</b> dengan nama acara <b>"<?php echo $data['acara'] ?>"</b>?
                                <br>
                                Berikut adalah peminjaman yang akan ditolak:
                                <br>
                                <hr>
                                <?php echo $tolakcuy?>       
                                <hr>
                                Dengan mengklik submit, pesan akan otomatis dikirimkan untuk peminjam yang diterima maupun yang ditolak.                         
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                            <a href="queryApprovePinjam.php?idpinjam=<?php echo $data['id_peminjaman']?>" class="btn btn-primary" name="terima" id="terimaa">Submit</a>
                                <button class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>



















    <div class="col-lg-6">
        <section class="panel-body">
        <h4 class="center" style="font-weight:bold; color: green">Other Waiting List (Time& not same Room)</h4>
            <p>Tanggal: <b><?php echo $data['tanggal_peminjaman'] ?></b></p>
            <?php
            if($data['jenis_ruangan']=="1"){
                $jr = "Laboratorium";
            }else{
                $jr = "Meeting Room";
            }
            ?>
            <p>Jenis Ruangan: <b><?php echo $jr ?></b></p>
	        <hr>
            <table  class="table table-bordered table-striped mb-none" id="datatable-default2">
		<thead>
			<tr>
                <th>Acara</th>
                <th>Tempat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
            $ruangans = $data['id_ruangan'];
            $tanggals = $data['tanggal_peminjaman'];
            $mulainya = $data['waktu_mulai'];
            $selesainya = $data['waktu_selesai'];
            $jenisr = $data['jenis_ruangan'];

			$quero = mysqli_query($koneksi, "SELECT * from peminjaman JOIN pengguna JOIN ruangan JOIN kategori_acara ON kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND pengguna.id_pengguna = peminjaman.id_pengguna AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE status_peminjaman='0' AND ruangan.jenis_ruangan='$jenisr' AND peminjaman.tanggal_peminjaman='$tanggals' AND 
            
            peminjaman.id_peminjaman IN (
                
                SELECT peminjaman.id_peminjaman FROM peminjaman WHERE peminjaman.status_peminjaman='0' AND peminjaman.tanggal_peminjaman='$tanggals' AND (
                    
                    ((peminjaman.waktu_mulai > '$mulainya') AND (peminjaman.waktu_mulai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai<= '$mulainya') AND (peminjaman.waktu_selesai>='$selesainya'))
                OR
                ((peminjaman.waktu_mulai = '$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
                OR
                ((peminjaman.waktu_mulai < '$mulainya') AND (peminjaman.waktu_selesai>'$mulainya') AND (peminjaman.waktu_selesai<'$selesainya'))
            
            )) 
            
            AND peminjaman.id_peminjaman NOT IN (SELECT peminjaman.id_peminjaman FROM peminjaman WHERE peminjaman.id_peminjaman='$id_pinjam') AND peminjaman.id_ruangan NOT IN (SELECT peminjaman.id_ruangan FROM peminjaman WHERE peminjaman.id_ruangan = '$ruangans')");	
			while($dato=mysqli_fetch_array($quero)){
			?>
			<tr>
				<td><?php echo $dato['acara']?></td>
                <td><?php echo $dato['nama_ruangan']?></td>
				<td class="text-center">
					<a class="modal-with-form btn btn-default" href="#detailPinjaman<?php echo $dato['id_peminjaman']?>"><i class='fa fa-eye'></i> Detail
                    </a>
                    <a class="modal-sizes btn btn-warning" href="#tukarPinjaman<?php echo $dato['id_peminjaman']?>"><i class='fa fa-eye'></i> Tukar
                    </a>
				</td>
            </tr>
            <?php 
        include('detailPinjaman.php');
        include('tukarPinjaman.php');
        } ?>
		</tbody>
	</table>
        </section>
    </div>
</div>

<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>
