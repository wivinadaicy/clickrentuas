<?php
session_start();
$email = $_SESSION['email'];
$password =$_SESSION['password'];
$nama = $_SESSION['nama'];
$jk = $_SESSION['jk'];
$id = $_SESSION['id'];
$alamat = $_SESSION['alamat'];
$nohp = $_SESSION['no_hp'];
$status= $_SESSION['status'];

 if($email==""){
			   $_SESSION['email'] ="";
			 $_SESSION['password'] ="";
			 $_SESSION['nama'] ="";
			 $_SESSION['jk'] ="";
				  $_SESSION['id'] ="";
			  $_SESSION['alamat'] ="";
			 $_SESSION['no_hp'] ="";
			$_SESSION['status'] ="";
 }
include('../koneksi.php');
?>

<!--*****************************-->
<?php include('req/head.php');?>
<?php include('req/header.php');?>
<?php include('req/leftbar.php');?>
<!--*****************************-->
<!--*****************************-->
	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Dashboard</h2>

			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="index.html">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Dashboard</span></li>
				</ol>

				<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
			</div>
		</header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
		
		
		
<!--*****************************-->
<?php include('req/endtitle.php');?>
<!--*****************************-->
<!--*****************************-->
<?php include('req/rightbar.php');?>
<?php include('req/script.php');?>