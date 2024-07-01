<?php
    include './inc/header.php';
    include './inc/adminsidenav.php';
    include '../classes/brand.php'; ?>

<?php
    $cat = new category();
    if (isset($_GET['delID'])){
        $id = $_GET['delID'];
        $deleteCat = $cat->delete_category($id);
    }

?>
<div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Danh sách danh mục</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="#">Danh mục</a>
                                <span class="breadcrumb-item active">Danh sách danh mục</span>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                        <?php
                            if(isset($deleteCat)){
                                echo "<script type='text/javascript'>alert('$deleteCat');</script>";
                            }
                        ?>
                            <h4>Danh mục</h4>
                            <div class="m-t-25">
                            
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $cat = new category();
                                            $show_cat = $cat->show_category();
                                            if($show_cat){
                                                $i = 0;
                                                while ($result = $show_cat->fetch_assoc()){
                                                    $i++;
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $result['catName']; ?></td>
                                            <td><a href ="catedit.php?catID=<?php echo $result['catID']?>">Sửa</a>||<a onclick="return confirm('Bạn muốn xóa danh mục này?')" href ="?delID=<?php echo $result['catID']?>">Xóa</a></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
<?php
    include './inc/footer.php';
?>