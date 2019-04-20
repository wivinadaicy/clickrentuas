<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
<?php
$idcontact = $_GET['idcontact'];
?>
<?php
$query = mysqli_query($koneksi, "SELECT * from contact WHERE id_contact='$idcontact'");
$data=mysqli_fetch_array($query);
?>
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
					<li><span>From: <?php echo $data['name']  ?></span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Detail Contact Message | <b>from: '<?php echo $data['name'] ?>'</b></h2>
            </header>
            <div class="panel-body">
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Name <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idbarang"  class="form-control" value = "<?php echo $data['name'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label"> Phone <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namabarang"  id="namabarang" class="form-control" readonly value = "<?php echo $data['phone'] ?>">
				</div>
			</div>
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label"> Email <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namabarang"  id="namabarang" class="form-control" readonly value = "<?php echo $data['email'] ?>">
				</div>
			</div>
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label"> Message <span class="required">*</span></label>
				<div class="col-sm-9">
					<textarea class="form-control" readonly><?php echo $data['message']  ?></textarea>
				</div>
			</div>
			
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <a href="contactMessage.php" id="simpanemail" class="btn btn-default">Back</a>
                    <?php
                    if($data['status_pesan']=="2"){
                        
                    ?>
                    <input type="button" class="btn btn-primary" value="Already Replied by '<?php
                    $by = $data['replied_by'];
                    $qq = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$by'");
                    $dqq = mysqli_fetch_array($qq);
                    echo $dqq['nama_lengkap'] . "'";
                    ?>" disabled>
                    <?php
                    }else{
                    ?>
                    <a href="#balaskontak" class="modal-with-form btn btn-primary">Send Reply</a>
                    <?php } ?>
                    </div>
                </div>
            </div>

                </section>






                <div id="balaskontak" class="modal-block modal-block-md mfp-hide">
            <section class="panel">
            <form action="kirimBalasan.php" method="post">
                <header class="panel-heading">
                    <h2 class="panel-title">Send Reply to <?php echo $data['email']?></h2>
                </header>
                <div class="panel-body">
                <h4>
                Name : <b><?php echo $data['name']?></b>
                <br>
                Email : <b><?php echo $data['email']?></b>
                </h4>
                <p>Subject: </p>
                <input type="text" name="subject"  class="form-control">
                <p>Message: </p>
                <textarea class="form-control" name="pesannya"></textarea>
                <input type="hidden" name="idcontact" value="<?php echo $data['id_contact'] ?>">
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" name="balas" id="balask" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                        </div>
                    </div>
                </footer>
                </form>
            </section>
        </div>

<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>