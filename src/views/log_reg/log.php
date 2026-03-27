<?php
    $inlineError = "";
    $redirectScript = "";

    // Xử lý lỗi từ hệ thống
    if (isset($log_txtErro) && !empty($log_txtErro)) {
        // Nếu là lệnh chuyển trang (đăng nhập thành công)
        if (strpos($log_txtErro, 'window.location.href') !== false) {
            $redirectScript = $log_txtErro; 
        } else {
            // Nếu là lỗi sai tài khoản/mật khẩu -> Gắn vào biến để hiển thị trực tiếp
            $inlineError = $log_txtErro;
        }
    }
    
    // Nếu có lệnh đăng xuất hoặc thông báo khác cần script
    if (isset($logout_txtErro) && !empty($logout_txtErro)) {
        $redirectScript .= $logout_txtErro;
    }
?>

<link rel="stylesheet" href="./views/css/log.css"> <div class="auth-login-wrapper">
    <div class="auth-login-card fade-up">
        
        <div class="auth-login-image-side">
            <img src="./img/log_reg/TGDD-540x270 2.png" alt="Logo Thương Hiệu" class="auth-login-logo">
        </div>

        <div class="auth-login-form-side">
            <form class="auth-login-form" method="post">
                <h1 class="auth-login-title">ĐĂNG NHẬP</h1>
                
                <?php if (!empty($inlineError)): ?>
                    <div class="auth-login-alert auth-login-alert-error shake-anim">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?php echo $inlineError; ?></span>
                    </div>
                <?php endif; ?>

                <div class="auth-login-input-group">
                    <i class="fas fa-user auth-login-icon-left"></i>
                    <input type="text" class="auth-login-input" id="username" name="login_user" placeholder="Tên đăng nhập" required>
                </div>

                <div class="auth-login-input-group">
                    <i class="fas fa-lock auth-login-icon-left"></i>
                    <input type="password" class="auth-login-input" id="password" name="login_pass" placeholder="Mật khẩu" required>
                    <i class="fas fa-eye auth-login-icon-right" id="authLoginTogglePass" onclick="authLoginTogglePassword()"></i>
                </div>

                <div class="auth-login-options">
                    <label class="auth-login-checkbox-label" for="remember">
                        <input type="checkbox" class="auth-login-checkbox" id="remember">
                        <span>Nhớ mật khẩu</span>
                    </label>
                    <a href="#" class="auth-login-forgot-link">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="auth-login-submit-btn ripple-btn" name="Login-btn">
                    ĐĂNG NHẬP <i class="fas fa-sign-in-alt"></i>
                </button>

                <div class="auth-login-redirect">
                    <span>Bạn chưa có tài khoản? <a href="?controller=log_reg&action=RegisterUser">Đăng ký ngay</a></span>
                </div>
            </form>
        </div>
        
    </div>

    <img src="./img/log_reg/Vectors.png" alt="Wave Bottom" class="auth-login-wave-bottom">
</div>

<script>
    // 1. TÍNH NĂNG ẨN/HIỆN MẬT KHẨU
    function authLoginTogglePassword() {
        const passInput = document.getElementById("password");
        const toggleIcon = document.getElementById("authLoginTogglePass");
        
        if (passInput.type === "password") {
            passInput.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passInput.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }

    // 2. CHẠY LỆNH CHUYỂN TRANG/ĐĂNG XUẤT TỪ PHP NẾU CÓ
    document.addEventListener("DOMContentLoaded", function() {
        <?php echo $redirectScript; ?>
    });

    // 3. HIỆU ỨNG CLICK RIPPLE (NƯỚC LAN TỎA) CHO NÚT
    document.querySelectorAll('.ripple-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            let x = e.clientX - e.target.getBoundingClientRect().left;
            let y = e.clientY - e.target.getBoundingClientRect().top;
            let ripples = document.createElement('span');
            ripples.style.left = x + 'px';
            ripples.style.top = y + 'px';
            ripples.classList.add('auth-login-ripple');
            this.appendChild(ripples);
            setTimeout(() => { ripples.remove() }, 600); // Tự xóa dom sau khi chạy xong
        });
    });
</script>