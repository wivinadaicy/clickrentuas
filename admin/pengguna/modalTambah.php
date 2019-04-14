<a href="#modalForm" class="modal-with-form btn btn-success pull-right"><li class="fa fa-plus"></li> Add Data</a>									

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
	<form action="pengguna/insert.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Add User Data</h2>
		</header>
        <div class="panel-body">
		<!--GANTI DISINI-->
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">User ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<?php
						$querym= mysqli_query($koneksi, "SELECT * FROM pengguna");
						$baris = mysqli_num_rows($querym);
						$barisbaru = $baris+1;
					?>
					<input type="text" name="idpeng"  class="form-control" value = "<?php echo "USER-" . $barisbaru ?>"placeholder="ketik judul buku" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namalengkap"  id="namalengkap" class="form-control" placeholder="insert full name" required>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Gender<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jeniskelamin" value="l" checked>Male &nbsp;&nbsp;
					<input type="radio" name="jeniskelamin" value="p">Female
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Date of Birth<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggallahir"  id="jeniskelamin"  class="form-control"  required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="email" name="email" id="email" class="form-control" placeholder="insert email" required oninput="cekEmail()">
					<p style="font-size:10px; color:red" id="cekemailnya"></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="password" name="katasandi"  id="katasandi" class="form-control" placeholder="insert password" required >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Phone Number<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="nomorhp"   id="nomorhp" class="form-control" placeholder="insert phone number" required >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">User Status</label>
				<div class="col-sm-9">
					 <select name="statuspenggunas" id="statuspenggunas" class="form-control" required>
					 <?php
							   $statusnya[0] = "Super Admin"; //jangan kebalik
							   $statusnya[1] = "Admin";
								$statusnya[2] = "Member Dosen";
								$statusnya[3] = "Member Mahasiswa";
							  for($i = 4 ; $i >0 ; $i--){
						   ?>
							<option value="<?php echo $i?>"> <?php echo $statusnya[$i-1] ?></option>
						   <?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Address <span class="required">*</span></label>
				<div class="col-sm-9">
					<textarea name="alamat" id="alamat"  class="form-control" placeholder="insert address" required></textarea>
				</div>
			</div>
			
    		<section id="memberada">
			<hr class="separator">
			<h3>Data Mahasiswa</h3>
			<div class="form-group">
								<label class="col-sm-3 control-label" for="w4-last-name">NIM</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="nim" id="formNim" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">Program Studi</label>
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
									<label class="col-sm-3 control-label" for="w4-last-name">Angkatan</label>
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
									<label class="col-sm-3 control-label" for="w4-last-name">Total SKS</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="totalsks" id="formSks" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="w4-last-name">IPK Terakhir</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="ipkterakhir" id="formIpk" required>
									</div>
								</div>
			</section>
			<br>
		</div>
        <footer class="panel-footer">
            <div class="row">
			<input type="hidden" name="idx" value="<?php echo $id ?>">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                </div>
            </div>
		</footer>
		</form>
	</section>
	
</div>

