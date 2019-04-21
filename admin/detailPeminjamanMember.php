<div id="detailpeminjaman" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form class="form-horizontal mb-lg" method="post">
        <header class="panel-heading">
            <h2 class="panel-title">Detail Event Reservation "<?php echo $data['acara'];?>"</h2>
        </header>
        <div class="panel-body">
        <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation ID</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i> <!--ganti-->
                            </span>
                            <input type="text" name="idpeminjaman"  id="idpeminjaman" class="form-control" value="<?php echo $data['id_peminjaman'] ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation Date</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i> <!--ganti-->
                            </span>
                            <input type="text" name="tanggalpeminjaman"  id="tanggalpeminjaman" class="form-control" value="<?php echo $data['tanggal_peminjaman'] ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Reservation Time</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i> <!--ganti-->
                            </span>
                            <input type="text" name="waktupeminjaman"  id="waktupeminjaman" class="form-control" value="<?php echo $data['waktu_mulai'] . " SAMPAI " . $data['waktu_selesai']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Room</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-desktop"></i> <!--ganti-->
                            </span>
                            <input type="text" name="ruanganpeminjaman"  id="ruanganpeminjaman" class="form-control" value="<?php echo $data['nama_ruangan'] ?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Event Name</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-gift"></i> <!--ganti-->
                            </span>
                            <input type="text" name="acara"  id="acara" class="form-control" value="<?php echo $data['acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category of Event</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jenis_acara']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Total Participants</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-group"></i> <!--ganti-->
                            </span>
                            <input type="text" name="peserta"  id="peserta" class="form-control" value="<?php echo $data['jumlah_peserta']?>" disabled/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Event Description</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-comment"></i> <!--ganti-->
                            </span>
                            <textarea id="deskripsiacara" name="deskripsiacara" class="form-control" disabled><?php echo $data['deskripsi_acara']?></textarea>
                        </div>
                    </div>
                </div>
			
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary modal-dismiss">Close</button>
                </div>
            </div>
        </footer>
            </form>
    </section>
</div>