<a href="#modalForm" class="modal-with-form btn btn-success pull-right"><li class="fa fa-plus"></li> Add Data</a>									

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
	<form>
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
					<input type="text" name="idpengguna"  class="form-control" value = "<?php echo "USER-" . $barisbaru ?>"placeholder="ketik judul buku" disabled>
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
					 <select name="statuspengguna" id="statuspengguna" class="form-control" required>
					 <?php
							   $statusnya[3] = "Super Admin"; //jangan kebalik
							   $statusnya[2] = "Admin";
								$statusnya[1] = "Member Dosen";
								$statusnya[0] = "Member Mahasiswa";
							  for($i = 0 ; $i <4 ; $i++){
						   ?>
							<option value="<?php echo $data['status_pengguna'] ?>"> <?php echo $statusnya[$i] ?></option>
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
            
		</div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary tambah" id="tambah">Submit</button>
                    <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                </div>
            </div>
		</footer>
		</form>
	</section>
	
</div>

