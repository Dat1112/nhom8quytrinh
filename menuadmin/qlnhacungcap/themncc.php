<?php 
  require "condb.php";
?>
<?php include '../form.php'?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<title>Thêm</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
         <?php 	
	           if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['them'])){
			   $tenncc = $_POST["tenncc"];
	           $diachi = $_POST["diachi"];
	           $sdt = $_POST["sdt"];
	           $email = $_POST["email"];
			   $sql = "INSERT INTO nhacungcap (tenncc, diachi, sdt, email) VALUES('$tenncc', '$diachi', $sdt, '$email')";
			   if (mysqli_query($conn, $sql)) {
			header("location: nhacungcap.php");
        } else {
            echo "Lỗi: " . $conn->error;
        }
			   }
			?>
                    <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Tên Nhà Cung Cấp</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                </tr>
            </thead>
			
			
            <tbody>				
                <tr>
					<h1 align="center">THÊM NHÀ CUNG CẤP</h1>
	                    <form method="post">	
					    <input type="hidden" name="id" value="<?php echo $id;?>" id="">
                        <td><div class="form-group">
                        <input type="text" class="form-control" name="tenncc" id="tenncc" required minlength="3" 
   maxlength="100"
   pattern="^[a-zA-Z0-9\s]{3,100}$"
   title="Tên nhà cung cấp chỉ chứa chữ cái, số, khoảng trắng và ký tự hợp lệ">

                        </div></td>
					
                        <td><div class="form-group">
                            <input type="text" class="form-control" name = "diachi" id = "diachi" required>
                  </div></td>
					
                        <td><div class="form-group">
                        <input type="text" class="form-control" name="sdt" id="sdt"
       pattern="0\d{9}" maxlength="10" required
       title="Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số">

                        </div></td>
					
                        <td><div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" maxlength="50"  required>

                        </div></td>					
				</tr>
            </tbody>
        </table>
<button type="submit" class="btn btn-primary" name = "them" id = "them">Thêm</button>
    </div>
	<?php echo $bot;?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	       
               
	
</body>
</html>