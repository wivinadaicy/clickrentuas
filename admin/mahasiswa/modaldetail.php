<div id="modaldetail<?php echo $data['id_pengguna'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of User Data</h2>
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
					<input type="text" name="namalengkap"  id="namalengkap" class="form-control" placeholder="ketik judul buku" disabled value = "<?php echo $data['nama_lengkap']?>">
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Gender<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jeniskelamin" value="l" <?php if($data['jenis_kelamin']=="l"){echo "checked";} ?> disabled>Male &nbsp;&nbsp;
					<input type="radio" name="jeniskelamin" value="p"  <?php if($data['jenis_kelamin']=="p"){echo "checked";} ?> disabled>Female
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Date of Birth <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggallahir" class="form-control" id="jeniskelamin" disabled  value = "<?php echo $data['tanggal_lahir']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="email" id="email" class="form-control" placeholder="ketik nama pengarang" disabled  value = "<?php echo $data['email']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Phone Number <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="nomorhp"   id="nomorhp" class="form-control" placeholder="ketik nama pengarang" disabled  value = "<?php echo $data['no_hp']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">User Status</label>
				<div class="col-sm-9">
					 <select name="statuspengguna" id="statuspengguna" class="form-control" disabled>
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
				<label class="col-sm-3 control-label">Address<span class="required">*</span></label>
				<div class="col-sm-9">
					<textarea name="alamat" id="alamat"  class="form-control" placeholder="ketik nama pengarang" disabled><?php echo $data['alamat']?></textarea>
				</div>
			</div>
<?php if($data['status_pengguna']=="4"){ ?>
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
        <label class="col-sm-3 control-label">Major <span class="required">*</span></label>
        <div class="col-sm-9">
            <select class="form-control" id="programstudi" name="programstudi" readonly>
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
        <label class="col-sm-3 control-label">Batch <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="angkatan" class="form-control" value="<?php echo $datamhs['angkatan'] ?>"  readonly/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Semester <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="semester" class="form-control" value="<?php echo $datamhs['semester'] ?>"  readonly/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Total credits <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="sks" class="form-control" value="<?php echo $datamhs['total_sks'] ?>"  readonly/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">GPA<span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="number" name="ipk" class="form-control" value="<?php echo $datamhs['ipk_terakhir'] ?>"  readonly/>
        </div>
    </div>
			</section>
			<?php }?>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary modal-dismiss">OK</button>
                </div>
            </div>
        </footer>
            </form>
    </section>
</div>