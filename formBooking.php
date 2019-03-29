<?php
session_start();
$email = $_SESSION['email'];
$password =$_SESSION['password'];
$nama = $_SESSION['nama'];
$jk = $_SESSION['jk'];
$id = $_SESSION['id'];
$alamat = $_SESSION['alamat'];
$nohp = $_SESSION['no_hp'];
$status= $_SESSION['status'];

include('koneksi.php');

$date = $_GET['tgl'];
$room = $_GET['room'];
$start = $_GET['start'];
$end = $_GET['end'];
$jenis= $_GET['jenis'];
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Booking Form</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="template/octopus/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="template/octopus/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="template/octopus/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="template/octopus/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="template/octopus/assets/vendor/pnotify/pnotify.custom.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="template/octopus/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="template/octopus/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="template/octopus/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="template/octopus/assets/vendor/modernizr/modernizr.js"></script>
        
        <link rel="stylesheet" href="css/style.css">

	</head>
	<body class="bg-image" style="background-image: url('images/uph6.jpg');">
		<section class="body" style="padding-top: 50px; padding-left: 300px; padding-right:100px">
<div class="row">
	<div class="col-xs-10">
		<section class="panel form-wizard" id="w4">
		<form class="form-horizontal" action="insertRegister.php" method="post" >
			<header class="panel-heading">
				<input type="button" class="btn btn-secondary" value="Back to home">
				<label class="panel-title">Booking Form</label>
			</header>
			<div class="panel-body">
				<div class="wizard-progress wizard-progress-lg">
					<div class="steps-progress">
						<div class="progress-indicator"></div>
					</div>
					<ul class="wizard-steps">
						<li class="active">
							<a href="#w4-a" data-toggle="tab" id="satu"><span>1</span>a</a>
						</li>
						<li>
							<a href="##w4-b" data-toggle="tab" id="dua" ><span>2</span>b</a>
						</li>
						<li>
							<a href="##w4-c" data-toggle="tab"  id="tiga"><span>3</span>c</a>
						</li>
					</ul>
				</div>

				
					<div class="tab-content">

					<div id="w4-a" class="tab-pane active">
                        <div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name">Tanggal Pinjam</label>
							<div class="col-sm-7">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
								<input type="date" class="form-control"  name="tanggalpinjam" id="tanggalpinjam" reqired value="<?php echo $date?>" disabled>
								</div>
							</div>	
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Start</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<input class="form-control" placeholder="Start" required type="text" name="waktuMulai" id="waktumulai" value="<?php echo $start?>">
								</div>	
								<p style="font-size:10px; color:red" id="cekemailnya"></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">End</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<input class="form-control" placeholder="End" required type="text" name="waktuSelesai" id="waktuSelesai" value="<?php echo $end?>"  disabled>
								</div>	
								<p style="font-size:10px; color:red" id="cekemailnya"></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Jenis Ruangan</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<?php
									if($jenis=="1"){
										$jenisruangan = "Laboratorium";
									}else{
										$jenisruangan = "Meeting Room";
									}
									?>
									<input class="form-control" placeholder="Jenis Ruangan" required type="text" name="jenisRuangan" id="jenisRuangan" value="<?php echo $jenisruangan?>"  disabled>
								</div>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Nama Ruangan</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<?php
									$namar = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE id_ruangan='$room'");
									$datanamar = mysqli_fetch_array($namar);
									?>
									<input class="form-control" placeholder="End" required type="text" name="jenisRuangan" id="jenisRuangan" value="<?php echo $datanamar['nama_ruangan']?>"  disabled>
								</div>	
							</div>
						</div>
					</div>

					<div id="w4-b" class="tab-pane">
                        <div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name">Nama Acara</label>
							<div class="col-sm-7">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
								<input type="text" class="form-control"  name="namaacara" id="namaacara" required>
								</div>
							</div>	
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Kategori Acara</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<select id="jenisacara">
									<?php
									$kategoria = mysqli_query($koneksi, "SELECT * FROM kategori_acara WHERE status_delete='0'");
									while($datakate = mysqli_fetch_array($kategoria)){
									?>
									<option value="<?php echo $datakate['id_kategoriAcara'] ?>"><?php echo $datakate['jenis_acara'] ?></option>
									<?php } ?>	
									</select>
								</div>	
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Jumlah Peserta</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<input class="form-control" required type="number" name="jumlahpeserta" id="jumlahpeserta">
								</div>	
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Deskripsi Acara</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<input class="form-control" required type="number" name="deskripsiacara" id="deskripsiacara">
								</div>	
							</div>
						</div>
					</div>

						<div id="w4-c" class="tab-pane">
							<div class="col-md-6">
								<div class="panel-primary">
									<header class="panel-heading">
										<div class="panel-actions">
										</div>
										<h2 class="panel-title">Detail Peminjaman</h2>
									</header>
									<div class="panel-body">
										<h3>Tanggal Peminjaman:</h3>
										<p id="tgl"><?php echo $date?></p>
										<h3>Waktu</h3>
										<p id="waktu"><?php echo $start?> sampai <?php echo $end?></p>
										<h3>Jenis Ruangan:</h3>
										<p id="jenisruangan"><?php echo $jenis?></p>
										<?php
										$namaruangan = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE id_ruangan='$room'");
										$datanamaruangan = mysqli_fetch_array($namaruangan);
										?>
										<h3>Nama Ruangan:</h3>
										<p id="namaruangan"><?php echo $datanamaruangan['nama_ruangan']?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="panel-primary">
									<header class="panel-heading">
										<div class="panel-actions">
										</div>
										<h2 class="panel-title">Detail Peminjaman</h2>
									</header>
									<div class="panel-body">
										<h3>Nama Acara:</h3>
										<p id="namaa"></p>
										<h3>Kategori Acara</h3>
										<p id="jenisa"></p>
										<h3>Jumlah Peserta:</h3>
										<p id="jumlahp"></p>
										<h3>Deskripsi Acara: </h3>
										<p id="deskripsia"></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				
			</div>
			<div class="panel-footer">
				<ul class="pager">
					<li class="previous disabled">
						<a id="kembali"><i class="fa fa-angle-left"></i> Previous</a>
					</li>
					<li class="finish hidden pull-right">
						<a><input type="submit"  name="regis" value="Finish"></a>
					</li>
					<li class="next">
						<a id="berikutnya">Next <i class="fa fa-angle-right"></i></a>
					</li>
				</ul>
			</div>
			</form>
			
		</section>
		
	</div>
