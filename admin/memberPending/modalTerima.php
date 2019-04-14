<div id="modalterima<?php echo $data['id_pengguna'];?>" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Terima Member Baru</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
					<p>Apakah anda yakin akan mengapprove <?php echo $data['nama_lengkap']?> dengan email <?php echo $data['email']?>?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<a class="btn btn-primary terima" href="memberPending/terima.php?id=<?php echo $data['id_pengguna'];?>">Terima</a>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>