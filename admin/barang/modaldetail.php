<div id='modaldetail<?php echo $data['id_barang'];?>' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of Items Data</h2>
        </header>
        <div class="panel-body">
		<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Item ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idbarang"  class="form-control" value = "<?php echo $data['id_barang'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Item Name<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namabarang"  id="namabarang" class="form-control" placeholder="ketik nama barang" readonly value = "<?php echo $data['nama_barang'] ?>">
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Type of Item<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jenisbarang" value="1"  <?php if($data['id_jenisBarang']=="1"){echo "checked";} ?>  disabled>Software &nbsp;&nbsp;
					<input type="radio" name="jenisbarang" value="2"<?php if($data['id_jenisBarang']=="2"){echo "checked";} ?>  disabled>Hardware &nbsp;&nbsp;
					<input type="radio" name="jenisbarang" value="3"<?php if($data['id_jenisBarang']=="3"){echo "checked";} ?>  disabled>Etc
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Room<span class="required">*</span></label>
				<div class="col-sm-9">
					<select name="ruangan" disabled>
					<?php
					$r = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE status_delete='0'");
					while($dr = mysqli_fetch_array($r)){
					?>
						<option value="<?php echo $dr['id_ruangan'] ?>" <?php if($dr['id_ruangan']==$data['id_ruangan']){echo "selected";} ?>><?php echo $dr['nama_ruangan'] ?></option>
					<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Brand<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="merek" name="merek" class="form-control" placeholder="ketik merek barang" value = "<?php echo $data['merek'] ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Stock<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="stok"  id="stok" class="form-control" placeholder="masukkan stok barang" readonly value = "<?php echo $data['stok_barang'] ?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Purchase Date<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggalbeli"  id="tanggalbeli" class="form-control" readonly value = "<?php echo $data['tanggal_beli'] ?>" >
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