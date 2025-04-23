<?php ob_start();
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../dangnhap/dangnhap.php"); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    exit();
}
$user = $_SESSION['user'];
require_once '../config/config.php';
include 'form.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<?php echo $style;?>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
    		min-height: 100vh; 
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
	<?php include 'head.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="sidebar-item" >
                    <a href="TrangCNND.php">Thông tin tài khoản</a>
                </div>
                <div class="sidebar-item" >
                    <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
                </div>
                <div class="sidebar-item">
                    <a href="#">Ví Voucher</a>
                </div>
                <div class="sidebar-item">
                    <a href="#">Đăng xuất</a>
                </div>
            </div>
            <div class="col-md-10 content">
	
	
    <div class="container mt-5" style="width: 100%;">
        <h2 class="mb-4">Chi Tiết Đơn Hàng</h2>
        
        <!-- Thông tin đơn hàng -->
        <div class="card mb-4">
            <div class="card-header">
                <p>Thông Tin Đơn Hàng</p>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
						<?php
						$id = $_GET['id'];
						$sqlall="SELECT * FROM donhang WHERE id = $id";
						$re=mysqli_query($conn,$sqlall);
						$r=mysqli_fetch_assoc($re);
						
					?>
                      <th style="width: 30%;" align="left" scope="col">Mã đơn hàng: <?php echo $r['id'];?></th>
                     <!-- <th rowspan="3" align="center" style="width: 70%;"><img src="img/dell.jpg" class="img-fluid"></th> -->
                    </tr>
                    <tr>
                      <th align="left" scope="row">Ngày đặt hàng : <?php echo $r['ngaytao'];?></th>
                    </tr>
					  <tr>
                      <th align="left" scope="row">Cập nhật gần nhất : <?php echo $r['ngaysua'];?></th>
                    </tr>
                    <tr>
                      <th align="left" scope="row">
						  <form method="post">
   						 <label for="status">Trạng thái:</label>	  
 						  <h3 id="status" name="status"><?php echo $r['trangthai'];?> </h3> 
    							

							 
						</th>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="card-body">
            </div>
        </div>
        
        <!-- Danh sách sản phẩm -->
		<div class="card mb-4">
			<div class="card-header">
                Sản phẩm
            </div>
            <table class="table">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th style="width: 20%;">Tên sản phẩm</th>
                        <th style="width: 30%;">Số lượng</th>
                        <th style="width: 30%;">Giá</th>
                        <th style="width: 20%;">Tổng</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						$sql="SELECT * FROM sanpham,chitietdonhang WHERE chitietdonhang.iddonhang = $id and chitietdonhang.idsanpham = sanpham.id";
						$result=mysqli_query($conn,$sql);
						$tongtien=0;
					$stt=0;
						while($row=mysqli_fetch_assoc($result)){
							$tongtien+=$row['gia']*$row['soluong'];
					?>
					
                    <tr align="center">
                        <th scope="row"><?php echo ++$stt;?></th>
                        <td><a href="KH-TTCHITIETSP.php?spid=<?php echo $row['idsanpham'];?>"><?php echo $row['ten'];?></a></td>
                        <td><?php echo $row['soluong']; ?></td>
                        <td><?php echo number_format($row['gia'], 0, ',', '.') . " VNĐ";?></td>
                        <td><?php echo number_format( $row['gia']*$row['soluong'] , 0, ',', '.') . " VNĐ";?></td>
                    </tr>
						
					<?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Thông tin giao hàng -->
        <div class="card mb-4">
            <div class="card-header">
                Thông Tin Giao Hàng
            </div>
            <div class="card-body">
                <p><strong>Người Nhận:</strong><?php echo $r['hoten'];?></p>
                <p><strong>Địa Chỉ:</strong> <?php echo $r['diachi'];?></p>
                <p><strong>Số Điện Thoại:</strong> <?php echo $r['sdt'];?></p>
				<p><strong>Email:</strong> <?php echo $r['email'];?></p>
            </div>
        </div>
        
        <!-- Tổng kết -->
        <div class="card">
            <div class="card-header">
                Tổng Kết
            </div>
            <div class="card-body">
                <p><strong>Tổng Tiền Hàng:</strong> <?php echo number_format($tongtien, 0, ',', '.') . " VNĐ";?></p>
                <p><strong>Phí Giao Hàng:</strong> 30.000 VND</p>
                <h5><strong>Tổng Cộng:</strong> <?php echo number_format($tongtien+30000, 0, ',', '.') . " VNĐ";?></h5>
            </div>
        </div>
		<?php if ($r['trangthai'] != 'Đã hủy') { ?>
   			 <button class="btn btn-danger mt-5 mb-5" name="capnhat">Hủy đơn</button>
		<?php }; ?>

		
		 </form>
	<?php
	if(isset($_POST['capnhat'])){
		$sqlsua="UPDATE donhang SET trangthai ='Đã hủy' , ngaysua = now() WHERE id = $id";
		$checkk=mysqli_query($conn,$sqlsua);
		
		$sqlhuy = "SELECT idsanpham, soluong FROM chitietdonhang WHERE iddonhang = $id";
		$checkkk=mysqli_query($conn,$sqlhuy);
		while($ro=mysqli_fetch_assoc($checkkk)){
			$sqltra = "UPDATE sanpham 
           SET soluong = soluong + " . $ro['soluong'] . ", 
               luongmua = luongmua - " . $ro['soluong'] . " 
           WHERE id = " . $ro['idsanpham'];
			$check1=mysqli_query($conn,$sqltra);		
		}
		echo '<script>
            alert("Hủy thành công!");
            window.location.href = "lichsudonhang.php?id=' . $id . '";
          </script>';
		ob_end_flush();
	}
	
	?>
	
	
	
    </div>
    
   </div>
        </div>
    </div>

    
<?php echo $bot;?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>