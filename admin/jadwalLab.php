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
			<h2>Laboratory Schedule</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Laboratory Schedule</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div id="calendarr"></div>
            </div>
            <div class="panel" id="warna">
            
            </div>
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
<script>
$(document).ready(function() {
   var calendar = $('#calendarr').fullCalendar({
    editable:true,
    events: 'load.php',
    selectable:true,
	selectHelper:true,
    dayClick: function(date, jsEvent, view) { 
        var today = new Date();
        var end = new Date();                
        end.setDate(today.getDate()-1);  

        if(date > today) {
        window.location.href = "insertLabAdmin.php?tanggal=" + date.format();
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


                }
        
   });
  });


function cekWarna(){
  
  $.ajax({
      url:"cekWarna.php",
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

