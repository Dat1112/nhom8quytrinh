<?php
include '../config/config.php';
session_start();

if (isset($_POST['submit']) && !empty($_POST["username"]) && !empty($_POST["password"])) {
    // Bảo mật dữ liệu đầu vào
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
//    $password = md5($password);

    // Kiểm tra giá trị đã được nhập đúng
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $user = mysqli_query($conn, $sql);

    // Kiểm tra truy vấn
    if (!$user) {
        die("Truy vấn thất bại: " . mysqli_error($conn));
    }
 if (mysqli_num_rows($user) > 0) {
    $row = mysqli_fetch_assoc($user); // Trích xuất dữ liệu của người dùng từ kết quả truy vấn
    $_SESSION["user"] = $username;
    // Xác định cấp độ người dùng
    $level = $row['level']; // Lấy cấp độ từ dữ liệu truy vấn

    // Điều hướng sau đăng nhập
    if ($level == 1) {
        header("Location: ad_khung.php");
        exit();
    } else {
        header("Location: indexx.php");
        exit();
    }
} else {
    echo "Người dùng đã nhập sai tên đăng nhập hoặc mật khẩu";
}
} else {
    header("location: login.php");
    exit();
}
?>


