<?php
    
    include 'lib/session.php';
    include './classes/user.php';
    $ur = new user();
    
        $login_check= Session::get('userlogin');
        if ($login_check){
        header('Location:cart.php');
    } 
    $login_customer = NULL;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $login_customer = $ur->login($_POST);
    
   }
?>
<?php 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UIT Pro - Log in</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                <form action="login.php" method="post">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img height="45" width="145" alt="" src="./assets/images/logo.png" alt="UITPro"/>
                                        <h2 class="m-b-0">Đăng nhập</h2>
                                    </div>
                                    <?php if($login_customer){
                                        echo $login_customer;
                                    } ?>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Tên tài khoản:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" required="" name="cusUser" placeholder="Tên tài khoản">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Mật khẩu:</label>
                                            <a class="float-right font-size-13 text-muted" href="">Quên mật khẩu?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" required="" name="cusPass" placeholder="Mật khẩu">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Không có tài khoản?
                                                    <a class="small" href="signup.php">Đăng ký</a>
                                                </span>
                                                <input type="submit" name="login" class="btn btn-primary"value="Đăng nhập">
                                            </div>
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
    <script src="assets/js/vendors.min.js"></script>
    <script src="assets/js/app.min.js"></script>
</body>
</html>