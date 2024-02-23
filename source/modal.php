<div class="modal">
        <div class="modal_container">
            <div class="modal_close">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <div class="modal_header">
                <i class="fa-solid fa-user"></i>
                <h3>USER INFORMATION</h3>
            </div>

            <div class="modal_content">
                <div class="modal_content-log-in" style="display: <?php echo $login?>">
                    <div class="modal_content-des">
                        <span>Họ và tên: <?php echo $fname . " " .$lname?></span></br>
                        <span>Tích điểm: </span>
                        <span class="quantity"><?php echo $point ?></span>
                    </div>
                    <div class="modal_content-func">
                        <a href="changeInfo.php?id=<?php echo $user_id ?>">Đổi họ và tên</a>
                        <a href="changePassword.php?id=<?php echo $user_id ?>">Đổi mật khẩu</a>
                    </div>
                    <div class="modal_button logout">
                        <a href="logout.php">Đăng xuất</a>
                    </div>
                </div>

                <div class="modal_content-log-out" style="display: <?php echo $not_login?>">
                    <div class="modal_content-des">
                        <span>BẠN CHƯA ĐĂNG NHẬP</span>
                    </div>

                    <div class="modal_button-container">
                        <div class="modal_button">
                            <a href="login.php">Đăng nhập</a>
                        </div>
                        <div class="modal_button">
                            <a href="signup.php">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>