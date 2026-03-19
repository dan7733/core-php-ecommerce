<!-- Mobile + Desktop Header -->
<header class="desktop-header d-none d-md-block">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #218282; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <div class="container-fluid">
            <a class="navbar-brand text-white font-weight-bold" href="index.php">
                <i class="fas fa-home mr-2"></i> Trang chủ
            </a>
            <div class="ml-auto">
                <a href="index.php" class="btn btn-outline-light mr-3">Trang chủ</a>
                <a href="index.php?controller=content_pro&action=showProducts" class="btn btn-outline-light">Sản phẩm</a>
            </div>
        </div>
    </nav>
</header>

<!-- Chỉ hiển thị trên Mobile -->
<header class="mobile-header d-md-none fixed-top" style="background-color: #218282; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <div class="d-flex align-items-center justify-content-between p-3">
        <button id="sidebarToggle" class="btn btn-link text-white p-0">
            <i class="fas fa-bars fa-lg"></i>
        </button>
        <h5 class="text-white mb-0 font-weight-bold">Thông tin cá nhân</h5>
        <div></div> <!-- Để cân bằng layout -->
    </div>
</header>