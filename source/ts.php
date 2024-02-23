<?php
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quán nước BK</title>
    <link rel="stylesheet" href="./asset/css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./asset/css/menu.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./asset/font/fontawesome/fontawesome-free-6.2.0-web/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="navbar_left">
            <i class="fa-solid fa-shop"></i>
            <h3 class="navbar_left">QUÁN NƯỚC BKU</h3>
        </a>
        <div class="navbar_right">
            <ul class="navbar_right-list">
                <li class="navbar_right-item">
                    <a href="index.php" class="navbar_item-content">TRANG CHỦ</a>
                </li>
                <li class="navbar_right-item">
                    <a class="navbar_item-content navbar_right-item--selected" href="ts.php">TRÀ SỮA</a>
                </li>
                <li class="navbar_right-item">
                    <a class="navbar_item-content" href="cp.php">CÀ PHÊ</a>
                </li>
                <li class="navbar_right-item">
                    <a class="navbar_item-content" href="st.php">SINH TỐ</a>
                </li>
                <li class="navbar_right-item">
                    <a class="navbar_item-content" href="ne.php">NƯỚC ÉP</a>
                </li>
                <li class="navbar_right-item">
                    <a class="navbar_item-content" href="k.php">KHÁC</a>
                </li>
            </ul>
        </div>
        <div id="navbar_menu" class="navbar_menu">
            <a href=""><i class="fa-solid fa-bars"></i></a>
        </div>
    </nav>

    <article class="content">
        <div class="content_section content_popular">
            <div class="content_section-heading">
                <h3>MENU TRÀ SỮA</h3>
            </div>
        </div>

        <div class="content_popular-container">
            <?php 
                $sql = "SELECT * FROM product WHERE `type` = 'ts'";
                $result = mysqli_query($link,$sql);
                while($row = mysqli_fetch_assoc($result)) {
            ?>       
                <div class="content_popular-item-container">
                    <div class="content_popular-item">
                        <div class="content_popular-item-img" style="background-image: url(<?php echo $row['img'] ?>);"></div>
                        <div class="content_popular-item-info">
                            <div class="content_popular-head">
                                <h3><?php echo $row['ten'] ?></h3>
                                <p><?php echo $row['description'] ?></p>
                            </div>
                            <div class="content_popular-item-footer">
                                <span><?php echo $row['gia'] ?>Đ</span>
                                <?php 
                                    if($isLogin) {
                                        echo '<a href="addcart.php?productid='. $row['id'] . '&user='. $user_id .'">ĐẶT MÓN</a>';
                                    }
                                    else {
                                        echo '<a href="#" onclick="show_alert(event)">ĐẶT MÓN</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }    
            ?>
        </div>
    </article>

    <footer class="footer">
        <div class="footer_heading">
            <i class="fa-solid fa-shop"></i>
            <h4 class="footer_heading-header">QUÁN NƯỚC BKU</h4>
        </div>
        <div class="footer_icons">
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </footer>

    <aside class="aside">
        <div class="user">
            <i class="fa-regular fa-user"></i>
        </div>
        <div class="cart" onclick="window.location.href='cart.php<?php if($isLogin) echo '?id=' . $user_id?>'">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>
                <?php 
                    if($isLogin) {
                        $username = $_SESSION['username'];
                        $sql = "SELECT * FROM user WHERE tentk = '$username'";
                        $result = mysqli_query($link, $sql);
                        
                        $row = mysqli_fetch_assoc($result);
                        $user_id = $row['id'];

                        $sql = "SELECT * FROM `cart` where userId = $user_id";
                        $result = mysqli_query($link, $sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                    }
                    else {
                        echo 0;
                    }
                ?>
            </span>
        </div>
    </aside>

    <?php include('modal.php') ?>
    <script>
        function show_alert(e) {
            e.preventDefault();
            alert("Bạn cần đăng nhập!");
        }
    </script>
    <script>
        // Open - close menu
        var menu_icon = document.querySelector(".navbar_menu")
        var menu = document.querySelector(".navbar_right")
        var navbar = document.querySelector('.navbar')
        var navbar_height = navbar.clientHeight
        var menu_height = menu.clientHeight

        menu_icon.onclick = function(e) {
            if(navbar_height >= menu_height) {
                menu.style.display = 'block'
                menu_height = menu.clientHeight
            }
            else {
                menu.style.display = 'none'
                menu_height = menu.clientHeight
            }
        }
    </script>
    <script>
        // Open - close user
        const user = document.querySelector('.user')
        const modal = document.querySelector('.modal')
        const modal_container = document.querySelector('.modal_container')
        const closeButton = document.querySelector('.modal_close')

        function show() {
            modal.classList.add('open')
        }

        function hide() {
            modal.classList.remove('open')
        }

        user.addEventListener('click',show)
        closeButton.addEventListener('click',hide)
        modal.addEventListener('click',hide)
        modal_container.addEventListener('click', function (event) {
            event.stopPropagation()
        })
    </script>

</body>
</html>