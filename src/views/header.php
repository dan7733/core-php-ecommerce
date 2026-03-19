<div class="header-fluid header-container">
    <nav class="header-color navbar navbar-expand-lg">
        <div class="mr-5 px-5">
            <h1><a href="?controller=content_pro&action=showProducts" class="headerlogo_no-text-decoration text-white">LOGO</a></h1>
        </div>
        <button class="navbar-toggler btn-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="header-nav navbar-nav mr-auto">
                <li class="nav-item changcoler dropdown">
                    <form class="d-flex" onsubmit="return setHrefAndNavigate()">
                        <input id="searchInput" class="form-control me-2 search-input" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-light search-btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <a id="searchLink" href="#" style="display: none;">Search Link</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="cart-margin nav-item changcoler dropdown ml-auto">
                    <a class="btn btn-outline-light cart-btn" href="?controller=cart"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                </li>
                <li class="login-margin nav-item mr-auto">
                    <?php
                    if (isset($_SESSION['user_data'])) {
                        echo '<div class="header-infor">
                        <div class="header-hi_user"><a href="user_infor.php">Xin chào ' . $_SESSION['user_data']['ten'] . '</a></div>
                        <button class="logout-btn type="submit" name="logout-btn" onclick="setLogoutHref()"><i class="fa-solid fa-right-from-bracket"></i> thoát</button>
                    </div>
                    <a id="searchLink" href="#" style="display: none;">Search Link</a>';
                    } else {
                        echo '<button class="login-btn btn btn-outline-light" onclick="setLoginHref()"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
                        <a id="searchLink" href="#" style="display: none;">Search Link</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</div>
<script>
    function setHrefAndNavigate() {
        var input = document.getElementById('searchInput').value;
        var link = document.getElementById('searchLink');
        link.href = '?controller=contentbycategory&action=searchProductlist&page_number=1&keysearch=' + encodeURIComponent(input);
        // Simulate a click on the link
        link.click();
        // Prevent the form from submitting traditionally
        return false;
    }
    function setLoginHref() {
        var link = document.getElementById('searchLink');
        link.href = '?controller=log_reg&action=LoginUser';
        // Simulate a click on the link
        link.click();
        // Prevent the default button action (not strictly necessary here)
        return false;
    }
    function setLogoutHref() {
        var link = document.getElementById('searchLink');
        link.href = '?controller=log_reg&action=LogoutUser';
        // Simulate a click on the link
        link.click();
        // Prevent the default button action (not strictly necessary here)
        return false;
    }
</script>