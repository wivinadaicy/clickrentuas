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
			<h2>Contact Message</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Contact Message</span></li>
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
        
                            Contact Message
                        </h1>
                    </div>
                    <!--<div class="col-sm-6">
                        <div class="search">
                            <div class="input-group input-search">
                                <input type="text" class="form-control" name="sercing" id="sercing" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>-->
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
        $pesan = mysqli_query($koneksi, "SELECT * FROM contact ORDER BY waktu_kirim DESC");
        while($datap = mysqli_fetch_array($pesan)){

        ?>
        <?php
        $idpesannya = $datap['id_contact'];
        $cekstatus = $datap['status_pesan'];
        ?>
                            <li
                            <?php
                            $querycek = mysqli_query($koneksi, "select * from contact WHERE id_contact='$idpesannya' ORDER BY waktu_kirim");
                            $dataquerycek=mysqli_fetch_array($querycek);

                            if($cekstatus=='0'){
                                echo "class='unread'";
                            }
                            ?>
                            >
                                <a href="bukaContact.php?idcontact=<?php echo $idpesannya?>">
                                    <?php
                                    if($cekstatus=='0'){
                                        echo "<i class='mail-label' style='border-color: #EA4C89'></i> <!--belumread-->";
                                    }
                                    ?>
                                    <div class="col-sender">
                                        <p class="m-none ib"><?php echo $datap['name']?></p>
                                    </div>

                                    <div class="col-mail">
                                        <p class="m-none mail-content">
                                            <span class="subject"><?php echo $datap['message']?></span>
                                        </p>
                                        <?php
                                        $time = $datap['waktu_kirim'];

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