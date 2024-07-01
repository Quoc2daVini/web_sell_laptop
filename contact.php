<?php
    include 'lib/session.php';
    Session::init(); 
    include_once 'lib/database.php'; 
    include_once 'helpers/format.php';
    include 'classes/product.php'; 
    include 'classes/category.php'; 
    include 'classes/brand.php'; 
    include 'classes/cart.php';
    include 'classes/user.php';  
    
    $db = new Database(); 
    $fm = new Format();
    $ct = new cart();
    $ur = new user();
    $cat = new category();
    $pd = new product();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>UITPro – Laptop chính hãng, giá rẻ ...</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="icon"  type="image/png" href="./assets/images/favicon.svg">
        <!-- Include All CSS -->
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="./assets/css/themewar-icons.css"/>
        <!-- <link rel="stylesheet" href="./assets/css/flaticon.css"/> -->
        <link rel="stylesheet" href="./assets/css/animate.css"/>
        <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="./assets/css/settings.css">
        <link rel="stylesheet" href="./assets/css/lightcase.css">
        <link rel="stylesheet" href="./assets/css/preset.css"/>
        <link rel="stylesheet" href="./assets/css/ignore_in_wp.css"/>
        <link rel="stylesheet" href="./assets/css/theme.css"/>
        <link rel="stylesheet" href="./assets/css/responsive.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <script src="https://kit.fontawesome.com/88edd710ae.js" crossorigin="anonymous"></script> -->
            <!-- Core css -->
        <!-- Favicon Icon -->
     
        <!-- Favicon Icon -->
</head>
    <body>
        <!-- Header Start -->
        <header class="header-01 fix-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.php">
                                <img src="./assets/images/logo.png" alt="UITPro"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="mainmenu mobile-menu">
                            <div class="mobile-btn">
                                <a href="./shopallproduct.php"><span>Menu</span><i class="twi-bars"></i></a>
                            </div>
                            <ul>
                                <li class="menu-item-has-children">
                                <a href="./shopallproduct.php">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.php?catID=1">Laptop</a></li>
                                        <li><a href="shop.php?catID=2">Màn hình</a></li>
                                        <li><a href="shop.php?catID=8">PC</a></li>
                                        <li><a href="shop.php?catID=5">Bàn phím</a></li>
                                        <li><a href="shop.php?catID=3">Arm màn hình</a></li>
                                        <li><a href="shop.php?catID=4">Âm thanh</a></li>
                                        <li><a href="404.php">Bàn nâng hạ</a></li>
                                        <li><a href="shop.php?catID=6">Ghế công thái học</a></li>
                                        <li><a href="shop.php?catID=7">Máy chơi game</a></li>
                                        <li><a href="shop.php?catID=9">Chuột</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="./blog-fullwidth.php">Dịch Vụ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="./about.php">Về chúng tôi</a>
                                </li>
                                <li><a href="./contact.php">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="header-cogs">
                            
                            <a class="search search-toggles" href="javascript:void(0);"><i class="twi-search"></i></a>
                            <a class="user-login" href="javascript:void(0);"><i class="twi-user-circle"></i><span><?php 
                            $login_check = Session::get('userlogin');
                            if($login_check == false){
                                echo '<a href="login.php">Đăng nhập</a>';
                            } else {
                                echo '<a href="">Đăng xuất</a>';
                            }
                            ?></span></a>
                            <a class="carts" href="./cart.php"><img src="./assets/images/cart.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Header End -->
<!-- Popup Search -->
<section class="popup-search-sec">
            <div class="popup-search-overlay"></div>
            <div class="overlay-popup">
                <a href="javascript:void(0);" class="search-closer">x</a><!-- Close Popup Btn -->
                <div class="middle-search">
                    <div class="popup-search-form"><!-- Search Form Start -->
                        <form method="get" action="#">
                            <input type="search" name="s" id="s" placeholder="Search...">
                            <button type="submit"><i class="twi-search"></i></button>
                        </form><!-- Search Form End -->
                    </div>
                </div>
            </div>
