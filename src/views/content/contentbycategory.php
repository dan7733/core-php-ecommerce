<div class="main-wrapper">
    <div class="category-header-section">
        <h1 class="category-title">
            <?php if (isset($newProducts) && $newProducts) : ?>
                <i class="fas fa-star"></i> SẢN PHẨM MỚI NHẤT
            <?php else : ?>
                <i class="fas fa-th-large"></i> SẢN PHẨM THEO DANH MỤC
            <?php endif; ?>
        </h1>
    </div>

    <?php if (isset($productList) && !empty($productList)) : ?>
        <div class="filter-bar-container fade-up">
            <div class="filter-group">
                <label><i class="fas fa-filter"></i> Mức giá:</label>
                <select id="priceFilter" class="modern-select" onchange="filterAndSortCategory()">
                    <option value="all">Tất cả mức giá</option>
                    <option value="under5">Dưới 5.000.000₫</option>
                    <option value="5to10">5.000.000₫ - 10.000.000₫</option>
                    <option value="10to20">10.000.000₫ - 20.000.000₫</option>
                    <option value="over20">Trên 20.000.000₫</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label><i class="fas fa-sort-amount-down"></i> Sắp xếp:</label>
                <select id="priceSort" class="modern-select" onchange="filterAndSortCategory()">
                    <option value="default">Mặc định</option>
                    <option value="asc">Giá: Thấp đến Cao</option>
                    <option value="desc">Giá: Cao đến Thấp</option>
                </select>
            </div>
        </div>

        <div class="product-grid" id="categoryProductGrid">
            <?php foreach ($productList as $product) : ?>
                <article class="product-card fade-up product-item <?php echo (isset($newProducts) && $newProducts) ? 'product-card-hot' : ''; ?>" data-price="<?= $product['gia'] ?>">
                    
                    <div class="card-img-box">
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>">
                            <img src="./img/product/<?= $product['hinh']; ?>" alt="<?= $product['ten']; ?>">
                        </a>
                        <div class="action-group">
                            <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="action-btn" title="Xem chi tiết"><i class="fas fa-search"></i></a>
                            
                            <?php $isLoggedIn = isset($_SESSION['user_data']) ? 'true' : 'false'; ?>
                            <button class="action-btn add-to-cart-action-btn" title="Thêm vào giỏ hàng" onclick="handleAddToCart(event, <?= $isLoggedIn ?>, '?controller=cart&action=addcart&idproduct=<?= $product['idsanpham']; ?>')">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="card-content">
                        <h3 class="product-name" title="<?= $product['ten']; ?>"><?= $product['ten']; ?></h3>
                        <div class="price-box">
                            <span class="price-old"><?= number_format($product['gia'] * 1.2); ?> ₫</span>
                            <span class="price-new"><?= number_format($product['gia']); ?> ₫</span>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="modern-pagination fade-up">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <?php 
                        $link = "?controller=contentbycategory&action=ProductList";
                        if (isset($newProducts) && $newProducts) $link .= "&new_products";
                        if (isset($_GET['category_id'])) $link .= "&category_id=" . $_GET['category_id'];
                        $link .= "&page_number=$i";
                        
                        // Kiểm tra trang hiện tại để add class active
                        $isActive = (isset($_GET['page_number']) && $_GET['page_number'] == $i) || (!isset($_GET['page_number']) && $i == 1) ? 'active' : '';
                    ?>
                    <a href="<?= $link ?>" class="page-num <?= $isActive ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    <?php else : ?>
        <div class="empty-category-box fade-up">
            <img src="./img/empty-box.png" alt="Trống" onerror="this.src='https://cdn-icons-png.flaticon.com/512/7434/7434318.png'">
            <h2>Hiện tại không có sản phẩm nào trong danh mục này.</h2>
            <a href="?controller=content_pro&action=showProducts" class="btn-back-home ripple-btn"><i class="fas fa-store"></i> TIẾP TỤC MUA SẮM</a>
        </div>
    <?php endif; ?>
</div>

