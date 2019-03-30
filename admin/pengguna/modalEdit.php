<div id="modal<?php echo $data['id_pengguna'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
			<form>
        <header class="panel-heading">
            <h2 class="panel-title">Edit User Data</h2>
        </header>
        <div class="panel-body">
            	<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">User ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idpengguna"  class="form-control" value = "<?php echo $data['id_pengguna']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namalengkap"  id="namalengkap" class="form-control" placeholder="insert full name" required value = "<?php echo $data['nama_lengkap']?>">
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Gender <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jeniskelamin" value="l" <?php if($data['jenis_kelamin']=="l"){echo "checked";} ?> >Male &nbsp;&nbsp;
					<input type="radio" name="jeniskelamin" value="p"  <?php if($data['jenis_kelamin']=="p"){echo "checked";} ?> >Female
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Date of Birth <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggallahir"  id="jeniskelamin" required  value = "<?php echo $data['tanggal_lahir']?>"  class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="email" name="email" id="email" class="form-control" placeholder="insert email" required  value = "<?php echo $data['email']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="password" name="katasandi"  id="katasandi" class="form-control" placeholder="insert password" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Phone Number<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="nomorhp"   id="nomorhp" class="form-control" placeholder="insert phone number" required  value = "<?php echo $data['no_hp']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">User Status</label>
				<div class="col-sm-9">
					 <select name="statuspengguna" id="statuspengguna" class="form-control" required>
					 <?php
							  
							  $statusnyah[1]="Super Admin";
							  $statusnyah[2]="Admin";
							  $statusnyah[3]="Member Dosen";
							  $statusnyah[4]="Member Mahasiswa";
							  for($i = 1 ; $i <=4 ; $i++){
						   ?>
							<option value="<?php echo $data['status_pengguna'] ?>" <?php if($data['status_pengguna']==$i){echo "selected";} ?> > <?php echo $statusnyah[$i] ?></option>
						   <?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Address <span class="required">*</span></label>
				<div class="col-sm-9">
					<textarea name="alamat" id="alamat"  class="form-control" placeholder="insert address" required><?php echo $data['alamat']?></textarea>
				</div>
			</div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary edit">Submit</button>
                    <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                </div>
            </div>
        </footer>
            </form>
    </section>
</div>