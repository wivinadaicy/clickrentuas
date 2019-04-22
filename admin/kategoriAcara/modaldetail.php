<div id='modaldetail<?php echo $data['id_kategoriAcara'];?>' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of Event Category</h2>
        </header>
        <div class="panel-body">
		<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Event Category ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idkategoriacara"  class="form-control" value = "<?php echo $data['id_kategoriAcara'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Event Category<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="jenisacara"  id="jenisacara" class="form-control" placeholder="Insert event category" readonly value = "<?php echo $data['jenis_acara'] ?>">
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