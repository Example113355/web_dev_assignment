<?php 
    include 'link.php';
    session_start();
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE tentk = '$username'";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $oldPassword = $row['matkhau'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="./asset/font/fontawesome/fontawesome-free-6.2.0-web/css/all.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html {
            height: 100%;
        }
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 6px 10px;
        }
        .navbar {
            display: flex;
            text-decoration: none;
            color: black;
        }
        body {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: linear-gradient(to right, #7A7FBA, #11C37C);
            color: white;
            font-size: 1.2rem;
        }
        input {
            display: block;
            margin-top: 4px;
            margin-bottom: 12px;
            padding: 4px 12px;
            border-radius: 4px;
            border: none;
            outline: none;
        }
        h1 {
            margin-bottom: 20px;
        }
        .submit {
            cursor: pointer;
        }
        .submit:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php" class="navbar">
            <i class="fa-solid fa-shop"></i>
            <h3 class="navbar_left">QUÁN NƯỚC BKU</h3>
        </a>
    </nav>

    <div class="login">
        <h1>Đổi mật khẩu</h1>
        <form action="" method="post" name="myForm" id="form">
            Nhập mật khẩu cũ <input type="password" name='oldPassword'>
            Nhập mật khẩu mới <input type="password" name="password">
            <input onclick="clientCheck(event)" class="submit" type="submit" value="Xác nhận" name="submit">
        </form>
    </div>

    <script>
        function clientCheck(event) {
            var form =document.forms['myForm'];
            if(form['oldPassword'].value == "" || form['password'].value == "") {
                alert('Bạn cần nhập đủ dữ liệu!');
                event.preventDefault();
                return false;
            }
            if(form['password'].value.length < 6) {
                alert('Mật khẩu mới quá ngắn!');
                event.preventDefault();
                return false;
            }
            document.forms['myForm'].submit();
        }
    </script>

    <?php
        $id = $_GET['id'];
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputOld = $_POST['oldPassword'];
            $inputNew = $_POST['password'];
            
            if($inputOld != $oldPassword) {
                echo "Mật khẩu cũ không đúng!";
            }
            else {
                $query = "UPDATE `user` SET `matkhau`='$inputNew' WHERE id = '$id'";
                $result = mysqli_query($link, $query);
                if (mysqli_query($link, $sql)) {
                    // Đăng ký thành công, chuyển hướng đến trang đăng nhập
                    echo "Thay đổi thành công.";
                } else {
                    // Đăng ký thất bại, trả về thông báo lỗi
                    echo 'Lỗi: ' . mysqli_error($link);
                }
            }
            
        }

        // Đóng kết nối
        mysqli_close($link);
    ?>

</body>
</html>