<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/brand.php';
?>

<?php
    $brand = new brand();
    if (isset($_GET['brandID']) || $_GET['brandID'] == NULL){
        $id = $_GET['brandID'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $brandName = $_POST['brandName'];
        $updatebrand = $brand->update_brand($brandName, $id);
   }
?>

<!-- Page Container START -->
<div class="page-container">  
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Sửa thương hiệu</h2>
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
                            if(isset($updatebrand)){
                                echo $updatebrand;
                            }
                            ?>
                            <?php
                                $get_brand_name = $brand->get_brand_by_id($id);
                                if($get_brand_name){
                                    while($result = $get_brand_name->fetch_assoc()){
                            ?>
                            <form action="" method="POST">
                            <h4></h4>
                            <div class="m-t-25">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $result['brandName'] ?>" class="form-control m-b-15" name="brandName" placeholder="Sửa thương hiệu sản phẩm"/>
                                    </div>
                                    <div>
                                        <input type="submit" required="" value="Sửa"/>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php  
                                    }
                                }
                                ?>
                        </div>
                    </div>   
</div>
            <!-- Page Container END -->
<?php
    include './inc/footer.php';
?>