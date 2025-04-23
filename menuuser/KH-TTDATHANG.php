<?php ob_start();
include 'form.php';
session_start();
require_once '../config/config.php';
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

	  
  </head>
  <body>   
	    	<?php
$tien = 0;
$cart = [];
if (isset($_SESSION['cart'])) { 
    $cart = $_SESSION['cart'];
    foreach ($cart as $item) { 
        $tien += $item['qty'] * $item['giaban'];
    }
}

include 'head.php';

if(isset($_POST['dathang'])) {
    $ten = $_POST['fullname'];
    $email = $_POST['email'];
    $sdt = $_POST['phone'];
    $diachi = $_POST['city'];
    $ghichu = $_POST['notes'];
	
	$tongtien = $_POST['tien'];
    // Kiểm tra số lượng sản phẩm trong giỏ hàng
    $isValidOrder = true;
    foreach ($cart as $item) {
        $id = $item['id'];
        $query = "SELECT soluong FROM sanpham WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        
        if ($item['qty'] > $product['soluong']) {
            $isValidOrder = false;
            echo "Số lượng đặt hàng cho sản phẩm " . $item['ten'] . " vượt quá số lượng hiện có.<br>";
        }
    }

    if ($isValidOrder) {
		
        $sqldathang = "INSERT INTO donhang VALUES (0, '', 'Chờ xác nhận', '$ten', '$email', '$diachi', $sdt, '$ghichu', now(), now(), $tongtien)";
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $uid = $user['id'];
            $sqldathang = "INSERT INTO donhang VALUES (0, '$uid', 'Đang xử lý', '$ten', '$email', '$diachi', $sdt, '$ghichu', now(), now(), $tongtien)";
        }

        if (mysqli_query($conn, $sqldathang)) {
            $idvuachen = mysqli_insert_id($conn);
            foreach ($cart as $item) {
                $id = $item['id'];
                $giaban = $item['giaban'];
                $soluong = $item['qty'];
                $tong = $item['qty'] * $item['giaban'];
                
                $sqlchitiet = "INSERT INTO chitietdonhang VALUES (0, $idvuachen, $id, $giaban, $soluong, $tong, now(), now())";
                mysqli_query($conn, $sqlchitiet);
                
                // Cập nhật số lượng và lượng mua
                $sl = $item['soluong'] - $item['qty'];
                $lm = $item['luongmua'] + $item['qty'];
                
                $sanpham = "UPDATE sanpham SET soluong = $sl, luongmua = $lm WHERE id = $id";
                mysqli_query($conn, $sanpham);
            }
        }
        unset($_SESSION["cart"]);
        
        
		echo '<script>
            alert("Đặt hàng thành công!");
            window.location.href = "index1.php";
        </script>';
		ob_end_flush();
    } else {
        echo "Đặt hàng thất bại. Số lượng sản phẩm không đủ.";
    }
}
?>

	  
	  
	  
	  <section class="mytitle "  align="center" >
			  <div class="container" >
				  <strong class="text-black"><h3>Thông tin đơn hàng của bạn</h3></strong>
</div>
	</section>
				
			  
	  
	  
	  
<!--	  mymaincontent-->
<section class="mymaincontent " >
	
<div class="container">
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
	</div>

<!--	<strong><a href="#">Trang chủ </a> / <span>Quay lại</span></strong>-->
    <form method="post">
		<?php
if (!isset($_SESSION['user'])) {
?>
    <div class="form-group">
        <h5>Họ tên</h5>
        <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" required>
    </div>
    <div class="form-group">
        <h5>Email</h5>
        <input type="email" id="email" name="email" placeholder="Nhập email" required>
    </div>
    <div class="form-group">
        <h5>Số điện thoại</h5>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
    </div>
    <div class="form-group">
        <h5>Địa chỉ</h5>
        <input type="text" id="city" name="city" placeholder="Nhập Tỉnh / Thành phố" required>
    </div>
<?php
} else {
    $user = $_SESSION['user'];
?>
		
    <div class="form-group">
        <h5>Họ tên</h5>
        <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" value="<?php echo $user['HoTen']; ?>" required>
    </div>
    <div class="form-group">
        <h5>Email</h5>
        <input type="email" id="email" name="email" placeholder="Nhập email" value="<?php echo $user['Email']; ?>" required>
    </div>
    <div class="form-group">
        <h5>Số điện thoại</h5>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" value="<?php echo $user['Phone']; ?>" required>
    </div>
    <div class="form-group">
        <h5>Địa chỉ</h5>
        <input type="text" id="city" name="city" placeholder="Nhập Tỉnh / Thành phố" value="<?php echo $user['DiaChi']; ?>" required>
    </div>
<?php
}
?>

                
           
        </div>
        
        <div class="form-group">
            <h5>Ghi chú về đơn hàng</h5>
            <textarea id="notes" name="notes" placeholder="Ghi chú" rows="4"></textarea>
        </div>
    

    <div class="order-summary">
		<?php
		$cart = [];
							if (isset($_SESSION['cart'])) { 
								$cart=$_SESSION['cart'];
							}
								// var_dump($cart);die();
								$count = 0;
								
								foreach ($cart as $item) { 
									$count++;}
		?>
		
		
        <h3>Đơn hàng <?php echo $count;?>( sản phẩm)</h3>
        <table>
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
				<?php
							$cart = [];
							if (isset($_SESSION['cart'])) { 
								$cart=$_SESSION['cart'];
							}
								// var_dump($cart);die();
								$count = 0;
								$total=0;
								foreach ($cart as $item) { 
									$count++;
									$total += $item['qty'] * $item['giaban'];
									
				?>
									
                <!-- Sample row -->
                <tr>
					<td><?php echo $count;?></td>
                    <td><img src="../image/<?php echo $item['anh'];?>" alt="error" width="50"></td>
                    <td><?php echo $item['ten'];?></td>
                    <td><?php echo number_format($item['giaban'], 0, ',', '.') . " VNĐ";?></td>
                    <td><?php echo $item['qty'];?></td>
                    <td><?php echo number_format($item['qty'] * $item['giaban'], 0, ',', '.') . " VNĐ";?></td>
                </tr>
				<?php }?>
                <!-- Add more rows dynamically -->
            </tbody>
        </table>
        <p class="total">Phí vận chuyển: <span class="total-amount">30.000 VNĐ</span></p>
		<p class="total">Tổng sản phẩm: <span class="total-amount"><?php echo number_format($total, 0, ',', '.') . " VNĐ";?></span></p>
        <p class="total">Thành tiền: <span class="total-amount"><?php echo number_format($total+30000, 0, ',', '.') . " VNĐ";?></span></p>
		<input type="hidden" name="tien" value="<?php echo $total + 30000;?>">
    </div>

    <div class="place-order">
        <button type="submit" name="dathang">Đặt hàng</button>
    </div>
</form>

	  <?php echo $bot;?>
</section>
	  
	  
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
