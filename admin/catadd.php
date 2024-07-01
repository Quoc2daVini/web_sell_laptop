<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/category.php';
?>

<?php
    $cat = new category();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $catName = $_POST['catName'];
        // if(empty($catName))
        $insertCat = $cat->insert_category($catName);
   }
?>

<!-- Page Container START -->
<div class="page-container">  
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">THÊM DANH MỤC</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="catlist.php">Danh sách danh mục</a>
                                <span class="breadcrumb-item active">Thêm danh mục</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if(isset($insertCat)){
                                echo $insertCat;
                            }
                            ?>
                            <form action="catadd.php" method="POST">
                            <h4></h4>
                            <div class="m-t-25">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control m-b-15" name="catName" placeholder="Thêm danh mục sản phẩm"/>
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