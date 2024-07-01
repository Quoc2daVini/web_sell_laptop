<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/brand.php';
?>

<?php
    $brand = new brand();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $brandName = $_POST['brandName'];
        $insertbrand = $brand->insert_brand($brandName);
   }
?>

<!-- Page Container START -->
<div class="page-container">  
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">THƯƠNG HIỆU</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="brandlist.php">Danh sách thương hiệu</a>
                                <span class="breadcrumb-item active">Thêm thương hiệu</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if(isset($insertbrand)){
                                echo $insertbrand;
                            }
                            ?>
                            <form action="brandadd.php" method="POST">

                            <div class="m-t-25">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control m-b-15" name="brandName" placeholder="Thêm thương hiệu"/>
                                    </div>
                                    <div>
                                        <input type="submit" required="" value="Thêm"/>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>   

</div>
            <!-- Page Container END -->
<?php
    include './inc/footer.php';
?>