<script>
    // Xử lý Lọc và Sắp xếp
    function filterAndSortCategory() {
        const filterValue = document.getElementById('priceFilter').value;
        const sortValue = document.getElementById('priceSort').value;
        const grid = document.getElementById('categoryProductGrid');
        if(!grid) return;
        const products = Array.from(grid.getElementsByClassName('product-item'));
        let visibleProducts = [];

        // 1. Lọc giá
        products.forEach(product => {
            const price = parseFloat(product.getAttribute('data-price'));
            let show = false;

            if (filterValue === 'all') show = true;
            else if (filterValue === 'under5' && price < 5000000) show = true;
            else if (filterValue === '5to10' && price >= 5000000 && price <= 10000000) show = true;
            else if (filterValue === '10to20' && price > 10000000 && price <= 20000000) show = true;
            else if (filterValue === 'over20' && price > 20000000) show = true;

            if (show) {
                product.style.display = 'flex';
                visibleProducts.push(product);
            } else {
                product.style.display = 'none';
            }
        });

        // 2. Sắp xếp giá
        if (sortValue !== 'default') {
            visibleProducts.sort((a, b) => {
                const priceA = parseFloat(a.getAttribute('data-price'));
                const priceB = parseFloat(b.getAttribute('data-price'));
                return sortValue === 'asc' ? priceA - priceB : priceB - priceA;
            });
            visibleProducts.forEach(product => grid.appendChild(product));
        }
    }

    // Xử lý Modal Thêm vào giỏ hàng (Chống load trang, hiển thị mượt mà)
    function handleAddToCart(event, isLoggedIn, cartUrl) {
        event.preventDefault(); 
        event.stopPropagation(); 
        
        if (!isLoggedIn) {
            if(!document.getElementById('eco-auth-modal')) {
                const modalHTML = `
                <div class="eco-modal-overlay" id="eco-auth-modal">
                    <div class="eco-modal-box">
                        <button class="btn-close-modal" aria-label="Đóng" onclick="closeAuthModal();" style="position:absolute; top:15px; right:20px; background:none; border:none; font-size:24px; cursor:pointer; color:#999;"><i class="fas fa-times"></i></button>
                        <div class="eco-modal-icon" style="width:70px; height:70px; background:#fff4e5; color:#ff9800; border-radius:50%; display:flex; justify-content:center; align-items:center; font-size:32px; margin:0 auto 20px; box-shadow:0 0 20px rgba(255,152,0,0.2);"><i class="fas fa-user-lock"></i></div>
                        <h3 class="eco-modal-title" style="font-size:24px; font-weight:800; color:#222; margin-bottom:12px;">Chưa Đăng Nhập</h3>
                        <p class="eco-modal-desc" style="font-size:16px; color:#666; margin-bottom:25px; line-height:1.5;">Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng và nhận ưu đãi nhé!</p>
                        <div class="eco-modal-actions" style="display:flex; gap:12px; justify-content:center;">
                            <button onclick="closeAuthModal()" style="padding:12px 10px; border:none; border-radius:10px; background:#f0f0f0; color:#555; cursor:pointer; font-size:16px; font-weight:700; flex:1; transition:0.2s;">Để sau</button>
                            <button onclick="window.location.href='?controller=log_reg&action=LoginUser'" style="padding:12px 10px; border:none; border-radius:10px; background:var(--deep-green, #0a5c36); color:#fff; cursor:pointer; font-size:16px; font-weight:700; flex:1.2; transition:0.2s; box-shadow:0 5px 15px rgba(10,92,54,0.2);">Đăng nhập ngay</button>
                        </div>
                    </div>
                </div>`;
                document.body.insertAdjacentHTML('beforeend', modalHTML);
            }
            setTimeout(() => { document.getElementById('eco-auth-modal').classList.add('show'); }, 10);
        } else {
            window.location.href = cartUrl;
        }
    }

    function closeAuthModal() {
        const modal = document.getElementById('eco-auth-modal');
        if(modal) modal.classList.remove('show');
    }

    // Hiệu ứng load trang (Fade-up)
    document.addEventListener("DOMContentLoaded", function() {
        if (window.innerWidth > 1024) { 
            setTimeout(() => {
                document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
            }, 100);
        } else {
            document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
        }
    });
</script>