</div>
		</section>

        <script src="template/octopus/assets/vendor/jquery/jquery.js"></script>
		<script src="template/octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="template/octopus/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="template/octopus/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="template/octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="template/octopus/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="template/octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="template/octopus/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="template/octopus/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="template/octopus/assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="template/octopus/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="template/octopus/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="template/octopus/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="template/octopus/assets/javascripts/forms/examples.wizard.js"></script>
	</body>
	<script src="scriptRegister.js"></script>
</html>

<script>
	$(document).ready(function(){
		$("#kembali, #berikutnya, #w4-a, #w4-b, #w4-c").click(function(){
				var nacara = $("#namaacara").val();
				$('#namaa').empty();
				$('#namaa').append(nacara);

				var jacara= $("#jenisacara").children("option:selected").val();
				<?php
				$query = mysqli_query($koneksi, "SELECT * FROM kategori_acara WHERE status_delete='0'");
				$data = mysqli_fetch_array($query);
				?>
				$('#jenisa').empty();
				$('#jenisa').append(jacara);

				var jpeserta= $("#jumlahpeserta").val();
				$('#jumlahp').empty();
				$('#jumlahp').append(jpeserta);

				var dacara= $("#deskripsiacara").val();
				$('#deskripsia').empty();
				$('#deskripsia').append(dacara);

		});
		});
</script>