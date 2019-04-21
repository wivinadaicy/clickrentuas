<div id='modaldetail<?php echo $data['id_programStudi'];?>' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of Major Data</h2>
        </header>
        <div class="panel-body">
		<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Major ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idprogramstudi"  class="form-control" value = "<?php echo $data['id_barang'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Major<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namaprogramstudi"  id="namabarang" class="form-control" placeholder="ketik nama barang" readonly value = "<?php echo $data['nama_programStudi'] ?>">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label">Faculty<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="merek" name="namafakultas" class="form-control" placeholder="ketik merek barang" value = "<?php echo $data['nama_fakultas'] ?>" readonly>
				</div>
			</div>
			
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