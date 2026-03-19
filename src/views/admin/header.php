<div class="container">
    <div class="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <div class="logo">
        <h2 class="tieude"><i class="fas fa-shield-alt"></i> ADMIN</h2>
        <div class="logo1">
            <a href="?admincontroller=admin&action=showInforadmin"><i class="fas fa-tachometer-alt"></i></a>
            <h2 class="tieudebentrong">Dashboard</h2>
        </div>
        <ul class="dssp">
            <li class="has-submenu">
                <label><i class="fas fa-warehouse"></i> Quản lý kho</label>
                <ul class="submenu">
                    <li><a href="#"><i class="fas fa-plus-circle"></i> Thêm kho</a></li>
                    <li><a href="#"><i class="fas fa-edit"></i> Cập nhật</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <label><i class="fas fa-info-circle"></i> Chi tiết sản phẩm</label>
                <ul class="submenu">
                    <li><a href="?admincontroller=admin&action=list_Adminproduct"><i class="fas fa-edit"></i> Cập nhật chi tiết</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <label><i class="fas fa-list"></i> Quản lý loại sản phẩm</label>
                <ul class="submenu">
                    <li><a href="?admincontroller=admin&action=insert_Category"><i class="fas fa-plus-circle"></i> Thêm loại sản phẩm</a></li>
                    <li><a href="?admincontroller=admin&action=list_Category"><i class="fas fa-edit"></i> Cập nhật</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <label><i class="fas fa-box-open"></i> Quản lý sản phẩm</label>
                <ul class="submenu">
                    <li><a href="?admincontroller=admin&action=InsertProduct"><i class="fas fa-plus-circle"></i> Thêm sản phẩm</a></li>
                    <li><a href="?admincontroller=admin&action=list_product"><i class="fas fa-edit"></i> Cập nhật</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <label><i class="fas fa-users"></i> Quản lý tài khoản</label>
                <ul class="submenu">
                    <li><a href="?admincontroller=admin&action=create_UserAdmin"><i class="fas fa-user-plus"></i> Cấp tài khoản</a></li>
                    <li><a href="?admincontroller=admin&action=list_Account"><i class="fas fa-user-edit"></i> Cập nhật tài khoản</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <label><i class="fas fa-newspaper"></i> Quản lý tin tức</label>
                <ul class="submenu">
                    <li><a href="?admincontroller=admin&action=InsertNews"><i class="fas fa-plus-circle"></i> Thêm tin tức</a></li>
                    <li><a href="?admincontroller=admin&action=list_New"><i class="fas fa-edit"></i> Cập nhật tin tức</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <label><i class="fas fa-tags"></i> Quản lý khuyến mãi</label>
                <ul class="submenu">
                    <li><a href="?admincontroller=admin&action=InsertPromotion"><i class="fas fa-plus-circle"></i> Thêm khuyến mãi</a></li>
                    <li><a href="?admincontroller=admin&action=list_Promotion"><i class="fas fa-edit"></i> Cập nhật khuyến mãi</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <label><i class="fas fa-comments"></i> Quản lý bình luận</label>
                <ul class="submenu">
                    <li><a href="?admincontroller=admin&action=list_Review"><i class="fas fa-edit"></i> Cập nhật</a></li>
                </ul>
            </li>
            <li>
                <a href="index.php"><i class="fas fa-home"></i> Trang Home</a>
            </li>
            <li>
                <a href="?admincontroller=admin&action=LogoutAdmin"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </li>
        </ul>
    </div>
</div>
<script>
    // Toggle sidebar on hamburger click
    document.querySelector('.hamburger').addEventListener('click', function () {
        document.querySelector('.logo').classList.toggle('active');
    });

    // Toggle sub-menu on parent menu click
    document.querySelectorAll('.dssp li.has-submenu > label').forEach(function (label) {
        label.addEventListener('click', function (e) {
            e.preventDefault();
            const parentLi = this.parentElement;
            const isActive = parentLi.classList.contains('active');

            // Close all other sub-menus
            document.querySelectorAll('.dssp li.has-submenu').forEach(function (li) {
                li.classList.remove('active');
            });

            // Toggle current sub-menu
            if (!isActive) {
                parentLi.classList.add('active');
            }
        });
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function (e) {
        const logo = document.querySelector('.logo');
        const hamburger = document.querySelector('.hamburger');
        if (window.innerWidth <= 768 && !logo.contains(e.target) && !hamburger.contains(e.target)) {
            logo.classList.remove('active');
        }
    });
</script>