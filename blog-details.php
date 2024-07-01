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
                        <h2 class="banner-title">DỊCH VỤ Details</h2>
                        <div class="bread-crumb"><a href="index.html">home</a> / DỊCH VỤ</div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- DỊCH VỤ Section Start -->
        <section class="blog-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-blog">
                            <div class="blog-thumb">
                                <img src="../asset/images/blog/blog-details.jpg" alt="">
                            </div>
                            <div class="blog-post-meta">
                                <span><img src="../asset/images/blog/author.jpg" alt="">By <a href="#">Admin</a>, 1 week a go </span>
                                <span class="cate"><a href="#">Smarphones</a></span>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="social-share">
                                        <h5>Share:</h5>
                                        <a href="#"><i class="twi-facebook-f"></i></a>
                                        <a href="#"><i class="twi-twitter"></i></a>
                                        <a href="#"><i class="twi-google-plus-g"></i></a>
                                        <a href="#"><i class="twi-behance"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="blog-content">
                                        <h3 class="blog-title">
                                            Proin vitae dignissim enim, a iaculis sapien. nisi et dign
                                            sim efficitur, sapien lorem porta lorem.
                                        </h3>
                                        <p>
                                            Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero. Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate, tortor nec commodo ultricies, lectus nisl facilisis enim, vitae viverra urna nulla sed turpis. Nullam lacinia faucibus risus.
                                        </p>
                                        <p>
                                            Donec gravida malesuada lacus, eget tristique Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate, tortor nec commodo ultricies, lectus nisl facilisis enim, vitae viverra urna nulla sed turpis. Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus placerat tempor.
                                        </p>
                                        <h4>Features:</h4>
                                        <ul>
                                            <li>5.5 “ Screen, 1080 x 1920 screen size</li>
                                            <li>10 cm height</li>
                                            <li>7 hours calling time</li>
                                            <li>20 MP Camera</li>
                                            <li>12 MP Selfie Camera</li>
                                        </ul>
                                        <div class="post-tag">
                                            <h5>Tag: <a href="#"> Smartphone</a></h5>
                                        </div>
                                    </div>
                                    <div class="comment-area">
                                        <h4 class="comment-title">COMMENT: <span>2</span></h4>
                                        <ol class="comment-list">
                                            <li>
                                                <div class="single-comment">
                                                    <img src="../asset/images/blog/c1.jpg" alt="">
                                                    <h5><a href="#">Jason Statham</a><span>July 06th, 2017</span></h5>
                                                    <div class="comment">
                                                        <p>
                                                            Proin vitae dignissim enim, a iaculis sapien. nisi et dignissim efficitur, sapien lorem  et tristique nulla lectus fauc-ibus est Pellentesque dapibus
                                                        </p>
                                                    </div>
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                </div>
                                                <ul class="children">
                                                    <li>
                                                        <div class="single-comment">
                                                            <img src="../asset/images/blog/c2.jpg" alt="">
                                                            <h5><a href="#">Herbie Darbage</a><span>July 06th, 2017</span></h5>
                                                            <div class="comment">
                                                                <p>
                                                                    Proin vitae dignissim enim, a iaculis sapien. nisi et dignissim efficitur, sapien lorem  et tristique nulla lectus faucibus est Pellentesque dapibus
                                                                </p>
                                                            </div>
                                                            <a class="comment-reply-link" href="#">Reply</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="single-comment">
                                                    <img src="../asset/images/blog/c1.jpg" alt="">
                                                    <h5><a href="#">Jason Statham</a><span>July 06th, 2017</span></h5>
                                                    <div class="comment">
                                                        <p>
                                                            Proin vitae dignissim enim, a iaculis sapien. nisi et dignissim efficitur, sapien lorem  et tristique nulla lectus fauc-ibus est Pellentesque dapibus
                                                        </p>
                                                    </div>
                                                    <a class="comment-reply-link" href="#">Reply</a>
                                                </div>
                                            </li>
                                        </ol>
                                        <div class="comment-form-wrapper">
                                            <h5>LEAVE A COMMENT</h5>
                                            <form action="#" method="post" class="row comment-form">
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="text" name="name" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="email" name="email" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <textarea name="message" placeholder="Your message"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <input type="submit" name="submit" value="post">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- DỊCH VỤ Section End -->

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