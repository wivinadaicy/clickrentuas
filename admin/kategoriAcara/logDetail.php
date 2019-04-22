<div id='modaldetail<?php echo $data['id_logKategoriAcara'];?>' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of Event Category Data</h2>
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
			$asli = mysqli_query($koneksi, "SELECT * FROM kategori_acara WHERE id_kategoriAcara ='$idkategoriacara'");
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