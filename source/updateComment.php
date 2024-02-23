<?php   
    include 'link.php';

    $check = $_GET['isChecked'];
    $id = $_GET['id'];

    $sql = "UPDATE `comment` SET `show`='$check' WHERE id = $id";
    mysqli_query($link, $sql);
    echo $check;
?>