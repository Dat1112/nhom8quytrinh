<?php
include '../form.php';
require_once '../../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AD-DS DON HANG </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  <?php echo $style;?>
	  
	  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #00bfa5;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .status-paid {
            color: #4caf50;
        }
        .status-unpaid {
            color: #f44336;
        }
    </style>
	  
	  
  </head>
  <body>
       <?php echo $top;?>
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
		
        <div class="table-container" align="center">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
						<th>Mã</th>
                        <th>Tên</th>
                        <th>Ngày đặt hàng</th>
                        <th>Số điện thoại</th>
                        <th>Số tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						$sqlall="SELECT * FROM donhang";
					if(isset($_POST['all'])) $sqlall="SELECT * FROM donhang";
					if(isset($_POST['chuaduyet'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đang xử lý'";
					if(isset($_POST['daduyet'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đã xác nhận'";
					if(isset($_POST['danggiao'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đang giao hàng'";
					if(isset($_POST['hoanthanh'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đã hoàn thành'";
					if(isset($_POST['huy'])) $sqlall="SELECT * FROM donhang WHERE trangthai='Đã hủy'";
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
                            <a class="btn btn-info" href="chitietdonhang.php?id=<?php echo $r['id'];?>">Xem</a>
                            
                        </td>
                    </tr>
					<?php } ?>
                  
                        
                </tbody>
            </table>
        </div>
    </div>
<?php echo $bot;?>
	  
	  
	  
	  <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
