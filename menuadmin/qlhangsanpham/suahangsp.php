<?php 
  $id = $_GET["id"];
require_once 'condb.php';
$sql = "SELECT * FROM hangsanpham WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php include '../form.php'?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hãng sản phẩm</title>
<style type="text/css">
@import url("file:///E|/xampp/htdocs/NHÓM 8 web (1)/menuadmin/qlhangsanpham/bootstrap.css");
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 1000vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: max;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

input[type="file"] {
    width: 100%;
}

.form-actions {
    display: flex;
    justify-content: space-between;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
}

button[type="button"] {
    background-color: #f44336;
    color: white;
}
</style>
	<?php echo $style;?>
</head>

<body>
	<?php echo $top;?>
	<div class="container">
		 <?php 	
	           if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sua'])){
			   $tenhang = $_POST["tenhang"];
	           $xuatxu = $_POST["xuatxu"];
	           $mota = $_POST["mota"];
	           $namthanhlap = $_POST["namthanhlap"];
			   
				   $sql = "UPDATE hangsanpham set tenhang ='$tenhang', xuatxu='$xuatxu', mota='$mota', namthanhlap='$namthanhlap' WHERE id = $id";
			   if (mysqli_query($conn, $sql)) {
			header("location: ad-hangsanpham.php");
        } else {
            echo "Lỗi: " . $conn->error;
        }
			   }
			?>
		
        <h1 align="center">Sửa Hãng Điện Thoại</h1>
        <form id="hangsanpham" method="post">	
	      <input type="hidden" name="id" value="<?php echo $id;?>" id="">
            <div class="form-group">
                <label for="tenhang"><b>Tên Hãng:</b></label>
                <input type="text" id="tenhang" name="tenhang" value = "<?php echo $row['tenhang']?>">
            </div>
            <div class="form-group">
                <label for="xuatxu"><b>Xuất xứ:</b></label>
                <input type="text" id="xuatxu" name="xuatxu" value = "<?php echo $row['xuatxu']?>">
            </div>
<!--
            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" id="logo" name="logo" required>
            </div>
-->
            <div class="form-group">
				<label for="mota"><b>Mô Tả:</b></label>
				<textarea id="mota" name="mota" rows="4"><?php echo $row["mota"]; ?></textarea>
			</div>

            <div class="form-group">
                <label for="namthanhlap"><b>Năm Thành Lập:</b></label>
                <input type="number" id="namthanhlap" name="namthanhlap" value = "<?php echo $row['namthanhlap']?>">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" name = "sua" id = "sua">Cập nhật</button>
            </div>
        </form>
    </div>
   <?php echo $bot;?>
	 <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>