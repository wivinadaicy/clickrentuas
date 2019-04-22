 <?php
error_reporting(0);
 include('session.php');
 include('koneksi.php'); 
?>
<html>
      <?php include('_head.php');?>
      
      <body data-spy="scroll" data-target="#templateux-navbar" data-offset="200" onload="tampilRuangan()">
    
    <?php include('_navbar.php');?>
    <div class="row" style="position: absolute; z-index:100">
    <div class="col-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Messages Sent!</strong> Thank you for contacting us.
        </div>
    </div>
</div>

<?php include('_header.php');?>
      <!-- END section -->

<?php include('bookingform.php');?>

<?php include('about.php');?>

<?php include('room.php');?>
      
<?php include('contact.php');?>

<?php include('_footer.php');?>
      
      <?php include('_script.php')?>
    </body>
 </html>

 