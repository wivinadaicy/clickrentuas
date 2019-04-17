<?php
error_reporting(0);
 include('session.php');
 include('koneksi.php'); 
?>

Thank you for borrowing our room! 
<br>Your id is <?php echo $_GET['id_peminjaman'];?>
<br>
Please wait for the approval by the admin. 
Your room can be exchanged with consideration from the admin.
<a href="index.php" class="btn btn-primary">Back To Home</a>