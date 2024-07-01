<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
class cart 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function add_to_cart($id, $quantity){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $sID = session_id();
        $id = mysqli_real_escape_string($this->db->link, $id);

        $query = "SELECT * FROM tbl_product WHERE productID ='$id';";
        $result = $this->db->select($query)->fetch_assoc();
        // echo '<pre';
        // echo print_r($result);
        // echo '</pre>';
        $img = $result['image'];
        $pdName = $result['productName'];
        $pdPrice = $result['price'];

        $check_cart = "SELECT * FROM tbl_cart WHERE productID ='$id' AND sID = '$sID'";
        $f =  $this->db->select($check_cart);
        if ($f)
        {
            return 1;
        }
        else{
            $insert_query = "INSERT INTO tbl_cart(productID, quantity, sID, image, price, productName) VALUES ('$id', '$quantity','$sID', '$img','$pdPrice','$pdName')";
            $insert_result = $this->db->insert($insert_query);
            return 2;
        }
    }

    public function get_product_cart(){
        $sID = session_id();

        $query = "SELECT * FROM tbl_cart WHERE sID = '$sID' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity_cart($cartID, $quantity){
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartID = mysqli_real_escape_string($this->db->link, $cartID);
        $query = "UPDATE tbl_cart 
        SET quantity = '$quantity' 
        WHERE cartID = '$cartID'";
        $result = $this->db->update($query);
        if($result){
            $msg = "Cập nhật giỏ hàng thành công";
            return $msg;
        } else{
            $msg = "Không thay đổi được số lượng sản phẩm";
            return $msg;
        }
    }

    public function delete_product_cart($id)
    {
        $query = "DELETE FROM tbl_cart WHERE cartID = '$id'";
        $result = $this->db->delete($query);
            
        if($result){
            $alert ="Đã xóa sản phẩm khỏi giỏ hàng!";
            return $alert;
        } else{
            $alert ="Xóa sản phẩm không thành công!";
            return $alert;
        }
    }
}
?>