<?php
    session_start();
    $link = mysqli_connect ('localhost', 'root', '') ;
    if (!$link) {
        die('Could not connect: ' . mysqli_error($link));
    }
    $db_selected = mysqli_select_db($link,'milktea');

    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE tentk = '$username'";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $rate = $_POST['rate'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
    
        $sql = "INSERT INTO `comment`(`userId`, `date`, `rate`, `content`, `email`) VALUES ('$user_id','$date','$rate','$comment','$email')";
    
        if ($link->query($sql) === TRUE) {
            $response = array('status' => 'success', 'message' => 'Product added successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error adding product: ' . $conn->error);
        }
        echo json_encode($response);
    }
?>