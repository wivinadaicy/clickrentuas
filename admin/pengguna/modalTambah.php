<a href="#modalForm" class="modal-with-form btn btn-success pull-right"><li class="fa fa-plus"></li> Tambah Data</a>									

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Tambah Data Pengguna</h2>
        </header>
        <div class="panel-body">
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Pengguna<span class="required">*</span></label>
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
				<label class="col-sm-3 control-label">Nama Lengkap <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namalengkap"  id="namalengkap" class="form-control" placeholder="ketik judul buku" required>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Jenis Kelamin <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jeniskelamin" value="l" checked>Laki-Laki &nbsp;&nbsp;
					<input type="radio" name="jeniskelamin" value="p">Perempuan
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Lahir <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggallahir"  id="jeniskelamin"  class="form-control"  required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="email" name="email" id="email" class="form-control" placeholder="ketik nama pengarang" required >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kata Sandi <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="password" name="katasandi"  id="katasandi" class="form-control" placeholder="ketik nama pengarang" required >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nomor Hp <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="nomorhp"   id="nomorhp" class="form-control" placeholder="ketik nama pengarang" required >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Status Pengguna</label>
				<div class="col-sm-9">
					 <select name="statuspengguna" id="statuspengguna" class="form-control" required>
						   <?php
						   $queryx = mysqli_query($koneksi, "SELECT * from status ORDER BY id_status desc");
						   
						   while($data=mysqli_fetch_array($queryx)){
							  
						   ?>
							<option value="<?php echo $data['id_status']?>" > <?php echo $data['nama_status'] ?></option>
						   <?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Alamat <span class="required">*</span></label>
				<div class="col-sm-9">
					<textarea name="alamat" id="alamat"  class="form-control" placeholder="ketik nama pengarang" required></textarea>
				</div>
			</div>
            
		</div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary tambah">Submit</button>
                    <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>

