<a href="#modalForm" class="modal-with-form btn btn-success pull-right"><li class="fa fa-plus"></li> Add Data</a>									

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
	<form action="prodi/insert.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Add Major Data</h2>
		</header>
        <div class="panel-body">
		<!--GANTI DISINI-->
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Major ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<?php
						$querym= mysqli_query($koneksi, "SELECT * FROM program_studi");
						$baris = mysqli_num_rows($querym);
						$barisbaru = $baris+1;
					?>
					<input type="text" name="idprogramstudi"  class="form-control" value = "<?php echo "PS-" . $barisbaru ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Major<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namaprogramstudi"  id="namabarang" class="form-control" placeholder="Insert Major Name" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Faculty<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="merek" name="namafakultas" class="form-control" placeholder="Insert Faculty Name">
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

