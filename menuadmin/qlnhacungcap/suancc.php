<?php
//require "condb.php";

$id = $_GET["id"];
require_once 'condb.php';
$sql = "SELECT * FROM nhacungcap WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php include '../form.php'?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<title>Sửa</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<?php echo $style;?>
</head>
</html>
<body>
    <?php echo $top;?>
    <div class="container">
        <?php 	
	           if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sua'])){
			   $tenncc = $_POST["tenncc"];
	           $diachi = $_POST["diachi"];
	           $sdt = $_POST["sdt"];
	           $email = $_POST["email"];
			   $sqli = "UPDATE nhacungcap SET tenncc = '$tenncc', diachi = '$diachi', sdt = $sdt, email = '$email' WHERE id = $id";
			   if (mysqli_query($conn, $sqli)){
            echo "Sửa thành công";
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
					<h1 align="center">SỬA NHÀ CUNG CẤP</h1>
	                    <form method="post">	
					    <input type="hidden" name="id" value="<?php echo $id;?>" id="">
                        <td><div class="form-group">
							<input type="text" class="form-control" name = "tenncc" id = "tenncc" value = "<?php echo $row['tenncc']?>" required minlength="3" 
   maxlength="100"
   pattern="^[a-zA-Z0-9\s]{3,100}$">
                        </div></td>
					
                        <td><div class="form-group">
                            <input type="text" class="form-control" name = "diachi" id = "diachi" value = "<?php echo $row['diachi']?>" required minlength="3" 
   maxlength="100"
   >
                  </div></td>
					
                        <td><div class="form-group">
                            <input type="text" class="form-control" name = "sdt" id = "sdt" value = "<?php echo $row['sdt']?>" required>
                        </div></td>
					
                        <td><div class="form-group">
                          <input type="text" class="form-control" name = "email" id = "email" value = "<?php echo $row['email']?>" required>
                        </div></td>
					
				</tr>
            </tbody>
        </table>
<button type="submit" class="btn btn-primary" name = "sua" id = "sua">Cập nhật</button>
    </div>
	<?php echo $bot;?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>




</html>