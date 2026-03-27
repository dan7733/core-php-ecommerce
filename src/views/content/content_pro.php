<div class="main-wrapper">
    <?php $isLoggedIn = isset($_SESSION['user_data']) ? 'true' : 'false'; ?>

    <section class="hero-mega-section">
        <div class="hero-slider-main">
            <div class="slide-item active"><img src="./img/slider/sl1.png" alt="Siêu sale điện thoại"></div>
            <div class="slide-item"><img src="./img/slider/sl2.png" alt="Khuyến mãi laptop"></div>
            <div class="slide-item"><img src="./img/slider/sl3.png" alt="Xả kho phụ kiện"></div>
            <div class="slide-item"><img src="./img/slider/sl4.png" alt="Ưu đãi thành viên"></div>
            
            <button class="slider-btn prev" aria-label="Slide trước" onclick="moveSlide(-1)"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-btn next" aria-label="Slide sau" onclick="moveSlide(1)"><i class="fas fa-chevron-right"></i></button>
            
            <div class="slider-dots">
                <span class="dot active" onclick="jumpToSlide(0)"></span>
                <span class="dot" onclick="jumpToSlide(1)"></span>
                <span class="dot" onclick="jumpToSlide(2)"></span>
                <span class="dot" onclick="jumpToSlide(3)"></span>
            </div>
        </div>

        <div class="hero-sub-banners">
            <div class="banner-static fade-up"><img src="./img/slider/sl21.webp" alt="Phụ kiện chính hãng"></div>
            <div class="banner-static fade-up" style="transition-delay: 0.1s;"><img src="./img/slider/sl22.webp" alt="Đồng hồ thông minh"></div>
            <div class="banner-static fade-up" style="transition-delay: 0.2s;"><img src="./img/slider/sl23.webp" alt="Tai nghe giá sốc"></div>
            <div class="banner-static fade-up" style="transition-delay: 0.3s;"><img src="./img/slider/sl24.webp" alt="Ốp lưng thời trang"></div>
        </div>
    </section>

    <section class="product-section fade-up">
        <div class="section-header">
            <h2 class="section-title"><i class="fas fa-fire-alt fire-icon"></i> SẢN PHẨM MỚI NHẤT</h2>
        </div>
        <div class="product-grid">
            <?php if (isset($newProducts) && is_array($newProducts) && !empty($newProducts)) : ?>
                <?php foreach ($newProducts as $product) : ?>
                    <article class="product-card product-card-hot">
                        <span class="badge-new"><i class="fas fa-bolt"></i> MỚI</span>
                        
                        <div class="confetti-container">
                            <div class="confetti"></div>
                            <div class="confetti"></div>
                            <div class="confetti"></div>
                            <div class="confetti"></div>
                            <div class="confetti"></div>
                        </div>
                        
                        <div class="card-img-box">
                            <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" title="<?= htmlspecialchars($product['ten']); ?>">
                                <img src="./img/product/<?= htmlspecialchars($product['hinh']); ?>" alt="<?= htmlspecialchars($product['ten']); ?>">
                            </a>
                            <div class="action-group">
                                <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="action-btn" aria-label="Xem chi tiết"><i class="fas fa-search"></i></a>
                                <button class="action-btn add-to-cart-action-btn" aria-label="Thêm vào giỏ hàng" onclick="handleAddToCart(event, <?= $isLoggedIn ?>, '?controller=cart&action=addcart&idproduct=<?= $product['idsanpham']; ?>')"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="card-content" title="<?= htmlspecialchars($product['ten']); ?>">
                            <h3 class="product-name"><?= htmlspecialchars($product['ten']); ?></h3>
                            <div class="price-box">
                                <span class="price-old"><?= number_format($product['gia'] * 1.2); ?> ₫</span>
                                <span class="price-new"><?= number_format($product['gia']); ?> ₫</span>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="section-footer">
            <a href="?controller=contentbycategory&action=ProductList&new_products&page=1" class="btn-view-all">Xem tất cả <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <section class="product-section fade-up">
        <div class="section-header">
            <h2 class="section-title"><i class="fas fa-mobile-alt"></i> ĐIỆN THOẠI NỔI BẬT</h2>
        </div>
        <div class="product-grid">
            <?php if (isset($productsByPhone) && is_array($productsByPhone) && !empty($productsByPhone)) : ?>
                <?php foreach ($productsByPhone as $product) : ?>
                    <article class="product-card">
                        <div class="card-img-box">
                            <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" title="<?= htmlspecialchars($product['ten']); ?>">
                                <img src="./img/product/<?= htmlspecialchars($product['hinh']); ?>" alt="<?= htmlspecialchars($product['ten']); ?>">
                            </a>
                            <div class="action-group">
                                <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="action-btn" aria-label="Xem chi tiết"><i class="fas fa-search"></i></a>
                                <button class="action-btn add-to-cart-action-btn" aria-label="Thêm vào giỏ hàng" onclick="handleAddToCart(event, <?= $isLoggedIn ?>, '?controller=cart&action=addcart&idproduct=<?= $product['idsanpham']; ?>')"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="card-content" title="<?= htmlspecialchars($product['ten']); ?>">
                            <h3 class="product-name"><?= htmlspecialchars($product['ten']); ?></h3>
                            <div class="price-box">
                                <span class="price-old"><?= number_format($product['gia'] * 1.2); ?> ₫</span>
                                <span class="price-new"><?= number_format($product['gia']); ?> ₫</span>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="section-footer">
            <a href="?controller=contentbycategory&action=ProductList&category_id=1&page=1" class="btn-view-all">Xem tất cả Điện thoại <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <section class="product-section fade-up">
        <div class="section-header">
            <h2 class="section-title"><i class="fas fa-laptop"></i> LAPTOP CHÍNH HÃNG</h2>
        </div>
        <div class="product-grid">
            <?php if (isset($productsByLaptop) && is_array($productsByLaptop) && !empty($productsByLaptop)) : ?>
                <?php foreach ($productsByLaptop as $product) : ?>
                    <article class="product-card">
                        <div class="card-img-box">
                            <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" title="<?= htmlspecialchars($product['ten']); ?>">
                                <img src="./img/product/<?= htmlspecialchars($product['hinh']); ?>" alt="<?= htmlspecialchars($product['ten']); ?>">
                            </a>
                            <div class="action-group">
                                <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="action-btn" aria-label="Xem chi tiết"><i class="fas fa-search"></i></a>
                                <button class="action-btn add-to-cart-action-btn" aria-label="Thêm vào giỏ hàng" onclick="handleAddToCart(event, <?= $isLoggedIn ?>, '?controller=cart&action=addcart&idproduct=<?= $product['idsanpham']; ?>')"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="card-content" title="<?= htmlspecialchars($product['ten']); ?>">
                            <h3 class="product-name"><?= htmlspecialchars($product['ten']); ?></h3>
                            <div class="price-box">
                                <span class="price-old"><?= number_format($product['gia'] * 1.2); ?> ₫</span>
                                <span class="price-new"><?= number_format($product['gia']); ?> ₫</span>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="section-footer">
            <a href="?controller=contentbycategory&action=ProductList&category_id=3&page=1" class="btn-view-all">Xem tất cả Laptop <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <section class="product-section fade-up">
        <div class="section-header">
            <h2 class="section-title"><i class="fas fa-headphones-alt"></i> PHỤ KIỆN TIỆN ÍCH</h2>
        </div>
        <div class="product-grid">
            <?php if (isset($productsByAccessory) && is_array($productsByAccessory) && !empty($productsByAccessory)) : ?>
                <?php foreach ($productsByAccessory as $product) : ?>
                    <article class="product-card">
                        <div class="card-img-box">
                            <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" title="<?= htmlspecialchars($product['ten']); ?>">
                                <img src="./img/product/<?= htmlspecialchars($product['hinh']); ?>" alt="<?= htmlspecialchars($product['ten']); ?>">
                            </a>
                            <div class="action-group">
                                <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="action-btn" aria-label="Xem chi tiết"><i class="fas fa-search"></i></a>
                                <button class="action-btn add-to-cart-action-btn" aria-label="Thêm vào giỏ hàng" onclick="handleAddToCart(event, <?= $isLoggedIn ?>, '?controller=cart&action=addcart&idproduct=<?= $product['idsanpham']; ?>')"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?= $product['idsanpham']; ?>" class="card-content" title="<?= htmlspecialchars($product['ten']); ?>">
                            <h3 class="product-name"><?= htmlspecialchars($product['ten']); ?></h3>
                            <div class="price-box">
                                <span class="price-old"><?= number_format($product['gia'] * 1.2); ?> ₫</span>
                                <span class="price-new"><?= number_format($product['gia']); ?> ₫</span>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="section-footer">
            <a href="?controller=contentbycategory&action=ProductList&category_id=2&page=1" class="btn-view-all">Xem tất cả Phụ kiện <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>
