<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
class product 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catID = mysqli_real_escape_string($this->db->link, $data['catID']);
        $brandID = mysqli_real_escape_string($this->db->link, $data['brandID']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $feature = mysqli_real_escape_string($this->db->link, $data['feature']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        // $alert ="alert";
        // return $alert;
        if($productName=="" || $catID=="" || $brandID=="" || $productDesc=="" || $price=="" || $feature=="" || $file_name==""){
            $alert = " Các trường dữ liệu không được để trống";
            return $alert;
        } else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName, catID, brandID, productDesc, price, feature, image) VALUES ('$productName', '$catID','$brandID','$productDesc','$price','$feature','$unique_image')";
            $result = $this->db->insert($query);
            
            if($result){
                $alert ="Thêm sản phẩm thành công!";
                return $alert;
            } else{
                $alert ="Thêm sản phẩm không thành công!";
                return $alert;
            }
        }
    }
    
    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catID = mysqli_real_escape_string($this->db->link, $data['catID']);
        $brandID = mysqli_real_escape_string($this->db->link, $data['brandID']);
        $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $feature = mysqli_real_escape_string($this->db->link, $data['feature']);
        
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName=="" || $catID=="" || $brandID=="" || $productDesc=="" || $price=="" || $feature==""){
            $alert = "Các trường dữ liệu không được để trống";
            return $alert;
        } else {
            if(!empty($file_name)){
                if($file_size > 2048666666){
                    $alert = "Độ lớn file ảnh nên nhỏ hơn 2MB!";
                    return $alert;
                } elseif(in_array($file_ext, $permited) === false){
                    $alert = "Bạn chỉ có thể thêm file ảnh với các định dạng:-".implode(', ', $permited)."";
                    return $alert;            
                }
            $query = "UPDATE tbl_product SET 
            productName = '$productName',
            catID = '$catID',
            brandID = '$brandID',
            productDesc = '$productDesc',
            price = '$price',
            feature = '$feature',
            image = '$unique_image'
            WHERE productID = '$id'";
            } else{
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                catID = '$catID',
                brandID = '$brandID',
                productDesc = '$productDesc',
                price = '$price',
                feature = '$feature'

                WHERE productID = '$id'";
            }

            $result = $this->db->update($query);
            
            if($result){
                $alert ="Sửa sản phẩm thành công!";
                return $alert;
            } else{
                $alert ="Sửa sản phẩm không thành công!";
                return $alert;
            }
        }      
    }

    public function delete_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productID = '$id'";
        $result = $this->db->delete($query);
            
        if($result){
            $alert ="Xóa sản phẩm thành công!";
            return $alert;
        } else{
            $alert ="Xóa sản phẩm không thành công!";
            return $alert;
        }
    }

    public function show_product(){
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID 
        INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID
        ORDER BY tbl_product.productID asc";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_all_product(){
        $query = "SELECT * FROM tbl_product ORDER BY productID asc;";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_by_id($id){
        $query = "SELECT * FROM tbl_product WHERE productID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_by_cat($catID){
        $query = "SELECT * FROM tbl_product WHERE catID = '$catID'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product_by_brand($id){
        $query = "SELECT * FROM tbl_product WHERE brandID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_featured(){
        $query = "SELECT * FROM tbl_product WHERE feature = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_popupar(){
        $query = "SELECT * FROM tbl_product WHERE popular = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_detail($id){
        $query = "SELECT p.*, c.catName, b.brandName FROM tbl_product p, tbl_category c, tbl_brand b WHERE p.catID = c.catID and p.brandID = b.brandID and p.productID = '$id';";
        $result = $this->db->select($query);
        return $result;
    }
}
?>