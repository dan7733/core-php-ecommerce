<div class="d-flex navbar navbar-expand-lg navbar-light bg-light">
    <?php
    if (isset($log_txtErro) && !empty($log_txtErro)) {
        if (strpos($log_txtErro, 'window.location.href = "index.php";') !== false or strpos($log_txtErro, 'window.location.href = "admin.php";') !== false ) {
            echo "<script>$log_txtErro</script>";
        } else {
            echo "<script>alert('$log_txtErro')</script>";
        }
    }
    if (isset($logout_txtErro) && !empty($logout_txtErro)) {
        echo '<script type="text/javascript">' . $logout_txtErro . '</script>';
        exit;
    }
    ?>
    <img class="hinhdau" src="./img/log_reg/TGDD-540x270 2.png" alt="" sizes="" srcset="">
    <form class="form-dn  mx-auto" method="post">
        <h1 class="text-center">Login</h1>
        <div class="mb-3 ">
            <!--<label for="username" class="form-label">Tên đăng nhập</label> -->
            <input type="text" class="form-control custom-input " id="username" name="login_user" placeholder="Tên đăng nhập">
        </div>
        <!-- Mật khẩu -->
        <div class="mb-3">
            <!--<label for="password" class="form-label">Mật khẩu</label>-->
            <input type="password" class="form-control custom-input " id="password" name="login_pass" placeholder="Mật khẩu">
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
                </div>
            </div>
            <div class="col text-end">
                <a href="#" class="text-decoration-none">Quên mật khẩu?</a>
            </div>
        </div>
        <!-- Nút Đăng Nhập -->
        <div class="thanhlogin">
            <button type="submit" class="btn btn-primary text-dark custom-input" name="Login-btn">Login</button>
        </div>
        <!-- Liên kết Đăng Ký -->
        <div class="namngangdangki">
            <span> Bạn chưa có tài khoản? <a href="?controller=log_reg&action=RegisterUser" class="text-decoration">Đăng ký</a></span>
        </div>
    </form>
</div>
<div class="navbar-expand-lg navbar-light bg-light">
    <img class="hinhcuoi" src="./img/log_reg/Vectors.png" alt="">
</div>