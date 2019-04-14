<a href="#modalForm" class="modal-with-form btn btn-success pull-right"><li class="fa fa-plus"></li> Add Data</a>									

<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
	<form action="barang/insert.php" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Tambah Data Barang</h2>
		</header>
        <div class="panel-body">
		<!--GANTI DISINI-->
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">ID Barang<span class="required">*</span></label>
				<div class="col-sm-9">
					<?php
						$querym= mysqli_query($koneksi, "SELECT * FROM barang");
						$baris = mysqli_num_rows($querym);
						$barisbaru = $baris+1;
					?>
					<input type="text" name="idbarang"  class="form-control" value = "<?php echo "BR-" . $barisbaru ?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Nama Barang<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namabarang"  id="namabarang" class="form-control" placeholder="ketik nama barang" required>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Jenis Barang<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jenisbarang" value="1" checked>Software &nbsp;&nbsp;
					<input type="radio" name="jenisbarang" value="2">Hardware &nbsp;&nbsp;
					<input type="radio" name="jenisbarang" value="3">Lain-Lain
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
						<option value="<?php echo $dr['id_ruangan'] ?>"><?php echo $dr['nama_ruangan'] ?></option>
					<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Merek <span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="merek" name="merek" class="form-control" placeholder="ketik merek barang">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Stok<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="stok"  id="stok" class="form-control" placeholder="masukkan stok barang" required >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Pembelian<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="date" name="tanggalbeli"  id="tanggalbeli" class="form-control" required >
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

