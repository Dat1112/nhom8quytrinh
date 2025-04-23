<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #377B34;
            color: #fff;
            position: fixed;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #3D7180;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3 align="center">Quản trị nội dung</h3>
        <a href="../quanlysanpham/quanlysanpham.php">Sản phẩm</a>
        <a href="../qlnhacungcap/nhacungcap.php">Nhà cung cấp</a>
        <a href="../quanlydonhang/AD-DS DONHANG.php">Đơn hàng</a>
		<a href="../qlnhaphang/ad- nhaphang.php">Nhập hàng</a>
        <a href="../qlhangsanpham/ad-hangsanpham.php">Thương hiệu</a>
        <a href="../quanlydanhmuc/danhsach.php">Danh mục</a>
		<a href="../quanlytkkh/quanlytk.php">Tài khoản</a>
        <a href="../quanlytintuc/news_management.php">Tin tức</a>
		<a href="../../dangnhap/logout.php'>Đăng xuất">Đăng xuất</a>
    </div>
    <div class="main-content">
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
