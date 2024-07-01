<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enlink - Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>
<?php
    include './classes/user.php';
    $ur = new user();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset(($_POST['submit'])) ) {
        $insertUser = $ur->insert_user($_POST);
   }
?>
<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img height="50" width="200" alt="" src="assets/images/logo.png">
                                        <h2 class="m-b-0">Đăng ký</h2>
                                       
                                    </div>
                                    <?php 
                                        if(isset($insertUser)){
                                            echo $insertUser;
                                        }
                                        ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Tên khách hàng:</label>
                                            <input type="text" name='cusName'  class="form-control" id="userName" placeholder="Tên khách hàng">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <input type="email" name='cusEmail' class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Số điện thoại:</label>
                                            <input type="text" name='cusPhone' class="form-control" id="phone" placeholder="Số điện thoại">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Địa chỉ:</label>
                                            <input type="text" name='cusAddress' class="form-control" id="phone" placeholder="Địa chỉ">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Tên tài khoản:</label>
                                            <input type="text" name='cusUser'  class="form-control" id="userName" placeholder="Tên tài khoản">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Mật khẩu:</label>
                                            <input type="password" name='cusPass' class="form-control" id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="confirmPassword">Xác nhận mật khẩu:</label>
                                            <input type="password" class="form-control" id="confirmPassword" placeholder="Xác nhận mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between p-t-15">
                                                <div class="checkbox">
                                                    <input id="checkbox" type="checkbox">
                                                    <label for="checkbox"><span>I have read the <a href="">agreement</a></span></label>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary">Đăng ký</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2019 ThemeNate</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>