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
			<h2>Reservation Detail</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li>
                        <a href="peminjamanPending.php">
                            <span>Waiting to Approve</span>
                        </a>
                    </li>
                    <li><span>Reservation Detail</span></li>
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

                <h2 class="panel-title">Reservation Detail</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation ID</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i> <!--ganti-->
                            </span>
                            <input type="text" name="idpeminjaman"  id="idpeminjaman" class="form-control" value="<?php echo $id_pinjam ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation Date</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i> <!--ganti-->
                            </span>
                            <input type="text" name="tanggalpeminjaman"  id="tanggalpeminjaman" class="form-control" value="<?php echo $data['tanggal_peminjaman'] ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation Time</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i> <!--ganti-->
                            </span>
                            <input type="text" name="waktupeminjaman"  id="waktupeminjaman" class="form-control" value="<?php echo $data['waktu_mulai'] . " SAMPAI " . $data['waktu_selesai']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-desktop"></i> <!--ganti-->
                            </span>
                            <input type="text" name="ruanganpeminjaman"  id="ruanganpeminjaman" class="form-control" value="<?php echo $data['nama_ruangan'] ?>" disabled/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <a href="#detailRuang" class="btn btn-warning  modal-sizes"><i class="fa fa-eye"></i> Detail</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Event Name</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-gift"></i> <!--ganti-->
                            </span>
                            <input type="text" name="acara"  id="acara" class="form-control" value="<?php echo $data['acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category of Event</label>
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
                    <label class="col-sm-3 control-label">Total Participants</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-group"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jumlah_peserta']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Event Description</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-comment"></i> <!--ganti-->
                            </span>
                            <textarea id="deskripsiacara" name="deskripsiacara" class="form-control" disabled><?php echo $data['deskripsi_acara']?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservator</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i> <!--ganti-->
                            </span>
                            <?php
                            $peminjamm = $data['id_pengguna'];
                            $peminjamnya = mysqli_query($koneksi, "SELECT * FROM pengguna where id_pengguna='$peminjamm'");
                            $datapeminjam = mysqli_fetch_array($peminjamnya);
                            $namapeminjam = $data['nama_lengkap'];
                            ?>
                            <input type="text" name="peminjam"  id="peminjam" class="form-control" value="<?php echo $namapeminjam?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <a href="#tolak" id="tolakan" class="modal-with-form  btn btn-default">Deny</a>
                        <a href="#terima" id="approve" class="btn btn-primary modal-sizes">Approve</a>
                    </div>
                </div>
            </section>


            <div id="detailRuang" class="modal-block modal-block-sm mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Room Details</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                        <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idruangan"  class="form-control" value = "<?php echo $data['id_ruangan']?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room Name<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namaruangan"  id="namaruangan" class="form-control" placeholder="Insert Room Name" value="<?php echo $data['nama_ruangan'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Type of Room<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jenisruangan" value="1" <?php if($data['jenis_ruangan']=="1"){echo "checked";} ?> disabled>Laboratory &nbsp;&nbsp;
					<input type="radio" name="jenisruangan" value="2" disabled <?php if($data['jenis_ruangan']=="2"){echo "checked";} ?> >Meeting Room
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Floor<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="lantai" name="lantai" class="form-control" placeholder="Insert Location" value="<?php echo $data['gedung_lantai'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Capacity<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="kapasitas"  id="stok" class="form-control" placeholder="Insert Capacity of the Room" required value="<?php echo $data['kapasitas'] ?>" readonly>
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-3 control-label">Description<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="deskripsi"  id="stok" class="form-control" placeholder="Insert Description of the Room" required value="<?php echo $data['deskripsi'] ?>" readonly>
				</div>
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
                    <form method="post" action = "queryTolakPinjam.php">
                <header class="panel-heading">
                    <h2 class="panel-title">Deny Reservation <?php echo $data['id_peminjaman']?></h2>
                </header>
                <div class="panel-body">
                <h4>
                Acara &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b><?php echo $data['acara']?></b>
                <br>
                Nama Peminjam&nbsp;: <b><?php echo $data['nama_lengkap']?></b>
                </h4>
<?php if($data['id_pengguna']!=$id){?>
                <hr>
                <h5>Messages for Reservator</h5>
                <input type="hidden" name="idpinjam" value="<?php echo $id_pinjam?>">
                    <div class="form-group mt-lg">
                        <div class="col-sm-12">
                            <input type="text" name="alasanTolak"  class="form-control" placeholder="Ketik alasan penolakan">
                            <input type="hidden" name="idtolak" value="<?php echo $id_pinjam ?>">
                        </div>
                    </div>
<?php }else{ ?>
    <input type="hidden" name="alasanTolak"  class="form-control" value="">
                            <input type="hidden" name="idtolak" value="<?php echo $id_pinjam ?>">
<?php }?>

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
            <h4 class="center" style="font-weight:bold; color: green">Waiting List (Time &amp;Room)</h4>
            <p>Date: <b><?php echo $data['tanggal_peminjaman'] ?></b></p>
            <p>Room: <b><?php echo $data['nama_ruangan'] ?></b></p>
	        <hr>
            <table  class="table table-bordered table-striped mb-none" id="datatable-default">
		<thead>
			<tr>
				<th>Reservator</th>
                <th>Event</th>
				<th>Time</th>
				<th>Actions</th>
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
            if(mysqli_num_rows($query)=="0"){
                $tolakcuy = "<p style='text-align:center;font-weight:bold'>Tidak ada peminjaman yang akan ditolak!</p>";
            }
			while($dats=mysqli_fetch_array($query)){
                
                    $tolakcuy = $tolakcuy . "*) Nama Acara: <b> " . $dats['acara']. "</b> dengan Nama Peminjam: <b>". $dats['nama_lengkap'] . "</b> dan pada tanggal <b>". $dats['tanggal_peminjaman'] ."</b>, pukul <b>". $dats['waktu_mulai'] . " - " . $dats['waktu_selesai'] ."</b>.<br>"; 
                
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
                        <h2 class="panel-title">Accept Reservation <?php echo $data['id_peminjaman'] ?></h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                Are you sure to accept the reservation<b>'<?php echo $data['id_peminjaman'] ?>'</b> with the name <b>"<?php echo $data['acara'] ?>"</b>?
                                <br>
                                
                                The following is the dennied reservation:
                                <br>
                                <hr>
                                <?php echo $tolakcuy?>       
                                <hr>
                                <?php if($data['id_pengguna']==$id){?>
                                By click the submit button, messages will automaticly send to either the accepted reservation or the dennied reservation.
                                <?php } ?>                      
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
        <h4 class="center" style="font-weight:bold; color: green">Other Waiting List (Time&amp; not same Room)</h4>
            <p>Date: <b><?php echo $data['tanggal_peminjaman'] ?></b></p>
            <?php
            if($data['jenis_ruangan']=="1"){
                $jr = "Laboratorium";
            }else{
                $jr = "Meeting Room";
            }
            ?>
            <p>Type of Room: <b><?php echo $jr ?></b></p>
	        <hr>
            <table  class="table table-bordered table-striped mb-none" id="datatable-default2">
		<thead>
			<tr>
                <th>Event</th>
                <th>Location</th>
				<th>Actions</th>
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
