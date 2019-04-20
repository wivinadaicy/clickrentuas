<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Registration Form</title>
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
	<a href="index.php" class="btn btn-default" style="margin: 50px 0 0 100px; position: absolute">Back to home</a>
		<section class="body" style="padding-top: 50px; padding-left: 300px; padding-right:100px">
<div class="row">
	<div class="col-xs-10">
	
		<section class="panel form-wizard" id="w4">
		<form class="form-horizontal" action="insertRegister.php" method="post" >
			<header class="panel-heading center">
				<label class="panel-title">Registration Form</label>
			</header>
			<div class="panel-body">
				<div class="wizard-progress wizard-progress-lg">
					<div class="steps-progress">
						<div class="progress-indicator"></div>
					</div>
					<ul class="wizard-steps">
						<li class="active">
							<a href="#w4-account" data-toggle="tab" id="satu"><span>1</span>Account Info</a>
						</li>
						<li>
							<a href="##w4-profile" data-toggle="tab" id="dua" ><span>2</span>Profile Info</a>
						</li>
						<li>
							<a href="##w4-info" data-toggle="tab"  id="tiga"><span>3</span>Info Detail</a>
						</li>
						<li>
							<a href="##w4-confirm" data-toggle="tab" id="empat"><span>4</span>Confirmation</a>
						</li>
					</ul>
				</div>

				
					<div class="tab-content">
						<div id="w4-account" class="tab-pane active">


							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-username"></label>
								<div class="col-sm-7">
									<div class="input-group mb-md">
										<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
										</span>
										<input class="form-control" placeholder="Email" oninput="cekEmail()" required type="email" name="email" id="formEmail">
									</div>	
									<p style="font-size:10px; color:red" id="cekemailnya"></p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-username"></label>
								<div class="col-sm-7">
									<div class="input-group mb-md">
								<span class="input-group-addon">
									<i class="fa fa-key"></i>
								</span>
								<input id="formSandi" name="katasandi" type="password" class="form-control" placeholder="password" minlength="8" required>
									</div>	
								</div>
							</div>
						</div>

						<div id="w4-profile" class="tab-pane">
							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-first-name">Full Name</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="namalengkap" id="formNama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-last-name">Date of Birth</label>
								<div class="col-sm-7">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</span>
									<input type="date" class="form-control"  name="tanggallahir" id="formTanggal">
									</div>
								</div>	
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-last-name">Gender</label>
								<div class="col-sm-7">
									<input type="radio" name="jeniskelamin" value="l" checked id="cowo">Male &nbsp;&nbsp;
									<input type="radio" name="jeniskelamin" value="p" id="cewe">Female
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-last-name">Phone Number</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="nohp" id="formNohp" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-last-name">Address</label>
								<div class="col-sm-7">
									<textarea class="form-control" name="alamat" id="formAlamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-last-name">Profession</label>
								<div class="col-sm-7">
								<select class="form-control input-sm mb-md" name="profesi" id="profesi">
									<option value="4" selected>Student</option>
									<option value="3">Lecturer</option>
								</select>
								</div>
							</div>

						</div>

						<div id="w4-info" class="tab-pane">
							<h1 style="text-align:center" id="nextnya">Skip this step</h1>
							<div id="hm">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">NIM</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="nim" id="formNim" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">Major</label>
									<div class="col-sm-7">
									<select class="form-control input-sm mb-md" name="ps" id="ps">
										<?php
										include('koneksi.php');
										$queryps = mysqli_query($koneksi, "SELECT * FROM program_studi WHERE status_delete='0'");
										while($dataps=mysqli_fetch_array($queryps)){
										?>
										<option value="<?php echo $dataps['id_programStudi'] ?>"><?php echo $dataps['nama_programStudi']?></option>
										<?php } ?>
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">Batch</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="angkatan" id="formAngkatan" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">Semester</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="semester" id="formSemester" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">Total Credits</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="totalsks" id="formSks" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">GPA</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="ipkterakhir" id="formIpk" required>
									</div>
								</div>
							</div>
						</div>


						<div id="w4-confirm" class="tab-pane">
							<div class="col-md-6">
								<div class="panel-primary">
									<header class="panel-heading">
										<div class="panel-actions">
										</div>
										<h2 class="panel-title">Account Data</h2>
									</header>
									<div class="panel-body">
										<h3>Email:</h3>
										<p id="mail"></p>
										<h4 style="color: red">*Email will be used for login on this website</h4>
									</div>
								</div>
							</div>
							<div class="col-md-6" id="dosen">
								<div class="panel-primary">
									<header class="panel-heading">
										<div class="panel-actions">
										</div>
										<h2 class="panel-title">Profile Data</h2>
									</header>
									<div class="panel-body">
									<h3>Name: </h3>
										<p id="nama"></p>
										<h3>Gender: </h3>
										<p id="jkk"></p>
										<h3>Birth of Date: </h3>
										<p id="ttll"></p>
										<h3>Address: </h3>
										<p id="almt"></p>
										<h3>Phone Number: </h3>
										<p id="nohp"></p>
										<h3>Profession: </h3>
										<p id="profnya">Lecturer Member</p>
									</div>
								</div>
							</div>
							<div class="col-md-12" id="mahasiswa">
								<div class="panel-primary">
									<header class="panel-heading">
										<div class="panel-actions">
										</div>
										<h2 class="panel-title">Profile Detail</h2>
									</header>
									<div class="panel-body">

										<h3>Batch: </h3>
										<p id="angkatan"></p>
										<h3>Semester: </h3>
										<p id="semester"></p>
										<h3>Total Credits: </h3>
										<p id="sks"></p>
										<h3>GPA: </h3>
										<p id="ipk"></p>
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
						<input type="submit" class="btn btn-primary" name="regis" value="Finish">
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
		$("#kembali, #berikutnya, #w4-account, #w4-profile, #w4-info, #w4-confirm").click(function(){
				var email = $("input[name=email]").val();
				$('#mail').empty();
				$('#mail').append(email);
            

				var selectedProfesi = $('#profesi').children("option:selected").val();
				$('#profnya').empty();
				if(selectedProfesi=="3"){
					$('#profnya').append("Member Dosen");
				}else{
					$('#profnya').append("Member Mahasiswa");
				}
				
            
				var nama = $("input[name=namalengkap]").val();
				$('#nama').empty();
				$('#nama').append(nama);
            

                var jk = $("input[name=jeniskelamin]:checked").val();
                if(jk=="l"){
                    $('#jkk').empty();
                    $('#jkk').append("Laki-laki");
                }else{
                    $('#jkk').empty();
                    $('#jkk').append("Perempuan");
                }
				
				var tgllahir = $("input[name=tanggallahir]").val();
				$('#ttll').empty();
				$('#ttll').append(tgllahir);

				var alamat = $.trim($("#formAlamat").val());
				$('#almt').empty();
				$('#almt').append(alamat);

				var nohp = $("input[name=nohp]").val();
				$('#nohp').empty();
				$('#nohp').append(nohp);


				var x = $("input[name=angkatan]").val();
				$('#angkatan').empty();
				$('#angkatan').append(x);

				var y = $("input[name=semester]").val();
				$('#semester').empty();
				$('#semester').append(y);

				var z = $("input[name=totalsks]").val();
				$('#sks').empty();
				$('#sks').append(z);

				var a = $("input[name=ipkterakhir]").val();
				$('#ipk').empty();
				$('#ipk').append(a);
		});
		});
</script>
<script>
function cekEmail(){
	$(document).ready(function(){
	var email2 = $("#formEmail").val();
	
	$.ajax({
		type:"post",
		url:"cekemailAjax.php",
		dataType: "JSON",
		data: {email:email2},
		success: function(respond){
			if(respond==1){
				$("#berikutnya").hide();
				$("#cekemailnya").html("*Email sudah terdaftar");
			}else{
				$("#berikutnya").show();
				$("#cekemailnya").empty();
				document.getElementById('dua').style.pointerEvents = 'none';
				document.getElementById('tiga').style.pointerEvents = 'none';
				document.getElementById('empat').style.pointerEvents = 'none';
			}
			
		}
	});
});
}

</script>