<?php 	
$id = $_POST['id'];
$tenncc = $_POST['tenncc'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$email = $_POST['email'];
require_once 'condb.php';
$updatesql = "UPDATE nhacungcap SET tennnc = '$tenncc', diachi = '$diachi', sdt = '$sdt', email = '$email' WHERE id = $id"; 

if (mysqli_query($conn, $updatesql)) {
            //echo "Sửa thành công";
header("location: nhacungcap.php");
        } 

//else {
//            echo "Lỗi: " . $conn->error;
//        }
			   
?>