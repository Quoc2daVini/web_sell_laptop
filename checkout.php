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
    include 'classes/order.php';  
    $ord = new order();
    $db = new Database(); 
    $fm = new Format();
    $ct = new cart();
    $ur = new user();
    $cat = new category();
    $pd = new product();
    
    
?>
<?php
    $insertOrder = NULL;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset(($_POST['submit'])) ) {
        $insertOrder = $ord->insert_order($_POST);
   }
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
        <header class="header-01 inner-header fix-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
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
                            <a class="carts" href="./cart.php"><img width="22" height="22" src="./asset/images/cart.png" alt=""></a>
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
                        <h2 class="banner-title">Đặt hàng</h2>
                        <div class="bread-crumb"><a href="index.php">Trang chủ</a> / Đặt hàng</div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- Checkout Section Start -->
        <section class="checkout-section">
            
            <div class="container">
                <?php if(isset($insertOrder)){
                    echo $insertOrder;
                } ?>
                <form action="" method="POST">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="woocommerce-billing-fields">
                            <h3>Thông tin đặt hàng</h3>
                            <div class="row">
                                <p class="col-lg-12">
                                    <label>Họ và tên</label>
                                    <input name="name" type="text">
                                </p>

                                <p class="col-lg-12">
                                    <label>Địa chỉ nhận hàng</label>
                                    <input name="address" type="text">
                                </p>

                                <p class="col-lg-6">
                                    <label>Email</label>
                                    <input placeholder="" name="mail" type="email">
                                </p>
                                <p class="col-lg-6">
                                    <label>Số điện thoại</label>
                                    <input placeholder="" name="phone" type="tel">
                                </p>

                                <p class="col-lg-12">
                                    <label>Order Note</label>
                                    <textarea name="note" placeholder=""></textarea>
                                </p>

                                <p class="col-lg-12 account">
                                    <input name="ship-address" value="2" type="checkbox" id="ship_add">
                                    <label for="ship_add">Ship to another address</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="woocommerce-checkout-review-order" id="order_review">
                            <h3>Đơn hàng của bạn</h3>
                            <table class="check-table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Tên sản phẩm</th>
                                        <th class="product-price">Đơn giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-total">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $get_pd_cart = $ct->get_product_cart();
                                    $total = 0;
                                    $subtotal = 0;
                                    if($get_pd_cart){
                                        while($result = $get_pd_cart->fetch_assoc()){
                                    ?>
                                    <tr class="cart-item">
                                        <td class="product-name"><?php echo $result['productName'] ?></td>
                                        <td class="product-price"><?php echo $result['price'].'VND' ?></td>
                                        <td class="product-quantity "><?php echo $result['quantity'] ?></td>
                                        <td class="product-total">
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span><span class="woocommerce-Price-currencySymbol"></span><?php $total=$result['quantity'] * $result['price']; echo $total; ?>VND</span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                    $subtotal += $total;
                                        } 
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span><span class="woocommerce-Price-currencySymbol"></span><?php echo $subtotal.'VND'; ?> </span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Shipping</th>
                                        <td>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span><span class="woocommerce-Price-currencySymbol"></span></span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span><span class="woocommerce-Price-currencySymbol"></span><?php echo $subtotal.'VND'; ?></span>
                                                </span>           
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="woocommerce-checkout-payment" id="payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    <li class="wc_payment_method payment_method_bacs">
                                        <input checked="checked" value="1" name="payment_method" class="input-radio" id="payment_method_bacs" type="radio">
                                        <label for="payment_method_bacs">Internet Banking</label>
                                        <div class="payment_box payment_method_bacs visibales">
                                            <p>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cod">
                                        <input value="2" name="payment_method" class="input-radio" id="payment_method_cod" type="radio">
                                        <label for="payment_method_cod">Thanh toán khi nhận hàng(COD)</label>
                                        <div class="payment_box payment_method_cod">
                                            <p>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_paypal">
                                        <input value="3" name="payment_method" class="input-radio" id="payment_method_paypal" type="radio">
                                        <label for="payment_method_paypal">VISA/MASTERCARD<i class="twi-cc-mastercard"></i><i class="twi-cc-visa"></i><i class="twi-cc-paypal"></i><i class="twi-cc-discover"></i></label>
                                        <div class="payment_box payment_method_paypal">
                                            <p>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="place-order">
                                <input type="submit" name="submit" class="button" value="Đặt hàng">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

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
                                <input type="email" name="" placeholder="abc@mail.com">
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