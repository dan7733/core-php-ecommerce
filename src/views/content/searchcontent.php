<div class="main-wrapper">
    <?php 
        $isLoggedIn = isset($_SESSION['user_data']) ? 'true' : 'false'; 
        // Logic lấy trang hiện tại
        $currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
        if ($currentPage < 1) $currentPage = 1;
    ?>

    <div class="search-header-section">
        <?php if ($searchproductList) : ?>
            <h1 class="search-title">
                <i class="fas fa-search"></i> KẾT QUẢ TÌM KIẾM: <span class="highlight-keyword">"<?= htmlspecialchars($keysearch ?? '') ?>"</span>
            </h1>
            <p class="search-subtitle">Tìm thấy <strong><?= count($searchproductList) ?></strong> sản phẩm phù hợp.</p>
        <?php else : ?>
            <h1 class="search-title error-title"><i class="fas fa-box-open"></i> KHÔNG TÌM THẤY SẢN PHẨM</h1>
            <p class="search-subtitle">Rất tiếc, chúng tôi không tìm thấy kết quả nào cho từ khóa của bạn. Vui lòng thử lại!</p>
        <?php endif; ?>
    </div>

    <?php if ($searchproductList) : ?>
        <div class="filter-bar-container fade-up">
            <div class="filter-group">
                <label><i class="fas fa-filter"></i> Lọc theo giá:</label>
                <select id="priceFilter" class="modern-select" onchange="filterAndSortProducts()">
                    <option value="all">Tất cả mức giá</option>
                    <option value="under5">Dưới 5.000.000₫</option>
                    <option value="5to10">5.000.000₫ - 10.000.000₫</option>
                    <option value="10to20">10.000.000₫ - 20.000.000₫</option>
                    <option value="over20">Trên 20.000.000₫</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label><i class="fas fa-sort-amount-down"></i> Sắp xếp:</label>
                <select id="priceSort" class="modern-select" onchange="filterAndSortProducts()">
                    <option value="default">Mặc định</option>
                    <option value="asc">Giá: Thấp đến Cao</option>
                    <option value="desc">Giá: Cao đến Thấp</option>
                </select>
            </div>
        </div>

        <div class="product-grid" id="searchProductGrid">
            <?php foreach ($searchproductList as $searchproduct) : ?>
                <article class="product-card fade-up product-item" data-price="<?= $searchproduct['gia'] ?>">
                    <div class="card-img-box">
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?= $searchproduct['idsanpham']; ?>">
                            <img src="./img/product/<?= $searchproduct['hinh']; ?>" alt="<?= htmlspecialchars($searchproduct['ten']); ?>">
                        </a>
                        <div class="action-group">
                            <a href="?controller=product&action=showDetailproducts&idproduct=<?= $searchproduct['idsanpham']; ?>" class="action-btn" aria-label="Xem chi tiết"><i class="fas fa-search"></i></a>
                            <button class="action-btn add-to-cart-action-btn" aria-label="Thêm vào giỏ hàng" onclick="handleAddToCart(event, <?= $isLoggedIn ?>, '?controller=cart&action=addcart&idproduct=<?= $searchproduct['idsanpham']; ?>')">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="?controller=product&action=showDetailproducts&idproduct=<?= $searchproduct['idsanpham']; ?>" class="card-content">
                        <h3 class="product-name" title="<?= htmlspecialchars($searchproduct['ten']); ?>"><?= htmlspecialchars($searchproduct['ten']); ?></h3>
                        <div class="price-box">
                            <span class="price-old"><?= number_format($searchproduct['gia'] * 1.2); ?> ₫</span>
                            <span class="price-new"><?= number_format($searchproduct['gia']); ?> ₫</span>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if(isset($totalPages) && $totalPages > 1): ?>
            <div class="modern-pagination fade-up">
                <?php 
                    $visiblePages = 5; // Số trang tối đa hiển thị
                    $startPage = max(1, $currentPage - floor($visiblePages / 2));
                    $endPage = min($totalPages, $startPage + $visiblePages - 1);
                    
                    if ($endPage - $startPage + 1 < $visiblePages) {
                        $startPage = max(1, $endPage - $visiblePages + 1);
                    }
                ?>
                
                <?php if ($currentPage > 1) : ?>
                    <a href="?controller=contentbycategory&action=searchProductlist&page_number=<?= $currentPage - 1 ?>&keysearch=<?= urlencode($keysearch) ?>" class="page-num"><i class="fas fa-chevron-left"></i></a>
                <?php endif; ?>

                <?php if ($startPage > 1) : ?>
                    <a href="?controller=contentbycategory&action=searchProductlist&page_number=1&keysearch=<?= urlencode($keysearch) ?>" class="page-num">1</a>
                    <span class="page-dots">...</span>
                <?php endif; ?>

                <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                    <a href="?controller=contentbycategory&action=searchProductlist&page_number=<?= $i ?>&keysearch=<?= urlencode($keysearch) ?>" class="page-num <?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($endPage < $totalPages) : ?>
                    <span class="page-dots">...</span>
                    <a href="?controller=contentbycategory&action=searchProductlist&page_number=<?= $totalPages ?>&keysearch=<?= urlencode($keysearch) ?>" class="page-num"><?= $totalPages ?></a>
                <?php endif; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <a href="?controller=contentbycategory&action=searchProductlist&page_number=<?= $currentPage + 1 ?>&keysearch=<?= urlencode($keysearch) ?>" class="page-num"><i class="fas fa-chevron-right"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="empty-search-box fade-up">
            <img src="./img/empty-search.png" alt="Không tìm thấy" onerror="this.src='https://cdn-icons-png.flaticon.com/512/6134/6134065.png'">
            <a href="?controller=content_pro&action=showProducts" class="btn-back-home ripple-btn"><i class="fas fa-home"></i> QUAY LẠI TRANG CHỦ</a>
        </div>
    <?php endif; ?>
</div>

<script>
    // JS Bộ Lọc Giá (Filter & Sort)
    function filterAndSortProducts() {
        const filterValue = document.getElementById('priceFilter').value;
        const sortValue = document.getElementById('priceSort').value;
        const grid = document.getElementById('searchProductGrid');
        if(!grid) return;
        const products = Array.from(grid.getElementsByClassName('product-item'));
        let visibleProducts = [];

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

        if (sortValue !== 'default') {
            visibleProducts.sort((a, b) => {
                const priceA = parseFloat(a.getAttribute('data-price'));
                const priceB = parseFloat(b.getAttribute('data-price'));
                return sortValue === 'asc' ? priceA - priceB : priceB - priceA;
            });
            visibleProducts.forEach(product => grid.appendChild(product));
        }
    }

    // Modal Giỏ Hàng (Mượt mà, không giật trang)
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

    // Hiệu ứng Fade Up khi load trang
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