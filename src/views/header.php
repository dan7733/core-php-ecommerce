<header class="shop-header-wrapper">
    <div class="shop-header-container">
        <a href="?controller=content_pro&action=showProducts" class="shop-logo">
            <i class="fas fa-store"></i> LOGO
        </a>

        <div class="shop-search-box">
            <form onsubmit="return handleSearchSubmit(event)">
                <input type="text" id="searchInput" class="search-input" placeholder="Bạn muốn tìm gì hôm nay?" required>
                <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="shop-header-actions">
            <a href="?controller=cart" class="header-action-btn cart-link">
                <i class="fas fa-shopping-cart"></i> 
                <span class="action-text">Giỏ hàng</span>
            </a>

            <?php if (isset($_SESSION['user_data'])) : ?>
                <div class="header-user-group">
                    <a href="user_infor.php" class="header-action-btn user-link">
                        <i class="fas fa-user-circle"></i> 
                        <span class="action-text">Chào, <?= $_SESSION['user_data']['ten'] ?></span>
                    </a>
                    <a href="?controller=log_reg&action=LogoutUser" class="header-action-btn logout-link" title="Đăng xuất">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            <?php else : ?>
                <a href="?controller=log_reg&action=LoginUser" class="header-action-btn login-link">
                    <i class="fas fa-user"></i> 
                    <span class="action-text">Đăng nhập</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<script>
    function handleSearchSubmit(event) {
        event.preventDefault(); 
        const inputVal = document.getElementById('searchInput').value.trim();
        if (inputVal !== "") {
            // Chuyển hướng sang trang tìm kiếm
            const searchUrl = '?controller=contentbycategory&action=searchProductlist&page_number=1&keysearch=' + encodeURIComponent(inputVal);
            window.location.href = searchUrl;
        }
        return false;
    }
</script>