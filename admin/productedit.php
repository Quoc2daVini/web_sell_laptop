<?php

use LDAP\Result;

    include './inc/header.php';
    include './inc/adminsidenav.php';
?>


<?php include '../classes/product.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/brand.php'; ?>

<?php
    $pd = new product();
    if (!isset($_GET['productID']) || $_GET['productID'] == NULL){
        echo "<script>window.location ='productlist.php'</script>";
    } else {
        $id = $_GET['productID'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset(($_POST['submit'])) ) {
        $updateProduct = $pd->update_product($_POST, $_FILES, $id);
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
                                <span class="breadcrumb-item active">Sửa sản phẩm</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if(isset($updateProduct)){
                                echo $updateProduct;
                            }
                            ?>
                            <?php
                                $get_product = $pd->get_product_by_id($id);
                                if($get_product){
                                    while($result_product = $get_product->fetch_assoc()){
                            ?> 
                            <form action="" method="POST" enctype="multipart/form-data">
                            <!-- <div class="m-t-25"> -->
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Tên sản phẩm</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $result_product['productName'] ?>" name="productName" >
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Danh mục</span>
                                        </div>
                                        <select class="btn btn-default dropdown-toggle" id='select' name="catID" aria-describedby="basic-addon1">
                                            <option><?php 
                                            $a = new category();
                                            $al = $a->show_category();
                                            $rs = $al->fetch_assoc();
                                            echo $rs['catName'];
                                            ?></option>
                                            <?php 
                                            $cat = new category();
                                            $catlist = $cat->show_category();
                                            if($catlist){
                                                while($result = $catlist->fetch_assoc()){
                                            ?>
                                            <option
                                            <?php
                                            if($result['catID'] == $result_product['catID']){
                                                echo "'selected'";
                                            }
                                            ?>
                                            value="<?php echo $result['catID'] ?>"><?php echo $result['catName']?></option>
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
                                            <option><?php
                                            $b = new brand();
                                            $bl = $b->show_brand();
                                            $res = $bl->fetch_assoc();
                                            echo $res['brandName'] ?>
                                            </option>
                                            <?php 
                                            $brand = new brand();
                                            $brandlist = $brand->show_brand();
                                            if($brandlist){
                                                while($res = $brandlist->fetch_assoc()){
                                            ?>
                                            <option
                                            <?php
                                            if($res['brandID'] == $result_product['brandID']){
                                                echo "'selected'";
                                            }
                                            ?>
                                            value="<?php echo $res['brandID'] ?>"><?php echo $res['brandName']?></option>
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
                                        <textarea class="form-control" name="productDesc" aria-describedby="basic-addon1"><?php echo $result_product['productDesc'] ?></textarea>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Giá</span>
                                        </div>
                                        <input type="text" class="form-control" name="price" value="<?php echo $result_product['price'] ?>" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Nổi bật</span>
                                        </div>
                                        <select class="btn btn-default dropdown-toggle" id="select" name="feature" aria-describedby="basic-addon1">
                                            <option>Chọn loại sản phẩm</option>
                                            <?php
                                            if($result_product['feature'] == 1){
                                            ?>
                                            <option selected value="1" >Nổi bật</option>
                                            <option value="0" >Không nổi bật</option>
                                            <?php
                                            } else { ?>
                                            <option  value="1" >Nổi bật</option>
                                            <option selected value="0" >Không nổi bật</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <img width="100" height="100" src="uploads/<?php echo $result_product['image']; ?>">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="customFile"><?php echo $result_product ['image'] ?></label><br>
                                        
                                    </div>
                                    
                                    <div>
                                        <input type="submit" name="submit" class="btn btn-primary btn-tone m-r-5" required="" value="Sửa"/>
                                    </div>
                                    </div>
                                </div>
                            <!-- </div> -->
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