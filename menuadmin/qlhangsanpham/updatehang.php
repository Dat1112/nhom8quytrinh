<?php 	
$id = $_POST['id'];
$tenncc = $_POST['tenhang'];
$diachi = $_POST['xuatxu'];
$sdt = $_POST['mota'];
$email = $_POST['namthanhlap'];
require_once 'condb.php';
$updatesql = "UPDATE hangsanpham SET tenhang = '$tenhang', xuatxu = '$xuatxu', mota = '$mota', namthanhlap = '$namthanhlap' WHERE id = $id"; 

if (mysqli_query($conn, $updatesql)) {
            //echo "Sửa thành công";
header("location: ad-hangsanpham.php");
        } 

//else {
//            echo "Lỗi: " . $conn->error;
//        }
			   
?>