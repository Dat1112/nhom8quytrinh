<?php
$id = $_GET['sid'];
require_once '../../config/config.php';
$edit_sql = "SELECT * FROM danhmuc WHERE id=$id";
$result = mysqli_query($conn, $edit_sql);
$r = mysqli_fetch_assoc($result);
?>
<?php include '../form.php'?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Sửa danh mục</h1>
        <form method="post">
            <input type="hidden" name="sid" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="ten">Tên danh mục</label>
                <input type="text" id="ten" name="ten" class="form-control" value="<?php echo $r['ten']; ?>">
            </div>
            <button class="btn btn-success" name="thuchien"> Cập nhật</button>
        </form>

        <?php
        if (isset($_POST['thuchien']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            // Nhận dữ liệu từ form
            $ten = $_POST['ten'];
            $id = $_POST['sid'];

            // Cập nhật danh mục
            $themsql = "UPDATE danhmuc SET ten = '$ten' WHERE id = $id";
            $sql = "UPDATE sanpham SET danhmuc = '$ten' WHERE danhmuc = '{$r['ten']}'";

            // Thực thi câu lệnh SQL
            if (mysqli_query($conn, $themsql) && mysqli_query($conn, $sql)) {
                // In thông báo thành công
                echo "<h1>Cập nhật thành công</h1>";
                // Chuyển hướng về trang danh sách
                header("location: danhsach.php");
                exit; // Đảm bảo không thực thi mã bên dưới khi đã chuyển hướng
            } else {
                // Xử lý thất bại
                echo "<p>Cập nhật không thành công!</p>";
            }
        }
        ?>

    </div>
</body>
</html>
