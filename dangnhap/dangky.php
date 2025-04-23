<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>WEB bán điện thoại </title>
    <meta property="og:type" content="website">
    <link href="https://www.coolmate.me/css/style.css?v=TVpkw4FvcQSMjphUB6s1" rel="stylesheet" type="text/css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/App.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
require("connect.php");

if (isset($_POST['btnDangKy'])) {
    $tk = mysqli_real_escape_string($link, $_POST['txtTK']);
    $email = mysqli_real_escape_string($link, $_POST['txtEmail']);
    $hoten = mysqli_real_escape_string($link, $_POST['txtHoTen']);
    $mk = mysqli_real_escape_string($link, $_POST['txtMK']);
    $remk = mysqli_real_escape_string($link, $_POST['txtReMK']);
    $level = 0;  // Giá trị mặc định cho level là 0

    // Check for empty fields
    if (empty($tk) || empty($email) || empty($hoten) || empty($mk) || empty($remk)) {
        echo "<div class='alert alert-danger mt-4'>Vui lòng điền đầy đủ tất cả các trường</div>";
    } else {
        // Check if username or email already exists
        $sqlCheck = "SELECT * FROM user WHERE taikhoan='$tk' OR email='$email'";
        $resultCheck = mysqli_query($link, $sqlCheck);

        if (mysqli_num_rows($resultCheck) > 0) {
            echo "<div class='alert alert-danger mt-4'>Tên đăng nhập hoặc email đã được đăng ký</div>";
        } else {
            if ($mk !== $remk) {
                echo "<div class='alert alert-danger mt-4'>Mật khẩu và mật khẩu xác nhận không khớp</div>";
            } else {
                $hashedMK = password_hash($mk, PASSWORD_DEFAULT);
                $sqlLuuTK = "INSERT INTO user (taikhoan, hoten, email, matkhau, level) VALUES ('$tk', '$hoten', '$email', '$hashedMK', '$level')";
                if (mysqli_query($link, $sqlLuuTK)) {
                    echo "<div class='alert alert-success mt-4'>Cập nhật thành công!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-4'>Đăng ký thất bại: " . mysqli_error($link) . "</div>";
                }
            }
        }
    }
}
?>
<div style="height: 100vh" class="container d-flex justify-content-center align-items-center">
    <form action="" method="post" enctype="multipart/form-data" style="width: 400px">
        <h3 align="center">Đăng ký tài khoản</h3>
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="txtTK" placeholder="Nhập Tên đăng nhập">
            <div id="userNameError" style="color: red; display: none">Tên không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="txtEmail" placeholder="Nhập email">
            <div id="emailError" style="color: red; display: none">Email không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="hoten" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="hoten" name="txtHoTen" placeholder="Nhập tên ">
            <div id="hotenError" style="color: red; display: none">Họ tên không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="txtMK" placeholder="Nhập mật khẩu">
            <div id="passwordError" style="color: red; display: none">Mật khẩu không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="repassword" class="form-label">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="repassword" name="txtReMK" placeholder="Nhập lại mật khẩu">
            <div id="repasswordError" style="color: red; display: none">Mật khẩu không được để trống</div>
        </div>
        <input style="width: 100%" type="submit" class="btn btn-primary" value="Đăng ký" name="btnDangKy">
        <p align="center" class="mt-3">Bạn đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
    </form>
</div>
    

</body>
</html>
