<?php
class log_reg extends baseModel
{
    function get_Productdetail($productId)
    {
        $query = "SELECT * FROM sanpham, chitietsanpham WHERE sanpham.id = chitietsanpham.san_pham_id AND sanpham.id = $productId";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $productDetail = mysqli_fetch_assoc($result);
            return $productDetail;
        } else {
            return false;
        }
    }
    function create_User($user, $pass, $ho, $ten, $email, $sdt, $diachi)
    {
        $check_user = "SELECT * FROM taikhoan WHERE user = '$user'";
        $check_user_result = $this->_query($check_user);
        if (mysqli_num_rows($check_user_result) > 0) {
            return false;
        }
        $check_email = "SELECT * FROM taikhoan WHERE email = '$email'";
        $check_email_result = $this->_query($check_email);
        if (mysqli_num_rows($check_email_result) > 0) {
            return false;
        }
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $Insert_acc_query = "INSERT INTO taikhoan (user, pass, ho, ten, email, sdt, diachi, quyen) VALUES ('$user', '$hashed_password', '$ho', '$ten', '$email', '$sdt', '$diachi', 0)";
        $Insert_acc_result = $this->_query($Insert_acc_query);
        if ($Insert_acc_result) {
            return mysqli_insert_id($this->conn);
        } else {
            return false;
        }
    }

    // đăng nhập
    function Login($user, $pass)
    {
        // SQL
        $query = "SELECT * FROM taikhoan WHERE user = '$user'";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result);
            $hashed_password = $user_data['pass'];
            if (password_verify($pass, $hashed_password)) {
                return $user_data;
            } else {
                return false;
            }
        }
        return false;
    }
}
