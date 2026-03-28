<div class="admin-reg-container">
    <div class="admin-reg-card">
        
        <div class="admin-reg-header">
            <h1><i class="fas fa-user-shield"></i> Cấp Tài Khoản Quản Trị</h1>
        </div>

        <?php if (isset($Regadmin_txtErro) && !empty($Regadmin_txtErro)) : ?>
            <div class="admin-reg-alert">
                <i class="fas fa-exclamation-triangle"></i>
                <span><?= htmlspecialchars($Regadmin_txtErro) ?></span>
            </div>
        <?php endif; ?>

        <form class="admin-reg-form" method="post">
            <div class="admin-reg-grid">
                
                <div class="admin-reg-group">
                    <label>Họ <span class="required">*</span></label>
                    <div class="admin-reg-input-wrapper">
                        <input type="text" id="admin_firstname" name="capfirstname" placeholder="Nhập họ của bạn" required>
                        <i class="fas fa-id-card"></i>
                    </div>
                </div>

                <div class="admin-reg-group">
                    <label>Tên <span class="required">*</span></label>
                    <div class="admin-reg-input-wrapper">
                        <input type="text" id="admin_lastname" name="caplastname" placeholder="Nhập tên của bạn" required>
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <div class="admin-reg-group">
                    <label>Tên đăng nhập <span class="required">*</span></label>
                    <div class="admin-reg-input-wrapper">
                        <input type="text" id="admin_username" name="capusername" placeholder="Ví dụ: admin_nam" required>
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>

                <div class="admin-reg-group">
                    <label>Số điện thoại <span class="required">*</span></label>
                    <div class="admin-reg-input-wrapper">
                        <input type="tel" id="admin_phone" name="capphonenumber" placeholder="Nhập số điện thoại" required>
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>

                <div class="admin-reg-group">
                    <label>Email <span class="required">*</span></label>
                    <div class="admin-reg-input-wrapper">
                        <input type="email" id="admin_email" name="capregister_email" placeholder="admin@domain.com" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>

                <div class="admin-reg-group">
                    <label>Địa chỉ</label>
                    <div class="admin-reg-input-wrapper">
                        <input type="text" id="admin_address" name="capaddress" placeholder="Nhập địa chỉ cư trú">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>

                <div class="admin-reg-group">
                    <label>Tạo mật khẩu <span class="required">*</span></label>
                    <div class="admin-reg-input-wrapper">
                        <input type="password" id="admin_password" name="cappassword" placeholder="Nhập mật khẩu an toàn" required>
                        <i class="fas fa-lock"></i>
                    </div>
                </div>

                <div class="admin-reg-group">
                    <label>Xác nhận mật khẩu <span class="required">*</span></label>
                    <div class="admin-reg-input-wrapper">
                        <input type="password" id="admin_confirm_password" name="capconfirm_password" placeholder="Nhập lại mật khẩu" required>
                        <i class="fas fa-shield-alt"></i>
                    </div>
                </div>

            </div> <div class="admin-reg-action">
                <button type="submit" name="Register-btn" class="admin-reg-btn">
                    <i class="fas fa-user-plus"></i> Khởi tạo tài khoản
                </button>
            </div>
            
        </form>
    </div>
</div>