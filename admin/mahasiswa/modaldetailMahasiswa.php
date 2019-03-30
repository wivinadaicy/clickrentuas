<div id="modaldetail<?php echo $data['id_mahasiswa'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Detail Data Mahasiswa</h2>
        </header>
        <div class="panel-body">
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Mahasiswa<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idmahasiswa"  class="form-control" value = "<?php echo $data['id_mahasiswa']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Pengguna<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idpengguna"  class="form-control" value = "<?php echo $data['id_pengguna']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
            <div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Nama Program Studi<span class="required">*</span></label>
				<div class="col-sm-9">
                    <select name="namaprodi" class="form-control" disabled>
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
					<input type="text" name="angkatan"  class="form-control" value = "<?php echo $data['angkatan']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Semester <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="semester"  class="form-control" value = "<?php echo $data['semester']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-3 control-label">Total SKS <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="totalsks"  class="form-control" value = "<?php echo $data['total_sks']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">IPK <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="ipk"  class="form-control" value = "<?php echo $data['ipk_terakhir']?>" placeholder="ketik judul buku" disabled>
				</div>
			</div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary tambah">OK</button>
                    <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                </div>
            </div>
        </footer>
            </form>
    </section>
</div>