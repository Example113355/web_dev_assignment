<?php 
    include 'header.php';

    $id = $_GET['userid'];
    $productId = $_GET['productid'];

    $sql = "DELETE FROM `cart` WHERE userId = $id AND productId = $productId";
    if(mysqli_query($link,$sql)) {
        echo "Xóa thành công.";
    }
    else {
        echo "Xóa chưa thành công.";
    }

    header('Location: cart.php?id=' . $user_id);
?>