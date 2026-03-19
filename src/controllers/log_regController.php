<?php
class log_regController extends baseController
{
    private $loglModel;
    private $regModel;
    public function __construct()
    {
        $this->loadModel('log_regModel');
        $this->loglModel = new log_reg();
        $this->regModel = new log_reg();
    }
    public function RegisterUser()
    {
        $Reg_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Register-btn'])) {
            $reg_user = $_POST['username'];
            $reg_pass = $_POST['password'];
            $regconfirm_reg_pass = $_POST['confirm_password'];
            $reg_ho = $_POST['lastname'];
            $reg_ten = $_POST['firstname'];
            $reg_email = $_POST['register_email'];
            $reg_sdt = $_POST['phonenumber']; // Số điện thoại
            $reg_diachi = $_POST['address']; // Địa chỉ

            // Thêm sdt và diachi vào hàm create_User
            if ($regconfirm_reg_pass === $reg_pass) {
                // Mật khẩu và mật khẩu xác nhận trùng khớp, thực hiện việc đăng ký
                $reg_result = $this->regModel->create_User($reg_user, $reg_pass, $reg_ho, $reg_ten, $reg_email, $reg_sdt, $reg_diachi);
                if ($reg_result) {
                    $_SESSION['user_data'] = [
                        'manguoidung' => $reg_result,
                        'user' => $reg_user,
                        'ho' => $reg_ho,
                        'ten' => $reg_ten,
                        'email' => $reg_email,
                        'sdt' => $reg_sdt,
                        'diachi' => $reg_diachi,
                    ];
                    $Reg_txtErro = 'window.location.href = "index.php";';
                } else {
                    $Reg_txtErro = 'Lỗi, Đăng ký thất bại!!!';
                }
            } else {
                // Mật khẩu và mật khẩu xác nhận không trùng khớp, thông báo lỗi
                $Reg_txtErro = 'Mật khẩu và Mật khẩu xác nhận không trùng nhau';
            }
        }
        return $this->loadview('log_reg.reg', [
            'Reg_txtErro' => $Reg_txtErro
        ]);
    }

    public function LoginUser()
    {
        // đăng nhập
        $log_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Login-btn'])) {
            $log_user = $_POST['login_user'];
            $log_pass = $_POST['login_pass'];
            $log_result = $this->regModel->Login($log_user, $log_pass);
            if ($log_result) {
                // Đăng nhập thành công
                // $_SESSION['user_data'] dùng để lưu dữ liệu phiên đăng nhập
                $_SESSION['user_data'] = $log_result;
                if (isset($_SESSION['user_data']) && $_SESSION['user_data']['quyen'] == 1) {
                    // Trường hợp là admin
                    $log_txtErro = 'window.location.href = "admin.php";';
                }elseif (isset($_SESSION['user_data']) && $_SESSION['user_data']['quyen'] == 0) {
                    // Trường hợp là khách hàng
                    $log_txtErro = 'window.location.href = "index.php";';
                } else {
                    $log_txtErro = 'Lỗi, vui lòng kiểm tra lại';
                }
            } else {
                // Đăng nhập thất bại
                $log_txtErro = 'Lỗi, vui lòng kiểm tra lại';
            }
        }
        return $this->loadview('log_reg.log', [
            'log_txtErro' => $log_txtErro
        ]);
    }
    public function LogoutUser()
    {
        session_unset();
        session_destroy();
        $logout_txtErro = 'window.location.href = "index.php";';
        return $this->loadview('log_reg.log', [
            'logout_txtErro' => $logout_txtErro
        ]);
    }
}
