<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
class category 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if(empty($catName)){
            $alert = "Tên danh mục không được để trống";
            return $alert;
        } else{
            $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
            $result = $this->db->insert($query);
            
            if($result){
                $alert ="Thêm danh mục thành công!";
                return $alert;
            } else{
                $alert ="Thêm danh mục không thành công!";
                return $alert;
            }
        }
    }
    
    public function update_category($catName, $id)
    {
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if(empty($catName)){
            $alert = "Tên danh mục không được để trống";
            return $alert;
        } else{
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catID = '$id'";
            $result = $this->db->update($query);
            
            if($result){
                $alert ="Sửa danh mục thành công!";
                return $alert;
            } else{
                $alert ="Sửa danh mục không thành công!";
                return $alert;
            }
        }
    }
    public function delete_category($id)
    {
        $query = "DELETE FROM tbl_category WHERE catID = '$id'";
        $result = $this->db->delete($query);
            
        if($result){
            $alert ="Xóa danh mục thành công!";
            return $alert;
        } else{
            $alert ="Xóa danh mục không thành công!";
            return $alert;
        }
    }
    

    public function show_category(){
        $query = "SELECT * FROM tbl_category ORDER BY catID ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_cat_by_id($id){
        $query = "SELECT * FROM tbl_category WHERE catID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>