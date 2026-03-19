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
    <title>Thông tin cá nhân</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS mới - tối ưu mobile -->
    <link rel="stylesheet" href="./views/css/user_info.css">
</head>
<body>
    <div class="main-wrapper">

        <!-- HEADER CHÍNH (Desktop + Mobile) - Duy nhất một header đẹp -->
        <header class="main-header">
            <div class="container-fluid px-3 px-md-4">
                <div class="d-flex align-items-center justify-content-between py-3">
                    <!-- Nút mở sidebar (chỉ hiện mobile) -->
                    <button id="sidebarToggle" class="btn btn-link text-white p-0">
                        <i class="fas fa-bars fa-2xl"></i>
                    </button>

                    <!-- Tiêu đề trang (mobile) / Logo (desktop) -->
                    <h1 class="page-title mb-0 text-white font-weight-bold d-md-none">Thông tin cá nhân</h1>
                    <a href="index.php" class="brand text-white font-weight-bold d-none d-md-flex align-items-center">
                        <i class="fas fa-home mr-2"></i> Trang chủ
                    </a>

                    <!-- Menu desktop -->
                    <div class="desktop-menu d-none d-md-flex align-items-center">
                        <a href="index.php" class="btn btn-outline-light mr-3">Trang chủ</a>
                        <a href="index.php?controller=content_pro&action=showProducts" class="btn btn-outline-light">Sản phẩm</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- OVERLAY khi mở sidebar (mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Layout chính -->
        <div class="d-flex" id="wrapper">
            <!-- SIDEBAR -->
            <?php require './views/user_infor/user_sidebar.php'; ?>

            <!-- CONTENT -->
            <div id="page-content-wrapper" class="flex-grow-1">
                <main class="content">
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

    <!-- JS toggle sidebar + overlay -->
    <script>
        const wrapper = document.getElementById('wrapper');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', function () {
            wrapper.classList.toggle('toggled');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', function () {
            wrapper.classList.remove('toggled');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>