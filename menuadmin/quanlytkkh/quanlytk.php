<?php include '../form.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản khách hàng</title>
    <link rel="stylesheet" href="styles.css">
    <?php echo $style;?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 5px 5px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }

        .edit {
            background-color: #4CAF50;
            color: white;
        }

        .delete {
            background-color: #f44336;
            color: white;
        }

        .actions {
            text-align: center;
        }

        .add {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        /* Adjust the width of the password column */
        th:nth-child(5), td:nth-child(5) {
            width: 70px;
        }
    </style>
</head>
<body>
    <?php echo $top;?>
    <div class="container">
        <h2>DANH SÁCH TÀI KHOẢN</h2>
        <table>
            <thead>
                <tr>
                    <th>MÃ TK</th>
                    <th>TÊN ĐĂNG NHẬP</th>
                    <th>TÊN NGƯỜI DÙNG</th>
                    <th>Email</th>
                    <th style="width: 70px;">MẬT KHẨU</th>
                    <th>VAI TRÒ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $conn = new mysqli("localhost", "root", "", "nhom8web");

                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                $sql = "SELECT id, TaiKhoan, HoTen, Email , MatKhau, level FROM user";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $role = '';
                        if ($row['level'] == 1) {
                            $role = 'Admin';
                        } elseif ($row['level'] == 0) {
                            $role = 'Khách hàng';
                        } elseif ($row['level'] == 2) {
                            $role = 'Nhân viên';
                        } else {
                            $role = 'Unknown'; // Hoặc giá trị mặc định khác nếu cần
                        }
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['TaiKhoan']}</td>
                            <td>{$row['HoTen']}</td>
                            <td>{$row['Email']}</td>
                            <td style='width: 70px;'>{$row['MatKhau']}</td>
                            <td>{$role}</td>
                            <td>";
                            
                        // Kiểm tra và hiển thị nút Sửa nếu không phải là Khách hàng
                        if ($row['level'] != 0) {
                            echo "<form action='edit_user.php' method='get' style='display:inline;'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button class='btn edit' type='submit'>Sửa</button>
                                </form>";
                        }
                        
                        echo "<form action='delete_user.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button class='btn delete' type='submit'>Xóa</button>
                            </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                }
                $conn->close();
            ?>
            </tbody>
        </table>
        <a href="add_user.php" class="btn add">Nhập thêm</a>
    </div>
    <?php echo $bot;?>
</body>
</html>
