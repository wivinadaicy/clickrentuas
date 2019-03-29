<?php
error_reporting(0);
 include('session.php');
 include('koneksi.php'); 
?>
<html>
      <?php include('_head.php');?>
      
    <body data-spy="scroll" data-target="#templateux-navbar" data-offset="200" onload="tampilRuangan()">

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

 