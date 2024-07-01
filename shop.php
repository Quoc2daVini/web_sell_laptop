<?php
    include 'lib/session.php';
    Session::init(); 
    include 'classes/product.php'; 
    include 'classes/category.php'; 
    include 'classes/brand.php'; 
    include 'classes/cart.php';
    include 'classes/user.php';  
    include_once 'lib/database.php'; 
    include_once 'helpers/format.php';
    $db = new Database(); 
    $fm = new Format();
    $ct = new cart();
    $ur = new user();
    $cat = new category();
    $pd = new product();

    if (!isset($_GET['catID']) || $_GET['catID'] == NULL){
        echo "<script>window.location ='index.php'</script>";
    } else {
        $id = $_GET['catID'];
    }
?>

<!DOCTYPE php>
<php lang="en">
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
        <header class="header-01 inner-header fix-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="   ./index.php">
                                <img src="./asset/images/logo.png" alt="UITPro"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="mainmenu mobile-menu">
                            <div class="mobile-btn">
                                <a href="javascript: void(0);"><span>Menu</span><i class="twi-bars"></i></a>
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
                            <a class="user-login" href="javascript:void(0);"><i class="twi-user-circle"></i><span>Account</span></a>
                            <a class="carts" href="./cart.php"><img src="./asset/images/cart.png" alt=""></a>
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
        <!-- Popup Search -->

        <!-- Banner Start -->
        <section class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="round-shape"></span>
                        <h2 class="banner-title"><?php $catname = $cat->get_cat_by_id($id);
                        $rs = $catname->fetch_assoc();
                         echo $rs['catName'];  ?></h2>
                        <div class="bread-crumb"><a href="index.php">home</a> / shop / <?php echo $rs['catName'];  ?></div>
                        <div class="banner-img">
                            <img src="../asset/images/shop/banner2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- Shop Section Start -->
        <section class="shop-left-sidebar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="shop-sidebar">
                            <aside class="widget widget-categories">
                                <h3 class="widget-title">Thương hiệu</h3>
                                <ul>
                                    <li><a href="shopbybrand.php?brandID=1">Apple</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=2">Razer</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=3">Lenovo</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=4">Dell</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=5">LG</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=6">HP</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=7">Asus</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=8">Acer</a><i ></i></li>
                                    <li><a href="shopbybrand.php?brandID=9">Gigabyte</a><i ></i></li>

                                    <li>
                                        <a href="#">Khuyến mãi</a>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="widget">
                                <h3 class="widget-title"></h3>
                                <div class="price_slider_wrapper">
                                    <form action="#" method="get" class="clearfix">
                                        <div id="slider-range"></div>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="results">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="sort-view">
                                    <a class="view-mode active" href="#"><i class="twi-th"></i></a>
                                    <a class="view-mode" href="#"><i class="twi-bars"></i></a>
                                    <div class="sorts">
                                        <select name="sort">
                                            <option value="">Default Sorting</option>
                                            <option selected="selected" value="">low to high</option>
                                            <option value="">high to low</option>
                                            <option value="">Best Seller</option>
                                            <option value="">Popular Products</option>
                                        </select>
                                        <i class="twi-angle-down1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $pd_cat = $pd->get_product_by_cat($id);
                            if ($pd_cat){
                                while ($result=$pd_cat->fetch_assoc()){
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-shop-product">
                                    
                                    <img width="245" height="245" src="admin/uploads/<?php echo $result['image']; ?>">
                                        
                                    
                                    <div class="sp-details">
                                        <h4><?php echo $result['productName'] ?></h4>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <ins><span><span class="woocommerce-Price-currencySymbol"></span><?php echo $result['price'] ?> VND</span></ins>
                                            </span>         
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="./single-product.php?productID=<?php echo $result['productID'] ?>"><i class="twi-cart-plus"></i><span>Chi tiết sản phẩm</span></a>
                                            <!-- <a class="sp-wishlist" href="#"><i class="twi-heart2"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="row">
                            <!-- <div class="col-lg-10 offset-lg-1 col-md-12 mt-20">
                                <div class="pagniation text-center clearfix">
                                    <a class="prev" href="#"><i class="twi-long-arrow-alt-left"></i></a>
                                    <span class="current">1</span>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a class="next" href="#"><i class="twi-long-arrow-alt-right"></i></a>
                                </div>
                            </div> -->
                        </div> 
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->

        <!-- Footer Start -->
        <footer class="footer-01">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <aside class="widget about-widget">
                            <div class="foo-logo">
                                <a href="./index.php"><img src="../asset/images/logo.png" alt=""/></a>
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
</php>