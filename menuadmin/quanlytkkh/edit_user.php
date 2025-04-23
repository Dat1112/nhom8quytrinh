<?php
include '../form.php';
$conn = new mysqli("localhost", "root", "", "nhom8web");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $conn->real_escape_string($_POST['txtTK']);
    $password = $conn->real_escape_string($_POST['txtMK']);
    $level = $conn->real_escape_string($_POST['level']);
    $fullName = $conn->real_escape_string($_POST['txtFullName']); // New full name field

    // Password hashing for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET TaiKhoan='$username', MatKhau='$hashed_password', level='$level', HoTen='$fullName' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-4'>Cập nhật thành công!</div>";
    } else {
        echo "<div class='alert alert-danger mt-4'>Lỗi: " . $conn->error . "</div>";
    }

    $conn->close();
    header("Location: quanlytk.php");
    exit();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger mt-4'>Không tìm thấy tài khoản.</div>";
        $conn->close();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <?php echo $style; ?>
</head>
<body>
    <?php echo $top; ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Sửa tài khoản</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="txtTK">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="txtTK" name="txtTK" value="<?php echo $row['TaiKhoan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="txtMK">Mật khẩu</label>
                        <input type="password" class="form-control" id="txtMK" name="txtMK" required>
                    </div>
                    <div class="form-group">
                        <label for="txtFullName">Họ và tên</label>
                        <input type="text" class="form-control" id="txtFullName" name="txtFullName" value="<?php echo $row['HoTen']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Vai trò</label>
                        <select class="form-control" id="level" name="level">
                            <option value="1" <?php if ($row['level'] == 1) echo 'selected'; ?>>Admin</option>
                            <option value="2" <?php if ($row['level'] == 2) echo 'selected'; ?>>Nhân viên</option>
                            <option value="0" <?php if ($row['level'] == 0) echo 'selected'; ?>>Khách hàng</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                </form>
                <a href="quanlytk.php" class="mt-3 d-block">Trở về danh sách tài khoản</a>
            </div>
        </div>
    </div>
    <?php echo $bot; ?>
    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
