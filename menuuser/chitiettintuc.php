<?php include 'form.php';
require_once '../config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tin tức</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<?php echo $style;?>
</head>
<body>
	<?php include 'head.php'?>
    <div class="container mt-4">
        <?php
        
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM news WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
                
                ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row['title']; ?></h2>
                        <p class="card-text">Ngày đăng: <?php echo $row['created_at']; ?></p>
                        <p class="card-text">Tác giả: <?php echo $row['author']; ?></p>
                        <p class="card-text"><?php echo nl2br($row['content']); ?></p>
                    </div>
                </div>
                <?php
		}
        ?>
    </div>
<?php echo $bot;?>
    <!-- Bootstrap JS và các thư viện khác có thể được đặt ở cuối body để tối ưu hóa tải trang -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
