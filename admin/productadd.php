<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
?>

<?php include '../classes/product.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/brand.php'; ?>

<?php 
    // include '../classes/classes.php';
?>

<?php
    $pd = new product();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset(($_POST['submit'])) ) {
        $insertProduct = $pd->insert_product($_POST, $_FILES);
   }
?>

<!-- Page Container START -->
<div class="page-container">  
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">SẢN PHẨM</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="productlist.php">Danh sách sản phẩm</a>
                                <span class="breadcrumb-item active">Thêm sản phẩm</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if(isset($insertProduct)){
                                echo $insertProduct;
                            }
                            ?>
                            <form action="productadd.php" method="POST" enctype="multipart/form-data">
                            <!-- <div class="m-t-25"> -->
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Tên sản phẩm</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="productName" >
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Danh mục</span>
                                        </div>
                                        <select class="btn btn-default dropdown-toggle" name="catID" aria-describedby="basic-addon1">
                                            <option>Chọn danh mục</option>
                                            <?php 
                                            $cat = new category();
                                            $catlist = $cat->show_category();
                                            if($catlist){
                                                while($result = $catlist->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select> 
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Thương hiệu</span>
                                        </div>
                                        <select class="btn btn-default dropdown-toggle" name="brandID" aria-describedby="basic-addon1">
                                            <option>Chọn thương hiệu</option>
                                            <?php 
                                            $brand = new brand();
                                            $brandlist = $brand->show_brand();
                                            if($brandlist){
                                                while($result = $brandlist->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['brandID'] ?>"><?php echo $result['brandName'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Mô tả</span>
                                        </div>
                                        <textarea class="form-control" name="productDesc" aria-describedby="basic-addon1"></textarea>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Giá</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" name="price" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Nổi bật</span>
                                        </div>
                                        <select class="btn btn-default dropdown-toggle" name="feature" aria-describedby="basic-addon1">
                                            <option>Chọn loại sản phẩm</option>
                                            <option value="1">Nổi bật</option>
                                            <option value="0">Không nổi bật</option>

                                        </select>
                                    </div>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="customFile">Upload hình ảnh</label>
                                    </div>
                                    
                                    <div>
                                         <input type="submit" name="submit" class="btn btn-primary btn-tone m-r-5" required="" value="Thêm"/>
                                    </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            </form>
                        </div>
                    </div>   

</div>
            <!-- Page Container END -->

<?php
    include './inc/footer.php';
?>