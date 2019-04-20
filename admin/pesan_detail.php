<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<!--*****************************-->
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Click &amp; Rent SISTECH</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
<!--Data Tables--> 
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<!--Modals-->        
		<link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
<!--calender-->        
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/fullcalendar/fullcalendar.css" />
		<link rel="stylesheet" href="assets/vendor/fullcalendar/fullcalendar.print.css" media="print" />
<!--mail-->     
		<link rel="stylesheet" href="assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="assets/vendor/summernote/summernote-bs3.css" />

		

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<style>
		body{
			overflow-y:hidden;
		}
	.chat-window{
    top:105px;
	margin-top:10px;
	float:center;
	max-width:90%;
	position:fixed;
	}
	.chat-window > div > .panel{
		border-radius: 5px 5px 0 0;
	}
	.icon_minim{
		padding:2px 10px;
	}
	.msg_container_base{
	background: #e5e5e5;
	margin: 0;
	padding: 0 10px 10px;
	max-height:400px;
	overflow-x:hidden;
	}
	.top-bar {
	background: #666;
	color: white;
	padding: 10px;
	position: relative;
	overflow: hidden;
	}
	.msg_receive{
		padding-left:0;
		margin-left:0;
	}
	.msg_sent{
		padding-bottom:20px !important;
		margin-right:0;
	}
	.messages {
	background: white;
	padding: 10px;
	border-radius: 2px;
	box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
	max-width:100%;
	}
	.messages > p {
		font-size: 13px;
		margin: 0 0 0.2rem 0;
	}
	.messages > time {
		font-size: 11px;
		color: #ccc;
	}
	.msg_container {
		padding: 10px;
		overflow: hidden;
		display: flex;
	}
	.imgnya {
		display: block;
		width: 45px;
	}
	.avatar {
		position: relative;
	}
	.base_receive > .avatar:after {
		content: "";
		position: absolute;
		top: 0;
		right: 0;
		width: 0;
		height: 0;
		border: 5px solid #FFF;
		border-left-color: rgba(0, 0, 0, 0);
		border-bottom-color: rgba(0, 0, 0, 0);
	}

	.base_sent {
	justify-content: flex-end;
	align-items: flex-end;
	}
	.base_sent > .avatar:after {
		content: "";
		position: absolute;
		bottom: 0;
		left: 0;
		width: 0;
		height: 0;
		border: 5px solid white;
		border-right-color: transparent;
		border-top-color: transparent;
		box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
	}

	.msg_sent > time{
		float: right;
	}



	.msg_container_base::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}

	.msg_container_base::-webkit-scrollbar
	{
		width: 12px;
		background-color: #F5F5F5;
	}

	.msg_container_base::-webkit-scrollbar-thumb
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
		background-color: #555;
	}

	.btn-group.dropup{
		position:fixed;
		left:0px;
		bottom:0;
}
</style>
	</head>


<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->

<?php
$idpesan = $_GET['idpesan'];
$query = mysqli_query($koneksi, "SELECT * FROM pesan join pesan_detail on pesan.id_pesan = pesan_detail.id_pesan WHERE pesan.id_pesan='$idpesan'");
$datapesan = mysqli_fetch_array($query);

$dari = $datapesan['id_penggunaDari'];
$ke= $datapesan['id_penggunaKe'];

$penggunadari = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$dari'");
$datadari = mysqli_fetch_array($penggunadari);

$penggunake = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$ke'");
$datake = mysqli_fetch_array($penggunake);

if($dari==$id){
	$orang = $datake['nama_lengkap'];
}else{
	$orang = $datadari['nama_lengkap'];
}
?>
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Message</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><a href="pesan.php">Message</a></li>
					<li><span>Chat <?php echo $orang;?></span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<section class="content-with-menu mailbox">
    <div class="content-with-menu-container" data-mailbox data-mailbox-view="folder">
        
        <div class="inner-body mailbox-folder">
        
	
		<div class="row chat-window" id="chat_window_1" style="margin-left:10px;">
        	<div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div style="text-align: center;">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> <?php echo $datapesan['topik_pesan'];?></h3>
                    </div>
				</div>
				<!-- ISI CHAT-->
                <div class="panel-body msg_container_base" id="chatnya">

<?php
$chatt = mysqli_query($koneksi, "SELECT * FROM pesan_detail WHERE id_pesan='$idpesan' ORDER BY tanggal_waktu");



while($datachat = mysqli_fetch_array($chatt)){

$darii = $datachat['id_penggunaDari'];
$kee = $datachat['id_penggunaKe'];
$pesannya = $datachat['pesan'];
$time = $datachat['tanggal_waktu'];
$times = date("d-M-Y H:i",strtotime($time));

$darinya = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$darii'");
$datadarinya = mysqli_fetch_array($darinya);

$jk = $datadarinya['jenis_kelamin'];
if($jk=="l"){
	$foto = "../images/fotoprofil/male.png";
}else{
	$foto = "../images/fotoprofil/female.png";
}

if($darii==$id){
?>


                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg _sent">
                                <p style="text-align:right">
									<?php echo $pesannya?>

								</p>
                                <time> <p style="text-align:right"><b>Saya</b> • <?php echo $times?></p></time>
                            </div>
                        </div>
                        <div class="col-md-1 col-xs-2 avatar">
                            <img class="imgnya" src="<?php echo $foto?>" class=" img-responsive ">
                        </div>
					</div>
<?php }else{?>					

                    <div class="row msg_container base_receive">
                        <div class="col-md-1 col-xs-2 avatar">
                            <img class="imgnya" src="<?php echo $foto?>" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p><?php echo $pesannya?></p>
                                <time><p style="text-align:left"><b><?php echo $datadarinya['nama_lengkap']?></b> • <?php echo $times?></p></time>
                            </div>
                        </div>
					</div>
					


<?php 
}
} ?>
<section id="isi"></section>

					
					<input id="pesanid" type="text" style="opacity:0; height:1px" value="<?php echo $idpesan?>" readonly style="height:1px">
					<input id="pengke" type="text" style="opacity:0; height:1px" value="<?php echo $ke?>" readonly style="height:1px">
					<input type="number" id="fokusbawah" autofocus style="opacity:0; height:1px" readonly style="height:1px">
				</div>
                <div class="panel-footer">
                    <div class="input-group">
						
                        <input id="chatting" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
						<button type="button" class="btn btn-primary btn-sm" id="kirimchat" onclick="kirimPesan()">Send</button>
						
                        </span>
                    </div>
				</div>
				
    		</div>
    </div>
    
    <div class="btn-group dropup">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-cog"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
        </ul>
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

focusScrollMethod = function getFocus() {          
document.getElementById("fokusbawah").focus({preventScroll:false});
}

function kirimPesan(){
    var pesanchat2 = $("#chatting").val();
	var idPesan2 = $("#pesanid").val();

	$.ajax({
		type:"post",
		url:"kirimChat.php",
		dataType: "JSON",
		data: {pesanchat:pesanchat2, idPesan:idPesan2},
		success: function(respond){
			if(respond=="0"){

			}else{
				$("#chatting").empty();
				document.getElementById('chatting').value = '';
				$("#isi").append(respond);
				focusScrollMethod();
			}
			
			
		}
	});
}

var input = document.getElementById("chatting");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("kirimchat").click();
   document.getElementById('chatting').value = '';
  }
});
</script>