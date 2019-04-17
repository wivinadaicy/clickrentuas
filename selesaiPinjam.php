<?php
error_reporting(0);
 include('session.php');
 include('koneksi.php'); 
?>

Thank you for borrowing our room! 
<br>Your booking code is <?php echo $_GET['idpinjam'];?>
<br>
Please wait for the approval by the admin. 
Your room can be exchanged with consideration from the admin.
<a href="index.php" class="btn btn-primary">Back To Home</a>