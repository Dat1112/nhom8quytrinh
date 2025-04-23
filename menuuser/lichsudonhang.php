<?php
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
            height: 140vh;
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
	<?php  // include 'head.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="sidebar-item" >
                    <a href="TrangCNND.php">Thông tin tài khoản</a>
                </div>
                <div class="sidebar-item" >
                    <a href="lichsudonhang.php">Lịch sử đơn hàng</a>
                </div>             
				 <div class="sidebar-item" onclick="logout()">
                    <a href="#">Thoát</a>
                </div>
            </div>
            <div class="col-md-10 content">
               <div>
                    <section class="mytitle "  align="center" >
			  <div class="container py-3" >
				  <strong class="text-black"><h3>DANH SÁCH ĐƠN HÀNG</h3></strong>
            </div>
	</section>
<div class="container" >  
	<form method="post">
		<button type="submit" class="btn btn-outline-secondary" name="all">Danh sách đơn hàng</button>
		<button type="submit" class="btn btn-outline-secondary" name="chuaduyet">Đơn chưa duyệt</button>
		<button type="submit" class="btn btn-outline-secondary" name="daduyet">Đơn đã duyệt</button>
		<button type="submit" class="btn btn-outline-secondary" name="danggiao">Đơn hàng đang giao</button>
		<button type="submit" class="btn btn-outline-secondary" name="hoanthanh">Đơn đã thanh toán</button>	
		<button type="submit" class="btn btn-outline-secondary" name="huy">Đơn hàng bị hủy</button>
	</form>
	
	
  </div>
    <div class="content">
		
        <div class="table" >
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">STT</th>
                <th style="width: 10%;">Mã</th>
                <th style="width: 15%;">Tên</th>
                <th style="width: 15%;">Ngày đặt hàng</th>
                <th style="width: 10%;">Số điện thoại</th>
                <th style="width: 15%;">Số tiền</th>
                <th style="width: 10%;">Trạng thái</th>
                <th style="width: 20%;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					$uid=$user['id'];
						$sqlall="SELECT * FROM donhang WHERE uid = $uid";
					if(isset($_POST['all'])) $sqlall="SELECT * FROM donhang WHERE uid = $uid";
					if(isset($_POST['chuaduyet'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đang xử lý' AND uid = $uid";
					if(isset($_POST['daduyet'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đã xác nhận' AND uid = $uid";
					if(isset($_POST['danggiao'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đang giao hàng' AND uid = $uid";
					if(isset($_POST['hoanthanh'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đã hoàn thành' AND uid = $uid";
					if(isset($_POST['huy'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đã hủy' AND uid = $uid";
						$re=mysqli_query($conn,$sqlall);
						$stt=0;
						while($r=mysqli_fetch_assoc($re)){
							$stt++;
					?>
                    <tr>
                        <td><?php echo $stt;?></td>
						<td><?php echo $r['id'];?></td>
                        <td><?php echo $r['hoten'];?></td>						
                        <td><?php echo $r['ngaytao'];?></td>
                        <td><?php echo $r['sdt'];?></td>
                        <td><?php echo number_format($r['tongtien'], 0, ',', '.') . " VNĐ";?></td>
                        <td class="status-unpaid"><?php echo $r['trangthai'];?></td>
                        <td class="action-buttons">
                            <a class="btn btn-info" href="donhang.php?id=<?php echo $r['id'];?>">Xem</a>
                            
                        </td>
                    </tr>
					<?php } ?>
                  
                        
                </tbody>
            </table>
        </div>
    </div>
						</div>       
            </div>
        </div>
    </div>

    
<?php echo $bot;?>
	<script>
	function logout() {
            // Chuyển hướng đến trang index1.php
            window.location.href = 'index1.php';
        }
	</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
