<?php
session_start();
include('../session.php');
include('../koneksi.php');
?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Dashboard</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Dashboard</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php 
$today = date('Y-m-d');
$todays = date('Y-m-d H:i');
$now = date('H:i');
?>
<?php if($status=='1' || $status=='2'){ ?>
<div class="row">
	<div class="alert alert-success col-lg-3"  style="height:240px">
		<h4 style="text-align: center"><b>ROOMS</b></h4>
		<hr>
		<?php 
		$queryb = mysqli_query($koneksi, "SELECT count(id_ruangan) FROM ruangan WHERE status_delete='0' AND jenis_ruangan='1'");
		$dqb = mysqli_fetch_array($queryb);

		$queryc = mysqli_query($koneksi, "SELECT count(id_ruangan) FROM ruangan WHERE status_delete='0' AND jenis_ruangan='2'");
		$dqc = mysqli_fetch_array($queryc);
		?>
		<table>
			<tr>
				<td><p>Laboratory</p></td>
				<td><p><?php echo $dqb['count(id_ruangan)'] ?></p></td>
			</tr>
			<tr>
				<td><p>Meeting Room &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
				<td><p><?php echo $dqc['count(id_ruangan)'] ?></p></td>
			</tr>
		</table>
		<hr>
		<a href="ruangan.php"><h6 style="text-align:right">View All (<?php echo $dqb['count(id_ruangan)'] + $dqc['count(id_ruangan)'] ?>)</h6></a>
	</div>

	<div class="alert alert-info col-lg-3"  style="height:240px">
		<h4 style="text-align: center"><b>USER</b></h4>
		<hr>
		<p style="font-weight:bold; text-align:center">New User This Month</p>
		<?php
		$queryd = mysqli_query($koneksi, "SELECT count(id_pengguna) FROM pengguna WHERE waktu_add BETWEEN (DATE_ADD('$today', INTERVAL -1 MONTH)) AND '$today'");
		$dqd = mysqli_fetch_array($queryd);

		$querye = mysqli_query($koneksi, "SELECT count(id_pengguna) FROM pengguna WHERE status_delete='0'");
		$dqe = mysqli_fetch_array($querye);
		?>
		<h3 style="text-align:center"><?php echo $dqd['count(id_pengguna)'] ?></h3>
		<hr>
		<a href="pengguna.php"><h6 style="text-align:right">View All (<?php echo $dqe['count(id_pengguna)']?>)</h6></a>
	</div>

	<div class="alert alert-warning col-lg-3"  style="height:240px">
		<h4 style="text-align: center"><b>RESERVATION</b></h4>
		<hr>
		<?php
		$queryi = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan on ruangan.id_ruangan = peminjaman.id_ruangan WHERE jenis_ruangan='1' AND  (status_peminjaman='1' or status_peminjaman='0' or status_peminjaman='3') AND peminjaman.waktu_add BETWEEN (DATE_ADD('$todays', INTERVAL -1 MONTH)) AND '$todays'");
		$dqi = mysqli_fetch_array($queryi);?>
		<p style="font-weight:bold; text-align:center">New Reservation This Month</p>
		<?php
		$queryk = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan on ruangan.id_ruangan = peminjaman.id_ruangan WHERE jenis_ruangan='2' AND   (status_peminjaman='1' or status_peminjaman='0' or status_peminjaman='3') AND peminjaman.waktu_add BETWEEN (DATE_ADD('$todays', INTERVAL -1 MONTH)) AND '$todays'");
		$dqk = mysqli_fetch_array($queryk);?>
	<table>
			<tr>
				<td><p>Laboratory</p></td>
				<td><p><b><?php echo $dqi['count(peminjaman.id_peminjaman)'] ?></p></td>
			</tr>
			<tr>
				<td><p>Meeting Room &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
				<td><p><b><?php echo $dqk['count(peminjaman.id_peminjaman)'] ?></b></p></td>
			</tr>
		</table>
<?php
		$queryj = mysqli_query($koneksi, "SELECT count(id_peminjaman) FROM peminjaman join ruangan on ruangan.id_ruangan = peminjaman.id_ruangan WHERE (status_peminjaman='1' or status_peminjaman='0' or status_peminjaman='3')");
		$dqj = mysqli_fetch_array($queryj);
		?>
	</div>

	<div class="alert alert-danger col-lg-3"  style="height:240px">
		<h4 style="text-align: center"><b>CONTACT MESSAGES</b></h4>
		<hr>
		<p style="font-weight:bold; text-align:center">Total This Month</p>
		<?php
		$queryg = mysqli_query($koneksi, "SELECT count(id_contact) FROM contact WHERE waktu_kirim BETWEEN (DATE_ADD('$todays', INTERVAL -1 MONTH)) AND '$todays'");
		$dqg = mysqli_fetch_array($queryg);

		$queryh = mysqli_query($koneksi, "SELECT count(id_contact) FROM contact");
		$dqh = mysqli_fetch_array($queryh);
		?>
		<h3 style="text-align:center"><?php echo $dqg['count(id_contact)'] ?></h3>
		<hr>
		<a href="contactMessage.php"><h6 style="text-align:right">View All (<?php echo $dqh['count(id_contact)']?>)</h6></a>
	</div>


</div>
<div class="row">
	<div>
		<?php 
		$query = "SELECT status_pengguna, count(*) as number FROM pengguna GROUP BY status_pengguna";  
		$result = mysqli_query($koneksi, $query);  
		?>
		<script type="text/javascript">  
			google.charts.load('current', {'packages':['corechart']});  
			google.charts.setOnLoadCallback(drawChart);  
			function drawChart()  
			{  
				var data = google.visualization.arrayToDataTable([  
							['Role', 'Number'],  
							<?php  
							while($row = mysqli_fetch_array($result))  
							{  
								if($row['status_pengguna']=="1"){
									$statusnya = "Super Admin";
								}else if($row['status_pengguna']=="2"){
									$statusnya = "Admin";
								}else if($row['status_pengguna']=="3"){
									$statusnya = "Member Dosen";
								}else{
									$statusnya = "Mahasiswa";
								}
								echo "['".$statusnya."', ".$row["number"]."],";  
							}  
							?>  
						]);  
				var options = {  
						title: 'Jumlah Pengguna',  
						//is3D:true,  
						pieHole: 0.4,
						legend: {position: 'none'},
						backgroundColor: { fill:'transparent' }
						};  
				var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
				chart.draw(data, options);  
			}  
		</script>  

		<div id="piechart" class="col-md-6 alert alert-primary " style="height:270px"></div>
	</div>
	<div>
		<?php 
		$query = "SELECT nama_programStudi, count(*) as number FROM mahasiswa join program_studi on program_studi.id_programStudi = mahasiswa.id_programStudi WHERE mahasiswa.status_delete='0' GROUP BY mahasiswa.id_programStudi";  
		$result = mysqli_query($koneksi, $query);  
		?>
		<script type="text/javascript">  
			google.charts.load('current', {packages: ['corechart', 'bar']});
			google.charts.setOnLoadCallback(drawBasic);

			function drawBasic() {

				var data = google.visualization.arrayToDataTable([
					['Major', 'Total', { role: 'style' }],

					<?php 
					while($row = mysqli_fetch_array($result)){
						/*$idju = $row['id_jurusan'];
						$q = mysqli_query($koneksi, "SELECT * from jurusan WHERE id_jurusan='$idju'");
						$dq = mysqli_fetch_array($q);*/

						echo "['".$row["nama_programStudi"]."', ".$row["number"].", '#9000ff'],";  
					}
					
					?>
				]);

				var options = {
					title: 'Students Account per Major',
					chartArea: {width: '50%'},
					hAxis: {
					title: 'Total of student registered',
					minValue: 0
					},
					vAxis: {
					title: 'Major'
					},
					legend: {position: 'none'},
						backgroundColor: { fill:'#e6d5f3' }
				};

				var chart = new google.visualization.BarChart(document.getElementById('chartjurusan'));

				chart.draw(data, options);
				}
		</script>  
		<div id="chartjurusan" class="col-md-6 alert" style="height:270px; background-color:#e6d5f3"></div>
	</div>
</div>
<div class="row">
	<div class="panel col-md-12">
		<div class="panel-body">
		<h4 style="text-align:center; color: black; font-weight:bold; background">Reservation</h4>
					<div id="calendarr"></div>
				<div class="panel" id="warna">
				
				</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="alert alert-info col-md-6">
	<h4 style="text-align:center; color: black; font-weight:bold; background">Today's Reservation</h4>
		<div class="table-responsive">
			<table class="table table-striped mb-none">
				<thead>
					<tr>
						<th>#</th>
						<th>Event</th>
						<th>Time</th>
						<th>User</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$querya=mysqli_query($koneksi, "SELECT * FROM peminjaman join pengguna on pengguna.id_pengguna = peminjaman.id_pengguna WHERE tanggal_peminjaman='$today' AND (status_peminjaman='1' or status_peminjaman='3')");
				$no=0;
				if(mysqli_num_rows($querya)==0){
					echo "<td colspan='4' style='text-align:center'>No data!</td>";
				}
				while($dqa = mysqli_fetch_array($querya)){
					$no++;
				?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $dqa['acara'] ?></td>
						<td><?php echo $dqa['waktu_mulai'] ?> - <?php echo $dqa['waktu_selesai'] ?></td>
						<td><?php echo $dqa['nama_lengkap'] ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>

	</div>	<div class="alert alert-warning col-lg-6"  style="height:240px">
		<h4 style="text-align: center"><b>Reservation State</b></h4>
		<?php 
		$query = "SELECT status_peminjaman, count(*) as number FROM peminjaman GROUP BY status_peminjaman";  
		$result = mysqli_query($koneksi, $query);  
		?>
		<script type="text/javascript">  
			google.charts.load('current', {packages: ['corechart', 'bar']});
			google.charts.setOnLoadCallback(drawBasic);

			function drawBasic() {

				var data = google.visualization.arrayToDataTable([  
				['State', 'Total'],  
				<?php  
				while($row = mysqli_fetch_array($result))  
				{  
					if($row['status_peminjaman']=="0"){
						$statusnya = "Wait for approval";
					}else if($row['status_peminjaman']=="1"){
						$statusnya = "Approved";
					}else if($row['status_peminjaman']=="3"){
						$statusnya = "Finished";
					}else{
						$statusnya = "Not Approved/Canceled";
					}
					echo "['".$statusnya."', ".$row["number"]."],";  
				}  
				?>  
						]);  

				var options = {
					title: 'Current Reservation State',
					hAxis: {
					title: 'Reservation State',
					},
					vAxis: {
					title: 'Total Reservation'
					},
					legend: {position: 'none'},
					backgroundColor: { fill:'transparent' }
				};

				var chart = new google.visualization.ColumnChart(
					document.getElementById('barchart'));

				chart.draw(data, options);
				}
		</script>  
		<div id="barchart" class="alert alert-warning" style="height:175px"></div>
	</div>
</div>
<?php } ?>	

<div class="row">
	<div class="alert alert-danger col-lg-3"  style="height:200px">
		<h4 style="text-align: center"><b>My Pending Reservation</b></h4>
		<hr>
		<?php
		$queryl = mysqli_query($koneksi, "SELECT count(id_peminjaman) FROM peminjaman WHERE status_peminjaman='0' AND id_pengguna='$id' order by peminjaman.waktu_add desc");
		$dql = mysqli_fetch_array($queryl);
		?>
		<h3 style="text-align:center"><?php echo $dql['count(id_peminjaman)'] ?></h3>
		<hr>
		<a href="peminjamanMemberPending.php"><h6 style="text-align:right">View Data</h6></a>
	</div>


	<div class="alert alert-warning col-lg-3"  style="height:200px">
		<h4 style="text-align: center"><b>My Upcoming Reservation</b></h4>
		<hr>
		<?php
		$hariini = date('Y-m-d');
		$querym = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan join pesan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_pengguna='$id' AND status_peminjaman='1' AND tanggal_peminjaman>='$hariini'  order by peminjaman.waktu_edit desc");
		$dqm = mysqli_fetch_array($querym);
		?>
		<h3 style="text-align:center"><?php echo $dqm['count(peminjaman.id_peminjaman)'] ?></h3>
		<hr>
		<a href="peminjamanMemberAkanDatang.php"><h6 style="text-align:right">View Data</h6></a>
	</div>


	<div class="alert alert-success col-lg-3"  style="height:200px">
		<h4 style="text-align: center"><b>My Finished Reservation</b></h4>
		<hr>
		<?php
		$queryn = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan join pesan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_pengguna='$id' AND status_peminjaman='3' order by peminjaman.waktu_edit desc");
		$dqn = mysqli_fetch_array($queryn);
		?>
		<h3 style="text-align:center"><?php echo $dqn['count(peminjaman.id_peminjaman)'] ?></h3>
		<hr>
		<a href="peminjamanMemberSelesai.php"><h6 style="text-align:right">View Data</h6></a>
	</div>

	<div class="alert alert-info col-lg-3"  style="height:200px">
		<h4 style="text-align: center"><b>My Cancelled & Not Approved Reservation</b></h4>
		<hr>
		<?php
		$queryo = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan join pesan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_pengguna='$id' AND (status_peminjaman='4' OR status_peminjaman='5')");
		$dqo = mysqli_fetch_array($queryo);
		?>
		<h3 style="text-align:center"><?php echo $dqo['count(peminjaman.id_peminjaman)'] ?></h3>
		<?php 
		$cancel = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan join pesan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_pengguna='$id' AND (status_peminjaman='4' or status_peminjaman='5')AND peminjaman.id_peminjaman IN (SELECT log_peminjaman.id_peminjaman FROM log_peminjaman WHERE status_peminjaman='5') order by peminjaman.waktu_edit desc");
		$dcancel = mysqli_fetch_array($cancel);


		$notprov = mysqli_query($koneksi, "SELECT count(peminjaman.id_peminjaman) FROM peminjaman join ruangan join pesan join kategori_acara on kategori_acara.id_kategoriAcara = peminjaman.id_kategoriAcara AND ruangan.id_ruangan = peminjaman.id_ruangan WHERE id_pengguna='$id' AND status_peminjaman='4' AND peminjaman.id_peminjaman NOT IN (SELECT log_peminjaman.id_peminjaman FROM log_peminjaman WHERE status_peminjaman='5') order by peminjaman.waktu_edit desc");
		$dnotprov = mysqli_fetch_array($notprov);
		?>
		<a href="peminjamanMemberDibatalkan.php"><h6 style="text-align:right">View Cancelled (<?php echo $dcancel['count(peminjaman.id_peminjaman)'] ?>)</h6></a>
		<a href="peminjamanMemberDitolak.php"><h6 style="text-align:right">View Not Approved (<?php echo $dnotprov['count(peminjaman.id_peminjaman)'] ?>)</h6></a>
	</div>
</div>	
<div class="row">
	<div class="panel col-md-12">
		<div class="panel-body">
		<h4 style="text-align:center; color: black; font-weight:bold; background">My Reservation</h4>
					<div id="calendars"></div>
				<div class="panel" id="warnas">
				
				</div>
		</div>
	</div>
</div>
<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>

<script>
$(document).ready(function() {
   var calendar = $('#calendarr').fullCalendar({
    editable:true,
    events: 'load3.php',
    selectable:true,
	selectHelper:true,
    dayClick: function(date, jsEvent, view) { 
        var today = new Date();
        var end = new Date();                
        end.setDate(today.getDate()-1);  

        if(date > today) {
        //window.location.href = "insertLabAdmin.php?tanggal=" + date.format();
        }
    
    },
    dayRender: function (date, cell) {

	var today = new Date();
	var end = new Date();                
	end.setDate(today.getDate()-1);                 


	if( date < end) {
	cell.css("background-color", "lightgray");
	} // this is for previous date 

	if(date > today) {
		cell.css("background-color", "white");
	}
	},
   });
  });


function cekWarna(){
  
  $.ajax({
      url:"cekWarna2.php",
      dataType: "JSON",
      success: function(respond){
          $('#warna').empty();
          $('#warna').append(respond);
      }
  });
}

window.onload = function() {
  cekWarna();
};
</script>



<script>
$(document).ready(function() {
   var calendar = $('#calendars').fullCalendar({
    editable:true,
    events: 'load4.php',
    selectable:true,
	selectHelper:true,
    dayClick: function(date, jsEvent, view) { 
        var today = new Date();
        var end = new Date();                
        end.setDate(today.getDate()-1);  

        if(date > today) {
        //window.location.href = "insertLabAdmin.php?tanggal=" + date.format();
        }
    
    },
    dayRender: function (date, cell) {

	var today = new Date();
	var end = new Date();                
	end.setDate(today.getDate()-1);                 


	if( date < end) {
	cell.css("background-color", "lightgray");
	} // this is for previous date 

	if(date > today) {
		cell.css("background-color", "white");
	}
	},
   });
  });


function cekWarna(){
  
  $.ajax({
      url:"cekWarna3.php",
      dataType: "JSON",
      success: function(respond){
          $('#warnas').empty();
          $('#warnas').append(respond);
      }
  });
}

window.onload = function() {
  cekWarna();
};
</script>