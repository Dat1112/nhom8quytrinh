<?php 
  require "condb.php";
?>
<?php include '../form.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<?php echo $style;?>
    <title>Quản Lý Hãng Sản Phẩm</title>
    <style>
        body {
            background-color: #f8f8f8;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);   
			width: max;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
        .btn-green {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
	<?php echo $top;?>
    <div class="container">
         <div class="container mt-4">
        <h2 class="mb-3">Quản Lý Hãng Sản Phẩm</h2>
		      <div><a href = "themhangsp.php" class = "btn btn-green">Thêm Hãng Sản Phẩm</a></br></div>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Hãng</th>
                    <th>Xuất xứ</th>
                    <th>Mô tả</th>
                    <th>Năm thành lập</th>
                    <th>Thao tác</th>
                </tr>
				<?php 
			   $sql = "SELECT * FROM hangsanpham";
			   $qr = mysqli_query($conn,$sql);
			   $stt =1;
			   while($rows = mysqli_fetch_assoc($qr)){
			?>
            </thead>			
            <tbody>				
                <tr>				
                    <td><?php echo $stt; $stt++;?></td>
                    <td><?php echo $rows["tenhang"];?></td>
                    <td><?php echo $rows["xuatxu"];?></td>
                    <td><?php echo $rows["mota"];?></td>
                    <td><?php echo $rows["namthanhlap"];?></td>
                    <td>
                        <a href = "suahangsp.php?id=<?php echo $rows["id"]; ?>" class = "btn btn-primary">Sửa</a>
                        <a href = "xoahangsp.php?id=<?php echo $rows["id"]; ?>" onclick = "return confirm('Bạn chắc chắn muốn xóa hãng sản phẩm này không?');" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
				<?php }?>
               
            </tbody>
        </table>
    </div>
    </div>
	<?php echo $bot;?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