</div>

<script>
    // 1. CHỨC NĂNG THÊM GIỎ HÀNG (SỬ DỤNG MODAL HIỆN ĐẠI)
    function handleAddToCart(event, isLoggedIn, cartUrl) {
        event.preventDefault(); 
        event.stopPropagation(); 
        
        if (!isLoggedIn) {
            // Hiển thị Modal "Chưa đăng nhập" đẹp mắt thay vì Alert
            if(!document.getElementById('eco-auth-modal')) {
                const modalHTML = `
                <div class="eco-modal-overlay" id="eco-auth-modal">
                    <div class="eco-modal-box">
                        <div class="eco-modal-icon"><i class="fas fa-user-lock"></i></div>
                        <h3 class="eco-modal-title">Chưa Đăng Nhập</h3>
                        <p class="eco-modal-desc">Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng và nhận ưu đãi nhé!</p>
                        <div class="eco-modal-actions">
                            <button class="eco-btn-cancel" onclick="closeAuthModal()">Để sau</button>
                            <button class="eco-btn-login" onclick="window.location.href='?controller=log_reg&action=LoginUser'">Đăng nhập ngay</button>
                        </div>
                    </div>
                </div>`;
                document.body.insertAdjacentHTML('beforeend', modalHTML);
            }
            
            // Độ trễ nhẹ để CSS Transition kịp chạy
            setTimeout(() => {
                document.getElementById('eco-auth-modal').classList.add('show');
            }, 10);
            
        } else { 
            // Đã đăng nhập thì chạy thẳng vào giỏ hàng
            window.location.href = cartUrl; 
        }
    }

    function closeAuthModal() {
        const modal = document.getElementById('eco-auth-modal');
        if(modal) {
            modal.classList.remove('show');
        }
    }

    // 2. SLIDER HERO BANNER
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll(".slide-item");
    const dots = document.querySelectorAll(".dot");
    let sliderInterval;

    function renderSlide(index) {
        slides.forEach(slide => slide.classList.remove("active"));
        dots.forEach(dot => dot.classList.remove("active"));
        if (index >= slides.length) currentSlideIndex = 0;
        if (index < 0) currentSlideIndex = slides.length - 1;
        slides[currentSlideIndex].classList.add("active");
        dots[currentSlideIndex].classList.add("active");
    }

    function moveSlide(step) { currentSlideIndex += step; renderSlide(currentSlideIndex); resetInterval(); }
    function jumpToSlide(index) { currentSlideIndex = index; renderSlide(currentSlideIndex); resetInterval(); }
    function startInterval() { sliderInterval = setInterval(() => { moveSlide(1); }, 4500); }
    function resetInterval() { clearInterval(sliderInterval); startInterval(); }
    if(slides.length > 0) startInterval();

    // 3. ANIMATION LƯỚT CHUỘT (CHỈ PC)
    document.addEventListener("DOMContentLoaded", function() {
        if (window.innerWidth > 1024) { 
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); 
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
        } else {
            // Mobile thì bỏ qua hiệu ứng để tránh giật lag
            document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
        }
    });
</script>