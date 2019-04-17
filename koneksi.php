<?php 
$koneksi = mysqli_connect('localhost','root','','sistech2019');

if(!$koneksi){
?>

<script>
 alert('Database tidak terkoneksi!');
</script>
<?php
}

	//date_default_timezone_set('Asia/Jakarta');
?>