<!DOCTYPE html>
<?php include '../form.php';?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<?php echo $style;?>
</head>
<body>
	<?php echo $top;?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center mb-4">
                    <h1>Quản lý tin tức</h1>
                </div>
                <div class="text-left mb-4">
                    <a href="?action=add" class="btn btn-success">Add News</a>
                </div>
                <div class="row">
                    <?php
                    // Kết nối cơ sở dữ liệu
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "nhom8web";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch(PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                        exit();
                    }

                    // Xử lý thêm, chỉnh sửa và xóa tin tức
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['action'])) {
                            $action = $_POST['action'];
                            if ($action == 'add') {
                                $title = $_POST['title'];
                                $content = $_POST['content'];
                                $author = $_POST['author'];

                                $stmt = $conn->prepare("INSERT INTO news (title, content, author) VALUES (?, ?, ?)");
                                $stmt->execute([$title, $content, $author]);
                                header("Location: news_management.php");
                                exit();
                            } elseif ($action == 'edit') {
                                $ID = $_POST['ID'];
                                $title = $_POST['title'];
                                $content = $_POST['content'];
                                $author = $_POST['author'];

                                $stmt = $conn->prepare("UPDATE news SET title = ?, content = ?, author = ? WHERE ID = ?");
                                $stmt->execute([$title, $content, $author, $ID]);
                                header("Location: news_management.php");
                                exit();
                            }
                        }
                    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete'])) {
                        $ID = $_GET['delete'];
                        $stmt = $conn->prepare("DELETE FROM news WHERE ID = ?");
                        $stmt->execute([$ID]);
                        header("Location: news_management.php");
                        exit();
                    }

                    // Lấy danh sách tin tức
                    $stmt = $conn->query("SELECT * FROM news");
                    $newsList = $stmt->fetchAll();
                    ?>

                    <?php foreach ($newsList as $news): ?>
                        <div class="col-md-12 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($news['content']); ?></p>
                                </div>
                                <div class="card-footer text-muted">
                                    <small>By <?php echo htmlspecialchars($news['author']); ?> on <?php echo $news['created_at']; ?></small>
                                    <div class="mt-2">
                                        <a href="?action=edit&ID=<?php echo $news['ID']; ?>" class="btn btn-primary btn-sm">Edit</a> 
                                        <a href="?delete=<?php echo $news['ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-6">
                <?php
                // Hiển thị form thêm/chỉnh sửa tin tức
                if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                    $action = $_GET['action'];
                    $title = $content = $author = "";
                    $ID = 0;

                    if ($action == 'edit' && isset($_GET['ID'])) {
                        $stmt = $conn->prepare("SELECT * FROM news WHERE ID = ?");
                        $stmt->execute([$_GET['ID']]);
                        $news = $stmt->fetch();
                        $title = $news['title'];
                        $content = $news['content'];
                        $author = $news['author'];
                        $ID = $news['ID'];
                    }
                ?>

                <div class="mt-5">
                    <h1 class="text-center"><?php echo ucfirst($action); ?> News</h1>
                    <form method="post" action="" class="mt-4">
                        <input type="hidden" name="action" value="<?php echo $action; ?>">
                        <?php if ($action == 'edit'): ?>
                            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($title); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" class="form-control" required><?php echo htmlspecialchars($content); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" id="author" name="author" class="form-control" value="<?php echo htmlspecialchars($author); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo ucfirst($action); ?></button>
                    </form>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
<?php echo $bot;?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
