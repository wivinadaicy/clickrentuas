<div id="modal<?php echo $data['id_pengguna'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Edit Data Pengguna</h2>
        </header>
        <div class="panel-body">
            	<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Pengguna<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idpengguna"  class="form-control" value = "<?php echo $data['id_pengguna']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Nama Lengkap <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namalengkap"  id="namalengkap" class="form-control" placeholder="ketik judul buku" required value = "<?php echo $data['nama_lengkap']?>">
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Jenis Kelamin <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jeniskelamin" value="l" <?php if($data['jenis_kelamin']=="l"){echo "checked";} ?> >Laki-Laki &nbsp;&nbsp;
					<input type="radio" name="jeniskelamin" value="p"  <?php if($data['jenis_kelamin']=="p"){echo "checked";} ?> >Perempuan
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Lahir <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggallahir"  id="jeniskelamin" required  value = "<?php echo $data['tanggal_lahir']?>"  class="form-control" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="email" name="email" id="email" class="form-control" placeholder="ketik nama pengarang" required  value = "<?php echo $data['email']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kata Sandi <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="password" name="katasandi"  id="katasandi" class="form-control" placeholder="ketik nama pengarang" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nomor Hp <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="nomorhp"   id="nomorhp" class="form-control" placeholder="ketik nama pengarang" required  value = "<?php echo $data['no_hp']?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Status Pengguna</label>
				<div class="col-sm-9">
					 <select name="statuspengguna" id="statuspengguna" class="form-control" required>
						   <?php
						   $queryd = mysqli_query($koneksi, "SELECT * from status ORDER BY id_status desc");
						   while($data2=mysqli_fetch_array($queryd)){
							  
						   ?>
							<option value="<?php echo $data['id_status']?>" <?php if($data['status_pengguna']==$data2['id_status']){echo "selected";} ?> > <?php echo $data2['nama_status'] ?></option>
						   <?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat <span class="required">*</span></label>
				<div class="col-sm-9">
					<textarea name="alamat" id="alamat"  class="form-control" placeholder="ketik nama pengarang" required><?php echo $data['alamat']?></textarea>
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