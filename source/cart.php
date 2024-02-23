<?php
    include 'link.php';
    session_start();
    $isLogin = 0;
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
        $isLogin = 1;
    }
    else {
        $login = 'none';
        $not_login = 'block';
        header('Location: login.php');
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng và thanh toán</title>
    <link rel="stylesheet" href="./asset/css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./asset/css/cart.css?v=<?php echo time(); ?>">
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
                    <a class="navbar_item-content" href="ts.php">TRÀ SỮA</a>
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
            <a href="#"><i class="fa-solid fa-bars"></i></a>
        </div>
    </nav>

    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * from `cart` a, `product` b where userId = $user_id and a.productId = b.id;";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) == 0) {
            $cart_none = 'flex';
            $cart_have = 'none';
        }
        else {
            $cart_none = 'none';
            $cart_have = 'block';
        }
    ?>

    <article class="content">
        <div class="content_section content_popular">
            <div class="content_section-heading">
                <h3>GIỎ HÀNG</h3>
            </div>
        </div>

        <div class="cart_container-none" style="display: <?php echo $cart_none ?>">
            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/9bdd8040b334d31946f49e36beaf32db.png" alt="" width="200xp">
            <span>GIỎ HÀNG TRỐNG</span>
        </div>

        <div class="cart_container-have" style="display: <?php echo $cart_have ?>">
            <div class="cart_header">
                <div class="cart_header-content product_name">Sản phẩm</div>
                <div class="cart_header-content product_quantity">Số lượng</div>
                <div class="cart_header-content product_price">Đơn giá</div>
                <div class="cart_header-content product_sum">Số tiền</div>
                <div class="cart_header-content product_del">Thao tác</div>
            </div>

            <div class="cart_item-container">
                <?php 
                    if(mysqli_num_rows($result) == 0) {
                        $cart_none = 'flex';
                        $cart_have = 'none';
                    }
                    else {
                        $cart_none = 'none';
                        $cart_have = 'block';
                        $sum = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                            <div class="cart-item">
                                <div class="cart_product">
                                    <div class="cart_product-left">
                                        <img src="<?php echo $row['img'] ?>" alt="Hình minh họa" width="150px">
                                    </div>

                                    <div class="cart_product-right">
                                        <span><?php echo $row['ten'] ?></span>
                                        <p><?php echo $row['description'] ?></p>
                                    </div>
                                </div>
                                <div class="cart_product-quantity">
                                    <span class="decrease"><button onclick="decrease(<?php echo $row['productId'] ?>,<?php echo $user_id ?>)">-</button></span>
                                    <span class="quantity" id="quantity-<?php echo $row['productId']; ?>"><?php echo $row['amount'] ?></span>
                                    <span class="increase"><button onclick="increase(<?php echo $row['productId'] ?>,<?php echo $user_id ?>)">+</button></span>
                                </div>

                                <div class="cart_product-price" id="product-price-<?php echo $row['productId']; ?>"><?php echo $row['gia'] ?></div>

                                <div class="cart_product-sum" id='product-sum-<?php echo $row['productId']; ?>'><?php echo $row['gia']*$row['amount'] ?></div>

                                <div class="cart_product-del"><button onclick="window.location.href='delcart.php?userid=<?php echo $user_id;?>&productid=<?php echo $row['productId'];?>'">Xóa</button></div>
                            </div>

                <?php
                            $sum += $row['gia']*$row['amount'];
                        }
                    }
                    
                ?>

            </div>
            
            <div class="cart_sum">
                <span>Tổng</span>
                <span class="cart_total"><?php echo $sum; ?></span>
                <span><button onclick="changeToPay()">Thanh toán</button></span>
            </div>
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
        <div class="cart">
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

    <!-- Pay  -->
    <script>
        function changeToPay() {
            var amount = document.querySelector('.cart_total').innerHTML;
            window.location.href='pay.php?id=<?php echo $user_id ?>&amount=' + amount;
            <?php 
                $sql = "DELETE FROM `cart` WHERE userId = $user_id";
                mysqli_query($link, $sql);
            ?>
        }
    </script>

    <!-- increase cart -->
    <script>
        function increase(itemId,userId) {
            var quantity =document.getElementById('quantity-' + itemId);
            var newQuantity = parseInt(quantity.innerHTML) + 1;
            quantity.innerHTML =newQuantity;

            var price =document.getElementById('product-price-' + itemId);
            var sumItem =document.getElementById('product-sum-' + itemId);
            var sum =document.querySelector('.cart_total');
            sumItem.innerHTML = parseInt(price.innerHTML) * newQuantity;
            sum.innerHTML = parseInt(sum.innerHTML) + parseInt(price.innerHTML);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        
                    } else {
                        alert(xhr.statusText);
                    }
                }
            }
            xhr.open('GET', "increase.php?itemId=" + itemId + '&newQuantity=' + newQuantity +'&id=' + userId, true);
            xhr.send();
        }

        function decrease(itemId,userId) {
            
            var quantity =document.getElementById('quantity-' + itemId);
            if(quantity.innerHTML == 1) {
                alert('Không thể giảm nữa!');
                return
            }
            var newQuantity = parseInt(quantity.innerHTML) -1;
            quantity.innerHTML =newQuantity;

            var price =document.getElementById('product-price-' + itemId);
            var sumItem =document.getElementById('product-sum-' + itemId);
            var sum =document.querySelector('.cart_total');
            sumItem.innerHTML = parseInt(price.innerHTML) * newQuantity;
            sum.innerHTML = parseInt(sum.innerHTML) - parseInt(price.innerHTML);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        
                    } else {
                        alert(xhr.statusText);
                    }
                }
            }
            xhr.open('GET', "increase.php?itemId=" + itemId + '&newQuantity=' + newQuantity +'&id=' + userId, true);
            xhr.send();
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