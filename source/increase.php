<?php 
    include 'header.php';

    $newquantity = $_GET['newQuantity'];
    $productId = $_GET['itemId'];
    $userId = $_GET['id'];

    $sql = "UPDATE `cart` SET `amount`='$newquantity' WHERE userId = $userId AND productId = $productId";
    if(mysqli_query($link,$sql)) {
        echo "Thêm thành công.";
    }
    else {
        echo "Thêm chưa thành công.";
    }
?>