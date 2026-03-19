<?php
class user_inforController extends baseController {
    private $userInfoModel; // Thêm thuộc tính này để lưu trữ model UserInfo
    private $userChangePassModel; 
    private $userChangeNameModel; 
    private $userChangePhoneModel;
    private $userChangeEmailModel;
    private $userChangeAddressModel;
    public function __construct()
    {   
        $this->loadModel('user_inforModel'); // Tải model UserInfo
        $this->userInfoModel = new user_infor(); // Khởi tạo model UserInfo
        $this->userChangePassModel = new user_infor(); 
        $this->userChangeNameModel = new user_infor();
        $this->userChangePhoneModel = new user_infor(); 
        $this->userChangeEmailModel = new user_infor(); 
        $this->userChangeAddressModel = new user_infor(); 
    }
    
    public function showUserInfo() {
        // Khởi động phiên
        $username = $_SESSION['user_data']['user'];
        // Sử dụng model UserInfo đã tải
        $userInfo = $this->userInfoModel->getUserInfo($username);
        // Trả về view và truyền dữ liệu thông tin người dùng
        return $this->loadView('user_infor.user_info', [
            'userInfo' => $userInfo
        ]);
    }

    public function changeUserPass()
    {
        $Pass_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_pass-btn'])) {
            // Retrieve data from the form
            $newPassword = $_POST['passmoi'];
            $confirmPassword = $_POST['xacnhanpassmoi'];
            if ($newPassword === $confirmPassword) {
                // Call the method to change the password
                $changePassUsername = $_SESSION['user_data']['user'];
                // Assuming Change_password is a method of the ChangeInfor model
                if ($this->userChangePassModel->Change_password($changePassUsername, $newPassword)) {
                    $Pass_txtErro = 'Thay đổi thành công';
                } else {
                    $Pass_txtErro = 'Lỗi, vui lòng kiểm tra lại';
                }
            } else {
                $Pass_txtErro = 'Mật khẩu mới không được trùng với mật khẩu cũ';
            }
        }
        return $this->loadview('user_infor.user_change_pass', [
            'Pass_txtErro' => $Pass_txtErro
        ]);
    }
    public function changeUserName()
    {
        $Name_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change-name-btn'])) {
            // Lấy dữ liệu từ form
            $new_ho = $_POST['homoi'];
            $new_ten = $_POST['tenmoi'];
            // Gọi hàm thay đổi mật khẩu
            $change_name_username = $_SESSION['user_data']['user'];
            if ($this->userChangeNameModel->Change_name($change_name_username, $new_ho,$new_ten)) {
                $Name_txtErro = 'Thay đổi thành công';
        
            } else {
                $Name_txtErro = 'Lỗi, vui lòng kiểm tra lại';
            }
        }
        return $this->loadview('user_infor.user_change_name', [
            'Name_txtErro' => $Name_txtErro
        ]);
    
    }
    public function changeUserEmail()
    {
        $Email_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change-email-btn'])) {
            // Lấy dữ liệu từ form
            $new_email = $_POST['emailmoi'];
            // Gọi hàm thay đổi mật khẩu
            $change_email_username = $_SESSION['user_data']['user'];
            if ($this->userChangeEmailModel->Change_email($change_email_username, $new_email)) {
                $Email_txtErro = 'Thay đổi thành công';
        
            } else {
                $Email_txtErro = 'Lỗi, vui lòng kiểm tra lại';
            }
        }
        return $this->loadview('user_infor.user_change_email', [
            'Email_txtErro' => $Email_txtErro
        ]);
    
    }
    public function changeUserAddress()
{
    $Address_txtErro = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['change-address-btn'])) {
        $new_diachi = $_POST['diachimoi'];
        $change_address_username = $_SESSION['user_data']['user'];
        if ($this->userChangeAddressModel->Change_address($change_address_username, $new_diachi)) {
            $Address_txtErro = 'Thay đổi thành công';
        } else {
            $Address_txtErro = 'Lỗi, vui lòng kiểm tra lại';
        }
    }
    return $this->loadview('user_infor.user_change_address', [
        'Address_txtErro' => $Address_txtErro
    ]);
}

    public function changeUserPhone()
{
    $Phone_txtErro = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['change-phone-btn'])) {
        $new_sdt = $_POST['phonemoi'];
        $change_phone_username = $_SESSION['user_data']['user'];
        if ($this->userChangePhoneModel->Change_phone($change_phone_username, $new_sdt)) {
            $Phone_txtErro = 'Thay đổi thành công';
        } else {
            $Phone_txtErro = 'Lỗi, vui lòng kiểm tra lại';
        }
    }
    return $this->loadview('user_infor.user_change_phone', [
        'Phone_txtErro' => $Phone_txtErro
    ]);
}
public function logoutUserinfor()
{
    session_unset();
    session_destroy();
    $logouttUserinfor_txtErro = 'window.location.href = "index.php";';
    return $this->loadview('user_infor.user_info', [
        'logouttUserinfor_txtErro' => $logouttUserinfor_txtErro
    ]);
}




    // public function changeUserAva(){
    //     $Ava_txtErro = '';
    //     $change_ava_username = $_SESSION['user_data']['username'];
    //     $oldAvatar_sql = $this->userChangeAvaModel->Get_Imginfor($change_ava_username);
    //     $oldAvatar = $oldAvatar_sql['avatar'];
    //     $newAvatarPath = "./img/avatar/new_avatar.jpg"; // Thay đổi đường dẫn và tên tệp avatar mới tương ứng
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change-avatar-btn'])) {
    //         // Tiến hành cập nhật thông tin dựa trên dữ liệu từ biểu mẫu
    //         $change_ava = $_FILES['change_avatar']['name'];
    //         if (isset($_FILES['change_avatar']) && $_FILES['change_avatar']['error'] === 0) {
    //             if (file_exists('./img/avatar/' . $oldAvatar)) {
    //                 unlink('./img/avatar/' . $oldAvatar);
    //             }
    //             move_uploaded_file($_FILES['change_avatar']['tmp_name'], './img/avatar/' . $_FILES['change_avatar']['name']);
    //         }
    //         // Tiến hành cập nhật  trong CSDL
    //         if ($this->userChangeAvaModel->Change_ava($change_ava_username,  $change_ava)) {
    //             // Sản phẩm đã được cập nhật thành công
    //             $Ava_txtErro = 'Đổi avatar thành công!';
    //         } else {
    //             // Xảy ra lỗi trong quá trình cập nhật 
    //             $Ava_txtErro = 'Đổi avatar thất bại!';
    //         }
    //     }
    //     return $this->loadview('change_ava.change_ava', [
    //         'Ava_txtErro' => $Ava_txtErro,
    //         'newAvatarPath' => $newAvatarPath
    //     ]);
    // }
}
?>
