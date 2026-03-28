<div class="ad-upd-acc-wrapper">
    <div class="ad-upd-acc-card">
        
        <div class="ad-upd-acc-header">
            <h1><i class="fas fa-user-edit"></i> Cập Nhật Tài Khoản</h1>
            <a href="?admincontroller=admin&action=list_Account" class="ad-upd-acc-btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <?php if (isset($updateAccount_txtErro) && !empty($updateAccount_txtErro)) : ?>
            <?php 
                $isSuccess = ($updateAccount_txtErro === 'Cập nhật thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="ad-upd-acc-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($updateAccount_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=update_Account&idaccount=<?= $updateaccount['manguoidung'] ?>';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <form class="ad-upd-acc-form" method="post">
            
            <div class="ad-upd-acc-grid-2">
                <div class="ad-upd-acc-form-group">
                    <label for="firstname">Họ</label>
                    <div class="ad-upd-acc-input-wrapper">
                        <i class="fas fa-id-card ad-upd-acc-icon"></i>
                        <input type="text" id="firstname" name="up_firstname" placeholder="Nhập họ..." value="<?= htmlspecialchars($updateaccount['ho']) ?>">
                    </div>
                </div>
                
                <div class="ad-upd-acc-form-group">
                    <label for="lastname">Tên</label>
                    <div class="ad-upd-acc-input-wrapper">
                        <i class="far fa-id-card ad-upd-acc-icon"></i>
                        <input type="text" id="lastname" name="up_lastname" placeholder="Nhập tên..." value="<?= htmlspecialchars($updateaccount['ten']) ?>">
                    </div>
                </div>
            </div>

            <div class="ad-upd-acc-form-group">
                <label for="username">Tên đăng nhập</label>
                <div class="ad-upd-acc-input-wrapper">
                    <i class="fas fa-user-circle ad-upd-acc-icon"></i>
                    <input type="text" id="username" name="up_username" placeholder="Nhập tên đăng nhập..." value="<?= htmlspecialchars($updateaccount['user']) ?>">
                </div>
            </div>

            <div class="ad-upd-acc-form-group">
                <label for="phonenumber">Số điện thoại</label>
                <div class="ad-upd-acc-input-wrapper">
                    <i class="fas fa-phone-alt ad-upd-acc-icon"></i>
                    <input type="tel" id="phonenumber" name="up_phonenumber" placeholder="Nhập số điện thoại..." value="<?= htmlspecialchars($updateaccount['sdt']) ?>">
                </div>
            </div>

            <div class="ad-upd-acc-form-group">
                <label for="address">Địa chỉ cư trú</label>
                <div class="ad-upd-acc-input-wrapper">
                    <i class="fas fa-map-marker-alt ad-upd-acc-icon"></i>
                    <input type="text" id="address" name="up_address" placeholder="Nhập địa chỉ đầy đủ..." value="<?= htmlspecialchars($updateaccount['diachi']) ?>">
                </div>
            </div>

            <div class="ad-upd-acc-form-group">
                <label for="update_email">Địa chỉ Email</label>
                <div class="ad-upd-acc-input-wrapper">
                    <i class="fas fa-envelope ad-upd-acc-icon"></i>
                    <input type="email" id="update_email" name="up_email" placeholder="Nhập địa chỉ Email (nếu muốn đổi)...">
                </div>
            </div>

            <div class="ad-upd-acc-form-group">
                <label for="new_password">Mật khẩu mới <small>(Bỏ trống nếu không muốn đổi)</small></label>
                <div class="ad-upd-acc-input-wrapper">
                    <i class="fas fa-lock ad-upd-acc-icon"></i>
                    <input type="password" id="new_password" name="up_new_password" placeholder="Nhập mật khẩu mới...">
                </div>
            </div>

            <div class="ad-upd-acc-submit-area">
                <button type="submit" name="Update-btn" class="ad-upd-acc-btn-submit">
                    <i class="fas fa-save"></i> Cập Nhật Thông Tin
                </button>
            </div>

        </form>
    </div>
</div>