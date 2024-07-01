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
    
?>

<?php
if (isset($_GET['cartID'])){
    $id = $_GET['cartID'];
    $deleteProduct = $ct->delete_product_cart($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset(($_POST['submit']))) {
    $cartID = $_POST['cartID'];
    $quantity = $_POST['qty'];
    $update_quantity_cart = $ct->update_quantity_cart($cartID, $quantity);
    if($quantity <= 0){
        $deleteProduct = $ct->delete_product_cart($cartID);
    }
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
                            <h2 class="banner-title">Giỏ hàng</h2>
                            <div class="bread-crumb"><a href="index.php">Trang chủ</a> / GIỎ HÀNG</div>
                        </div>
                    </div>
                </div>
            </section>    
            <!-- Banner End -->

            <!-- Cart Section Start -->
            <section class="cart-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <form class="woocommerce-cart-form" action=""> -->
                                <table class="cart-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name-thumbnail">TÊN SẢN PHẨM</th>
                                            <th class="product-price">GIÁ</th>
                                            <th class="product-quantity">SỐ LƯỢNG</th>
                                            <th class="product-total">THÀNH TIỀN</th>
                                            <th class="product-remove">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($update_quantity_cart)){
                                            echo "<script type='text/javascript'>alert('$update_quantity_cart');</script>";
                                        }

                                        if(isset($deleteProduct)){
                                            echo "<script type='text/javascript'>alert('$deleteProduct');</script>";
                                        }
                                        ?>
                                        <!-- <div class="modal" style="position: relative;display: block;z-index: 0;overflow-y: hidden;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Thông báo</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <i class="anticon anticon-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default m-r-10" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <?php  ?>
                                        <?php
                                        $subtotal = 0;
                                        $countpro = 0;
                                        $get_product_cart = $ct->get_product_cart();
                                        if($get_product_cart){
                                            
                                            while($result = $get_product_cart->fetch_assoc()){
                                        ?>
                                        <form action="" method="post">
                                        <tr class="cart-item">
                                            <td class="product-thumbnail-title">
                                                <a href="#">
                                                <img width="50px" height="50px" src="admin/uploads/<?php echo $result['image']; ?>">
                                                </a>
                                                <a class="product-name" href="#"><?php echo $result['productName'] ?></a> 
                                            </td>
                                            <td class="product-unit-price">
                                                <div class="product-price clearfix">
                                                    <span class="price">
                                                        <span><?php echo $result['price'] ?><span class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                                                    </span>           
                                                </div>
                                            </td>
                                            
                                                <td class="product-quantity clearfix">
                                                    <div class="quantityd clearfix">
                                                        <input type="hidden" name="cartID" value="<?php echo $result['cartID'] ?>">
                                                        <button class="qtyBtn btnMinus"><span>-</span></button>
                                                        <input name="qty" value="<?php echo $result['quantity'] ?>" title="Qty" class="input-text qty text carqty" type="text">
                                                        <button class="qtyBtn btnPlus">+</button>
                                                    </div>
                                                    <div>
                                                    <input type="submit" width="100"  name="submit" class="coupon button " value="CẬP NHẬT">
                                                    </div>
                                                </td>
                                            <td class="product-total">
                                                <div class="product-price clearfix">
                                                    <span class="price">
                                                        <span><?php
                                                        $total = $result['price'] * $result['quantity'];
                                                        echo $total;
                                                         ?> <span class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                                                    </span>           
                                                </div>
                                            </td>
                                            <td class="product-remove">
                                                <a onclick="return confirm('Bạn muốn xóa sản phẩm này?')" href="?cartID=<?php echo $result['cartID'] ?>"></a>
                                            </td>
                                        </tr>
                                        </form>
                                        <?php 
                                            $subtotal += $total;
                                            $countpro += $result['quantity'];
                                            } 
                                        } ?>
                                        <tr>
                                            <td colspan="6" class="actions">
                                                <button type="submit" name="delall" class="button clear-cart">XÓA TOÀN BỘ</button>
                                                <a type="submit" href="./index.php" class="button continue-shopping">TIẾP TỤC MUA HÀNG</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="coupon">
                                            <h3>MÃ GIẢM GIÁ</h3>
                                            <p>
                                                Nhập mã giảm giá tại đây
                                            </p>
                                            <input type="text" name="coupon_code" placeholder="Nhập mã"> 
                                            <button type="submit" class="button" name="apply_coupon">KIỂM TRA</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cart-totals">
                                            <h2>TÓM TẮT ĐƠN HÀNG</h2>
                                            <table class="shop-table">
                                                <tbody>
                                                    <tr class="cart-subtotal">
                                                        <th>Tạm tính</th>
                                                        <td data-title="Subtotal">
                                                            <span class="woocommerce-Price-amount amount"><?php
                                                            if ($countpro==0) {echo 0;}
                                                            else{
                                                             echo $subtotal; }?><span class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart-subtotal">
                                                        <th>Khuyến mãi</th>
                                                        <td data-title="Subtotal">
                                                            <span class="woocommerce-Price-amount amount">0.0</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Thành tiền</th>
                                                        <td data-title="Subtotal">
                                                            <span class="woocommerce-Price-amount amount"><?php if ($countpro==0) {echo 0;}
                                                            else{
                                                             echo $subtotal; } ?>   <span class="woocommerce-Price-currencySymbol">VNĐ</span></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="wc-proceed-to-checkout">
                                                <a href="checkout.php" class="checkout-button">ĐẶT HÀNG</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Cart Section End -->

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
</html>