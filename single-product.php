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
    $b = new brand();
    $ur = new user();
    $cat = new category();
    $pd = new product();
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
                                    <a href="javascript:void(0);">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.php?catID=1">Laptop</a></li>
                                        <li><a href="shop.php?catID=2">Màn hình</a></li>
                                        <li><a href="shop.php?catID=8">PC</a></li>
                                        <li><a href="shop.php?catID=5">Thiết bị ngoại vi</a></li>
                                        <li><a href="shop.php?catID=3">Linh kiện</a></li>
                                        <li><a href="shop.php?catID=4">Âm thanh</a></li>
                                        <li><a href="404.php">Ghế công thái học</a></li>
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
    <?php
    $id = NULL;
    if (isset($_GET['productID'])){
        $id = $_GET['productID'];
    }
    $quantity = 0;
    $add_to_cart = null;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset(($_POST['submit'])) ) {
        $quantity = $_POST['qty'];
        $add_to_cart = $ct->add_to_cart($id, $quantity);
    }

    ?>
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
            <?php
                $pd_detail = $pd->get_product_detail($id);
                if($pd_detail){
                    while($result_detail = $pd_detail->fetch_assoc()){
            ?>

        <!-- Banner Start -->
        <section class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="round-shape"></span>
                        <h2 class="banner-title">Chi tiết sản phẩm</h2>
                        <div class="bread-crumb"><a href="index.php">Trang chủ</a> / <a href="index.php">Tất cả sản phẩm </a> / <?php echo $result_detail['productName'] ?></div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Banner End -->

        <!-- Shop Section Start -->
        <section class="single-product-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <img width="500" height="560" src="admin/uploads/<?php echo $result_detail['image']; ?>">
                        
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="sin-product-details">
                            <h3><?php echo $result_detail['productName']; ?></h3>
                            <div class="woocommerce-product-rating">
                                <div class="star-rating">
                                    <i class="twi-star"></i>
                                    <i class="twi-star"></i>
                                    <i class="twi-star"></i>
                                    <i class="twi-star"></i>
                                    <span>
                                        <i class="twi-star"></i>
                                    </span>
                                </div>
                                <a href="#" class="woocommerce-review-link"><span class="count">03</span> đánh giá từ khách hàng
                                </a>
                            </div>
                            <div class="product-price clearfix">
                                <span class="price">
                                    <span><span class="woocommerce-Price-currencySymbol"></span><?php echo $result_detail['price']; ?> VNĐ</span>
                                </span>         
                            </div>
                            <div class="pro-excerp">
                                <p>
                                <?php echo $result_detail['productDesc']; ?>                                </p>
                            </div>
                            <div class="product-color">
                                <h5>Color</h5>
                                <div class="color-1"></div>
                                <div class="color-2"></div>
                                <div class="color-3"></div>
                            </div>
                            <!-- <div class="product-size">
                                <h5>Size:</h5>
                                <div class="size-wrapper">
                                    <div class="size-btn clearfix">
                                        <input type="radio" id="x" name="size" value="x">
                                        <label for="x">x</label>  
                                    </div>
                                    <div class="size-btn clearfix">
                                        <input type="radio" id="xr" name="size" value="xr">
                                        <label for="xr">XR</label>    
                                    </div>
                                    <div class="size-btn clearfix">
                                        <input checked="checked" type="radio" id="xs" name="size" value="xs">
                                        <label for="xs">xs</label>    
                                    </div>
                                    <div class="size-btn clearfix">
                                        <input type="radio" id="xm" name="size" value="xm">
                                        <label for="xm">xm</label>    
                                    </div>
                                </div>
                            </div> -->
                            <form action="" method="post">
                                <div class="product-cart-qty">
                                    <div class="quantityd clearfix">
                                        <button class="qtyBtn btnMinus"><span>-</span></button>
                                        <input name="qty" value="1" title="Qty" class="input-text qty text carqty" type="text">
                                        <button class="qtyBtn btnPlus">+</button>
                                    </div>
                                    <input type="submit" name="submit" href="cart.php" class="add-to-cart-btn" value="Thêm vào giỏ hàng">
                                    <a href="#" class="Whislist"><i class="twi-heart"></i></a>
                                    <a href="#" class="compare"><i class="twi-random"></i></a>
                                </div>
                                <?php 
                                $check_cart = $add_to_cart;
                                if($check_cart == 1){
                                            echo '<span style = "color:red; font-size:18x;"> Sản phẩm đã tồn tại trong giỏ hàng</span/';
                                } else if($check_cart == 2) { echo '<span style = "color:blue; font-size:18x;">Thêm sản phẩm vào giỏ hàng thành công</span/'; } ?> 
                            </form>
                                <div class="pro-socila">
                                    <a href="#"><i class="twi-facebook"></i></a>
                                    <a href="#"><i class="twi-twitter-square"></i></a>
                                    <a href="#"><i class="twi-pinterest-square"></i></a>
                                </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row"><div class="col-lg-12"><div class="divider"></div></div></div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="product-tabarea">
                            <ul class="nav nav-tabs productTabs" id="productTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="descriptions-tab" data-toggle="tab" href="#descriptions" role="tab" aria-controls="descriptions" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (2)</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="productTabContent">
                                <div class="tab-pane fade show active" id="descriptions" role="tabpanel" aria-labelledby="descriptions-tab">
                                    <div class="descriptionContent">
                                        <p>
                                        <?php echo $result_detail['productDesc']; ?> 
                                        </p>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="descriptions-tab">
                                    <div class="comment-area">
                                        <h4 class="comment-title">2 Reviews to “Gaming Controller”</h4>
                                        <ol class="comment-list">
                                            <li>
                                                <div class="single-comment">
                                                    <img src="../asset/images/blog/c1.jpg" alt="">
                                                    <h5><a href="#">Jason Statham</a><span>July 06th, 2017</span></h5>
                                                    <div class="comment">
                                                        <p>
                                                            sapien lorem  et tristique nulla lectus fauc-ibus est Pellentesque dapibus
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="single-comment">
                                                    <img src="../asset/images/blog/c1.jpg" alt="">
                                                    <h5><a href="#">Jason Statham</a><span>July 06th, 2017</span></h5>
                                                    <div class="comment">
                                                        <p>
                                                            Proin vitae dignissim enim, a iaculis sapien. nisi et dignissim efficitur
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                        <div class="comment-form-wrapper">
                                            <h5>Add Reivew</h5>
                                            <form action="#" method="post" class="row comment-form">
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="text" name="name" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="email" name="email" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <textarea name="message" placeholder="Reviews"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <input type="" name="" value="Submit Review">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="product-speciality">
                            <h5>Specifications</h5>
                            <ul>
                                <?php 
                                $gc = $cat->get_cat_by_id($id);
                                $rs = $gc->fetch_assoc();
                                $gb = $b->get_brand_by_id($id);
                                $res = $gb->fetch_assoc();
                                ?>
                                <li>Danh mục: <?php echo $rs['catName']; ?></li>
                                <li>Thương hiệu: <?php echo $res['brandName']; ?> </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="related-product-area">
                            <h3>Related Products</h3>
                            <div class="related-slider owl-carousel">
                                <div class="single-shop-product">
                                    <div class="sp-thumb">
                                        <img src="../asset/images/shop/5.jpg" alt="" class="">
                                        <div class="pro-badge">
                                            <p class="sale">Sale</p>
                                        </div>
                                    </div>
                                    <div class="sp-details">
                                        <h4>VRBOX Gaming</h4>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <del><span><span class="woocommerce-Price-currencySymbol">$</span>42.00</span></del>
                                                <ins><span><span class="woocommerce-Price-currencySymbol">$</span>38.00</span></ins>
                                            </span>         
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="#"><i class="twi-cart-plus"></i><span>Add to cart</span></a>
                                            <a class="sp-wishlist" href="#"><i class="twi-heart2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="sp-thumb">
                                        <img src="../asset/images/shop/1.jpg" alt="" class="">
                                        <div class="pro-badge">
                                            <p class="hot">Hot</p>
                                        </div>
                                    </div>
                                    <div class="sp-details">
                                        <h4>Gaming Mouse</h4>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <del><span><span class="woocommerce-Price-currencySymbol">$</span>42.00</span></del>
                                                <ins><span><span class="woocommerce-Price-currencySymbol">$</span>38.00</span></ins>
                                            </span>         
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="#"><i class="twi-cart-plus"></i><span>Add to cart</span></a>
                                            <a class="sp-wishlist" href="#"><i class="twi-heart2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="sp-thumb">
                                        <img src="../asset/images/shop/8.jpg" alt="" class="">
                                    </div>
                                    <div class="sp-details">
                                        <h4>Wirless Headset</h4>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <span><span class="woocommerce-Price-currencySymbol">$</span>122.00</span>
                                            </span>         
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="#"><i class="twi-cart-plus"></i><span>Add to cart</span></a>
                                            <a class="sp-wishlist" href="#"><i class="twi-heart2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="sp-thumb">
                                        <img src="../asset/images/shop/5.jpg" alt="" class="">
                                        <div class="pro-badge">
                                            <p class="sale">Sale</p>
                                        </div>
                                    </div>
                                    <div class="sp-details">
                                        <h4>VRBOX Gaming</h4>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <del><span><span class="woocommerce-Price-currencySymbol">$</span>42.00</span></del>
                                                <ins><span><span class="woocommerce-Price-currencySymbol">$</span>38.00</span></ins>
                                            </span>         
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="#"><i class="twi-cart-plus"></i><span>Add to cart</span></a>
                                            <a class="sp-wishlist" href="#"><i class="twi-heart2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="sp-thumb">
                                        <img src="../asset/images/shop/1.jpg" alt="" class="">
                                        <div class="pro-badge">
                                            <p class="hot">Hot</p>
                                        </div>
                                    </div>
                                    <div class="sp-details">
                                        <h4>Gaming Mouse</h4>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <del><span><span class="woocommerce-Price-currencySymbol">$</span>42.00</span></del>
                                                <ins><span><span class="woocommerce-Price-currencySymbol">$</span>38.00</span></ins>
                                            </span>         
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="#"><i class="twi-cart-plus"></i><span>Add to cart</span></a>
                                            <a class="sp-wishlist" href="#"><i class="twi-heart2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="sp-thumb">
                                        <img src="../asset/images/shop/8.jpg" alt="" class="">
                                    </div>
                                    <div class="sp-details">
                                        <h4>Wirless Headset</h4>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <span><span class="woocommerce-Price-currencySymbol">$</span>122.00</span>
                                            </span>         
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="#"><i class="twi-cart-plus"></i><span>Add to cart</span></a>
                                            <a class="sp-wishlist" href="#"><i class="twi-heart2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
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