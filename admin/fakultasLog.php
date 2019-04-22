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
			<h2>Log Items</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.php">
							<i class="fa fa-home"></i>
						</a>
					</li>
                    <li><a href="pengguna.php"><span>Items</span></a></li>
                    <li><span>Log Items</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
<section class="panel">
    <header class="panel-heading">
    <?php $idbrg = $_GET['id']?>
        <h2 class="panel-title">Log Items <?php echo $_GET['id'] ?></h2>
    </header>
    <div class="panel-body">
    <?php
    $add = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$idbrg'");
    $riw = mysqli_fetch_array($add);
    ?>
    <h5><b>Tanggal Input:</b> <?php echo date("d M Y | H:i", strtotime($riw['waktu_add'])) ?> WIB</h5>

    <?php 
    $idadmin = $riw['user_add'];
    $admin = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$idadmin'");
    $naad = mysqli_fetch_array($admin);

    if($idadmin!="0"){
    ?>
    <h5><b>User Input:</b> <?php echo $naad['nama_lengkap'] . " (" . $idadmin . ")" ?></h4>
    <?php
    }else{
    ?>
        <h5><b>User Input:</b> "Mendaftar sendiri"</h4>
    <?php
    }
    ?>
        <div class="table-responsive">
        <table class="table table-striped table-no-more table-bordered  mb-none">
									<thead>
										<tr>
											<th><span class="text-normal text-sm">Date</span></th>
                                            <th><span class="text-normal text-sm">Items Name</span></th>
                                            <th><span class="text-normal text-sm">Room</span></th>
											<th><span class="text-normal text-sm">Admin</span></th>
                                            <th><span class="text-normal text-sm">Acttion</span></th>
										</tr>
									</thead>
									<tbody class="log-viewer">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM log_barang WHERE id_barang='$idbrg'");
                                    if(mysqli_num_rows($query)==0){ ?>
                                        <tr>
                                            <td colspan="5" style="text-align:center">Tidak ada data</td>
                                        </tr>
                                    <?php
                                    }
                                    while($data=mysqli_fetch_array($query)){
                                    ?>
										<tr>
											<td>
                                                <?php 
                                                $tangg = $data['waktu_edit'];
                                                echo date("d M Y | H:i", strtotime($tangg)) ?>
											</td>
                                            <td>
                                                <?php echo $data['nama_barang']?>
                                            </td>
											<td>
                                                <?php
                                                $idruang = $data['id_ruangan'];
                                                $nb = mysqli_query($koneksi, "SELECT * FROM ruangan WHERE id_ruangan='$idruang'");
                                                $dnb = mysqli_fetch_array($nb);

                                                echo $dnb['nama_ruangan'];
                                                ?>
											</td>
                                            <td>
                                                <?php 
                                                 if($data['user_edit']=="0"){echo $data['nama_lengkap'];  }else{ echo $data['user_edit'];}
                                                ?>
											</td>
											<td>
                                            <a class="modal-with-form btn btn-default" data-toggle="tooltip" data-placement="top" title="Detail" href="#modaldetail<?php echo $data['id_barang'];?>"><i class='fa fa-eye'></i> Details
					                        </a>
											</td>
										</tr>
                                        <?php include('barang/logDetail.php');?>
                                    <?php } ?>
									</tbody>
								</table>
                                <?php
                                if($riw['user_delete']!='0' && $riw['waktu_delete']!="0000-00-00 00:00:00"){ ?>
<h5><b>Tanggal Delete:</b> <?php echo date("d M Y | H:i", strtotime($riw['waktu_delete'])) ?> WIB</h5>

    <h5><b>User Delete:</b> <?php echo $riw['user_delete'] ?></h4>
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