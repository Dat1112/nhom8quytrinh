<!DOCTYPE html>
<?php include 'form.php';
require_once '../config/config.php';
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
	<?php echo $style;?>
    <style>
        body {
            padding-top: 20px;
        }
        .category-list, .cart-summary {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }
        .product-list img {
            width: 50px;
        }
    </style>
</head>
<body>
	<?php include 'head.php'?>
    <div class="container">
		  
        <div class="row">
            <!-- Category List -->
            

            <!-- Shopping Cart -->
            <div class="col-md-9">
                <h4>Giỏ hàng của bạn</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Tổng Tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
							$kiemtra=false;
							$cart = [];
							if (isset($_SESSION['cart'])) { 
								$cart=$_SESSION['cart'];
							}
								// var_dump($cart);die();
								$count = 0;
								$total=0;
								foreach ($cart as $item) { 
									$total += $item['qty'] * $item['giaban'];?>
                        <tr>						
                            <td><?php echo ++$count;?></td>
                            <td><?php echo $item['ten'];?></td>
                            <td><img src="../image/<?php echo $item['anh'];?>" alt="error">
                            </td>
                            <style>
                                img{
                                    width:30%;
                                    height: 30%
                                }
                            </style>
							
							<form method="post" action="capnhatgiohang.php?id=<?php echo $item['id'];?>">
                            	<td><input type="number" class="form-control" value="<?php echo $item['qty'];?>" name="qty"></td>
                           		 <td><?php echo number_format($item['giaban'], 0, ',', '.') . " VNĐ";?></td>
                            	<td><?php echo number_format($item['qty'] * $item['giaban'], 0, ',', '.') . " VNĐ";?></td>
                            <td>
								<button class="btn btn-primary">Update</button>
							</form>
                                <a href="xoagiohang.php?id=<?php echo $item['id'];?>" class="btn btn-danger">Xóa</a>                                
                            </td>
                        </tr>
                        <?php if($count>0) $kiemtra=true;}?>
                    </tbody>
                </table>

                <div class="cart-summary">
                    <h4>Thông tin đơn hàng</h4>
                    <p><strong>Sub Total:</strong> <?php echo number_format($total, 0, ',', '.') . " VNĐ";?></p>
                    <p><strong>Phí vận chuyển:</strong> 30.000đ</p>
                    <p><strong>Tổng tiền thanh toán:</strong> <?php echo number_format($total + 30000, 0, ',', '.') . " VNĐ";?></p></p>
                    <a href="index1.php" class="btn btn-success">Tiếp tục mua sắm</a>
					<?php if ($count > 0) { 
    $ktrsl = true;
    foreach ($cart as $item) {
        $id = $item['id'];
        $query = "SELECT soluong FROM sanpham WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
        
        if ($item['qty'] > $product['soluong']) {
            $ktrsl = false;
            $thongbao = "Số lượng đặt hàng cho sản phẩm " . $item['ten'] . " vượt quá số lượng hiện có";
            break; 
        }
    }
    ?>
    <a <?php if ($ktrsl) { ?>href="KH-TTDATHANG.php"<?php } else { ?>onclick="return confirm('<?php echo $thongbao; ?>');"<?php } ?> class="btn btn-primary">Thanh toán</a>
<?php } ?>

					
                    

                </div>
            </div>
        </div>
		 
    </div>
			<?php echo $bot;?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>