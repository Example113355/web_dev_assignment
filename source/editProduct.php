<?php
    session_start();
    include 'link.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM `product` WHERE id = $id";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['popular']) {
        $co = 'selected';
        $khong = '';
    }
    else {
        $co = '';
        $khong = 'selected';
    }
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
            <h1>Edit records</h1>
            <form method="post" action="editProduct.php?id='<?php echo $id; ?>'">
                Tên:
                <input type="text" name="name" value='<?php echo $row['ten'] ?>'><br>
                Mô tả:
                <input type="text" name='description' value='<?php echo $row['description'] ?>'><br>
                Giá:
                <input type="text" name="price" value='<?php echo $row['gia'] ?>'><br>
                Img:
                <input type="text" name="image" value='<?php echo $row['img'] ?>'><br>
                Loại:
                <input type="text" name="type" value='<?php echo $row['type'] ?>'>
                Phổ biến:
                <select name="popular" id="popular" value='<?php echo $row['popular'] ?>'>
                    <option value="0" <?php echo $khong; ?>>Không</option>
                    <option value="1" <?php echo $co; ?>>Có</option>
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
                $sql = "UPDATE `product` SET `img`='$image',`description`='$description',`ten`='$name',`gia`='$price',`type`='$type',`popular`='$popular' WHERE id = $id";
                if(mysqli_query($link,$sql)) {
                    echo "Success";
                }
                else {
                    echo "Fail";
                }
                header('Location: admin.php');
                mysqli_close($link);
            }
        }
    ?>
</body>
</html>