<nav id="sidebar" class="sidebar">
    <!-- Nút đóng sidebar (chỉ hiện mobile) -->
    <div class="sidebar-header d-md-none p-3 border-bottom border-light">
        <button class="btn btn-link text-white float-right p-0" id="closeSidebar">
            <i class="fas fa-times fa-lg"></i>
        </button>
        <h5 class="text-white mb-0">Menu tài khoản</h5>
    </div>

    <div class="sidebar-body">
        <div class="text-center my-4">
            <img src="https://via.placeholder.com/120" class="avatar rounded-circle" alt="Avatar">
            <h6 class="text-white mt-3 mb-0 font-weight-bold"><?php echo $_SESSION['user_data']['ten'] ?? 'Người dùng'; ?></h6>
        </div>

        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link active" href="?userinforcontroller=user_infor&action=showUserInfo">
                    <i class="fas fa-user mr-3"></i> Thông tin người dùng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?userinforcontroller=user_infor&action=changeUserName">
                    <i class="fas fa-edit mr-3"></i> Thay đổi tên
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?userinforcontroller=user_infor&action=changeUserEmail">
                    <i class="fas fa-envelope mr-3"></i> Thay đổi Email
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?userinforcontroller=user_infor&action=changeUserPass">
                    <i class="fas fa-lock mr-3"></i> Thay đổi mật khẩu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?userinforcontroller=user_infor&action=changeUserAddress">
                    <i class="fas fa-home mr-3"></i> Thay đổi địa chỉ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?userinforcontroller=user_infor&action=changeUserPhone">
                    <i class="fas fa-phone mr-3"></i> Thay đổi số điện thoại
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-box mr-3"></i> Quản lý đơn hàng
                </a>
            </li>
            <li class="nav-item mt-4 border-top border-light pt-3">
                <a class="nav-link text-danger" href="?userinforcontroller=user_infor&action=logoutUserinfor">
                    <i class="fas fa-sign-out-alt mr-3"></i> Đăng xuất
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
// Đóng sidebar khi nhấn nút X
document.getElementById('closeSidebar')?.addEventListener('click', function () {
    document.getElementById('wrapper').classList.remove('toggled');
    document.getElementById('sidebarOverlay').classList.remove('active');
});
</script>