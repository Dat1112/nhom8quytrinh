<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../dangnhap/dangnhap.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 150vh; 
            background-color: #343a40;
            padding-top: 20px;
            color: #ffffff;
        }
        .sidebar-item {
            padding: 10px 15px;
            border-bottom: 1px solid #495057;
            cursor: pointer;
        }
        .sidebar-item a {
            color: #ffffff;
            text-decoration: none;
        }
        .sidebar-item:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
        .card {
            padding: 20px;
            margin-top: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .hidden {
            display: none;
        }
        .card img {
            border-radius: 50%;
            border: 2px solid #ffffff;
            max-width: 100%;
            height: auto;
        }
        .card .row {
            margin-bottom: 20px;
        }
        .card form {
            padding-left: 20px;
        }
        .custom-file-input {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="sidebar-item" onclick="showSection('account-info')">
                    <a href="#">Thông tin tài khoản</a>
                </div>
				<div class="sidebar-item" onclick="showSection('account-info')">
                    <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
                </div>
                <div class="sidebar-item" onclick="logout()">
                    <a href="#">Thoát</a>
                </div>
            </div>
            <div class="col-md-10 content">
                <div id="account-info" class="card">
                    <h3>Thông tin tài khoản</h3>
                    <form id="updateForm" action="update_user.php" method="post">
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['HoTen']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['Phone']); ?>" oninput="validatePhone(this)" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($user['DiaChi']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($user['Email']); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($user['TaiKhoan']); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" value="<?php echo htmlspecialchars($user['MatKhau']); ?>" disabled>
                            <a href="#" data-toggle="modal" data-target="#changePasswordModal">Đổi mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal đổi mật khẩu -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Đổi mật khẩu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="changePasswordForm" action="change_password.php" method="post">
                        <div class="form-group">
                            <label for="currentPassword">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu mật khẩu mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Hiển thị phần được chọn
            document.getElementById(sectionId).classList.remove('hidden');

            // Ẩn tất cả các phần còn lại trong sidebar
            document.querySelectorAll('.card').forEach(function(card) {
                if (card.id !== sectionId) {
                    card.classList.add('hidden');
                }
            });
        }

        function logout() {
            // Chuyển hướng đến trang index1.php
            window.location.href = 'index1.php';
        }

        function validatePhone(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword !== confirmPassword) {
                event.preventDefault();
                alert('Mật khẩu mới và mật khẩu xác nhận không khớp nhau.');
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
