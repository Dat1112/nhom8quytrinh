<?php include 'form.php';
require_once '../config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - Website bán điện thoại</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<?php echo $style;?>
</head>
<body>
	<?php include 'head.php'?>
    <div class="container mt-4">
        <h2 class="mb-4">Tin tức mới nhất</h2>
        <div class="row">
			<?php $sql = "SELECT * FROM news";
			$check = mysqli_query($conn,$sql);
			while($r=mysqli_fetch_assoc($check)){
			?>
			
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><a href="chitiettintuc.php?id=<?php echo $r['ID'];?>" class="text-dark"><?php echo $r['title'];?></a></h5>
                        <p class="card-text">Ngày đăng: <?php echo $r['created_at'];?></p>
                        <p class="card-text">
						<?php
							$tomtat = substr($r['content'], 0, 100); 
							echo $tomtat . '...'; 
						?>
						</p>
                    </div>
                </div>
            </div>
            <?php }?>
			
        </div>
    </div>
	<?php echo $bot;?>
    <!-- Bootstrap JS và các thư viện khác có thể được đặt ở cuối body để tối ưu hóa tải trang -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
