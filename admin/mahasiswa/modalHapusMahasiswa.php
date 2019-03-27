<div id="delete<?php echo $data['id_mahasiswa'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Hapus Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Apakah anda yakin akan menghapus data mahasiswa dengan id mahasiswa <?php echo $data['id_mahasiswa']?>?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="pengguna/delete.php?id=<?php echo $data['id_mahasiswa'];?>">Delete</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>