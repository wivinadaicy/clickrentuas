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
			<h2>Message</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Message</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->


<section class="content-with-menu mailbox">
    <div class="content-with-menu-container" data-mailbox data-mailbox-view="folder">
        
        <div class="inner-body mailbox-folder">
            <!-- START: .mailbox-header -->
            <header class="mailbox-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mailbox-title text-light m-none">
                            <a id="mailboxToggleSidebar" class="sidebar-toggle-btn trigger-toggle-sidebar">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line line-angle1"></span>
                                <span class="line line-angle2"></span>
                            </a>
        
                            Message
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="search">
                            <div class="input-group input-search">
                                <input type="text" class="form-control" name="sercing" id="sercing" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: .mailbox-header -->
        
            <!-- START: .mailbox-actions -->
            <div class="mailbox-actions">
            <br>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="" style="font-size:16pt;text-align:left;font-weight:bold; color:black">FROM</p>
                    </div>
                    <div class="col-sm-5">
                    <p class="" style="font-size:16pt;text-align:center; font-weight:bold; color: black !important">
                        <span>PESAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </p>
                    </div>
                    <div class="col-sm-3">
                    <p class="" style="font-size:16pt;text-align:right;font-weight:bold; color: black !important">TIME IN</p>
                    </div>
                </div>
            </div>
            <!-- END: .mailbox-actions -->
        
            <div id="mailbox-email-list" class="mailbox-email-list">
                <div class="nano">
                    <div class="nano-content">
                        <ul id="" class="list-unstyled">
        <?php
        $pesan = mysqli_query($koneksi, "SELECT DISTINCT pesan.id_pesan, min(pesan_detail.status_pesan) FROM pesan join pesan_detail on pesan_detail.id_pesan = pesan.id_pesan WHERE pesan_detail.status_pesan IN (SELECT min(pesan_detail.status_pesan) FROM pesan_detail GROUP BY pesan_detail.id_pesan) AND pesan.id_penggunaKirimPesan='$id' or pesan_detail.id_penggunaKe='$id' or pesan_detail.id_penggunaDari='$id' GROUP BY pesan_detail.id_pesan ORDER BY tanggal_waktu DESC");
        while($datap = mysqli_fetch_array($pesan)){

        ?>
        <?php
        $idpesannya = $datap['id_pesan'];
        $cekstatus = $datap['min(pesan_detail.status_pesan)'];
        ?>
                            <li
                            <?php
                            $querycek = mysqli_query($koneksi, "select * from pesan_detail WHERE id_pesan='$idpesannya' ORDER BY tanggal_waktu DESC LIMIT 1");
                            $dataquerycek=mysqli_fetch_array($querycek);

                          /*  if($dataquerycek['id_penggunaDari']==$id){
                                $hehe = $dataquerycek['id_penggunaKe'];
                            }

                            if($dataquerycek['id_penggunaKe']==$id){
                                $hehe = $dataquerycek['id_penggunaDari'];
                            }*/
                            if($cekstatus=='0' && $dataquerycek['id_penggunaKe']==$id){
                                echo "class='unread'";
                            }
                            ?>
                            >
                                <a href="bukaPesan.php?idpesan=<?php echo $idpesannya?>">
                                    <?php
                                    if($cekstatus=='0' && $dataquerycek['id_penggunaKe']==$id){
                                        echo "<i class='mail-label' style='border-color: #EA4C89'></i> <!--belumread-->";
                                    }
                                    ?>
                                    <div class="col-sender">

                                        <?php
$query = mysqli_query($koneksi, "SELECT * FROM pesan join pesan_detail ON pesan.id_pesan = pesan_detail.id_pesan WHERE pesan.id_pesan='$idpesannya'");
$dataquery= mysqli_fetch_array($query);

if($dataquery['id_penggunaKe']==$id){
    $dengan = $dataquery['id_penggunaDari'];
}
if($dataquery['id_penggunaDari']==$id){
    $dengan = $dataquery['id_penggunaKe'];
}
                                        
                                        
                                        $tarikpengguna = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna = '$dengan'");
                                        $tarikpenggunah = mysqli_fetch_array($tarikpengguna);
                                        ?>
                                        <p class="m-none ib"><?php echo $tarikpenggunah['nama_lengkap']?></p>
                                    </div>
                                    <div class="col-mail">
                                        <p class="m-none mail-content">
                                            <span class="subject"><?php echo $dataquery['topik_pesan']?></span>
                                        </p>
                                        <?php
                                        $time = $dataquery['tanggal_waktu'];

                                        $times = date("d-M-Y H:i",strtotime($time));
                                        ?>
                                        <p class="m-none mail-date"><?php echo $times?></p>
                                    </div>
                                </a>
                            </li>
        <?php } ?>
        
                                    
                        </ul>
                    </div>
                </div>
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
function sercingPesan(){
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
</script>