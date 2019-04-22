<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>User Log</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
                    <li><a href="pengguna.php"><span>User</span></a></li>
                    <li><span>User Log</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
    <?php $idpem = $_GET['id']?>
        <h2 class="panel-title">User Log <?php echo $_GET['id'] ?></h2>
    </header>
    <div class="panel-body">
    <?php
    $add = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$idpem'");
    $riw = mysqli_fetch_array($add);
    ?>
    <h5><b>Input Date:</b> <?php echo date("d M Y | H:i", strtotime($riw['waktu_add'])) ?> WIB</h5>

    <?php 
    $idadmin = $riw['user_add'];
    $admin = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$idadmin'");
    $naad = mysqli_fetch_array($admin);

    if($idadmin!="0"){
    ?>
    <h5><b>User Input:</b> <?php echo $naad['nama_lengkap'] . " (" . $idadmin . ")" ?></h5>
    <?php
    }else{
    ?>
        <h5><b>User Input:</b> "Reserved by the owner"</h5>
    <?php
    }
    ?>
        <div class="table-responsive">
        <table class="table table-striped table-no-more table-bordered  mb-none">
									<thead>
										<tr>
											<th style="width: 10%"><span class="text-normal text-sm">Register Status</span></th>
											<th style="width: 15%"><span class="text-normal text-sm">Date</span></th>
                                            <th style="width: 15%"><span class="text-normal text-sm">User Status </span></th>
											<th><span class="text-normal text-sm">Admin</span></th>
                                            <th><span class="text-normal text-sm">Action</span></th>
										</tr>
									</thead>
									<tbody class="log-viewer">
                                    <?php
                                    $pinjam = $_GET['id'];
                                    $query = mysqli_query($koneksi, "SELECT * FROM log_pengguna WHERE id_pengguna='$idpem'");
                                    if(mysqli_num_rows($query)==0){ ?>
                                        <tr>
                                            <td colspan="5" style="text-align:center">No Data</td>
                                        </tr>
                                    <?php
                                    }
                                    while($data=mysqli_fetch_array($query)){
                                    ?>
										<tr>
											<td>
                                                <?php
                                                if($data['status_daftar']==0){
                                                    $statusny = "Tidak Aktif";
                                                }else if($data['status_daftar']==1){
                                                    $statusny = "Email Dikonfirmasi";
                                                }else{
                                                    $statusny = "Aktif";
                                                }
                                                echo $statusny;
                                                ?>
											</td>
											<td>
                                                <?php 
                                                $tangg = $data['waktu_edit'];
                                                echo date("d M Y | H:i", strtotime($tangg)) ?>
											</td>
                                            <td>
                                            <?php
                                                if($data['status_pengguna']==1){
                                                    $statusPengg = "Super Admin";
                                                }else if($data['status_pengguna']==2){
                                                    $statusPengg = "Admin";
                                                }else if($data['status_pengguna']==3){
                                                    $statusPengg = "Member Dosen";
                                                }else{
                                                    $statusPengg = "Member Mahasiswa";
                                                }
                                                echo $statusPengg;
                                                ?>
											</td>
											<td>
                                                <?php 
                                                 if($data['user_edit']=="0"){echo $data['nama_lengkap'];  }else{ echo $data['user_edit'];}
                                                ?>
											</td>
                                            
											<td>
                                            <a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#modaldetail<?php echo $data['id_pengguna'];?>"><i class='fa fa-eye'></i> Details
					                        </a>
											</td>
										</tr>
                                        <?php include('pengguna/logDetail.php');?>
                                    <?php } ?>
									</tbody>
								</table>
                                <?php
                                if($riw['user_delete']!='0'){ ?>
<h5><b>Deleted Date:</b> <?php echo date("d M Y | H:i", strtotime($riw['waktu_delete'])) ?> WIB</h5>

    <h5><b>User Delete:</b> <?php echo $riw['user_delete'] ?></h5>
                                 <?php   
                                }
                                ?>

        </div>
    </div>
</section>


<!--*****************************-->
<?php include('req/endtitle.php');?>
<?php include('req/lihatProfil.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>