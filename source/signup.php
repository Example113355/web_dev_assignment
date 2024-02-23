<?php 
    include 'link.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
        <h1>ĐĂNG KÝ</h1>
        <form action="" method="post" name="myForm">
            Họ của bạn <input type="text" name='fname'>
            Tên của bạn <input type="text" name="lname">
            Tên đăng nhập <input type="text" name="username">
            Mật khẩu <input type="password" name="password">
            Nhập lại mật khẩu <input type="password" name='re-password'>
            <input onclick="clientCheck(event)" class="submit" type="submit" value="Đăng ký" name="submit">
        </form>
    </div>

    <script>
        function clientCheck(event) {
            var form =document.forms['myForm'];
            var temp = ['fname','lname','username','password','re-password'];
            for(let i = 0; i < temp.length; i++) {
                if(form[temp[i]].value == "") {
                    alert('Bạn cần nhập đủ dữ liệu!');
                    event.preventDefault();
                    return false;
                }
            }

            if(form['password'].value.length < 6) {
                alert('Mật khẩu quá ngắn!');
                event.preventDefault();
                return false;
            }
            if(form['password'].value != form['re-password'].value) {
                alert('Mật khẩu bạn nhập lại không đúng!');
                event.preventDefault();
                return false;
            }
            
            document.forms['myForm'].submit();
        }
    </script>

    <?php
        function check($a,$b,$c,$d,$e) {
            if($a==""||$b==""||$c==""||$d=="") {
                echo 'Bạn phải điền hết các mục';
                return false;
            }
            if(strlen($d) < 6) {
                echo 'Mật khẩu quá ngắn!';
                return false;
            }
            if($d != $e) {
                echo 'Mật khẩu nhập lại không đúng!';
                return false;
            }
            return true;
        }
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $re_password = $_POST['re-password'];
            // Kiểm tra thông tin đăng ký hợp lệ
            if(check($fname,$lname,$username,$password,$re_password)) {
                $query = "SELECT * FROM user WHERE tentk = '$username'";
                $result = mysqli_query($link, $query);

                if(mysqli_num_rows($result) > 0) {
                    echo "Tên đăng nhập đã tồn tại!";
                }
                else {
                    $sql = "INSERT INTO user (fname, lname, tentk, matkhau) VALUES ('$fname', '$lname', '$username', '$password')";

                    if (mysqli_query($link, $sql)) {
                        // Đăng ký thành công, chuyển hướng đến trang đăng nhập
                        echo "Đăng ký thành công.";
                        header('Location: login.php');
                    } else {
                        // Đăng ký thất bại, trả về thông báo lỗi
                        echo 'Lỗi: ' . mysqli_error($link);
                    }
                }
            }
        }

        // Đóng kết nối
        mysqli_close($link);
    ?>

</body>
</html>