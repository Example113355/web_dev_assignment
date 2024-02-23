<?php 
    include 'header.php';
    $id = $_GET['user'];
    $productId = $_GET['productid'];

    $sql = "INSERT INTO `cart`(`userId`, `productId`) VALUES ('$id','$productId')";
    if(mysqli_query($link,$sql)) {
        echo "Thêm thành công.";
    }
    else {
        echo "Thêm chưa thành công.";
    }

    header('Location: index.php');
?>