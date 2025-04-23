<!doctype html>
<?php include '../form.php'?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm sinh viên</title>
	<?php echo $style;?>
</head>
<body>
	<?php echo $top;?>
    <div class="container">
        <h1>Danh sách danh mục</h1>
        <a href="them.php" class="btn btn-success">Thêm</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th width="800px">Tên danh mục</th> 
					<th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kết nối
                require_once '../../config/config.php';
                // Câu lệnh
                $lietke_sql = "SELECT * FROM danhmuc ORDER BY ten";
                // Thực thi
                $result = mysqli_query($conn, $lietke_sql);
				$stt=1;
                // Duyệt qua result và in ra, lấy từng dòng của bảng result và đưa vào biến r
                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $stt; $stt++; ?></td>
                        <td><?php echo $r['ten']; ?></td>
                        <td>
                            <a href="sua.php?sid=<?php echo $r['id']; ?>" class="btn btn-info">Sửa</a>
                            <a onclick="return confirm('Xác nhận xóa');" href="xoa.php?sid=<?php echo $r['id']; ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php echo $bot;?>
   

    
</body>
</html>
