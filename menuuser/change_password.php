<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../dangnhap/dangnhap.php"); // Redirect to login page if not logged in
    exit();
}

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'nhom8web');
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Kiểm tra nếu mật khẩu mới và mật khẩu xác nhận khớp nhau
    if ($newPassword !== $confirmPassword) {
        die("Mật khẩu mới và mật khẩu xác nhận không khớp nhau.");
    }

    // Lấy mật khẩu hiện tại từ cơ sở dữ liệu
    $sql = "SELECT MatKhau FROM user WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
    }

    $stmt->bind_param("i", $user['id']);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Kiểm tra mật khẩu hiện tại
    if (!password_verify($currentPassword, $hashedPassword)) {
        die("Mật khẩu hiện tại không đúng.");
    }

    // Hash mật khẩu mới và cập nhật trong cơ sở dữ liệu
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET MatKhau=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Lỗi chuẩn bị câu lệnh SQL: ' . $conn->error);
    }

    $stmt->bind_param("si", $newHashedPassword, $user['id']);
    if ($stmt->execute()) {
        echo "Đổi mật khẩu thành công";
        // Cập nhật thông tin người dùng trong phiên làm việc
        $_SESSION['user']['MatKhau'] = $newHashedPassword;
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
