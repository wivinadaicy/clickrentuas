<div id='modaldetail<?php echo $data['id_ruangan'];?>' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Details of Items Data</h2>
        </header>
        <div class="panel-body">
		<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room ID<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="idruangan"  class="form-control" value = "<?php echo $data['id_ruangan'];?>" readonly>
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Room Name<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="namaruangan"  id="namaruangan" class="form-control" placeholder="Insert Room Name" readonly value = "<?php echo $data['nama_ruangan'];?>">
				</div>
			</div>
			<div class="form-group mt-lg">
				<label class="col-sm-3 control-label">Type of Room<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="radio" name="jenisruangan" value="1" <?php if($data['jenis_ruangan']=="1"){echo "checked";} ?> disabled>Laboratory &nbsp;&nbsp;
					<input type="radio" name="jenisruangan" value="2" <?php if($data['jenis_ruangan']=="2"){echo "checked";} ?> disabled>Meeting Room
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Floor<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" id="lantai" name="lantai" class="form-control" placeholder="Insert Location" value = "<?php echo $data['gedung_lantai'];?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Capacity<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="number" name="kapasitas"  id="stok" class="form-control" placeholder="Insert Capacity of the Room" value = "<?php echo $data['kapasitas'];?>" readonly >
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-3 control-label">Description<span class="required">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="deskripsi"  id="stok" class="form-control" placeholder="Insert Description of the Room" value = "<?php echo $data['deskripsi'];?>" readonly>
				</div>
			</div>
<!--copas untuk logDetail-->
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
			$asli = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE id_ruangan ='$idruang'");
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