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
			<h2>Reserve Room</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><a href="jadwalMeeting.php"><span>Meeting Room Schedule</span></a></li>
					<li><span>Reserve Meeting Room</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<?php
$tanggals = $_GET['tanggal'];

$qu = mysqli_query($koneksi, "SELECT * FROM peminjaman");
$hq = mysqli_num_rows($qu)+1;
$idp = "PJ-" . $hq;
?>
	<form method="post" action="queryInsertPinjaman.php">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Insert Reservation</h2>
            </header>
            <div class="panel-body">
                        <div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name">Reservation ID</label>
							<div class="col-sm-7">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
								<input type="text" class="form-control"  name="idpeminjaman" id="idpeminjaman" value="<?php echo $idp?>" readonly>
								</div>
							</div>	
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Type of Room</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<input class="form-control" placeholder="Jenis Ruangan"  type="text" name="jenisRuangan" id="jenisRuangan" value="Meeting Room"  readonly>
								</div>	
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name">Reservation date</label>
							<div class="col-sm-7">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
								<input type="date" class="form-control"  name="tanggalpinjam" id="tanggalpinjam" value="<?php echo $tanggals?>" readonly>
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
									<select name="waktuMulai" id="waktuMulai" class="form-control" onchange="cekwaktuSelesai()" >
                                        <option value="x">Options</option>

                                        <?php
                                        $cekAkhir = mysqli_query($koneksi, "SELECT DISTINCT waktu_mulai FROM waktu_jadwal");

                                        while($datajamdepan = mysqli_fetch_array($cekAkhir)){
                                        ?>
                                            
                                            <option value="<?php echo $datajamdepan['waktu_mulai'] ?>"> <?php echo $datajamdepan['waktu_mulai'] ?> </option>
                                        <?php } ?>
                                        </select>
								</div>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">End</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<select name="waktuSelesai" id="waktuSelesai" class="form-control" disabled>

                                    </select>
								</div>	
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label" for="w4-username">Room Name</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<select name="namaruangan" id="namaruangan">
                                    
                                    </select>
								</div>	
							</div>
						</div>
                        
						<hr class="separator">
						







                        <div class="form-group">
							<label class="col-sm-3 control-label" for="w4-last-name">Event Name</label>
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
							<label class="col-sm-3 control-label" for="w4-username">Category of Event</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<select id="jenisacara" name="jenisacara">
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
							<label class="col-sm-3 control-label" for="w4-username">Total participants</label>
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
							<label class="col-sm-3 control-label" for="w4-username">Event Descriptions</label>
							<div class="col-sm-7">
								<div class="input-group mb-md">
									<span class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</span>
									<textarea name="deskripsiacara" id="deskripsiacara" required class="form-control"></textarea>
								</div>	
							</div>
						</div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </div>


                </section>
            </div>

        </form>


		
<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>

<script>

function cekwaktuSelesai(){
	$(document).ready(function(){
  var mulai2 = $('#waktuMulai').children("option:selected").val();
  if($('#waktuMulai').val()=="x"){
       $('#waktuSelesai').prop('disabled',true);
        $('#cekavailability').prop('disabled',true);
      }
	$.ajax({
		type:"post",
		url:"../cekComboJam.php",
		dataType: "JSON",
		data: {mulai:mulai2},
		success: function(respond){
      if($('#waktuMulai').val()=="x"){
        $('#waktuSelesai').prop('disabled',true);
        $('#cekavailability').prop('disabled',true);
      }else{
        $('#waktuSelesai').empty();
        $('#waktuSelesai').prop("disabled",false);
        $('#cekavailability').prop('disabled',false);
      }
        
      $('#waktuSelesai').empty();
      $('#waktuSelesai').append(respond);
      cekRuangan1();
      
		}
	});
});
}

function cekRuangan1(){
	$(document).ready(function(){
  var mulai2 = $('#waktuMulai').children("option:selected").val();
  var selesai2 = $('#waktuSelesai').children("option:selected").val();
  var tanggal2 = $('#tanggalpinjam').val();
  var ruang2 = "2";
	$.ajax({
		type:"post",
		url:"cekRuangAdmin.php",
    dataType: "json",
		data: {mulai:mulai2, selesai:selesai2, tanggal:tanggal2, ruang:ruang2},
		success: function(response){
            $('#namaruangan').empty(response);
      $('#namaruangan').append(response);
		}
	});
});
}

$("#waktuSelesai").change(function () {
        cekRuangan1();
        $("#waktuSelesai").focus();
    });

    

    $("#waktuMulai").change(function () {
        cekRuangan1();
        $("#waktuSelesai").focus();
        
    });
    $("#waktuSelesai").focus(function () {
            cekRuangan1();
        });

    $("#waktuMulai").focus(function () {
        cekRuangan1();
        
    });

</script>