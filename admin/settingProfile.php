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
			<h2>Edit Profile</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Edit Profile</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
	<form method="post" action="gantiEmail.php" name="theForm">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Change email</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" name="email"  id="email" class="form-control" value="<?php echo $email ?>" required  oninput="cekEmail()"/>
                        </div>
                        <p style="font-size:10px; color:red" id="cekemailnya"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                    <a href="#konfirmail" id="simpanemail" class="btn btn-primary modal-sizes">Simpan</a>
                    </div>
                </div>
            </div>



            <div id="konfirmail" class="modal-block modal-block-sm mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Are you sure to change email?</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Jika penggantian email Anda berhasil, Anda akan diminta untuk log in kembali. Jika penggantian email tidak berhasil, maka Anda akan diarahkan menuju halaman dashboard (yakinkan password Anda sudah benar)</p>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" name="okemail" id="okemail" class="btn btn-primary" onclick=submitdong()>
                                <button class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>
        </form>

<br>
<br>
<br>
        <form method="post">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                </div>

                <h2 class="panel-title">Change Password</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <input class="btn btn-primary gagal" type="submit" name="simpanpassword" value="Simpan">
                </div>
            </div>
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
function cekEmail(){
	var email2 = $("#email").val();
	
	$.ajax({
		type:"post",
		url:"../cekemailAjax.php",
		dataType: "JSON",
		data: {email:email2},
		success: function(respond){
			if(respond==1){
				$("#simpanemail").hide();
				$("#cekemailnya").html("*Email sudah terdaftar");
			}else{
				$("#simpanemail").show();
                $("#cekemailnya").empty();
                $("#simpanemail").prop("href","#konfirmail");
			}
			
		}
	});
}

window.onload = function() {
  cekEmail();
};

function submitdong(){
    document.theForm.submit();
}
</script>
