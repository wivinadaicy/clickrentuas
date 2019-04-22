<a href="#modalForm" class="modal-with-form btn btn-success pull-right"><li class="fa fa-plus"></li> Add Data</a>									

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
	<form action="kategoriAcara/insert.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Add Event Category Data</h2>
		</header>
        <div class="panel-body">
		<!--GANTI DISINI-->
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Event Category ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<?php
						$querym= mysqli_query($koneksi, "SELECT * FROM kategori_acara");
						$baris = mysqli_num_rows($querym);
						$barisbaru = $baris+1;
					?>
					<input type="text" name="idkategoriacara"  class="form-control" value = "<?php echo $barisbaru ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Event Category<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="jenisacara"  id="namafakultas" class="form-control" placeholder="Insert Event Category" required>
				</div>
			</div>
		</div>
        <footer class="panel-footer">
            <div class="row">
			<input type="hidden" name="idx" value="<?php echo $id ?>">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default modal-dismiss batal">Cancel</button>
                </div>
            </div>
		</footer>
		</form>
	</section>
	
</div>

