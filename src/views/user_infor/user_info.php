<?php
    if (isset($logouttUserinfor_txtErro) && !empty($logouttUserinfor_txtErro)) {
        echo '<script type="text/javascript">' . $logouttUserinfor_txtErro . '</script>';
        exit;
    }
?>

<div class="profile-dashboard fade-up">
    <div class="profile-header">
        <h1 class="profile-title"><i class="fas fa-id-card"></i> HỒ SƠ CỦA TÔI</h1>
        <p class="profile-subtitle">Quản lý thông tin cá nhân và bảo mật tài khoản</p>
    </div>

    <div class="info-cards-grid">
        
        <div class="info-card">
            <div class="info-icon"><i class="fas fa-user-circle"></i></div>
            <div class="info-data">
                <h6>Họ và Tên</h6>
                <p class="highlight-text"><?php echo $userInfo['ho'] . ' ' . $userInfo['ten']; ?></p>
            </div>
        </div>

        <div class="info-card">
            <div class="info-icon bg-email"><i class="fas fa-envelope"></i></div>
            <div class="info-data">
                <h6>Địa chỉ Email</h6>
                <p><?php echo $userInfo['email']; ?></p>
            </div>
        </div>

        <div class="info-card">
            <div class="info-icon bg-phone"><i class="fas fa-phone-alt"></i></div>
            <div class="info-data">
                <h6>Số điện thoại</h6>
                <p><?php echo $userInfo['sdt'] ? $userInfo['sdt'] : '<span class="text-muted">Chưa cập nhật</span>'; ?></p>
            </div>
        </div>

        <div class="info-card full-width">
            <div class="info-icon bg-address"><i class="fas fa-map-marker-alt"></i></div>
            <div class="info-data">
                <h6>Địa chỉ giao hàng mặc định</h6>
                <p><?php echo $userInfo['diachi'] ? $userInfo['diachi'] : '<span class="text-muted">Chưa thiết lập địa chỉ</span>'; ?></p>
            </div>
        </div>

    </div>
</div>