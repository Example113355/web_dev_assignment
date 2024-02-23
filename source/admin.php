<?php
    session_start();
    include 'link.php';

    if(!isset($_SESSION['admin'])) {
        header('Location: admin_login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="asset/css/admin.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="section">
        <h1 class="title">Products</h1>
        <a href="addProduct.php" class="add">Create New Product</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Img</th>
                <th>Loại</th>
                <th>Phổ biến</th>
                <th>Hành động</th>
            </tr>
            <?php
                $query = mysqli_query($link,"SELECT * FROM product");
                while($row = mysqli_fetch_array($query))
                {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['ten']; ?></td>
                    <td class="des"><?php echo $row['description']; ?></td>
                    <td><?php echo $row['gia']; ?></td>
                    <td><?php echo $row['img']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['popular']; ?></td>
                    <td>
                        <a href="editProduct.php?id=<?php echo $row['id']; ?>" class="action edit">Edit</a>
                        <a href="delProduct.php?id=<?php echo $row['id']; ?>" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>

    <div class="section">
        <h1 class="title">USERS</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
                <th>Điểm</th>
                <th>Hành động</th>
            </tr>
            <?php
                $query = mysqli_query($link,"SELECT * FROM user");
                while($row = mysqli_fetch_array($query))
                {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td class="des"><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['tentk']; ?></td>
                    <td><?php echo $row['matkhau']; ?></td>
                    <td><?php echo $row['diem']; ?></td>
                    <td>
                        <a href="delUser.php?id=<?php echo $row['id']; ?>" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>

    <div class="section">
        <h1 class="title">ORDERS</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Id user</th>
                <th>Sum</th>
                <th>Hành động</th>
            </tr>
            <?php
                $query = mysqli_query($link,"SELECT * FROM orders");
                while($row = mysqli_fetch_array($query))
                {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['idUser']; ?></td>
                    <td class="des"><?php echo $row['sum']; ?></td>
                    <td>
                        <a href="delOrder.php?id=<?php echo $row['id']; ?>" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>

    <div class="section">
        <h1 class="title">COMMENTS</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>User Id</th>
                <th>Date</th>
                <th>Rate</th>
                <th>Content</th>
                <th>Show</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
            <?php
                $query = mysqli_query($link,"SELECT * FROM comment");
                while($row = mysqli_fetch_array($query))
                {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['userId']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['rate']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td>
                        Hiện: <input type="checkbox" name="show" id="show" <?php if($row['show']) echo 'checked'; ?> onchange="updateComment(<?php echo $row['id'] ?>)">
                    </td>
                    <td class="des"><?php echo $row['email']; ?></td>
                    <td>
                        <a href="delComment.php?id=<?php echo $row['id']; ?>" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>

    <script>
        function updateComment(id) {
            var checkbox =document.getElementById('show');
            if(checkbox.checked == 'true') {
                var isChecked = 0;
            }
            else {
                var isChecked = 1;
            }
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        
                    } 
                    else {
                        console.log(xhr.statusText);
                    }
                }
            }
            xhr.open("GET", "updateComment.php?isChecked=" + isChecked + "&id=" + id, true);
            xhr.send();
        }
    </script>
</body>
</html>