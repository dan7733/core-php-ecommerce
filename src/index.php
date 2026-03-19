<?php
session_start();
require './core/database.php';
require './models/baseModel.php';
require './controllers/baseController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./views/css/style.css">
    <link rel="stylesheet" href="./views/css/header.css">
    <link rel="stylesheet" href="./views/css/menu.css">
    <link rel="stylesheet" href="./views/css/slider.css">
    <link rel="stylesheet" href="./views/css/category.css">
    <link rel="stylesheet" href="./views/css/footer.css">
    <link rel="stylesheet" href="./views/css/content_pro.css">
    <link rel="stylesheet" href="./views/css/contentbycategory.css">
    <link rel="stylesheet" href="./views/css/detail_product.css">
    <link rel="stylesheet" href="./views/css/detail_news.css">
    <link rel="stylesheet" href="./views/css/news.css">
    <link rel="stylesheet" href="./views/css/searchcontent.css">
    <link rel="stylesheet" href="./views/css/log.css">
    <link rel="stylesheet" href="./views/css/reg.css">
    <link rel="stylesheet" href="./views/css/cart.css">
    <link rel="stylesheet" href="./views/css/promotion.css">
    <link rel="stylesheet" href="./views/css/detail_promotion.css">
</head>

<body>
    <div class="header-topBanner">
        <img src="./img/bannerf.jpg" alt="">
    </div>
    <div class="header">
        <?php
        require './views/header.php';
        require './controllers/menuController.php';
        $show_menuController = new menuController();
        $show_menuController->showCategorys();
        ?>
    </div>
    <div class="main">
        <?php
        // Kiểm tra xem có tham số controller không
        if (isset($_GET['controller'])) {
            $controllerName = $_GET['controller'] . 'Controller';
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
            require './controllers/content_proController.php';
            $show_ProController = new content_proController();
            $show_ProController->showProducts(10, 5);
        }
        ?>
    </div>
    <div class="footer">
        <?php
        require './views/footer.php';
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>