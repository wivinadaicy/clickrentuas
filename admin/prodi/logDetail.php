<div id='mods<?php echo $data['id_logProgramStudi'];?>' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of Items Data</h2>
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
			<div class="form-group">
				<label class="col-sm-3 control-label">User Edit<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="useredit"  id="useredit" class="form-control" readonly value = "<?php echo $data['user_edit'] ?>" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Time Edit<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="waktuedit"  id="waktuedit" class="form-control" readonly value = "<?php echo date('l, d M Y | H:i',strtotime($data['waktu_edit'])) ?>" >
				</div>
			</div>
			
			<?php 
			$asli = mysqli_query($koneksi, "SELECT * FROM program_studi WHERE id_programStudi ='$idprodi'");
			$dasli = mysqli_fetch_array($asli);
			if($dasli['waktu_delete']=="0000-00-00 00:00:00" && $dasli['user_delete']!="0"){
				?>
			<div class="form-group">
				<label class="col-sm-3 control-label">Restored By<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="restoreuser"  id="restoreuser" class="form-control" readonly value = "<?php echo $dasli['user_delete'] ?>" >
				</div>
			</div>
			<?php
			}
			?>
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