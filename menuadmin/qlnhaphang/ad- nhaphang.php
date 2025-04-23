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
    <title>ad- nhaphang </title>

    <!-- Bootstrap -->
    <link href="../Thư mục mới/css/bootstrap-4.4.1.css" rel="stylesheet">
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
        .content h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }
		  .action{
			margin-left: 40px;
			padding: 5px;
            border-radius: 0px;
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
				  <strong class="text-black"><h3>DANH SÁCH NHẬP HÀNG</h3></strong>
			
            </div>
	</section>
	  
<div class="action">
	<a href="themnhaphang.php" class = "btn btn-success">Thêm Hóa Đơn</a></br>
	  </div>
<div class="container" align="center" >  
	<form method="post" >
		<button type="submit" class="btn btn-outline-primary" name="all">Danh sách nhập hàng</button>
		<button type="submit" class="btn btn-outline-primary" name="chuaduyet">Danh sách hàng trong kho</button>

	</form>
	
	
  </div>
    <div class="content">
		
        <div class="table-container" align="center">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hãng sản phẩm</th>
                        <th>Nhà cung cấp</th>
                        <th>Ngày nhập</th>
                        <th>Số lượng</th>
                        <th>Giá vốn</th>
						<th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
					<?php
            

            $sql = "SELECT * FROM nhaphang";
            $qr = mysqli_query($conn,$sql);
			   $stt =1;
			   while($r = mysqli_fetch_assoc($qr)){
					?>
					
                     <td><?php echo $stt; $stt++; ?></td>
                <td name="ten"><?php echo $r['ten']; ?></td>
                <td name="tenhang"><?php echo nl2br($r['tenhang']); ?></td>
                <td name="tenncc"><?php echo  $r['tenncc'] ; ?></td>
			    <td name="ngaynhap"><?php echo  $r['ngaynhap'] ; ?></td>
			    <td name="soluong"><?php echo  $r['soluong'] ; ?></td>
				<td name="giavon"><?php echo  $r['giavon'] ; ?></td>
                
                     <td class="action-buttons">
                        <a href = "suanhaphang.php?id=<?php echo $r["id"]; ?>" class = "btn btn-primary">Sửa</a>
                        <a href = "xoanhaphang.php?id=<?php echo $r["id"]; ?>" onclick = "return confirm('Bạn chắc chắn muốn xóa đơn nhập hàng này không?');" class="btn btn-danger">Xóa</a>
                            
                        </td>
                    </tr>
                  <?php }?>
                        
                </tbody>
            </table>
        </div>
    </div>
	  
	  <?php echo $bot;?>
	  
	  <script src="../Thư mục mới/js/jquery-3.4.1.min.js"></script>
    <script src="../Thư mục mới/js/popper.min.js"></script>
    <script src="../Thư mục mới/js/bootstrap-4.4.1.js"></script>
  </body>
</html>
