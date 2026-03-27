<div class="eco-nav-wrapper">
    <div class="eco-nav-container">
        <ul class="eco-nav-list" id="ecoNavList">
            
            <li class="eco-nav-item">
                <a href="?controller=content_pro&action=showProducts" class="eco-nav-link">
                    <i class="fas fa-home"></i> Trang chủ
                </a>
            </li>
            
            <li class="eco-nav-item">
                <a href="?controller=news&action=newsList&page_number=1" class="eco-nav-link">
                    <i class="fas fa-newspaper"></i> Tin tức
                </a>
            </li>
            
            <li class="eco-nav-item">
                <a href="?controller=promotion&action=promotionList&page_number=1" class="eco-nav-link highlight-sale">
                    <i class="fas fa-gift pulse-anim"></i> Khuyến mãi
                </a>
            </li>
            
            <li class="eco-nav-item eco-has-dropdown" id="ecoDropdownItem">
                <a href="#" class="eco-nav-link" onclick="toggleEcoDropdown(event)">
                    <i class="fas fa-layer-group"></i> Danh mục <i class="fas fa-chevron-down arrow-down"></i>
                </a>
                
                <ul class="eco-submenu">
                    <?php if (!empty($categorys)) : ?>
                        <?php foreach ($categorys as $category) : ?>
                            <?php 
                                $catIcon = !empty($category['icon']) ? $category['icon'] : 'fas fa-tag'; 
                            ?>
                            <li class="eco-submenu-item">
                                <a href="?controller=contentbycategory&action=ProductList&category_id=<?php echo $category['id']; ?>&page_number=1" class="eco-submenu-link">
                                    <i class="<?php echo $catIcon; ?>"></i> <span><?php echo $category['ten']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="eco-submenu-item">
                            <a href="#" class="eco-submenu-link">
                                <i class="fas fa-info-circle"></i> <span>Chưa có danh mục</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
            
            <?php if (isset($_SESSION['user_data']) && $_SESSION['user_data']['quyen'] == 1) : ?>
                <li class="eco-nav-item">
                    <a href="admin.php" class="eco-nav-link btn-admin-nav">
                        <i class="fas fa-shield-alt"></i> Quản trị
                    </a>
                </li>
            <?php endif; ?>
            
        </ul>
    </div>
</div>

<script>
    // XỬ LÝ CHẠM MỞ/ĐÓNG SUBMENU TRÊN ĐIỆN THOẠI VÀ PC
    function toggleEcoDropdown(e) {
        e.preventDefault(); 
        e.stopPropagation();
        const dropdownItem = document.getElementById('ecoDropdownItem');
        dropdownItem.classList.toggle('is-open');
    }

    // Bấm ra ngoài khoảng trống -> Tự tắt Submenu
    document.addEventListener('click', function(e) {
        const dropdownItem = document.getElementById('ecoDropdownItem');
        if (dropdownItem && dropdownItem.classList.contains('is-open') && !dropdownItem.contains(e.target)) {
            dropdownItem.classList.remove('is-open');
        }
    });

    // Bổ sung Hover mượt cho PC
    if (window.innerWidth > 768) {
        const dropdownItem = document.getElementById('ecoDropdownItem');
        if(dropdownItem) {
            dropdownItem.addEventListener('mouseenter', () => dropdownItem.classList.add('is-open'));
            dropdownItem.addEventListener('mouseleave', () => dropdownItem.classList.remove('is-open'));
        }
    }
</script>