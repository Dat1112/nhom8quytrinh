<?php
$id = $_GET['sid'];
require_once '../../config/config.php';
$sql = "DELETE FROM danhmuc WHERE id = $id";
mysqli_query($conn,$sql);
echo "XÓA THÀNH CÔNG";
header("location: danhsach.php");
?>