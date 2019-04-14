<?php include('../session.php')?>
<?php include('../koneksi.php'); ?>

<?php
$statuss = $_POST['status'];

if($statuss=="4"){
    echo json_encode("y");
}
if($statuss!="4"){
    echo json_encode("n");
}
?>