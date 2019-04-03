<div id="tukarPinjaman<?php echo $dato['id_peminjaman'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Delete Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
                    <p>Apakah Anda yakin untuk mengganti ruangan acara "<?php echo $data['acara']?>" pada ruangan '<?php echo $data['nama_ruangan']?>'' dengan ruangan '<?php echo $dato['nama_ruangan']?>'? <br>
                    Jika Anda menggantinya, maka acara "<?php echo $dato['acara']?>" akan diadakan di ruang '<?php echo $data['nama_ruangan']?>'.
                </p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary" href="queryTukarRuangan.php?idbaru=<?php echo $dato['id_ruangan']?>&idlama=<?php echo $data['id_ruangan']?>&pinjam1=<?php echo $data['id_peminjaman']?>&pinjam2=<?php echo $dato['id_peminjaman']?>">Change</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>