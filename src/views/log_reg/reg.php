<?php
    $inlineError = "";
    $redirectScript = "";

    // Xử lý lỗi từ hệ thống
    if (isset($Reg_txtErro) && !empty($Reg_txtErro)) {
        // Nếu là lệnh chuyển trang (đăng ký thành công)
        if (strpos($Reg_txtErro, 'window.location.href') !== false) {
            $redirectScript = $Reg_txtErro; 
        } else {
            // Nếu là lỗi validation -> Gắn vào biến để hiển thị trực tiếp
            $inlineError = $Reg_txtErro;
        }
    }
?>

<link rel="stylesheet" href="./views/css/reg.css"> <div class="auth-reg-wrapper">
    <div class="auth-reg-card fade-up">
        
        <div class="auth-reg-image-side">
            <img src="./img/log_reg/dang-ky-ngay 1.png" alt="Register Banner" class="auth-reg-logo">
        </div>

        <div class="auth-reg-form-side">
            <form class="auth-reg-form" method="post">
                <h1 class="auth-reg-title">ĐĂNG KÝ</h1>
                
                <?php if (!empty($inlineError)): ?>
                    <div class="auth-reg-alert auth-reg-alert-error shake-anim">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?php echo $inlineError; ?></span>
                    </div>
                <?php endif; ?>

                <div class="auth-reg-row">
                    <div class="auth-reg-col">
                        <div class="auth-reg-input-group">
                            <i class="fas fa-user auth-reg-icon-left"></i>
                            <input type="text" class="auth-reg-input" id="firstname" name="firstname" placeholder="Họ" required>
                        </div>
                    </div>
                    <div class="auth-reg-col">
                        <div class="auth-reg-input-group">
                            <i class="fas fa-id-badge auth-reg-icon-left"></i>
                            <input type="text" class="auth-reg-input" id="lastname" name="lastname" placeholder="Tên" required>
                        </div>
                    </div>
                </div>

                <div class="auth-reg-input-group">
                    <i class="fas fa-user-circle auth-reg-icon-left"></i>
                    <input type="text" class="auth-reg-input" id="username" name="username" placeholder="Tên đăng nhập" required>
                </div>

                <div class="auth-reg-input-group">
                    <i class="fas fa-phone-alt auth-reg-icon-left"></i>
                    <input type="tel" class="auth-reg-input" id="phonenumber" name="phonenumber" placeholder="Số điện thoại" required>
                </div>

                <div class="auth-reg-input-group">
                    <i class="fas fa-map-marker-alt auth-reg-icon-left"></i>
                    <input type="text" class="auth-reg-input" id="address" name="address" placeholder="Địa chỉ hiện tại" required>
                </div>

                <div class="auth-reg-input-group">
                    <i class="fas fa-envelope auth-reg-icon-left"></i>
                    <input type="email" class="auth-reg-input" id="register_email" name="register_email" placeholder="Địa chỉ Email" required>
                </div>

                <div class="auth-reg-input-group">
                    <i class="fas fa-lock auth-reg-icon-left"></i>
                    <input type="password" class="auth-reg-input" id="reg_password" name="password" placeholder="Tạo mật khẩu" required>
                    <i class="fas fa-eye auth-reg-icon-right" id="toggleRegPass" onclick="authRegTogglePassword('reg_password', 'toggleRegPass')"></i>
                </div>

                <div class="auth-reg-input-group">
                    <i class="fas fa-shield-alt auth-reg-icon-left"></i>
                    <input type="password" class="auth-reg-input" id="reg_confirm_password" name="confirm_password" placeholder="Xác nhận lại mật khẩu" required>
                    <i class="fas fa-eye auth-reg-icon-right" id="toggleRegConfirmPass" onclick="authRegTogglePassword('reg_confirm_password', 'toggleRegConfirmPass')"></i>
                </div>

                <button type="submit" class="auth-reg-submit-btn ripple-btn" name="Register-btn">
                    TẠO TÀI KHOẢN <i class="fas fa-user-plus"></i>
                </button>

                <div class="auth-reg-redirect">
                    <span>Bạn đã có tài khoản? <a href="?controller=log_reg&action=LoginUser">Đăng nhập</a></span>
                </div>
            </form>
        </div>
        
    </div>

    <img src="./img/log_reg/Vectors.png" alt="Wave Bottom" class="auth-reg-wave-bottom">
</div>

<script>
    // 1. TÍNH NĂNG ẨN/HIỆN MẬT KHẨU ĐỘC LẬP CHO TỪNG Ô
    function authRegTogglePassword(inputId, iconId) {
        const passInput = document.getElementById(inputId);
        const toggleIcon = document.getElementById(iconId);
        
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

    // 2. CHẠY LỆNH CHUYỂN TRANG TỪ PHP NẾU THÀNH CÔNG
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
            ripples.classList.add('auth-reg-ripple');
            this.appendChild(ripples);
            setTimeout(() => { ripples.remove() }, 600); // Tự xóa dom sau khi chạy xong
        });
    });
</script>