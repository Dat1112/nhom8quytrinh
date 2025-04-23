<?php
require_once '../../config/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['themhoadon'])) {
	
	
    $ten = $_POST['ten'];
    $tenhang = $_POST['tenhang'];
    $tenncc = $_POST['tenncc'];
    $ngaynhap = $_POST['ngaynhap'];
    $soluong = $_POST['soluong'];
    $giavon = $_POST['giavon'];

        $sql_them = "INSERT INTO nhaphang (ten,tenhang,tenncc, ngaynhap, soluong, giavon) 
                     VALUES ('$ten', '$tenhang', '$tenncc', '$ngaynhap', '$soluong', '$giavon')";
        if ($conn->query($sql_them) === TRUE) {
            echo "Thêm hóa đơn thành công.";
			header("location: ad- nhaphang.php");
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }





?>
<?php include '../form.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hóa đơn nhập hàng</title>
    <!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="../Thư mục mới/css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php echo $style;?>
	<style>
        body {
            display: flex;
        }
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
            width: 100%;
        }
    </style>
</head>
<body>
	<?php echo $top;?>
    <div class="container">
        <h3 class="mb-4" align="center">Thêm hóa đơn nhập hàng</h3>
		
        <form action="" method="post" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="ten">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="ten" name="ten" required>
            </div>
			

            <div class="form-row">
                <div class="form-group col-md-6">
				
                    <label for="tenhang">Hãng sản phẩm:</label>                  
					<select type="text" id="tenhang" name="tenhang" class="form-control" required>
					<?php
							$sql_hang = "SELECT * FROM hangsanpham";
							$result = mysqli_query($conn, $sql_hang);
							
								while ($r = mysqli_fetch_assoc($result)) { ?>
									<option><?php echo $r['tenhang'];?>  </option>
								<?php
										}
						?>
					</select>
					
					
                </div>
                <div class="form-group col-md-6">
                    <label for="tenncc">Nhà cung cấp</label>
                    <select type="text" class="form-control" id="tenncc" name="tenncc" required>
					<?php
							$sql_ncc = "SELECT tenncc FROM nhacungcap";
							$result = mysqli_query($conn, $sql_ncc);
							if ($result) {
								while ($r = mysqli_fetch_assoc($result)) {
									echo "<option>" . htmlspecialchars($r['tenncc']) . "</option>";
								}
										}
						?>
					</select>
                </div>
            </div>
			<div class="form-group">
                <label for="ngaynhap">Ngày nhập hàng: </label>
                <input type="datetime" class="form-control" id="ngaynhap" name="ngaynhap" required>
            </div>

            <div class="form-row">
				<div class="form-group col-md-6">
                    <label for="soluong">Số lượng:</label>
                    <input type="number" class="form-control" id="soluong" name="soluong" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="giavon">Giá vốn:</label>
                    <input type="text" class="form-control" id="giavon" name="giavon" required>
                </div>
               
            </div>

           
            <button type="submit" class="btn btn-primary" name="themhoadon">Thêm hóa đơn</button>
        </form>
    </div>
  
	 <?php echo $bot;?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
