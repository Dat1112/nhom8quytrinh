<?php 	
$id = $_POST['id'];
$ten = $_POST['ten'];
$tenhang = $_POST['tenhang'];
$tenncc= $_POST['tenncc'];
$ngaynhap = $_POST['ngaynhap'];
$soluong = $_POST['soluong'];
$giavon = $_POST['giavon'];
require_once 'condb.php';
$updatesql = "UPDATE nhaphang SET ten='$ten',tenhang='$tenhang',tenncc='$tenncc',ngaynhap='$ngaynhap',soluong='$soluong',giavon='$giavon'  WHERE id = $id"; 

if (mysqli_query($conn, $updatesql)) {
           
header("location: ad- nhaphang.php");
        } 
	   
?>