<?php
ob_start();
include 'form.php';
session_start();
require_once '../config/config.php';

// Xử lý khi người dùng bấm nút "Mua ngay" và "Đặt hàng"
$tien = 0;
$sl=$_POST['quantity2'];

if (isset($_POST['mua'])) {
    // Lấy dữ liệu từ form mua hàng
    $id = $_GET['id'];
    $s="SELECT * FROM sanpham WHERE id = $id";
	$check=mysqli_query($conn,$s);
	$r=mysqli_fetch_assoc($check);
}
if (isset($_POST['dathang'])) {
    // Lấy dữ liệu từ form đặt hàng
    $spid = $_POST['id'];
    $quantity = $_POST['quantity2'];
    $ten = $_POST['fullname'];
    $email = $_POST['email'];
    $sdt = $_POST['phone'];
    $diachi = $_POST['city'];
    $ghichu = $_POST['notes'];

    // Thực hiện thêm đơn hàng vào CSDL
    $sqldathang = "INSERT INTO donhang VALUES (0, '', 'Chờ xác nhận', '$ten', '$email', '$diachi', $sdt, '$ghichu', now(), now(), $tien)";
    if (mysqli_query($conn, $sqldathang)) {
        $idvuachen = mysqli_insert_id($conn);

        // Thêm chi tiết đơn hàng
        $id = $_POST['id'];
        $giaban = $_POST['price'];
        $sqlchitiet = "INSERT INTO chitietdonhang VALUES (0, $idvuachen, $id, $giaban, $quantity, $tien, now(), now())";
        mysqli_query($conn, $sqlchitiet);

        // Chuyển hướng về trang chủ sau khi đặt hàng thành công
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi khi thêm đơn hàng: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KH-THONG TIN DAT HANG</title>

    
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php echo $style;?>
	<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
/*            max-width: 800px;*/
/*
            margin: auto;
            padding: 20px;
*/
/*            background-color: white;*/
/*
            border: 1px solid #ddd;
            border-radius: 4px;
*/
        }
		
        h5 {
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .order-summary {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .order-summary table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-summary table, .order-summary th, .order-summary td {
            border: 1px solid #ddd;
        }
        .order-summary th, .order-summary td {
            padding: 10px;
            text-align: left;
        }
        .order-summary .total {
            text-align: right;
        }
        .order-summary .total-amount {
            font-size: 1.2em;
            color: #d9534f;
        }
        .place-order {
            text-align: right;
            margin-top: 20px;
        }
        .place-order button {
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
	
</head>
<body>
    <!-- Header -->
    <?php include 'head.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-4 mb-4">Thông tin đặt hàng của bạn</h2>
                <form method="post">
                    <!-- Form thông tin khách hàng -->
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <div class="form-group">
                            <label for="fullname">Họ tên</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nhập họ và tên" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="form-group">
                            <label for="city">Tỉnh / Thành phố</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="Nhập Tỉnh / Thành phố" required>
                        </div>
                    <?php else : ?>
                        <?php $user = $_SESSION['user']; ?>
                        <div class="form-group">
                            <label for="fullname">Họ tên</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nhập họ và tên" value="<?php echo $user['HoTen']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email" value="<?php echo $user['Email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo $user['Phone']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="city">Tỉnh / Thành phố</label>
                            <input type="text" id="city" name="city" class="form-control" placeholder="Nhập Tỉnh / Thành phố" value="<?php echo $user['DiaChi']; ?>" required>
                        </div>
                    <?php endif; ?>

                    <!-- Form thông tin đơn hàng -->
                    <div class="form-group">
                        <label for="huyen">Quận / Huyện</label>
                        <input type="text" id="huyen" name="huyen" class="form-control" placeholder="Nhập Quận / Huyện" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Số nhà / đường / xã</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ" required>
                    </div>
                    <div class="form-group">
                        <label for="notes">Ghi chú về đơn hàng</label>
                        <textarea id="notes" name="notes" class="form-control" placeholder="Ghi chú" rows="4"></textarea>
                    </div>

                    <!-- Bảng đơn hàng -->
                    <div class="order-summary">
                        <h3>Đơn hàng (1 sản phẩm)</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="../image/<?php echo $image; ?>" alt="Ảnh sản phẩm" width="50"></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo number_format($price, 0, ',', '.') . " VNĐ"; ?></td>
                                    <td><?php echo $quantity2; ?></td>
                                    <td><?php echo number_format($tien, 0, ',', '.') . " VNĐ"; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="total">Phí vận chuyển: <span class="total-amount">30.000 VNĐ</span></p>
                        <p class="total">Thành tiền: <span class="total-amount"><?php echo number_format($sl, 0, ',', '.') . " VNĐ"; ?></span></p>
                    </div>

                    <!-- Nút Đặt hàng -->
                    <div class="place-order text-right">
                        <button type="submit" name="dathang" class="btn btn-primary">Đặt hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $bot; ?>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>
