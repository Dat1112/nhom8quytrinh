<?php
// Bắt đầu phiên làm việc
session_start();

// Xóa tất cả các biến phiên làm việc
 //session_unset();
unset($_SESSION['user']);
// Hủy phiên làm việc
//session_destroy();

// Chuyển hướng người dùng về trang đăng nhập
header("Location: ../menuuser/index1.php");
exit;
?>