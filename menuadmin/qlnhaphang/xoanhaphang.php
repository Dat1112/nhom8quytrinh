<?php
$id = $_GET['id'];
require_once '../../config/config.php';
$sql = "DELETE FROM nhaphang WHERE id = $id";
mysqli_query($conn,$sql);
echo "XÓA DƠN HÀNG THÀNH CÔNG";
header("location: ad- nhaphang.php");
?>