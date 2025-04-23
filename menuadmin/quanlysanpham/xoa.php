<?php
require_once '../../config/config.php';
$spid= $_GET['spid'];
$sql="DELETE FROM sanpham WHERE id = $spid";
mysqli_query($conn,$sql);
header("location: quanlysanpham.php");
?>
