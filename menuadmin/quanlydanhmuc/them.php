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
        <h1>Thêm danh mục</h1>
        <form method="post">
		<div class="form-group">
			<label for="">Tên danh mục</label>
			<input type="text" id = "ten" name = "ten" class="form-control">
		</div>
		<button class="btn btn-success" name ="thuchien"> Thêm</button>
		
		
	</form>
    </div>
	<?php echo $bot;?>
<?php
	if(isset($_POST['thuchien']) && $_SERVER["REQUEST_METHOD"] == "POST"){
		//nhan du lieu tu form
$ten = $_POST['ten'];
//ket noi csdl,tat ca cac trang goi bang lenh nay
//require_one 
require_once '../../config/config.php';
//viet lenh sql de them csdl
$themsql ="INSERT INTO  danhmuc (ten) VALUES ('$ten')";
//echo $themsql; exit;
//thuc thi cau lenh them : dung lenh mysqli_query
if ( mysqli_query($conn,$themsql)){
	//in thong bao thanh cong
    //echo "<h1>them thanh cong</h1>";
	//tro ve trang liet ke
header("location: danhsach.php");
}
	}

?>
  
</body>
</html>
