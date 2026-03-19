<?php
if (isset($Regadmin_txtErro) && !empty($Regadmin_txtErro)) {
    echo "<script>alert('$Regadmin_txtErro')</script>";
}
?>
<div class="captaikhoan-container">
    <form class="captaikhoan-form" method="post">
        <h1>Register</h1>
        <p>Họ và Tên</p>
        <div class="captaikhoan-input-group">
            <input type="text" id="firstname" name="capfirstname" placeholder="Họ">
            <input type="text" id="lastname" name="caplastname" placeholder="Tên">
        </div>
        <p>Tên đăng nhập</p>
        <div class="captaikhoan-input-group">
            <input type="text" id="username" name="capusername" placeholder="Nhập tên đăng nhập">
        </div>
        <p>Số điện thoại</p>
        <div class="captaikhoan-input-group">
            <input type="tel" id="phonenumber" name="capphonenumber" placeholder="Nhập số điện thoại">
        </div>
        <p>Địa chỉ</p>
        <div class="captaikhoan-input-group">
            <input type="text" id="address" name="capaddress" placeholder="Nhập địa chỉ">
        </div>
        <p>Email</p>
        <div class="captaikhoan-input-group">
            <input type="email" id="register_email" name="capregister_email" placeholder="Nhập địa chỉ Email">
        </div>
        <p>Tạo mật khẩu</p>
        <div class="captaikhoan-input-group">
            <input type="password" id="password" name="cappassword" placeholder="Nhập mật khẩu">
        </div>
        <p>Xác nhận mật khẩu</p>
        <div class="captaikhoan-input-group">
            <input type="password" id="confirm_password" name="capconfirm_password" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="captaikhoan-submit-button">
            <button type="submit" name="Register-btn">Register</button>
        </div>
    </form>
</div>
