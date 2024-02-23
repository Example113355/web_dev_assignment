<?php 
    include 'link.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM `orders` WHERE id = $id";
    $result = mysqli_query($link, $sql);
    if($result) {
        echo 'Success';
    }
    else {
        echo 'Fail';
    }
    header('Location: admin.php');
?>