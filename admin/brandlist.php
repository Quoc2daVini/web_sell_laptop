<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/brand.php'; ?>
<?php
    $brand = new brand();
    if (isset($_GET['delID'])){
        $id = $_GET['delID'];
        $deletebrand = $brand->delete_brand($id);
    }

?>
<div class="page-container">

                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">THƯƠNG HIỆU</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="#">Thương hiệu</a>
                                <span class="breadcrumb-item active">Danh sách thương hiệu</span>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                        <?php
                            if(isset($deletebrand)){
                                echo "<script type='text/javascript'>alert('$deletebrand');</script>";
                            }
                        ?>
                            <h4>Danh sách thương hiệu</h4>
                            <div class="m-t-25">
                            
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên thương hiệu</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $brand = new brand();
                                            $show_brand = $brand->show_brand();
                                            if($show_brand){
                                                $i = 0;
                                                while ($result = $show_brand->fetch_assoc()){
                                                    $i++;
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $result['brandID']; ?></td>
                                            <td><?php echo $result['brandName']; ?></td>
                                            <td><a href ="brandedit.php?brandID=<?php echo $result['brandID']?>">Sửa</a>  ||  <a onclick="return confirm('Bạn muốn xóa thương hiệu này?')" href ="?delID=<?php echo $result['brandID']?>=">Xóa</a></td>
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
