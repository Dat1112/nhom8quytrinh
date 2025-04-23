<?php
$conn = new mysqli("localhost", "root", "", "nhom8web");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$id = $_POST['id'];
$sql = "DELETE FROM user WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Xóa tài khoản thành công";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
header("Location: quanlytk.php");
exit();
?>
