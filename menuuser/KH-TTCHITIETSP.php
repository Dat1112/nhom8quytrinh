<?php include 'form.php';
require_once '../config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm - Điện thoại</title>
    <!-- Liên kết đến Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<?php echo $style;?>
</head>
<body>
	
	
	
	<?php
	if(isset($_POST['atc'])){
		$id = $_POST['id'];
		$qty = $_POST['quantity'];
		
		
		$cart =[];
		if(isset($_SESSION['cart'])){
			$cart = $_SESSION['cart'];
		}
		$isFound = false;
		for($i=0;$i<count($cart);$i++){
			if($cart[$i]['id'] == $id){

				$qry = "SELECT soluong FROM sanpham WHERE id = $id";
				$rlt = mysqli_query($conn, $qry);
				$product = mysqli_fetch_assoc($rlt);
				$soluog=$cart[$i]['qty'] + $qty;
				if ($soluog > $product['soluong']) {					
					echo "<script>alert('Số lượng đặt hàng cho sản phẩm vượt quá số lượng hiện có.');</script>";
					$isFound = true;		
				}else{
					$cart[$i]['qty'] += $qty;
					$isFound = true;
					break;
				}		
			}
		}
		if(!$isFound){
			$sql_str = "SELECT * FROM sanpham WHERE id = $id";
			$result = mysqli_query($conn,$sql_str);
			$product = mysqli_fetch_assoc($result);

			if ($qty > $product['soluong']) {					
				echo "<script>alert('Số lượng đặt hàng cho sản phẩm vượt quá số lượng hiện có.');</script>";			
			}else{
				$product['qty'] = $qty;
				$cart[] = $product;
			}

			
		}
		$_SESSION['cart'] = $cart;
		
		 
	}
	include 'head.php';
	?>
	<?php $spid = $_GET['spid'];
	
	$sql = "SELECT * FROM sanpham WHERE id=$spid";
	$check=mysqli_query($conn,$sql);
	$r=mysqli_fetch_assoc($check);
	$noidung = $r['noidung'];


	
	?>
    <div class="container mt-5">
        <div class="row">
            <!-- Phần hình ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="<?php echo "../image/" . $r['anh'];?>" class="img-fluid" alt="Điện thoại">
            </div>
            <!-- Phần thông tin sản phẩm -->
            <div class="col-md-6">
                <h2><?php echo $r['ten'];?></h2>
                <p class="text-muted">Mã sản phẩm: <?php echo $r['id'];?></p>
                <h4 class="text-danger"><?php echo $r['giaban'] . " VND";?></h4>
				<p class="text-muted">Số lượng:<?php echo $r['soluong']; ?></p>
				<p class="text-muted">Đã bán:<?php echo $r['luongmua']; ?></p>
             
                <ul class="list-group list-group-flush">  				
        				<li class="list-group-item"><?php echo $noidung; ?></li>  
					<li class="list-group-item">Hãng:<?php echo $r['hang']; ?></li>
					<li class="list-group-item">Danh mục:<?php echo $r['danhmuc']; ?></li>
					<li class="list-group-item">Nhà cung cấp:<?php echo $r['nhacungcap']; ?></li>
					<li class="list-group-item">Màn hình:<?php echo $r['manhinh']; ?></li>
					<li class="list-group-item">Chip:<?php echo $r['chip']; ?></li>
					<li class="list-group-item">Ram:<?php echo $r['ram']; ?></li>
					<li class="list-group-item">Camera:<?php echo $r['camera']; ?></li>
					<li class="list-group-item">Pin:<?php echo $r['pin']; ?></li>
					<li class="list-group-item">Bộ nhớ trong:<?php echo $r['bonhotrong']; ?></li>
					
				</ul>

				<div class="row">
            <div class="col-md-6">
	<form  method="post">
                <!-- Chọn số lượng -->
                <div class="form-group mt-3">
                    <h5>Số lượng</h3>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="10" style="max-width: 150px;">
                </div>
                
				 
        <input type="hidden" name="id" value="<?php echo $spid;?>"> <!-- Thay 1 bằng id thực của sản phẩm -->
        <input type="hidden" name="name" value="<?php echo $r['ten'];?>"> <!-- Thay Tên sản phẩm bằng tên thực của sản phẩm -->
        <input type="hidden" name="price" value="<?php echo $r['giaban'];?>"> <!-- Thay 100 bằng giá thực của sản phẩm -->
        <input type="hidden" name="image" value="<?php echo "../image/" . $r['anh'];?> "><!-- Thay path/to/product-image.jpg bằng đường dẫn hình ảnh thực của sản phẩm -->
        <button class="btn btn-primary" name ="atc">Thêm vào giỏ hàng</button>
			
    </form>
				
			
				</div>
        </div>
				
				
            </div>
        </div>
        
    </div>
	<?php echo $bot;?>

    <!-- Liên kết đến Bootstrap JS và các thư viện phụ thuộc -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
