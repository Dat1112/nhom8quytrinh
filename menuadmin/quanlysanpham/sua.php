<?php include '../form.php';?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "nhom8web"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$spid = $_GET['spid'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['suasanpham'])) {
    
    // Lấy dữ liệu từ form
    $ten = $_POST['ten'];
    $noidung = trim($_POST['noidung']);
	
         $manhinh = $_POST['manhinh'] ;
	 $chip = $_POST['chip'] ;
	 $ram = $_POST['ram'] ;
	 $bonhotrong= $_POST['bonhotrong'];
	 $camera= $_POST['camera'];
	 $pin= $_POST['pin'];
	$hang = $_POST['hang'];
	
    $nhacungcap = $_POST['nhacungcap'];
    $giaban = $_POST['giaban'];
    $giavon = $_POST['giavon'];
    $soluong = $_POST['soluong'];
    $danhmuc = $_POST['danhmuc'];
    $anh_cu = $_POST['anh_cu']; // Lấy ảnh cũ từ form
    $anh = $anh_cu; // Mặc định là ảnh cũ

    // Xử lý ảnh nếu có ảnh mới được tải lên
    if (isset($_FILES['anh']) && $_FILES['anh']['error'] == 0) {
        // Xử lý hình ảnh
        $anh = $_FILES['anh']['name'];
        $anh_tmp = $_FILES['anh']['tmp_name'];
        $target_dir = "../../image/";
        $target_file = $target_dir . basename($anh);

        // Di chuyển hình ảnh đến thư mục đích
        if (move_uploaded_file($anh_tmp, $target_file)) {
            // Ảnh mới đã được tải lên thành công
        } else {
            echo "Lỗi khi upload hình ảnh.";
            exit;
        }
    }

    // Thêm sản phẩm vào cơ sở dữ liệu
    $sql_them = "UPDATE sanpham 
                 SET ten = '$ten', 
                     noidung = '$noidung', 
                     nhacungcap = '$nhacungcap', 
                     giaban = $giaban, 
                     giavon = $giavon, 
                     soluong = $soluong, 
                     danhmuc = '$danhmuc', 
                     anh = '$anh',
					 hang = '$hang',
					 manhinh = '$manhinh',
					 chip = '$chip',
					 ram = '$ram',
					 camera = '$camera',
					 bonhotrong = '$bonhotrong',
					 pin = '$pin' 
                 WHERE id = $spid";

    if ($conn->query($sql_them) === TRUE) {
		
		header("location: quanlysanpham.php");
		?>
        <script>
			alert("Sửa sản phẩm thành công.");
			window.location.href = "quanlysanpham.php";
		</script><?php
    } else {
        echo "Lỗi: " . $conn->error;
    }

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
	<?php echo $style;?>
    <!-- Bootstrap CSS -->
    <style>
        .image-container {
            width: 200px; /* Chiều rộng khung */
            height: 200px; /* Chiều cao khung */
            border: 1px solid #ddd; /* Viền khung */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin: auto; /* Căn giữa khung */
        }
        .image-container img {
            max-width: 100%;
            max-height: 100%;
        }
        body {
            display: flex;
        }
        
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
    $sqlsua = "SELECT * FROM sanpham WHERE id = $spid";
    $check = mysqli_query($conn, $sqlsua);
    $r = mysqli_fetch_assoc($check);
    $anh_cu = $r['anh'];
    ?>
    <?php echo $top;?>
    <div class="container">
         <div class="container mt-5">
        <h1 class="mb-4">Sửa sản phẩm</h1>
        <div class="image-container">
            <?php echo "<img src='../../image/" . $r['anh'] . "' alt='Product Image'>"; ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ten">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="ten" name="ten" required value="<?php echo $r['ten']; ?>">
            </div>

            <div class="form-group">
                <label for="noidung">Nội dung:</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="4"><?php 
				
					echo $r['noidung']; ?></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nhacungcap">Nhà cung cấp:</label>
                    
					<select id="nhacungcap" name="nhacungcap" class="form-control" value="<?php echo $r['nhacungcap']; ?>">
   						 <?php
							$sql_ncc = "SELECT tenncc FROM nhacungcap";
							$result = mysqli_query($conn, $sql_ncc);
							if ($result) {
								while ($ro = mysqli_fetch_assoc($result)) {
									echo "<option>" . htmlspecialchars($ro['tenncc']) . "</option>";
								}
										}
						?>
					</select>
                </div>
                <div class="form-group col-md-6">
                    <label for="giaban">Giá bán:</label>
                    <input type="text" class="form-control" id="giaban" name="giaban" value="<?php echo $r['giaban']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="giavon">Giá vốn:</label>
                    <input type="text" class="form-control" id="giavon" name="giavon" value="<?php echo $r['giavon']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="soluong">Số lượng:</label>
                    <input type="text" class="form-control" id="soluong" name="soluong" value="<?php echo $r['soluong']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="danhmuc">Danh mục:</label>
                    <select id="danhmuc" name="danhmuc" class="form-control" value="<?php echo $r['danhmuc']; ?>">
   						 <?php
							$sql_ncc = "SELECT ten FROM danhmuc";
							$result = mysqli_query($conn, $sql_ncc);
							if ($result) {
								while ($ro = mysqli_fetch_assoc($result)) {
									echo "<option>" . htmlspecialchars($ro['ten']) . "</option>";
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
								while ($ro = mysqli_fetch_assoc($result)) {
									echo "<option>" . $ro['tenhang'] . "</option>";
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
							
        <div class="form-group col-md-6">
            <label for="screenSize">Màn hình:</label>
            <input type="text" class="form-control" id="screenSize" name="manhinh" placeholder="6.5 inch, OLED" value="<?php echo $r['manhinh']; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="chip">Chip:</label>
            <input type="text" class="form-control" id="chip" name="chip" placeholder="Snapdragon 888" value="<?php echo $r['chip']; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="ram">RAM:</label>
            <input type="text" class="form-control" id="ram" name="ram" placeholder="8GB" value="<?php echo $r['ram']; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="internalMemory">Bộ nhớ trong:</label>
            <input type="text" class="form-control" id="internalMemory" name="bonhotrong" placeholder="128GB" value="<?php echo $r['bonhotrong']; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="camera">Camera:</label>
            <input type="text" class="form-control" id="camera" name="camera" placeholder="108MP" value="<?php echo $r['camera']; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="battery">Pin:</label>
            <input type="text" class="form-control" id="battery" name="pin" placeholder="4500mAh" value="<?php echo $r['pin']; }?>" required>
        </div>
    </div>
            <input type="hidden" name="anh_cu" value="<?php echo $r['anh'];  $conn->close();?>">
            <button type="submit" class="btn btn-primary" name="suasanpham">Sửa sản phẩm</button>
        </form>
    </div>
    </div>
	<?php echo $bot;?>
   

    
</body>
</html>
