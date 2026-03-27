<?php
session_start();
if (!isset($_SESSION['user_data'])) {
    header('Location: index.php');
    exit;
}
require './core/database.php';
require './models/baseModel.php';
require './controllers/baseController.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân | Tài khoản</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./views/css/user_info.css">
</head>
<body>
    <div class="main-wrapper">

        <header class="main-header">
            <div class="container-fluid px-3 px-md-4">
                <div class="d-flex align-items-center justify-content-between py-3">
                    
                    <button id="sidebarToggle" class="btn-menu-mobile d-md-none">
                        <i class="fas fa-bars"></i>
                    </button>

                    <a href="index.php" class="brand-logo text-white">
                        <i class="fas fa-store mr-2 d-none d-md-inline-block"></i>
                        <span class="font-weight-bold">HỆ THỐNG CỬA HÀNG</span>
                    </a>

                    <div class="desktop-menu d-none d-md-flex align-items-center gap-3">
                        <a href="index.php" class="header-btn"><i class="fas fa-home"></i> Trang chủ</a>
                        <a href="index.php?controller=content_pro&action=showProducts" class="header-btn"><i class="fas fa-box-open"></i> Sản phẩm</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <div class="d-flex" id="wrapper">
            
            <?php require './views/user_infor/user_sidebar.php'; ?>

            <div id="page-content-wrapper" class="flex-grow-1">
                <main class="content-area">
                    <?php
                    if (isset($_GET['userinforcontroller'])) {
                        $controllerName = $_GET['userinforcontroller'] . 'Controller';
                        $actionName = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : 'index';
                        $controllerFile = "./controllers/" . $controllerName . ".php";
                        if (file_exists($controllerFile)) {
                            require $controllerFile;
                            $controllerObject = new $controllerName;
                            $controllerObject->$actionName();
                        }
                    } else {
                        require './controllers/user_inforController.php';
                        $show_infor = new user_inforController();
                        $show_infor->showUserInfo();
                    }

                    if (isset($logouttUserinfor_txtErro) && !empty($logouttUserinfor_txtErro)) {
                        echo '<script type="text/javascript">' . $logouttUserinfor_txtErro . '</script>';
                        exit;
                    }
                    ?>
                </main>
            </div>
        </div>
    </div>

    <script>
        const wrapper = document.getElementById('wrapper');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const closeBtn = document.getElementById('closeSidebar');

        // Mở/Đóng Sidebar trên Mobile
        function toggleSidebar() {
            wrapper.classList.toggle('toggled');
            overlay.classList.toggle('active');
        }

        if(toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
        if(closeBtn) closeBtn.addEventListener('click', toggleSidebar);
        if(overlay) overlay.addEventListener('click', toggleSidebar);

        // Hiệu ứng Fade-up khi load trang
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
            }, 100);
        });
    </script>
</body>
</html>