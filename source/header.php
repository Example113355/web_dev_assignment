<?php 
    include 'link.php';
    session_start();

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $login = 'block';
        $not_login = 'none';
        $sql = "SELECT * FROM user WHERE tentk = '$username'";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $point = $row['diem'];
            $user_id = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
        }
        $isLogin = true;
    }
    else {
        $login = 'none';
        $not_login = 'block';
        $isLogin = false;
    }
?>