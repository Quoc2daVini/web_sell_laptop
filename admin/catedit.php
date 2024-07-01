<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/category.php';
?>

<?php
    $cat = new category();
    if (isset($_GET['catID']) || $_GET['catID'] == NULL){
        $id = $_GET['catID'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $catName = $_POST['catName'];
        $updateCat = $cat->update_category($catName, $id);
   }
?>

<!-- Page Container START -->
<div class="page-container">  
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Sửa DANH MỤC</h2>
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
                            if(isset($updateCat)){
                                echo $updateCat;
                            }
                            ?>
                            <?php
                                $get_cat_name = $cat->get_cat_by_id($id);
                                if($get_cat_name){
                                    while($result = $get_cat_name->fetch_assoc()){
                            ?>
                            <form action="" method="POST">
                            <h4></h4>
                            <div class="m-t-25">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $result['catName'] ?>" class="form-control m-b-15" name="catName" placeholder="Sửa danh mục sản phẩm"/>
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