</section>

        <!-- Banner Start -->
        <section class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="round-shape"></span>
                        <h2 class="banner-title">Liên hệ</h2>
                        <div class="bread-crumb"><a href="index.php">Trang chủ</a> / Liên hệ</div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- History Section Start -->
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <h3 class="sec-title">Cửa hàng của chúng tôi</h3>
                        <div class="info-contact">
                            <h5>Địa chỉ: <p> Đường số 11, KDC Phước Kiển, Xã Phước Kiển, Huyện Nhà Bè, Hồ Chí Minh</p></h5>
                            <h5>Số điện thoại: <p>  +84 902 34 48 35 </p></h5>
                            <h5>Email: <p> cskh@uitpro.vn</p></h5>
                            <h5>Social: 
                                <a href="#"><i class="twi-facebook"></i></a>
                                <a href="#"><i class="twi-twitter-square"></i></a>
                                <a href="#"><i class="twi-pinterest-square"></i></a>
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="contact-thumb">
                            <img src="../asset/images/contact.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="row mar-top-bottom">
                    <div class="col-lg-12">
                        <div class="map grayscale">
                            <iframe src="https://maps.google.com/maps?width=720&amp;height=600&amp;hl=en&amp;coord=39.966528,-75.158284&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland+(My%20Business%20Name)&amp;ie=UTF8&amp;t=p&amp;z=16&amp;iwloc=B&amp;output=embed"  scrolling="no"></iframe>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="sec-title">Liên hệ với chúng tôi</h2>
                        <p class="sec-desc">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-form text-center">
                            <form action="#" method="post" id="contact-form" class="row">
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" name="con_name" class="required" placeholder="Enter your name">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <input type="email" name="con_email" class="required" placeholder="Your Email">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" name="con_subject" placeholder="Subject">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <textarea name="con_message" class="required" placeholder="Your message here"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn">Shoot</button>
                                    <img src="../asset/images/ajax.gif" alt="" class="loader"/>
                                    <div class="con_message"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- History Section End -->

        <!-- Footer Start -->
        <footer class="footer-01">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <aside class="widget about-widget">
                            <div class="foo-logo">
                                <a href="./index.html"><img src="../asset/images/logo.png" alt=""/></a>
                            </div>
                            <p>
                                Được thành lập từ năm 2022 bởi những chàng trai 10x đầy nhiệt huyết và đam mê công nghệ, với xuất phát điểm là số vốn ít ỏi 8,5 triệu đồng cho một cửa hàng laptop nhỏ trên đường Nguyễn Thị Thập (Hồ Chí Minh) với tầm nhìn trở thành đơn vị tiên phong trong việc thay đổi mô hình bán lẻ và trải nghiệm công nghệ tại Việt Nam với chuỗi cửa hàng tiêu chuẩn mới - Dạo Bước Công Nghệ. 
                            </p>
                            <div class="ab-social">
                                <a href="#"><i class="twi-facebook"></i></a>
                                <a href="#"><i class="twi-twitter"></i></a>
                                <a href="#"><i class="twi-instagram"></i></a>
                                <a href="#"><i class="twi-linkedin"></i></a>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-4 col-custome-2">
                        <aside class="widget">
                            <h3 class="widget-title">Tài khoản</h3>
                            <ul>
                                <li><a href="#">Trang cá nhân</a></li>
                                <li><a href="#">Giỏ hàng</a></li>
                                <li><a href="#">Địa chỉ</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-6 col-custome-3">
                        <aside class="widget contact-widget">
                            <h3 class="widget-title">Liên hệ</h3>
                            <p>
                                Đường số 11, KDC Phước Kiển, Xã Phước Kiển, Huyện Nhà Bè, Hồ Chí Minh
                            </p>
                            <p>
                                Phone: +84 902 34 48 35
                                Email: cskh@uitpro.vn
                            </p>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-md-6 col-custome-4">
                        <aside class="widget">
                            <h3 class="widget-title">Đăng ký</h3>
                            <form class="subscribe-form" action="#" method="post">
                                <input type="email" name="email" placeholder="abc@mail.com">
                                <button type="submit">Đăng ký<i class="twi-long-arrow-alt-right"></i></button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Ened -->

        <!-- Coryight Start -->
        <section class="copyright-section">
            <div class="container-fluid">
                <div class="copys-text"><i class="twi-copyright"></i>Công ty TNHH Công nghệ UITPRO Việt Nam. Điện thoại: 1900633579.</div>
            </div>
        </section>
        <!-- Coryight End -->

        <!-- Back To Top -->
        <a href="#" id="backtotop"><i class="twi-angle-double-up2"></i></a>

        <!-- Include All JS -->
        <script src="../asset/js/jquery.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <script src="../asset/js/modernizr.custom.js"></script>
        <script src="../asset/js/jquery.appear.js"></script>
        <script src="../asset/js/jquery-ui.js"></script>
        <script src="../asset/js/owl.carousel.min.js"></script>
        <script src="../asset/js/jquery.shuffle.min.js"></script>
        <script src="../asset/js/lightcase.js"></script>
        <script src="../asset/js/jquery.easing.1.3.js"></script>
        <script src="../asset/js/jquery.plugin.min.js"></script>
        <script src="../asset/js/jquery.countdown.min.js"></script>
        <script src="../asset/js/tweenmax.min.js"></script>

        <script src="../asset/js/jquery.themepunch.tools.min.js"></script>
        <script src="../asset/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Rev slider Add on Start -->
        <script src="../asset/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="../asset/js/extensions/revolution.extension.video.min.js"></script>
        <!-- Rev slider Add on End -->

        <script src="../asset/js/theme.js"></script>
    </body>
</html>