<div class="menu-container container-fluid bg-dark">
    <nav class="menu-navbar-container navbar-container navbar navbar-expand">
        <ul class="menu-nav navbar-nav">
            <li class="menu-item nav-item">
                <a class="menu-link nav-link menu-text active" href="?controller=content_pro&action=showProducts"><i class="fas fa-home"></i> Trang chủ</a>
            </li>
            <li class="menu-item nav-item">
                <a class="menu-link nav-link menu-text active" href="?controller=news&action=newsList&page_number=1"><i class="fas fa-newspaper"></i> Tin tức</a>
            </li>
            <li class="menu-item nav-item">
                <a class="menu-link nav-link menu-text active" href="?controller=promotion&action=promotionList&page_number=1"><i class="fas fa-gift"></i> Khuyến mãi</a>
            </li>
            <li class="menu-item nav-item dropdown">
                <a class="menu-link nav-link menu-text active dropdown-toggle" href="#" id="navbarDropdown1" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-list"></i> Danh mục khác
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <?php if (!empty($categorys)) : ?>
                        <?php foreach ($categorys as $category) : ?>
                            <a class="menu-dropitem dropdown-item" href="?controller=contentbycategory&action=ProductList&category_id=<?php echo $category['id']; ?>&page_number=1">
                                <i class="<?php echo $category['icon']; ?>"></i> <?php echo $category['ten']; ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No categories available.</p>
                    <?php endif; ?>
                </div>
            </li>
            <?php
            if (isset($_SESSION['user_data']) && $_SESSION['user_data']['quyen'] == 1) {
                echo '<li class="menu-item nav-item">
                                <a class="menu-link nav-link menu-text active" href="admin.php">Quay lại trang Quản trị</a>
                            </li>';
            }
            ?>
        </ul>
    </nav>
</div>