<?php
$id = $_GET['id'];
require_once 'condb.php';
$sql = "DELETE FROM nhacungcap WHERE id = $id";
mysqli_query($conn,$sql);
echo "XÓA THÀNH CÔNG";
header("location: nhacungcap.php");
?>