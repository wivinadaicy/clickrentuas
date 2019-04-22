<div id="modal<?php echo $data['id_programStudi'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
			<form action="prodi/update.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Edit Major Data</h2>
        </header>
        <div class="panel-body">
		<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Major ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idprogramstudi"  class="form-control" value = "<?php echo $data['id_programStudi'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Major<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namaprogramstudi"  id="namabarang" class="form-control" placeholder="Insert Major Name" required value = "<?php echo $data['nama_programStudi'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Faculty<span class="required">*</span></label>
				<div class="col-sm-9">
				<select name="fakultas">
					<?php
					$quer = mysqli_query($koneksi, "SELECT * FROM fakultas WHERE status_delete='0'");
					
					while($dquer = mysqli_fetch_array($quer)){
						?>
						<option value="<?php echo $dquer['id_fakultas'] ?>" <?php if($dquer['id_fakultas']==$data['id_fakultas']){echo "selected";} ?>><?php echo $dquer['nama_fakultas'] ?></option>
					<?php
					}
					?>
					</select>
				</div>
			</div>
			
			
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

