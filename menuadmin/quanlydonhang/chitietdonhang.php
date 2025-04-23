<?php ob_start();
include '../form.php';
require_once '../../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<?php echo $style;?>
</head>
<body>
	<?php echo $top;?>
	
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
                    <tr>
                      <th align="left" scope="row">
						  <form method="post">
   						 <label for="status">Trạng thái:</label>
 						   <select class="form-select" id="status" name="status">
    							<option value="Đang xử lý" <?php if($r['trangthai'] == "Đang xử lý") echo "selected"; ?>>Đang xử lý</option>
   								<option value="Đã xác nhận" <?php if($r['trangthai'] == "Đã xác nhận") echo "selected"; ?>>Đã xác nhận</option>
    							<option value="Đang giao hàng" <?php if($r['trangthai'] == "Đang giao hàng") echo "selected"; ?>>Đang giao hàng</option>
    							<option value="Đã hoàn thành" <?php if($r['trangthai'] == "Đã hoàn thành") echo "selected"; ?>>Đã hoàn thành</option>
    							
							</select>

							 
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
                        <td><?php echo $row['ten'];?></td>
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
		<button class="btn btn-success mt-5 mb-5" name="capnhat">Cập nhật</button>
		
		 </form>
	<?php
	if(isset($_POST['capnhat'])){
		$trangthai = $_POST['status'];
		$sqlsua="UPDATE donhang SET trangthai ='$trangthai' ,  ngaysua = now() WHERE id = $id";
		$checkk=mysqli_query($conn,$sqlsua);
		header("Location: chitietdonhang.php?id=$id");
		ob_end_flush();
	}
	
	?>
	
	
	
    </div>
    <?php echo $bot;?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
