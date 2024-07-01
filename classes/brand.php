<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
class brand 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        if(empty($brandName)){
            $alert = "Tên thương hiệu không được để trống";
            return $alert;
        } else{
            $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
            $result = $this->db->insert($query);
            
            if($result){
                $alert ="Thêm thương hiệu thành công!";
                return $alert;
            } else{
                $alert ="Thêm thương hiệu không thành công!";
                return $alert;
            }
        }
    }
    
    public function update_brand($brandName, $id)
    {
        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        if(empty($brandName)){
            $alert = "Tên thương hiệu không được để trống";
            return $alert;
        } else{
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandID = '$id'";
            $result = $this->db->update($query);
            
            if($result){
                $alert ="Sửa thương hiệu thành công!";
                return $alert;
            } else{
                $alert ="Sửa thương hiệu không thành công!";
                return $alert;
            }
        }
    }
    public function delete_brand($id)
    {
        $query = "DELETE FROM tbl_brand WHERE brandID = '$id'";
        $result = $this->db->delete($query);
            
        if($result){
            $alert ="Xóa thương hiệu thành công!";
            return $alert;
        } else{
            $alert ="Xóa thương hiệu không thành công!";
            return $alert;
        }
    }
    

    public function show_brand(){
        $query = "SELECT * FROM tbl_brand ORDER BY brandID ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_brand_by_id($id){
        $query = "SELECT * FROM tbl_brand WHERE brandID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>