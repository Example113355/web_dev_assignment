<?php
    session_start();
    include 'link.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: 16px;
        }
        html {
            height: 100%;
        }
        body{
            background-color: rgb(253, 237, 216);
            height: 100%;
        }
        a {
            display: inline-block;
            padding: 12px 25px;
            cursor: pointer;
            background-color: white;
            text-decoration: none;
            color: black;
            border-bottom-right-radius: 4px;
        }
        .content {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
            background-color: rgb(203, 240, 251);
            height: fit-content;
            width: fit-content;
            border-radius: 6px;
            padding: 24px 30px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        input {
            padding: 6px 16px;
            width: 100%;
            margin-bottom: 4px;
            border-radius: 4px;
            border: none;
        }
        textarea {
            text-indent: 12px;
            margin-bottom: 4px;
            border: none;
            padding: 6px 4px;
        }
        .submit {
            width: 40%;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="admin.php">Home</a>
    <div class="content">
        <div class="container">
            <h1>Add records</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                Tên:
                <input type="text" name="name"> <br>
                Mô tả:
                <input type="text" name='description'><br>
                Giá:
                <input type="text" name="price"><br>
                Img:
                <input type="text" name="image"><br>
                Loại:
                <input type="text" name="type">
                Phổ biến:
                <select name="popular" id="popular">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                </select><br>
                <input type="submit" name="submit" value="Submit" class="submit">
            </form>
        </div>
    </div>
    <?php
        function valid() {
            $name = $_POST["name"];
            $temp = array("name","description","price","image","type");
            for($i = 0; $i < 5; $i++){
                if(empty($_POST[$temp[$i]])) {
                    echo "<script>alert('". $temp[$i] ." required!')</script>";
                    return false;
                }
            }
            if(strlen($name) > 50) {
                echo "<script>alert('Name Invalid!')</script>";
                return false;
            }
            if(strlen($_POST["description"]) > 500) {
                echo "<script>alert('Description Invalid!')</script>";
                return false;
            }
            $string = $_POST["price"];
            $float_value = (float) $string;
            if ( strval($float_value) != $string ) {
                echo "<script>alert('Price Invalid!')</script>";
                return false;
            }
            if(strlen($_POST["image"]) > 2000) {
                echo "<script>alert('Image link Invalid!')</script>";
                return false;
            }
            $check = $_POST['type'];
            if($check != 'ts' && $check != 'cp' && $check != 'st' && $check != 'ne' && $check != 'k') {
                echo "<script>alert('Type Invalid!')</script>";
                return false;
            }
            return true;
        }

        if(isset($_POST['submit']) and $_SERVER["REQUEST_METHOD"] == "POST") {
            if(valid()) {
                $name = $_POST["name"];
                $description =  $_POST["description"];
                $price = $_POST["price"];
                $image = $_POST["image"];
                $type = $_POST["type"];
                $popular = $_POST['popular'];
                $sql = "INSERT INTO `product`(`img`, `description`, `ten`, `gia`, `type`, `popular`) VALUES ('$image','$description','$name','$price','$type','$popular')";
                if(mysqli_query($link,$sql)) {
                    echo "Success";
                }
                else {
                    echo "Fail";
                }
                mysqli_close($link);
            }
        }
    ?>
</body>
</html>