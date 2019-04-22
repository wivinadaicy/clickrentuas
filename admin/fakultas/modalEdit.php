<div id="modal<?php echo $data['id_fakultas'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
			<form action="fakultas/update.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Edit Faculty Data</h2>
        </header>
        <div class="panel-body">
		<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Faculty ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idfakultas"  class="form-control" value = "<?php echo $data['id_fakultas'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Faculty Name<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namafakultas"  id="namafakultas" class="form-control" placeholder="insert faculty" required value = "<?php echo $data['nama_fakultas'] ?>">
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

