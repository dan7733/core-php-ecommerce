<nav id="sidebar" class="sidebar">
    <div class="sidebar-mobile-header d-md-none">
        <h5 class="text-white mb-0 font-weight-bold">Tài khoản của bạn</h5>
        <button class="btn-close-sidebar" id="closeSidebar">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="sidebar-profile text-center">
        <div class="avatar-wrapper">
            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_data']['ten'] ?? 'U'); ?>&background=random&color=fff&size=120" class="avatar-img" alt="Avatar">
            <div class="avatar-status"></div>
        </div>
        <h3 class="user-greeting"><?php echo $_SESSION['user_data']['ho'] ?? ''; ?> <?php echo $_SESSION['user_data']['ten'] ?? 'Người dùng'; ?></h3>
        <span class="user-role text-success"><i class="fas fa-check-circle"></i> Thành viên</span>
    </div>

    <ul class="sidebar-nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?= (!isset($_GET['action']) || $_GET['action'] == 'showUserInfo') ? 'active' : '' ?>" href="?userinforcontroller=user_infor&action=showUserInfo">
                <i class="fas fa-user-cog"></i> <span>Hồ sơ cá nhân</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (isset($_GET['action']) && $_GET['action'] == 'changeUserName') ? 'active' : '' ?>" href="?userinforcontroller=user_infor&action=changeUserName">
                <i class="fas fa-signature"></i> <span>Đổi họ tên</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (isset($_GET['action']) && $_GET['action'] == 'changeUserEmail') ? 'active' : '' ?>" href="?userinforcontroller=user_infor&action=changeUserEmail">
                <i class="fas fa-envelope-open-text"></i> <span>Cập nhật Email</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (isset($_GET['action']) && $_GET['action'] == 'changeUserPhone') ? 'active' : '' ?>" href="?userinforcontroller=user_infor&action=changeUserPhone">
                <i class="fas fa-mobile-alt"></i> <span>Đổi số điện thoại</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (isset($_GET['action']) && $_GET['action'] == 'changeUserAddress') ? 'active' : '' ?>" href="?userinforcontroller=user_infor&action=changeUserAddress">
                <i class="fas fa-map-marked-alt"></i> <span>Sổ địa chỉ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= (isset($_GET['action']) && $_GET['action'] == 'changeUserPass') ? 'active' : '' ?>" href="?userinforcontroller=user_infor&action=changeUserPass">
                <i class="fas fa-shield-alt"></i> <span>Bảo mật mật khẩu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-box-open"></i> <span>Quản lý đơn hàng</span>
            </a>
        </li>
        
        <li class="nav-divider"></li>

        <li class="nav-item">
            <a class="nav-link text-danger logout-btn" href="?userinforcontroller=user_infor&action=logoutUserinfor">
                <i class="fas fa-sign-out-alt"></i> <span>Đăng xuất</span>
            </a>
        </li>
    </ul>
</nav>