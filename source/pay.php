<?php 
    include 'header.php';

    $user_id = $_GET['id'];
    $amount = $_GET['amount'];

    $sql = "INSERT INTO `orders`(`idUser`, `sum`) VALUES ('$user_id','$amount')";
    if(mysqli_query($link, $sql)) {
        echo "Success";
    }
    else {
        echo "Fail";
    }
    header('Location: index.php');
    mysqli_close($link);
?>