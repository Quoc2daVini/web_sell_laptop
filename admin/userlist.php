<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/user.php'; ?>
<?php
    $ur = new user();
    if (isset($_GET['delID'])){
        $id = $_GET['delID'];
        $deleteuser = $ur->delete_user($id);
    }

?>
<div class="page-container">

                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Người dùng</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Người dùng</a>
                                <span class="breadcrumb-item active">Danh sách người dùng</span>
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
                                            <th>Tên người dùng</th>
                                            <th>Tên tài khoản</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $ur = new user();
                                            $show_user = $ur->show_user();
                                            if($show_user){
                                                $i = 0;
                                                while ($result = $show_user->fetch_assoc()){
                                                    $i++;
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $result['cusID']; ?></td>
                                            <td><?php echo $result['cusName']; ?></td>
                                            <td><?php echo $result['cusUser']; ?></td>
                                            <td><?php echo $result['cusAddress']; ?></td>
                                            <td><?php echo $result['cusEmail']; ?></td>
                                            <td><?php echo $result['cusPhone']; ?></td>
                                            <td><<a onclick="return confirm('Bạn muốn xóa người dùng này?')" href ="?delID=<?php echo $result['cusID']?>=">Xóa</a></td>
                                        </tr>
                                        <?php
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
