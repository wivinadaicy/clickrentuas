<div id="lihatprofil" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title" style="text-align: center">Profile Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
    <div class="container">
    <div class="row">
        
        <div class="col-xs-9 col-sm-4 col-md-4">
            <div class=" well-sm" style="text-align:center">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php
                        if($jk=="l"){
                            $foto = "../images/fotoprofil/male.png";
                        }else{
                            $foto = "../images/fotoprofil/female.png";
                        }
                        ?>
                        <img class="rounded mx-auto d-block" width="50px" src="<?php echo $foto ?>"/>
                    </div>
                    <div class="col-sm-12 col-md-12">
                    <br>
                            <h4 style="color: black"><b><?php echo $nama ?></b></h4>
                            <?php
                            $ttl = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$id'");
                            $profile = mysqli_fetch_array($ttl);
								
								if($profile['status_pengguna']=="1"){
									$stat = "Super Admin";
								}else if($profile['status_pengguna']=="2"){
									$stat = "Admin";
								}else if($profile['status_pengguna']=="3"){
									$stat = "Member Dosen";
								}else{
									$stat = "member Mahasiswa";
								}
								?>
                            <h5>
                            <?php echo $stat ?></h5>
<br>
                            
                            
                    </div>
                </div>
            </div>
            <p>
                            <i class="glyphicon glyphicon-envelope"></i> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a> </p>
                           

                           <p> <i class="glyphicon glyphicon-map-marker"></i>
                            <?php echo $alamat ?></p>
                            <p> <i class="glyphicon glyphicon-map-marker"></i>
                            <?php echo $profile['tanggal_lahir'] ?></p>
                            <p><i class="glyphicon glyphicon-earphone"></i> <a href="tel:<?php echo $nohp ?>"><?php echo $nohp ?></a></p>
                            

                            <?php if($profile['status_pengguna']=="4"){
                                $mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa join program_studi join pengguna on program_studi.id_programStudi = mahasiswa.id_programStudi and pengguna.id_pengguna = mahasiswa.id_pengguna WHERE mahasiswa.status_delete='0' AND pengguna.id_pengguna='$id'");
                                $dmhs = mysqli_fetch_array($mhs);
                            ?>
                           
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program Studi: <span style="color:black"><?php echo $dmhs['nama_programStudi']?></span>  
                            </p>
                            <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Angkatan: <span style="color:black"><?php echo $dmhs['angkatan']?></span>  
                            </p>
                            <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semester: <span style="color:black"><?php echo $dmhs['semester']?></span>  
                            </p>
                            <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total SKS: <span style="color:black"><?php echo $dmhs['total_sks']?></span>  
                            </p>
                            <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK Terakhir: <span style="color:black"><?php echo $dmhs['ipk_terakhir']?></span>  
                            </p>


                            <?php  } ?>

        </div>
    </div>
</div>
					 
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-primary modal-dismiss">Ok</button>
				</div>
			</div>
		</footer>
	</section>
</div>