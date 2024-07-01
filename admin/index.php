<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
?>
<?php include '../classes/product.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/brand.php'; ?>

<?php
    $pd = new product();
    if (isset($_GET['delID'])){
        $id = $_GET['delID'];
        $deleteProduct = $pd->delete_product($id);
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
                                <a class="breadcrumb-item" href="#">Sản phẩm</a>
                                <span class="breadcrumb-item active">Danh sách sản phẩm</span>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                        <?php
                            if(isset($deleteProduct)){
                                echo "<script type='text/javascript'>alert('$deleteProduct');</script>";
                            }
                        ?>
                            <h4>Danh sách sản phẩm</h4>
                            <div class="m-t-25">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th> 
                                                <th scope="col">ID</th>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Danh mục</th>
                                                <th scope="col">Thương hiệu</th>
                                                <th scope="col">Chi tiết sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Loại</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $pdList = $pd->show_product();
                                            if($pdList){
                                                $i = 0;
                                                while($result = $pdList->fetch_assoc()){ 
                                                    $i++;     
                                                                               
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['productID']; ?></td>
                                                <td><img width="50" height="50" src="uploads/<?php echo $result['image']; ?>"></td>
                                                <td><?php echo $result['productName']; ?></td>
                                                <td><?php echo $result['catName']; ?></td>
                                                <td><?php echo $result['brandName']; ?></td>
                                                <td><?php echo $result['productDesc']; ?></td>
                                                <td><?php echo $result['price']; ?></td>
                                                <td><?php 
                                                    if($result['feature']==0){
                                                        echo "Không nổi bật";
                                                    } else echo "Nổi bật";
                                                 ?></td>
                                                 
                                                <td><a href ="productedit.php?productID=<?php echo $result['productID']?>">Sửa</a>    <a onclick="return confirm('Bạn muốn xóa sản phẩm này?')" href ="?delID=<?php echo $result['productID']?>">Xóa</a></td>

                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
                <!-- Content Wrapper END -->
<?php
    include './inc/footer.php';
?>