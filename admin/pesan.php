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
			<h2>Pesan</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Pesan</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->


<section class="content-with-menu mailbox">
    <div class="content-with-menu-container" data-mailbox data-mailbox-view="folder">
        <div class="inner-menu-toggle">
            <a href="#" class="inner-menu-expand" data-open="inner-menu">
                Show Menu <i class="fa fa-chevron-right"></i>
            </a>
        </div>
        
        <menu id="content-menu" class="inner-menu" role="menu">
            <div class="nano">
                <div class="nano-content">
        
                    <div class="inner-menu-toggle-inside">
                        <a href="#" class="inner-menu-collapse">
                            <i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Menu
                        </a>
        
                        <a href="#" class="inner-menu-expand" data-open="inner-menu">
                            Show Menu <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
        
                    <div class="inner-menu-content">
                        <a href="mailbox-compose.html" class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md">
                            <i class="fa fa-envelope mr-xs"></i>
                            Compose
                        </a>
        
                        <ul class="list-unstyled mt-xl pt-md">
                            <li>
                                <a href="mailbox-folder.html" class="menu-item active">Inbox <span class="label label-primary text-normal pull-right">43</span></a>
                            </li>
                            <li>
                                <a href="mailbox-folder.html" class="menu-item">Important</a>
                            </li>
                            <li>
                                <a href="mailbox-folder.html" class="menu-item">Sent</a>
                            </li>
                            <li>
                                <a href="mailbox-folder.html" class="menu-item">Drafts</a>
                            </li>
                            <li>
                                <a href="mailbox-folder.html" class="menu-item">Trash</a>
                            </li>
                        </ul>
        
                        <hr class="separator" />
        
                        <div class="sidebar-widget m-none">
                            <div class="widget-header">
                                <h6 class="title">Labels</h6>
                                <span class="widget-toggle">+</span>
                            </div>
                            <div class="widget-content">
                                <ul class="list-unstyled mailbox-bullets">
                                    <li>
                                        <a href="#" class="menu-item">Dribbble <span class="ball pink"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="menu-item">Envato <span class="ball green"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="menu-item">Facebook <span class="ball blue"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
        
                        <hr class="separator" />
        
                        <div class="sidebar-widget m-none">
                            <div class="widget-header">
                                <h6 class="title">Chat</h6>
                                <span class="widget-toggle">+</span>
                            </div>
                            <div class="widget-content">
                                <ul class="list-unstyled mailbox-bullets">
                                    <li>
                                        <a href="#" class="menu-item">Amy Doe <span class="ball green"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="menu-item">Joey Doe <span class="ball green"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="menu-item">Robert Doe <span class="ball orange"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="menu-item">John Doe <span class="ball red"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="menu-item">Uncle Doe <span class="ball red"></span></a>
                                    </li>
                                    <li class="text-center mt-sm">
                                        <em><a href="#">show offline</a></em>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </menu>
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
                                <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
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
                <ul class="list-unstyled m-none pt-lg pb-lg">
                    <li class="ib mr-sm">
                        <div class="btn-group">
                            <a href="#" class="item-action fa fa-chevron-down dropdown-toggle" data-toggle="dropdown"></a>
        
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">All</a></li>
                                <li><a href="#">None</a></li>
                                <li><a href="#">Read</a></li>
                                <li><a href="#">Unread</a></li>
                                <li><a href="#">Starred</a></li>
                                <li><a href="#">Unstarred</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="ib mr-sm">
                        <a class="item-action fa fa-refresh" href="#"></a>
                    </li>
                    <li class="ib mr-sm">
                        <a class="item-action fa fa-tag" href="#"></a>
                    </li>
                    <li class="ib">
                        <a class="item-action fa fa-times text-danger" href="#"></a>
                    </li>
                </ul>
            </div>
            <!-- END: .mailbox-actions -->
        
            <div id="mailbox-email-list" class="mailbox-email-list">
                <div class="nano">
                    <div class="nano-content">
                        <ul id="" class="list-unstyled">
                        <li>
                        <div class="col-sender">
                        <p class="m-none ib" style="font-weight:bold; color:black">FROM</p>
                        </div>
                                    <div class="col-mail" style="; color:black">
                                        <p class="m-none mail-content" style="text-align:center; font-weight:bold">
                                            <span class="subject">TOPIK PESAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </p>
                                        <p class="m-none mail-date" style="text-align:right;font-weight:bold">TIME IN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                    </div>
                            </li>
                            <br>
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
                        <!--    <li>
                                <a href="mailbox-email.html">
                                    
        
                                    <div class="col-sender">
                                        <div class="checkbox-custom checkbox-text-primary ib">
                                            <input type="checkbox" id="mail2">
                                            <label for="mail2"></label>
                                        </div>
                                        <p class="m-none ib">Okler Themes</p>
                                    </div>
                                    <div class="col-mail">
                                        <p class="m-none mail-content">
                                            <span class="subject">Porto Admin theme! &nbsp;–&nbsp;</span>
                                            <span class="mail-partial">Check it out.</span>
                                        </p>
                                        <i class="mail-attachment fa fa-paperclip"></i>
                                        <p class="m-none mail-date">3:35 pm</p>
                                    </div>
                                </a>
                            </li>!-->
        
                                    
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