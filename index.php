<?php
session_start();
error_reporting(0);
$email = $_SESSION['email'];
$password =$_SESSION['password'];
$nama = $_SESSION['nama'];
$jk = $_SESSION['jk'];
$id = $_SESSION['id'];
$alamat = $_SESSION['alamat'];
$nohp = $_SESSION['no_hp'];
$status= $_SESSION['status'];

include('koneksi.php');
?>
<html>
      <?php include('_head.php');?>
      
    <body data-spy="scroll" data-target="#templateux-navbar" data-offset="200">

        <?php include('_navbar.php');?>

<?php include('_header.php');?>
      <!-- END section -->

<?php include('bookingform.php');?>

<?php include('about.php');?>

<?php include('room.php');?>
      
<?php include('contact.php');?>

<?php include('reservenow.php');?>
<?php include('_footer.php');?>
      
      <?php include('_script.php')?>
    </body>
 </html>
