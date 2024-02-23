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
    <link rel="stylesheet" href="./asset/css/style.css?v=<?php echo time(); ?>">
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
                    <a href="index.php" class="navbar_item-content navbar_right-item--selected">TRANG CHỦ</a>
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

    <header class="header">
        <div class="header_container">
            <div class="header_heading">
                <h1>
                    <span>Quán nước BKU</span><br>
                    <span class="header_heading-bottom">268 Lý Thường Kiệt</span>
                </h1>
            </div>
            <div class="heading_icons">
                <div class="heading_icon-container">
                    <i class="fa-solid fa-clock"></i>
                    <span>Mở cửa từ 18h - 20h</span>
                </div>
                <div class="heading_icon-container">
                    <i class="fa-solid fa-location-arrow"></i>
                    <span>268 Lý Thường Kiệt</span>
                </div>
                <div class="heading_icon-container">
                    <i class="fa-solid fa-phone"></i>
                    <span>8-800-100-20-20</span>
                </div>
            </div>
        </div>
    </header>

    
    <div class="header_combo">
        <div class="header_combo-top">
            <div class="header_combo-header">
                <h3 class="header_combo-heading">COMBO TRÀ SỮA 159K</h3>
                <div class="header_combo-subheader">Vui lòng đặt món trước 21h</div>
            </div>
    
            <div class="header_combo-content">
                <div class="header_combo-left">
                    <div class="combo-item">
                        <h4>Trà sữa</h4>
                        <p>Trà sữa đường đen, trà sữa chocolate, trà sữa matcha, trà sữa cà phê</p>
                    </div>
                    <div class="combo-item">
                        <h4>Trân châu</h4>
                        <p>Trân châu đen, trân châu trắng, trân châu thủy tinh</p>
                    </div>
                    <div class="combo-item">
                        <h4>Topping trái cây</h4>
                        <p>Đào, Dâu, Táo, Kiwi</p>
                    </div>
                    <div class="combo-item">
                        <h4>Thạch</h4>
                        <p>Thạch plan, thạch cà phê, thạch  trái cây</p>
                    </div>
                </div>
                <div class="header_combo-right">
                    
                </div>
            </div>
    
            <button class="header_combo-button" onclick="window.location.href='ts.php'">
                ĐẶT MÓN
            </button>
        </div>

        <div class="header_combo-bottom">
            <div class="header_combo-bottom--item">
                <i class="fa-solid fa-cake-candles"></i>
                <h4>Đặt tiệc</h4>
            </div>

            <div class="header_combo-bottom--item">
                <i class="fa-solid fa-heart"></i>
                <h4>Phục vụ công ích</h4>
            </div>

            <div class="header_combo-bottom--item">
                <i class="fa-solid fa-briefcase"></i>
                <h4>Đặt thức ăn trưa</h4>
            </div>
        </div>
    </div>

    <div class="slide">
        <div class="slide-wrap">
            <h3>TRÀ SỮA</h3>
            <p>Còn gì tuyệt vời hơn khi sở hữu một ly trà sữa
                ngon tuyệt cú mèo chỉ với 50k.
            </p>
            <button onclick="window.location.href='ts.php'">Đặt món</button>
        </div>
        <div class="arrow left-arrow">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div class="arrow right-arrow">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
        <div class="slide_circle">
            <div class="slide_circle-item"></div>
            <div class="slide_circle-item slide_circle-item-active"></div>
            <div class="slide_circle-item"></div>
        </div>
    </div>

    <article class="content">
        <div class="content_section">
            <div class="content_section-heading">
                <h3>Các sự kiện sắp tới</h3>
            </div>
            <div class="content_event-main">
                <div class="content_event-res">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>10/4/2023</span>
                </div>
                <div class="content_event-main-left">
                    <div class="month">      
                        <ul>
                            <li class="calender-arrow prev"><a href="">&#10094;</a></li>
                            <li>
                              April
                              <span style="font-size:1.8rem">2023</span>
                            </li>
                            <li class="calender-arrow next"><a href="">&#10095;</a></li>
                        </ul>
                    </div>
                      
                    <ul class="weekdays">
                        <li>Mo</li>
                        <li>Tu</li>
                        <li>We</li>
                        <li>Th</li>
                        <li>Fr</li>
                        <li>Sa</li>
                        <li>Su</li>
                    </ul>
                    
                    <ul class="days">  
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li class="active">10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                        <li>16</li>
                        <li>17</li>
                        <li>18</li>
                        <li>19</li>
                        <li>20</li>
                        <li>21</li>
                        <li>22</li>
                        <li>23</li>
                        <li>24</li>
                        <li>25</li>
                        <li>26</li>
                        <li>27</li>
                        <li>28</li>
                        <li>29</li>
                        <li>30</li>
                        <li>31</li>
                    </ul>
                </div>
                <div class="content_event-main-right">
                    <div class="content-main-right-item top">
                        <span class="time">10:00</span>
                        <h3>Lớp dạy nấu trà sữa khai trương</h3>
                        <p>Trà sữa thật ngon, nhưng nếu bạn có thể tự làm ở nhà thì sẽ như thế nào?</p>
                        <div class="icon">
                            <i class="fa-solid fa-eye"></i>
                            <span>275</span>
                            <i class="fa-solid fa-comments"></i>
                            <span>12</span>
                        </div>
                    </div>

                    <div class="content-main-right-item bottom">
                        <span class="time">19:00</span>
                        <h3>Món ăn đầu tiên của cửa hàng!!!</h3>
                        <p>Giảm  giá 30% cho 100 cái đầu tiên!!! Từ hôm nay quán nước BKU chính thức có món ăn mới.</p>
                        <div class="icon">
                            <i class="fa-solid fa-eye"></i>
                            <span>275</span>
                            <i class="fa-solid fa-comments"></i>
                            <span>12</span>
                        </div>
                    </div>

                    <div class="content-main-right-footer">
                        <a href="">
                            <span>Tất cả sự kiện</span>
                            <span>>></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_section content_popular">
            <div class="content_section-heading">
                <h3>Phổ biến</h3>
            </div>
            <div class="content_popular-container">
                <?php 
                    $sql = "SELECT * FROM product WHERE popular = 1";
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
        </div>
        <div class="content_section">
            <div class="content_section-heading">
                <h3>Đánh giá</h3>
            </div>


            <div class="content_comment-container">
                <?php 
                    $sql = "SELECT * FROM comment a,user b WHERE a.userId = b.id and `show` = 1";
                    $result = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                ?>
                        <div class="content_comment-item">
                            <div class="content_comment-header">
                                <span class="left">@<?php echo $row['tentk'] ?></span>
                                <span class="right"><?php echo $row['date'] ?></span>
                            </div>
                            <div class="content_comment-star">
                                <?php 
                                    for($i = 1; $i <= 5; $i++) {
                                        if($i <= $row['rate']) {
                                            echo '<i class="star-active fa-solid fa-star"></i>';
                                        }
                                        else {
                                            echo '<i class="fa-solid fa-star"></i>';
                                        }
                                    }
                                ?>
                            </div>
                            <p class="content_comment-text">
                                <?php echo $row['content']; ?>
                            </p>
                        </div>
                <?php 
                    }
                ?>        
            </div>
        </div>
        <div class="content_section">
            <div class="content_section-heading">
                <h3>Liên hệ</h3>
            </div>

            <div class="content_contact-container">
                <div class="content_contact-left">
                    <p><i class="fa-solid fa-location-arrow"></i> Chicago, US</p>
                    <p><i class="fa-solid fa-phone"></i> Phone: +00 151515</p>
                    <p><i class="fa-solid fa-envelope"></i> Email: mail@mail.com</p>
                </div>
                <div class="content_contact-right">
                    <form action="comment.php" method="post" name='myForm' id="form">
                        <div class="content_contact-form-top">
                            <input type="text" name="email" required placeholder="Email của bạn">
                            <input type="text" name="rate" required placeholder="Số sao bạn đánh giá ( <= 5 )">
                            <input type="hidden" name="date" value="">
                        </div>
                        <div class="content_contact-form-bottom">
                            <input class="response" type="text" name="comment" required placeholder="Phản hồi">
                        </div>
                        <input class="submit" type="submit" value="Gửi">
                    </form>
                </div>
            </div>
        </div>
    </article>
    <!-- Add cart ajax -->

    <!-- Form validation -->
    <script>
        function clientCheck(event) {
            var form =document.forms['myForm'];
            var temp = ['email','rate','comment'];
            for(let i = 0; i < temp.length; i++) {
                if(form[temp[i]].value == "") {
                    alert('Bạn cần nhập đủ dữ liệu!');
                    return false;
                }
            }

            var dotIndex = form['email'].value.indexOf('.');
            var len = form['email'].value.length;
            var aIndex = form['email'].value.indexOf('@');
            if(aIndex <= 0 || dotIndex - 1 <= aIndex || dotIndex == len - 1) {
                alert('Email không hợp lệ!');
                return false;
            }

            if(parseInt(form['rate'].value) > 5 || parseInt(form['rate'].value) < 0) {
                alert('Bạn đánh giá số sao không hợp lệ!');
                return false;
            }
            
            var now = new Date();
            form['date'].value = now.toLocaleString('en-US', {year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit'});
            return true;
        }

        // ajax comment
        var form = document.getElementById('form');
        var submitButton = form.querySelector('.submit');
        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            if(clientCheck(e)) {
                var xhr = new XMLHttpRequest();
                var formData = new FormData(form);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            alert("Success. Lưu ý: nếu bạn chưa đăng nhập dữ liệu sẽ không được lưu!");
                        } else {
                            alert(xhr.statusText);
                        }
                    }
                }
                xhr.open('POST', 'comment.php', true);
                xhr.send(formData);
            }
        });
    </script>

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

    <?php 
        include('modal.php');
        mysqli_close($link);
    ?>

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