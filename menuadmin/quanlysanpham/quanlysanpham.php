<!DOCTYPE html>
<?php include '../form.php'?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Quản lý sản phẩm</title>
	<?php echo $style;?>
    <style>
        
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #377B34;
            color: #fff;
            position: fixed;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #3D7180;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 80%;
        }
    </style>
</head>
<body>
    <?php echo $top;?>
    <div class="container">
		<h1>Quản lý sản phẩm</h1>
        <?php
require_once '../../config/config.php';

$search_keyword = "";
if (isset($_GET['search'])) {
    $search_keyword = $_GET['search'];
}
?>
    <div class="container">
        <div class="search-bar">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Tìm kiếm theo tên" value="<?php echo htmlspecialchars($search_keyword); ?>">
                <button type="submit" class="btn btn-dark">Tìm kiếm</button>
                <a href="quanlysanpham.php" class="btn btn-light">Làm mới</a> 
                <a href="boxaddsp(nam).php" class="btn btn-success">Thêm mới</a>
            </form>
        </div>

        <div >
            <table class="table mt-3" >
        <thead class="thead-dark">
            <tr>
                <th width="4%">STT</th>
                <th width="10%">Tên</th>
                <th width="20%">Nội dung</th>
                <th width="13%">Hình ảnh</th>
                <th width="26%">Thông tin</th>
                <th width="13%">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            

            $sql = "SELECT * FROM sanpham";
            if (!empty($search_keyword)) {
                $sql .= " WHERE ten LIKE '%" . $search_keyword . "%'";
            }
            $check = mysqli_query($conn, $sql);
            $stt = 1;
            while ($r = mysqli_fetch_assoc($check)) { ?>
            <tr>
                <td><?php echo $stt; $stt++; ?></td>
                <td name="ten"><?php echo $r['ten']; ?></td>
                <td name="danhmuc"><?php echo nl2br($r['noidung']); ?></td>
                <td name="anh"><?php echo "<img src='../../image/" . $r['anh'] . "' style='width:200px;' class='img-fluid'>"; ?></td>
                <td>
                    <ul>
                        <li name="soluong">Số lượng: <?php echo $r['soluong']; ?></li>
                        <li name="giavon">Giá vốn: <?php echo $r['giavon']; ?></li>
                        <li name="giaban">Giá Bán: <?php echo $r['giaban']; ?></li>
                        <li name="nhacungcap">Nhà cung cấp: <?php echo $r['nhacungcap']; ?></li>
                        <li name="danhmuc">Danh mục: <?php echo $r['danhmuc']; ?></li>
                    </ul>
                </td>
                <td>
                    <a href="sua.php?spid=<?php echo $r['id']; ?>" class="btn btn-warning">Sửa</a>
                    <a onclick="return confirm('Xác nhận xóa');" href="xoa.php?spid=<?php echo $r['id']; ?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            <?php }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
        </div>
    </div>
</body>
</html>

		
		
    </div>
<?php echo $bot;?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
