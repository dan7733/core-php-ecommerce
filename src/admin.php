<?php
session_start();
if (!isset($_SESSION['user_data']) || $_SESSION['user_data']['quyen'] != 1) {
    header('Location: index.php');
    exit;
}
require './core/database.php';
require './models/baseModel.php';
require './controllers/baseController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./views/admin/css/header.css">
    <link rel="stylesheet" href="./views/admin/css/admin_infor.css">
    <link rel="stylesheet" href="./views/admin/css/chitietsanpham.css">
    <link rel="stylesheet" href="./views/admin/css/gdadmin.css">
    <link rel="stylesheet" href="./views/admin/css/sitebar.css">
    <link rel="stylesheet" href="./views/admin/css/them-capnhatchitietsanpham.css">
    <link rel="stylesheet" href="./views/admin/css/thongtinsanphamthem-cn.css">
    <link rel="stylesheet" href="./views/admin/css/them-capnhatloai.css">
    <link rel="stylesheet" href="./views/admin/css/list_category.css">
    <link rel="stylesheet" href="./views/admin/css/list_detailproduct.css">
    <link rel="stylesheet" href="./views/admin/css/list_product.css">
    <link rel="stylesheet" href="./views/admin/css/list_account.css">
    <link rel="stylesheet" href="./views/admin/css/list_review.css">
    <link rel="stylesheet" href="./views/admin/css/list_news.css">
    <link rel="stylesheet" href="./views/admin/css/insert_news.css">
    <link rel="stylesheet" href="./views/admin/css/insert_promotion.css">
    <link rel="stylesheet" href="./views/admin/css/list_promotion.css">
    <link rel="stylesheet" href="./views/admin/css/create_accountadmim.css">
    <link rel="stylesheet" href="./views/admin/css/update_account.css">
</head>
<body>
    <?php
        require './views/admin/header.php';
        if (isset($_GET['admincontroller'])) {
            $controllerName = $_GET['admincontroller'] . 'Controller';
            // Chuyển action thành chữ thường và gán mặc định là 'index' nếu không có
            $actionName = isset($_REQUEST['action']) ? strtolower($_REQUEST['action']) : 'index';
            // Kiểm tra xem file controller có tồn tại không
            $controllerFile = "./controllers/" . $controllerName . ".php";
            if (file_exists($controllerFile)) {
                require $controllerFile;
                // Khởi tạo controller object
                $controllerObject = new $controllerName;
                // Gọi action tương ứng
                $controllerObject->$actionName();
            } else {
                echo "File controller không tồn tại";
            }
        } else {
            require './controllers/adminController.php';
            $AdminshowController = new adminController();
            $AdminshowController->showInforadmin();
        }
    ?>
</body>
</html>