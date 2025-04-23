<?php
$style="<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
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
    </style>";
	


$top = "<div class='sidebar'>
    <h3 align='center'>Quản trị nội dung</h3>";

if (isset($_SESSION['user'])) {
    $level = $_SESSION['user']['level'];

    if ($level == 2) {
        // Hiển thị chỉ Đơn hàng, Tin tức và Đăng xuất
        $top .= "
        <a href='../quanlydonhang/AD-DS DONHANG.php'>Đơn hàng</a>
        <a href='../quanlytintuc/news_management.php'>Tin tức</a>
        <a href='../../dangnhap/logout.php'>Đăng xuất</a>";
    } else {
        // Hiển thị tất cả
        $top .= "
        <a href='../quanlysanpham/quanlysanpham.php'>Sản phẩm</a>
        <a href='../qlnhacungcap/nhacungcap.php'>Nhà cung cấp</a>
        <a href='../qlnhaphang/ad- nhaphang.php'>Nhập hàng</a>
        <a href='../qlhangsanpham/ad-hangsanpham.php'>Hãng</a>
        <a href='../quanlydanhmuc/danhsach.php'>Danh mục</a>
        <a href='../quanlytkkh/quanlytk.php'>Tài khoản</a>
        <a href='../quanlydonhang/AD-DS DONHANG.php'>Đơn hàng</a>
        <a href='../quanlytintuc/news_management.php'>Tin tức</a>
        <a href='../../dangnhap/logout.php'>Đăng xuất</a>";
    }
} else {
    // Nếu không có session user, chỉ hiển thị đăng xuất
    $top .= "
    <a href='../../dangnhap/logout.php'>Đăng xuất</a>";
}

$top .= "</div>
    <div class='main-content'>";


	$bot="</div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>";









?>