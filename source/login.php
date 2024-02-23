<?php 
    include 'link.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
        <h1>ĐĂNG NHẬP</h1>
        <form action="login.php" method="post" name="myForm">
            Tên đăng nhập <input type="text" name="username">
            Mật khẩu <input type="password" name="password">
            <input onclick="clientCheck(event)" class="submit" type="submit" value="Đăng nhập" name="submit">
        </form>
    </div>

    <script>
        function clientCheck(event) {
            var form = document.forms['myForm'];
            if(form['username'].value == "" || form['password'] == "") {
                event.preventDefault();
                alert('Bạn cần điền đầy đủ!');
                return false;
            }
            form.submit();
        }
    </script>

    <?php
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM user WHERE tentk = '$username' AND matkhau = '$password'";
            $result = mysqli_query($link,$sql);

            if(mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
            }
            else {
                echo "Sai thông tin đăng nhập!";
            }
        }

        mysqli_close($link);
    ?>
</body>
</html>