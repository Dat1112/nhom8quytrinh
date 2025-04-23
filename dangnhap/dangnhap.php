<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>WEB bán điện thoại </title>
    <meta property="og:type" content="website">
    <link href="https://www.coolmate.me/css/style.css?v=TVpkw4FvcQSMjphUB6s1" rel="stylesheet" type="text/css"> 
    <link  rel="stylesheet" href="css/bootstrap.min.css"> 
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
    ob_start();
    ?>
<div style="height: 100vh" class="container d-flex justify-content-center align-items-center">
    <form action="" method="POST" style="width: 400px">
        <h3 align="center">Đăng nhập</h3>
        <?php
        require("connect.php");
        session_start();

        $error_message = "";

        if (isset($_POST['btnDangNhap'])) {
            $tkNhap = mysqli_real_escape_string($link, $_POST['txtTK']);
            $mkNhap = mysqli_real_escape_string($link, $_POST['txtMK']);
            
            $sqlSelectTK = "SELECT * FROM user WHERE TaiKhoan = '$tkNhap'";
            $result = mysqli_query($link, $sqlSelectTK);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $mkdb = $row['MatKhau'];
                $level = $row['level']; // Fetch the user level
                
                if (password_verify($mkNhap, $mkdb)) {
                    // Lưu thông tin người dùng vào session
                    $_SESSION['user'] = [
                        'HoTen' => $row['HoTen'],
                        'TaiKhoan' => $row['TaiKhoan'],
                        'MatKhau' => $mkNhap, // Lưu mật khẩu người dùng nhập vào
                        'Phone' => $row['Phone'],
                        'Email' => $row['Email'],
                        'DiaChi' => $row['DiaChi'],
                        'id' => $row['id'],
                        'level' => $row['level']
                    ];

                    if ($level == 1) {
                        header("Location: ../menuadmin/menu/ad_khung.php");
                        ob_end_flush();
                        exit();
                    } 
                    if ($level == 2) {
                        header("Location: ../menuadmin/menu/nv_khung.php");
                        ob_end_flush();
                        exit();
                    }else {
                        header("Location: ../menuuser/index1.php");
                        exit();
                    }
                } else {
                    $error_message = "<div class='alert alert-danger mt-4'>Mật khẩu hoặc tên tài khoản không đúng</div>";
                }
            } else {
                $error_message = "Không tìm thấy tài khoản";
            }
        }

        echo $error_message;
        ?>
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="txtTK" placeholder="Nhập Tên đăng nhập">
            <div id="userNameError" style="color: red; display: none">Tên không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="txtMK" placeholder="Nhập mật khẩu">
            <div id="passwordError" style="color: red; display: none">Mật khẩu không được để trống</div>
        </div>
        <div>
            <input style="width: 100%" type="submit" class="btn btn-primary" value="Đăng nhập" name="btnDangNhap">
        </div>
        <div>
            <p align="center" class="mt-3">bạn chưa có tài khoản?<a href="dangky.php">Đăng ký</a></p>
        </div>
    </form>
</div>

</body>
</html>
