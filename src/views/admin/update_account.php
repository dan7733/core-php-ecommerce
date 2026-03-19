<?php
if (isset($updateAccount_txtErro) && !empty($updateAccount_txtErro)) {
    echo "<script>
            alert('$updateAccount_txtErro');
            if ('$updateAccount_txtErro' === 'Cập nhật thành công!') {
                window.location.href = '?admincontroller=admin&action=update_Account&idaccount=" . $updateaccount['manguoidung'] . "';
            }
          </script>";
}
?>
<div class="updatetaikhoan-container">
    <form class="updatetaikhoan-form" method="post">
        <h1>Update Account</h1>
        <p>Họ và Tên</p>
        <div class="updatetaikhoan-input-group">
            <input type="text" id="firstname" name="up_firstname" placeholder="Họ" value="<?php echo $updateaccount['ho']; ?>">
            <input type="text" id="lastname" name="up_lastname" placeholder="Tên" value="<?php echo $updateaccount['ten']; ?>">
        </div>
        <p>Tên đăng nhập</p>
        <div class="updatetaikhoan-input-group">
            <input type="text" id="username" name="up_username" placeholder="Nhập tên đăng nhập" value="<?php echo $updateaccount['user']; ?>">
        </div>
        <p>Số điện thoại</p>
        <div class="updatetaikhoan-input-group">
            <input type="tel" id="phonenumber" name="up_phonenumber" placeholder="Nhập số điện thoại" value="<?php echo $updateaccount['sdt']; ?>">
        </div>
        <p>Địa chỉ</p>
        <div class="updatetaikhoan-input-group">
            <input type="text" id="address" name="up_address" placeholder="Nhập địa chỉ" value="<?php echo $updateaccount['diachi']; ?>">
        </div>
        <p>Email</p>
        <div class="updatetaikhoan-input-group">
            <input type="email" id="update_email" name="up_email" placeholder="Nhập địa chỉ Email">
        </div>
        <p>Nhập mật khẩu mới</p>
        <div class="updatetaikhoan-input-group">
            <input type="password" id="new_password" name="up_new_password" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="updatetaikhoan-submit-button">
            <button type="submit" name="Update-btn">Update</button>
        </div>
    </form>
</div>