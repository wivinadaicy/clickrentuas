<div id='modaldetail<?php echo $data['id_fakultas'];?>' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of Faculty Data</h2>
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
					<input type="text" name="namafakultas"  id="namafakultas" class="form-control" placeholder="Insert Faculty Name" readonly value = "<?php echo $data['nama_fakultas'] ?>">
				</div>
			</div>
			

			<div class="form-group">
				<label class="col-sm-3 control-label">User Edit<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="useredit"  id="useredit" class="form-control" readonly value = "<?php echo $data['user_edit'] ?>" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Waktu Edit<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="waktuedit"  id="waktuedit" class="form-control" readonly value = "<?php echo date('l, d M Y | H:i',strtotime($data['waktu_edit'])) ?>" >
				</div>
			</div>
			
			<?php 
			$asli = mysqli_query($koneksi, "SELECT * FROM fakultas WHERE id_fakultas ='$idfakultas'");
			$dasli = mysqli_fetch_array($asli);
			if($dasli['waktu_delete']=="0000-00-00 00:00:00" && $dasli['user_delete']!=""){
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