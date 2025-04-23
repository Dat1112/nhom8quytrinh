<?php include '../form.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <?php echo $style;?>
</head>
<body>
    <?php echo $top;?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Thêm tài khoản</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="txtTK" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="txtEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" class="form-control" id="fullname" name="txtHoTen" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="txtMK" required>
                    </div>
                    <div class="form-group">
                        <label for="repassword">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="repassword" name="txtReMK" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="level">Vai trò</label>
                        <select class="form-control" id="level" name="level">
                            <option value="1">Admin</option>
                            <option value="2">Nhân viên</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-5">Thêm</button>
                </form>
                <a href="quanlytk.php" class="mt-3 d-block">Trở về danh sách tài khoản</a>
            </div>
        </div>
    </div>
    <?php echo $bot;?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli("localhost", "root", "", "nhom8web");

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        $username = $conn->real_escape_string($_POST['txtTK']);
        $password = $conn->real_escape_string($_POST['txtMK']);
        $email = $conn->real_escape_string($_POST['txtEmail']);
        $repassword = $conn->real_escape_string($_POST['txtReMK']);
        $fullname = $conn->real_escape_string($_POST['txtHoTen']);
        $level = $conn->real_escape_string($_POST['level']);

        if ($password !== $repassword) {
            echo "<div class='alert alert-danger mt-4'>Mật khẩu và mật khẩu xác nhận không khớp!</div>";
        } else {
           
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (TaiKhoan, MatKhau,Email, HoTen, level) VALUES ('$username', '$hashed_password','$email' , '$fullname', '$level')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-4'>Tài khoản đã được thêm thành công!</div>";
            } else {
                echo "<div class='alert alert-danger mt-4'>Lỗi: " . $conn->error . "</div>";
            }
        }
        $conn->close();
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
