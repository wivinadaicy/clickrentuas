<div id="delete<?php echo $data['id_fakultas'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Delete Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Are you sure you want to delete data from fakultas with the name "<?php echo $data['nama_fakultas']?>" ?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary hapus" href="fakultas/delete.php?id=<?php echo $data['id_barang'];?>">Delete</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>