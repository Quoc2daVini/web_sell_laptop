<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>

<?php
class user 
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login($data)
    {
 
        $cusUser = mysqli_real_escape_string($this->db->link, $data['cusUser']);
        $cusPass = mysqli_real_escape_string($this->db->link, $data['cusPass']);

        if(empty($cusUser) || empty($cusPass)){
            $alert = "Tên tài khoản và mật khẩu không được để trống";
            return $alert;
        }
        else{
            $query = "SELECT * FROM tbl_customer WHERE cusUser = '$cusUser' AND cusPass = '$cusPass'";
            $result = $this->db->select($query);

            if ($result != false){
                $value = $result->fetch_assoc(); 
                Session::set('userlogin', true);
                Session::set('cusId', $value['cusID']);
                Session::set('cusUser', $value['cusUser']);
                Session::set('cusName', $value['cusName']);
                header('Location:./cart.php');
            } else {
                $alert = "Tài khoản hoặc mật khẩu không đúng!";
                return $alert;
            }
        }
    }
    
    public function show_user(){
        $query = "SELECT * FROM tbl_customer ORDER BY cusID ASC";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function delete_user($id)
    {
        $query = "DELETE FROM tbl_customer WHERE cusID = '$id'";
        $result = $this->db->delete($query);
            
        if($result){
            $alert ="Xóa người dùng thành công!";
            return $alert;
        } else{
            $alert ="Xóa người dùng không thành công!";
            return $alert;
        }
    }
    public function insert_user($data){
        $cusName = mysqli_real_escape_string($this->db->link, $data['cusName']);
        $cusEmail = mysqli_real_escape_string($this->db->link, $data['cusEmail']);
        $cusUser = mysqli_real_escape_string($this->db->link, $data['cusUser']);
        $cusPass = mysqli_real_escape_string($this->db->link, $data['cusPass']);
        $cusPhone = mysqli_real_escape_string($this->db->link, $data['cusPhone']);
        $cusAddress = mysqli_real_escape_string($this->db->link, $data['cusAddress']);

        if($cusName=="" || $cusEmail=="" || $cusUser=="" || $cusPass=="" || $cusPhone=="" || $cusAddress==""){
            $alert = "Các trường dữ liệu không được để trống";
            return $alert;
        }else {
            $check_email = "SELECT * FROM tbl_customer WHERE cusEmail = '$cusEmail'";
            $result_check = $this->db->select($check_email);
            $check_username = "SELECT * FROM tbl_customer WHERE cusUser = '$cusUser'";
            $result_check_user = $this->db->select($check_username);
            if($result_check){
                $alert = "Email đã tồn tại";
                return $alert;
            } else if($result_check_user){
                $alert = "Tên tài khoản đã tồn tại";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_customer(cusName, cusEmail, cusUser, cusPass, cusPhone, cusAddress) VALUES ('$cusName', '$cusEmail','$cusUser','$cusPass','$cusPhone','$cusAddress')";
                $result = $this->db->insert($query);
            }

            if($result){
                $alert = "Tạo tài khoản thành công";
                return $alert;
            } else{
                $alert = "Tạo tài khoản thất bại";
                return $alert;
            }
        }
    }
}
?>