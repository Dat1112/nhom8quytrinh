<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../dangnhap/dangnhap.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'nhom8web');
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Chuẩn bị truy vấn SQL để cập nhật thông tin người dùng
    $sql = "UPDATE user SET HoTen=?, Phone=?, DiaChi=? WHERE id=?";

    // Sử dụng Prepared Statement để ngăn chặn SQL Injection
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
    }

    // Bind các tham số và thực thi câu lệnh
    $stmt->bind_param("sssi", $fullname, $phone, $address, $user['id']);

    if ($stmt->execute()) {
        echo "Cập nhật thông tin thành công";
        // Có thể thực hiện các hành động khác sau khi cập nhật thành công
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
