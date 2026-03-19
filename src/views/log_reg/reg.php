<div class="d-flex navbar navbar-expand-lg navbar-light bg-light">
    <?php
    if (isset($Reg_txtErro) && !empty($Reg_txtErro)) {
        if (strpos($Reg_txtErro, 'window.location.href = "index.php";') !== false) {
            echo "<script>$Reg_txtErro</script>";
        } else {
            echo "<script>alert('$Reg_txtErro')</script>";
        }
    } 
    ?>
    <img class="dangky" style="max-width: 80%;" src="./img/log_reg/dang-ky-ngay 1.png" alt="">
    <form class="form-dk mx-auto" method="post">
        <h1 class="text-center-dk">Register</h1>
        <p class="mothang">Họ và Tên</p>
        <div class="name mb-1">
            <input type="text" class="form-control-dkmot custom-input-dk" id="firstname" name="firstname" placeholder="Họ">
            <input type="text" class="form-control-dkhai custom-input-dk" id="lastname" name="lastname" placeholder="Tên">
        </div>
        <p class="mothang">Tên đăng nhập</p>
        <div class="mb-1">
            <input type="text" class="form-control custom-input-dk" id="username" name="username" placeholder="Nhập tên đăng nhập">
        </div>
        <p class="mothang">Số điện thoại</p>
        <div class="mb-1">
            <input type="tel" class="form-control custom-input-dk" id="phonenumber" name="phonenumber" placeholder="Nhập số điện thoại">
        </div>
        <p class="mothang">Địa chỉ</p>
        <div class="mb-1">
            <input type="text" class="form-control custom-input-dk" id="address" name="address" placeholder="Nhập địa chỉ">
        </div>
        <p class="mothang">Email</p>
        <div class="mb-1">
            <input type="email" class="form-control custom-input-dk" id="register_email" name="register_email" placeholder="Nhập địa chỉ Email">
        </div>
        <p class="mothang">Tạo mật khẩu</p>
        <div class="mb-1">
            <input type="password" class="form-control custom-input-dk" id="password" name="password" placeholder="Nhập mật khẩu">
        </div>
        <p class="mothang">Xác nhận mật khẩu</p>
        <div class="mb-1">
            <input type="password" class="form-control custom-input-dk" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="xacnhandangky">
            <button type="submit" class="bth text-dark-dk" name="Register-btn" style="width: 440px;">Register</button> 
        </div>
        <div class="namngangdangnhap">
            <span> Bạn đã có tài khoản? <a href="?controller=log_reg&action=LoginUser" class="text-decoration">Đăng nhập</a></span>
        </div>
    </form>
</div>
<div class="navbar-expand-lg-dk navbar-light bg-light">
    <img src="./img/log_reg/Vectors.png" alt="">
</div>
