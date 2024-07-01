<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/order.php'; 
    include '../classes/cart.php'; 
    ?>
<?php
    $ur = new order();
    if (isset($_GET['delID'])){
        $id = $_GET['delID'];
        $deleteuser = $ur->delete_order($id);
    }

?>
<div class="page-container">

                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Danh sách đặt hàng</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Đơn đặt hàng</a>
                                <span class="breadcrumb-item active">Danh sách đơn đặt hàng</span>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                        <?php
                            if(isset($deleteuser)){
                                echo "<script type='text/javascript'>alert('$deleteuser');</script>";
                            }
                        ?>
                            <h4>Danh sách người dùng    </h4>
                            <div class="m-t-25">
                            
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tên người dùng</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Note</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $show_user = $ur->show_order();
                                            if($show_user){
                                                $i = 0; 
                                                while ($result = $show_user->fetch_assoc()){
                                                    $i++; 
                                                    $ct = new cart();
                                                    $c = $ct->get_product_cart();
                                                    while ($rs= $c->fetch_assoc()){   
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $result['id']; ?></td>
                                            <td><?php echo $rs['productName']; ?></td>
                                            <td><?php echo $rs['quantity']; ?></td>
                                            <td><?php echo $rs['price']; ?></td>
                                            <td><?php echo $result['userName']; ?></td>
                                            <td><?php echo $result['userAddress']; ?></td>
                                            <td><?php echo $result['userEmail']; ?></td>
                                            <td><?php echo $result['userPhone']; ?></td>
                                            <td><?php echo $result['userNote']; ?></td>
                                            <td><a onclick="return confirm('Bạn muốn xóa người dùng này?')" href ="?delID=<?php echo $result['sID']?>=">Xóa</a></td>
                                        </tr>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên thương hiệu</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            </div>
                    </div>
 </div>
<?php
    include './inc/footer.php';
?>
x