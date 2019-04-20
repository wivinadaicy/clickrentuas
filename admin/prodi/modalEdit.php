<div id="modal<?php echo $data['id_programStudi'];?>" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
			<form action="prodi/update.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Edit Major Data</h2>
        </header>
        <div class="panel-body">
		<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Barang<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idbarang"  class="form-control" value = "<?php echo $data['id_barang'] ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Nama Barang<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namabarang"  id="namabarang" class="form-control" placeholder="ketik nama barang" required value = "<?php echo $data['nama_barang'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Ruangan<span class="required">*</span></label>
				<div class="col-sm-9">
					<select name="ruangan">
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
				<label class="col-sm-3 control-label">Merek <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="merek" name="merek" class="form-control" placeholder="ketik merek barang" value = "<?php echo $data['merek'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Stok<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="stok"  id="stok" class="form-control" placeholder="masukkan stok barang" required value = "<?php echo $data['stok_barang'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Pembelian<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggalbeli"  id="tanggalbeli" class="form-control" required value = "<?php echo $data['tanggal_beli'] ?>" >
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

