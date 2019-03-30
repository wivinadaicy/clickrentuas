<a href="#modalForm" class="modal-with-form btn btn-success pull-right"><li class="fa fa-plus"></li> Tambah Data</a>									

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Tambah Data Mahasiswa</h2>
        </header>
        <div class="panel-body">
		<!--GANTI DISINI-->
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Mahasiswa<span class="required">*</span></label>
				<div class="col-sm-9">
				
					<input type="text" name="idmahasiswa"  class="form-control" placeholder="ketik id mahasiswa" required>
				</div>
			</div>
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Pengguna<span class="required">*</span></label>
				<div class="col-sm-9">
					<?php
						$querym= mysqli_query($koneksi, "SELECT * FROM mahasiswa");
						$baris = mysqli_num_rows($querym);
						$barisbaru = $baris+1;
					?>
					<input type="text" name="idpengguna"  class="form-control" value = "<?php echo "USER-" . $barisbaru ?>"placeholder="ketik id pengguna" required>
				</div>
			</div>
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Nama Program Studi<span class="required">*</span></label>
				<div class="col-sm-9">
                    <select name="namaprodi" class="form-control">
					<?php
						$querym= mysqli_query($koneksi, "SELECT * FROM program_studi WHERE status_delete='0'");
						 while($baris =mysqli_fetch_array($querym))
                        {
                            ?>
                        <option value="<?php echo $baris['id_programStudi'] ?>">
                            <?php echo $baris['nama_programStudi']?>
                            
                        </option>
                        <?php    }?>
                        </select>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Angkatan <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="angkatan" id="angkatan" class="form-control" placeholder="ketik angkatan" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Semester <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="semester" id="semester" class="form-control" placeholder="ketik semester" required >
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-3 control-label">Total SKS <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="totalsks"   id="totalsks" class="form-control" placeholder="ketik total sks" required >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">IPK <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type ="number" name="ipk" id="ipk"  class="form-control" placeholder="ketik ipk" required>
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

