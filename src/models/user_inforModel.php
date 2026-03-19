<?php
class user_infor extends baseModel{
    function getUserInfo($username){
        $query = "SELECT * FROM taikhoan WHERE user = '$username'";
        $result = $query = $this->_query($query);
        if (mysqli_num_rows($result) == 1) { 
            $userInfo = mysqli_fetch_assoc($result); 
            return $userInfo; 
        } else {
            return null; 
        }
    }    
    function Change_password($username, $password) {
        // Kiểm tra xem người dùng có tồn tại không
        $kiem_tra_user = "SELECT * FROM taikhoan WHERE user = '$username'";
        $kiem_tra_user_ketqua = $kiem_tra_user = $this->_query($kiem_tra_user);
        if (mysqli_num_rows($kiem_tra_user_ketqua) == 0) {
            return false; // Người dùng không tồn tại
        }
        // Băm mật khẩu mới bằng password_hash()
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $cap_nhat_mat_khau = "UPDATE taikhoan SET pass = '$hashed_password' WHERE user = '$username'";
        $result = $cap_nhat_mat_khau = $this->_query($cap_nhat_mat_khau);
        if ($result) {
            return true; // Thay đổi mật khẩu thành công
        } else {
            return false; // Thất bại khi thay đổi mật khẩu
        }
    }
    function Change_email($username, $email) {
            // Kiểm tra xem người dùng có tồn tại không
            $kiem_tra_user = "SELECT * FROM taikhoan WHERE user = '$username'";
            $kiem_tra_user_ketqua = $kiem_tra_user = $this->_query($kiem_tra_user);
            if (mysqli_num_rows($kiem_tra_user_ketqua) == 0) {
                return false; 
            }
            $Update_email = "UPDATE taikhoan SET email = '$email' WHERE user = '$username'";
            $result =  $Update_email = $this->_query($Update_email);
            if ($result) {
                return true; // Thay đổi thành công
            } else {
                return false; // Thất bại khi thay đổi mật khẩu
            }
        }
   
    function Change_name($username, $ho,$ten) {
        // Kiểm tra xem người dùng có tồn tại không
        $kiem_tra_user = "SELECT * FROM taikhoan WHERE user = '$username'";
        $kiem_tra_user_ketqua = $kiem_tra_user = $this->_query($kiem_tra_user);
        if (mysqli_num_rows($kiem_tra_user_ketqua) == 0) {
            return false; 
        }
        $Update_ho = "UPDATE taikhoan SET ho = '$ho' WHERE user = '$username'";
        $Update_ten = "UPDATE taikhoan SET ten = '$ten' WHERE user = '$username'";
        $result =  $Update_ho = $this->_query($Update_ho);
        $result =  $Update_ten = $this->_query($Update_ten);
        if ($result) {
            return true; // Thay đổi thành công
        } else {
            return false; // Thất bại khi thay đổi mật khẩu
        }
    }
    function Change_address($username, $diachi) {
        // Kiểm tra xem người dùng có tồn tại không
        $kiem_tra_user = "SELECT * FROM taikhoan WHERE user = '$username'";
        $kiem_tra_user_ketqua = $kiem_tra_user = $this->_query($kiem_tra_user);
        if (mysqli_num_rows($kiem_tra_user_ketqua) == 0) {
            return false; 
        }
        $Update_diachi = "UPDATE taikhoan SET diachi = '$diachi' WHERE user = '$username'";
        $result =  $Update_diachi = $this->_query($Update_diachi);
        if ($result) {
            return true; // Thay đổi thành công
        } else {
            return false; // Thất bại khi thay đổi mật khẩu
        }
    }
    function Change_phone($username, $sdt) {
        // Kiểm tra xem người dùng có tồn tại không
        $kiem_tra_user = "SELECT * FROM taikhoan WHERE user = '$username'";
        $kiem_tra_user_ketqua = $kiem_tra_user = $this->_query($kiem_tra_user);
        if (mysqli_num_rows($kiem_tra_user_ketqua) == 0) {
            return false; 
        }
        $Update_sdt = "UPDATE taikhoan SET sdt = '$sdt' WHERE user = '$username'";
        $result =  $Update_sdt = $this->_query($Update_sdt);
        if ($result) {
            return true; // Thay đổi thành công
        } else {
            return false; // Thất bại khi thay đổi mật khẩu
        }
    }
    // function Change_ava($username, $avatar) {
    //     // Câu lệnh SQL cho việc cập nhật sản phẩm
    //     $sql = "UPDATE admin SET avatar = '$avatar' WHERE username = '$username'";
    //     $result =  $sql = $this->_query( $sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // function Get_Imginfor($username){
    //     $query = "SELECT avatar FROM admin WHERE username = '$username'";
    //     $result =  $query = $this->_query($query);
    //     if (mysqli_num_rows($result) == 1) { 
    //         $ImgInfo = mysqli_fetch_assoc($result); 
    //         return $ImgInfo; 
    //     } else {
    //         return null; 
    //     }
    // }
}
?>