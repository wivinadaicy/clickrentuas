<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>
<?php

$passlama = $_POST['passl'];
$passbaru = $_POST['passb'];
$passkonfir = $_POST['passk'];

if($passbaru != $passkonfir){
    echo json_encode("1");
}else{
    echo json_encode("0");
}
?>