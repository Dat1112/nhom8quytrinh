<?php include '../form.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h1 class="mb-4">Thêm sản phẩm mới</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ten">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="ten" name="ten" required>
            </div>

            <div class="form-group">
                <label for="noidung">Nội dung:</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="4"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nhacungcap">Nhà cung cấp:</label>                  
					<select id="nhacungcap" name="nhacungcap" class="form-control" >
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
                <div class="form-group col-md-6">
                    <label for="giaban">Giá bán:</label>
                    <input type="text" class="form-control" id="giaban" name="giaban">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="giavon">Giá vốn:</label>
                    <input type="text" class="form-control" id="giavon" name="giavon">
                </div>
                <div class="form-group col-md-6">
                    <label for="soluong">Số lượng:</label>
                    <input type="number" class="form-control" id="soluong" name="soluong">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="danhmuc">Danh mục:</label>
                    <select id="danhmuc" name="danhmuc" class="form-control" >
   						 <?php
							$sql_dm = "SELECT ten FROM danhmuc";
							$result = mysqli_query($conn, $sql_dm);
							if ($result) {
								while ($r = mysqli_fetch_assoc($result)) {
									echo "<option>" . $r['ten'] . "</option>";
								}
										}
						?>
					</select>
                </div>
				<div class="form-group col-md-6">
                    <label for="hang">Hãng:</label>
                    <select id="hang" name="hang" class="form-control" >
   						 <?php
							$sql_dm = "SELECT tenhang FROM hangsanpham";
							$result = mysqli_query($conn, $sql_dm);
							if ($result) {
								while ($r = mysqli_fetch_assoc($result)) {
									echo "<option>" . $r['tenhang'] . "</option>";
								}
										}
						?>
					</select>
                </div>
            </div>
			

            <div class="form-group">
                <label for="anh">Hình ảnh:</label>
                <input type="file" class="form-control-file" id="anh" name="anh">
            </div>
			
			
			<div class="row">
        <!-- Thông số kỹ thuật cơ bản -->
        <div class="form-group col-md-6">
            <label for="screenSize">Màn hình:</label>
            <input type="text" class="form-control" id="screenSize" name="manhinh" placeholder="6.5 inch, OLED" required>
        </div>
        <div class="form-group col-md-6">
            <label for="chip">Chip:</label>
            <input type="text" class="form-control" id="chip" name="chip" placeholder="Snapdragon 888" required>
        </div>
        <div class="form-group col-md-6">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" id="ram" name="ram" placeholder="8GB" required>
        </div>
        <div class="form-group col-md-6">
            <label for="internalMemory">Bộ nhớ trong:</label>
            <input type="text" class="form-control" id="internalMemory" name="bonhotrong" placeholder="128GB" required>
        </div>
        <div class="form-group col-md-6">
            <label for="camera">Camera:</label>
            <input type="text" class="form-control" id="camera" name="camere" placeholder="108MP" required>
        </div>
        <div class="form-group col-md-6">
            <label for="battery">Pin:</label>
            <input type="text" class="form-control" id="battery" name="pin" placeholder="4500mAh" required>
        </div>
    </div>

            <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
        </form>
    </div>
    <?php echo $bot;?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
