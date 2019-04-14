<div id="modal<?php echo $data['id_pengguna'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
			<form action="pengguna/update.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Edit User Data</h2>
        </header>
        <div class="panel-body">
            	<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">User ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idpengguna"  class="form-control" value = "<?php echo $data['id_pengguna']?>" placeholder="ketik judul buku" readonly>
				</div>
			</div>
			<input type="hidden" value="<?php $data['status_pengguna']?>" name="statussebelum">
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
					<input type="date" name="tanggallahir"  id="tanggallahir" required  value = "<?php echo $data['tanggal_lahir']?>"  class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="email" name="email" id="email" class="form-control" placeholder="insert email" required  value = "<?php echo $data['email']?>">
				</div>
			</div>
			<!--<div class="form-group">
				<label class="col-sm-3 control-label">Password<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="password" name="katasandi"  id="katasandi" class="form-control" placeholder="insert password" required>
				</div>
			</div>-->
			<div class="form-group">
				<label class="col-sm-3 control-label">Phone Number<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="nomorhp"   id="nomorhp" class="form-control" placeholder="insert phone number" required  value = "<?php echo $data['no_hp']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">User Status</label>
				<div class="col-sm-9">
					 <select name="statuspengguna" id="statuspengguna<?php echo $data['id_pengguna'] ?>" class="form-control" required>
					 <?php
							  
							  $statusnyah[0]="Super Admin";
							  $statusnyah[1]="Admin";
							  $statusnyah[2]="Member Dosen";
							  $statusnyah[3]="Member Mahasiswa";
							  for($i = 4 ; $i >0 ; $i--){
						   ?>
							<option value="<?php echo $i ?>" <?php if($data['status_pengguna']==$i){echo "selected";} ?> > <?php echo $statusnyah[$i-1] ?></option>
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
			<section id="editmhs<?php echo $data['id_pengguna'] ?>">
			<hr class="separator">
			<h3>Data Mahasiswa</h3>
			<?php
			$idpenggunanya = $data['id_pengguna'];
			$querymhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_pengguna='$idpenggunanya'");
			$datamhs = mysqli_fetch_array($querymhs);
			?>
			<div class="form-group">
        <label class="col-sm-3 control-label">NIM <span class="required">*</span></label>
        <div class="col-sm-9">
			
            <input type="text" name="nim" id="nim" class="form-control" value="<?php echo $datamhs['id_mahasiswa'] ?>" <?php if($data['status_pengguna']=="4"){echo "readonly";}else{echo "required";}?>/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Program Studi <span class="required">*</span></label>
        <div class="col-sm-9">
            <select class="form-control" id="programstudi" name="programstudi">
            <?php
            $ps = mysqli_query($koneksi, "SELECT * FROM program_studi WHERE status_delete='0'");
            while($dps=mysqli_fetch_array($ps)){
            ?>
                <option value="<?php echo $dps['id_programStudi']?>" <?php if($dps['id_programStudi']==$datamhs['id_programStudi']){echo "selected";}?>> <?php echo $dps['nama_programStudi']?> </option>
            <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Angkatan <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="angkatan" class="form-control" value="<?php echo $datamhs['angkatan'] ?>"  required/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Semester <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="semester" class="form-control" value="<?php echo $datamhs['semester'] ?>"  required/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Total SKS <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="sks" class="form-control" value="<?php echo $datamhs['total_sks'] ?>"  required/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">IPK Terakhir <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="ipk" class="form-control" value="<?php echo $datamhs['ipk_terakhir'] ?>"  required/>
        </div>
    </div>
			</section>
			
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary edit">Submit</button>
                    <button type="reset" class="btn btn-default modal-dismiss batal" onclick="reload()">Cancel</button>
                </div>
            </div>
        </footer>
            </form>
    </section>
</div>

