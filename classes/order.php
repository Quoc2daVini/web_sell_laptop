<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
class order 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_order(){
        $query = "SELECT * FROM tbl_order ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_order($data){
        $userName = mysqli_real_escape_string($this->db->link, $data['name']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $email = mysqli_real_escape_string($this->db->link, $data['mail']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $note = mysqli_real_escape_string($this->db->link, $data['note']);
        $payment = mysqli_real_escape_string($this->db->link, $data['payment_method']);
        $sID = session_id();

        if($userName=="" || $address=="" || $email=="" || $phone=="" || $note=="" || $payment==""){
            $alert = "Các trường dữ liệu không được để trống";
            return $alert;
        }else {
                $query = "INSERT INTO tbl_order(sID, userName, userAddress, userEmail, userPhone, userNote, payment) VALUES ('$sID' ,'$userName', '$address','$email','$phone','$note','$payment')";
                $result = $this->db->insert($query);
            }

            if($result){
                $alert = "Đặt hàng thành công";
                return $alert;
            } else{
                $alert = "Đặt hàng thất bại";
                return $alert;
            }
        }
    

    public function delete_order($id)
    {
        $query = "DELETE FROM tbl_order WHERE sID = '$id'";
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