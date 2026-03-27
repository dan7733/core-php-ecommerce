<div id="toast-container"></div>

<?php
$toastScript = "";
if (isset($Order_txtErro) && !empty($Order_txtErro)) {
    $toastScript .= "showToast('{$Order_txtErro}', 'warning');";
}
if (isset($InsertReview_txtErro) && !empty($InsertReview_txtErro)) {
    $toastScript .= "showToast('{$InsertReview_txtErro}', 'success');";
}
// Tự động chuyển hướng sau khi đánh giá thành công
if ($InsertReview_txtErro == 'Thêm thành công') {
    echo '<a id="redirectLink" href="?controller=product&action=showDetailproducts&idproduct=' . $Detailproduct['idsanpham'] . '#review-section" style="display: none;"></a>';
    echo '<script>setTimeout(() => { document.getElementById("redirectLink").click(); }, 1500);</script>';
}

// ================= LẤY TRANG HIỆN TẠI =================
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="main-wrapper">
    <div class="product-detail-wrapper">
        
        <header class="detail-header">
            <h1 class="detail-title">
                <?php echo $Detailproduct ? htmlspecialchars($Detailproduct['ten']) : "Lỗi: Sản phẩm không tồn tại"; ?>
            </h1>
        </header>

        <section class="detail-top-grid">
            
            <div class="detail-image-gallery">
                <div class="main-image-box" id="imageZoomBox">
                    <img src="./img/product/<?php echo htmlspecialchars($Detailproduct['hinh']); ?>" id="mainProductImage" alt="Hình ảnh <?php echo htmlspecialchars($Detailproduct['ten']); ?>">
                </div>
            </div>

            <div class="detail-purchase-info">
                <div class="price-section">
                    <div class="price-current"><?php echo number_format($Detailproduct['gia']); ?> ₫</div>
                    <div class="price-discount-group">
                        <span class="price-old"><?php echo number_format($Detailproduct['gia'] * 1.2); ?> ₫</span>
                        <span class="discount-badge">-20% GIẢM</span>
                    </div>
                </div>

                <div class="promo-section">
                    <h3 class="promo-title"><i class="fas fa-gift"></i> Khuyến mãi & Ưu đãi</h3>
                    <ul class="promo-list">
                        <li><i class="fas fa-check-circle"></i> Tặng 100.000đ khi mua hàng tại website thành viên.</li>
                        <li><i class="fas fa-check-circle"></i> Chính sách bảo hành chính hãng 12 tháng.</li>
                        <li><i class="fas fa-check-circle"></i> Hỗ trợ trả góp 0% qua thẻ tín dụng.</li>
                    </ul>
                    <div class="product-short-desc">
                        <strong>Mô tả ngắn:</strong> <?php echo $Detailproduct['moTa']; ?>
                    </div>
                </div>

                <div class="action-buttons-stacked">
                    <button class="btn-buy-now pulse-btn ripple-btn" aria-label="Mua ngay" onclick="showPaymentForm(event);">
                        <strong>MUA NGAY</strong>
                        <span>Giao hàng tận nơi miễn phí</span>
                        <div class="shine"></div>
                    </button>
                    
                    <?php $isLoggedIn = isset($_SESSION['user_data']) ? 'true' : 'false'; ?>
                    <button class="btn-add-cart ripple-btn" aria-label="Thêm vào giỏ hàng" onclick="handleDetailAddToCart(event, <?= $isLoggedIn ?>, '?controller=cart&action=addcart&idproduct=<?php echo $Detailproduct['idsanpham'] ?>')">
                        <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                    </button>
                </div>

                <div class="hotline-box">
                    <i class="fas fa-phone-alt"></i> Gọi đặt mua: <strong>0123.4567.890</strong> (7:30 - 22:00)
                </div>
            </div>
        </section>

        <section class="detail-mid-grid">
            <article class="detail-description">
                <h2 class="section-heading">THÔNG TIN SẢN PHẨM</h2>
                <div class="desc-content">
                    <p>Với mức giá thành lý tưởng, bạn có thể sở hữu một thiết bị đa dụng mang lại hiệu năng ổn định, ngoại hình thanh lịch và các tính năng hiện đại. Một sản phẩm như vậy sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí hàng ngày của cả sinh viên lẫn người đi làm.</p>
                    <h3>Giao diện hiện đại, trang nhã</h3>
                    <p>Trong dòng sản phẩm tương đương, sản phẩm này nổi bật với sự sáng tạo và đổi mới trong thiết kế. Không chỉ kết hợp tinh tế giữa phong cách truyền thống và hiện đại, sản phẩm còn mang đậm dấu ấn cá nhân và độc đáo. Khung máy và lớp vỏ được chế tác tỉ mỉ, tạo ra một cấu trúc vững chắc và bền bỉ.</p>
                </div>
            </article>

            <aside class="detail-specs">
                <h2 class="section-heading">CẤU HÌNH CHI TIẾT</h2>
                <table class="specs-table">
                    <tbody>
                        <tr><th>CPU:</th><td><?php echo $Detailproduct['CPU']; ?></td></tr>
                        <tr><th>RAM:</th><td><?php echo $Detailproduct['RAM']; ?></td></tr>
                        <tr><th>Ổ cứng:</th><td><?php echo $Detailproduct['O_Cung']; ?></td></tr>
                        <tr><th>Màn hình:</th><td><?php echo $Detailproduct['Man_Hinh']; ?></td></tr>
                        <tr><th>Card Màn hình:</th><td><?php echo $Detailproduct['Card_Man_Hinh']; ?></td></tr>
                        <tr><th>Cổng kết nối:</th><td><?php echo $Detailproduct['Cong_Ket_Noi']; ?></td></tr>
                        <tr><th>Hệ điều hành:</th><td><?php echo $Detailproduct['He_Dieu_Hanh']; ?></td></tr>
                        <tr><th>Thiết kế:</th><td><?php echo $Detailproduct['Thiet_Ke']; ?></td></tr>
                        <tr><th>Kích thước/KL:</th><td><?php echo $Detailproduct['Kich_Thuoc_Khoi_Luong']; ?></td></tr>
                        <tr><th>Ra mắt:</th><td><?php echo $Detailproduct['Thoi_Diem_Ra_Mat']; ?></td></tr>
                    </tbody>
                </table>
            </aside>
        </section>

        <section class="detail-bot-grid">
            <div class="detail-reviews" id="review-section">
                <h2 class="section-heading">ĐÁNH GIÁ SẢN PHẨM</h2>
                
                <div class="review-form-box">
                    <?php if (isset($_SESSION['user_data'])) : ?>
                        <form class="modern-review-form" action="" method="post">
                            <input type="hidden" name="mareviewsp" value="<?php echo $Detailproduct['idsanpham']; ?>">
                            <textarea name="review_content" id="review_content" placeholder="Mời bạn chia sẻ cảm nhận về sản phẩm..." required></textarea> 
                            <button type="submit" name="addreview" class="btn-submit-review ripple-btn"><i class="fas fa-paper-plane"></i> Gửi đánh giá</button>
                        </form>
                    <?php else : ?>
                        <div class="login-prompt">
                            <i class="fas fa-lock"></i> Vui lòng <a href="?controller=log_reg&action=LoginUser">Đăng nhập</a> để bình luận.
                        </div>
                    <?php endif; ?>
                </div>

                <div class="review-list">
                    <?php if ($commentList && is_array($commentList) && !empty($commentList)) : ?>
                        <?php foreach ($commentList as $comment) : ?>
                            <div class="review-item">
                                <div class="review-user">
                                    <span class="user-avatar"><i class="fas fa-user"></i></span>
                                    <span class="user-name"><?php echo htmlspecialchars($comment['ho'] . ' ' . $comment['ten']); ?></span>
                                    <span class="buy-status"><i class="fas fa-check-circle"></i> Đã mua tại cửa hàng</span>
                                </div>
                                <div class="review-text"><?php echo htmlspecialchars($comment['noidung']); ?></div>
                            </div>
                        <?php endforeach; ?>
                        
                        <div class="review-pagination">
                            <?php 
                            if (isset($totalPages) && $totalPages > 1) : 
                                $visiblePages = 5; // Số trang tối đa muốn hiển thị
                                $startPage = max(1, $currentPage - floor($visiblePages / 2));
                                $endPage = min($totalPages, $startPage + $visiblePages - 1);
                                
                                // Điều chỉnh lại nếu ở các trang cuối
                                if ($endPage - $startPage + 1 < $visiblePages) {
                                    $startPage = max(1, $endPage - $visiblePages + 1);
                                }
                            ?>
                                <?php if ($currentPage > 1) : ?>
                                    <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Detailproduct['idsanpham']; ?>&page_number=<?php echo $currentPage - 1; ?>#review-section" class="page-num"><i class="fas fa-chevron-left"></i></a>
                                <?php endif; ?>

                                <?php if ($startPage > 1) : ?>
                                    <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Detailproduct['idsanpham']; ?>&page_number=1#review-section" class="page-num">1</a>
                                    <span class="page-dots">...</span>
                                <?php endif; ?>

                                <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                                    <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Detailproduct['idsanpham']; ?>&page_number=<?php echo $i; ?>#review-section" class="page-num <?php echo ($i == $currentPage) ? 'active' : ''; ?>"><?php echo $i; ?></a> 
                                <?php endfor; ?>

                                <?php if ($endPage < $totalPages) : ?>
                                    <span class="page-dots">...</span>
                                    <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Detailproduct['idsanpham']; ?>&page_number=<?php echo $totalPages; ?>#review-section" class="page-num"><?php echo $totalPages; ?></a>
                                <?php endif; ?>

                                <?php if ($currentPage < $totalPages) : ?>
                                    <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Detailproduct['idsanpham']; ?>&page_number=<?php echo $currentPage + 1; ?>#review-section" class="page-num"><i class="fas fa-chevron-right"></i></a>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="no-reviews">Chưa có đánh giá nào cho sản phẩm này. Hãy là người đầu tiên đánh giá!</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="detail-policies">
                <div class="policy-box loyalty-box">
                    <img src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/logo.png" class="loyalty-icon" alt="VIP">
                    <div class="loyalty-text">
                        <h4>Quà Tặng VIP</h4>
                        <p>Tích & Sử dụng điểm cho khách hàng thân thiết.</p>
                    </div>
                </div>

                <div class="policy-box">
                    <h4 class="policy-title">Đơn vị vận chuyển</h4>
                    <div class="policy-images">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/ship_1.png" alt="Giao Hàng Nhanh">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/ship_2.png" alt="Viettel Post">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/ship_3.png" alt="VNPost">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/ship_4.png" alt="Ninja Van">
                    </div>
                </div>

                <div class="policy-box">
                    <h4 class="policy-title">Thanh toán</h4>
                    <div class="policy-images">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/pay_1.png" alt="Tiền mặt">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/pay_2.png" alt="Chuyển khoản">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/pay_3.png" alt="Thẻ tín dụng">
                        <img src="//theme.hstatic.net/200000722513/1001090675/14/pay_4.png" alt="Ví điện tử">
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="payment-modal-overlay" id="paymentOverlay">
    <div class="payment-modal-box">
        <button class="btn-close-modal" aria-label="Đóng" onclick="closePaymentForm();"><i class="fas fa-times"></i></button>
        <h2 class="modal-title">XÁC NHẬN ĐẶT HÀNG</h2>
        
        <div class="payment-methods">
            <label>Phương thức thanh toán:</label>
            <div class="method-logos">
                <img src="./img/payment/hinh1.jpg" alt="Momo" class="active">
                <img src="./img/payment/hinh2.jpg" alt="ZaloPay">
                <img src="./img/payment/hinh3.jpg" alt="VNPay">
                <img src="./img/payment/hinh4.jpg" alt="ATM/Visa">
            </div>
        </div>

        <form action="" method="POST" class="modern-payment-form">
            <input type="hidden" name="idSanPham" value="<?php echo $Detailproduct['idsanpham']; ?>">
            <input type="hidden" name="giasanpham" value="<?php echo $Detailproduct['gia']; ?>">

            <div class="form-group">
                <label>Họ tên người nhận <span class="text-danger">*</span></label>
                <input type="text" name="ten-nguoi-nhan" value="<?php echo isset($_SESSION['user_data']) ? $_SESSION['user_data']['ho'] . ' ' . $_SESSION['user_data']['ten'] : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Số điện thoại <span class="text-danger">*</span></label>
                <input type="tel" name="so-dien-thoai" value="<?php echo isset($_SESSION['user_data']) ? $_SESSION['user_data']['sdt'] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label>Địa chỉ nhận hàng <span class="text-danger">*</span></label>
                <input type="text" name="dia-chi" value="<?php echo isset($_SESSION['user_data']) ? $_SESSION['user_data']['diachi'] : ''; ?>" required>
            </div>

            <div class="payment-summary">
                <div class="summary-row total">
                    <span>Tổng thanh toán:</span>
                    <span class="total-price"><?php echo number_format($Detailproduct['gia']); ?> ₫</span>
                </div>
            </div>

            <button type="submit" name="payment-btn" class="btn-confirm-payment ripple-btn">
                <i class="fas fa-check-circle"></i> HOÀN TẤT ĐẶT HÀNG
            </button>
        </form>
    </div>
</div>

<script>
    // Ép website cuộn mượt mà khi nhấn vào link có # (Anchor link cho Bình luận)
    document.documentElement.style.scrollBehavior = 'smooth';

    // 1. ZOOM ẢNH SẢN PHẨM NHƯ KÍNH LÚP
    const imgBox = document.getElementById('imageZoomBox');
    const mainImg = document.getElementById('mainProductImage');

    if(imgBox && mainImg) {
        imgBox.addEventListener('mousemove', function(e) {
            const { left, top, width, height } = imgBox.getBoundingClientRect();
            const x = (e.clientX - left) / width * 100;
            const y = (e.clientY - top) / height * 100;
            mainImg.style.transformOrigin = `${x}% ${y}%`;
            mainImg.style.transform = 'scale(2.2)'; 
        });

        imgBox.addEventListener('mouseleave', function() {
            mainImg.style.transformOrigin = 'center center';
            mainImg.style.transform = 'scale(1)';
        });
    }

    // 2. HIỆU ỨNG RIPPLE (GỢN SÓNG)
    const rippleButtons = document.querySelectorAll('.ripple-btn');
    rippleButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            let x = e.clientX - e.target.getBoundingClientRect().left;
            let y = e.clientY - e.target.getBoundingClientRect().top;
            let ripples = document.createElement('span');
            ripples.style.left = x + 'px';
            ripples.style.top = y + 'px';
            ripples.classList.add('ripple-effect');
            this.appendChild(ripples);
            setTimeout(() => { ripples.remove() }, 800);
        });
    });

    // 3. HỆ THỐNG TOAST THÔNG BÁO TỪ PHP
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = `custom-toast ${type}`;
        let icon = type === 'success' ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-exclamation-triangle"></i>';
        toast.innerHTML = `${icon} <span>${message}</span>`;
        container.appendChild(toast);
        setTimeout(() => { toast.classList.add('show'); }, 10);
        setTimeout(() => { toast.classList.remove('show'); setTimeout(() => { toast.remove(); }, 300); }, 3000);
    }
    <?php echo $toastScript; ?>

    // 4. KIỂM TRA ĐĂNG NHẬP GIỎ HÀNG (DÙNG MODAL XỊN XÒ)
    function handleDetailAddToCart(event, isLoggedIn, cartUrl) {
        event.preventDefault();
        if (!isLoggedIn) {
            // Nhúng Modal vào Body nếu chưa có
            if(!document.getElementById('eco-auth-modal')) {
                const modalHTML = `
                <div class="eco-modal-overlay" id="eco-auth-modal">
                    <div class="eco-modal-box">
                        <button class="btn-close-modal" aria-label="Đóng" onclick="closeAuthModal();" style="position:absolute; top:15px; right:20px; background:none; border:none; font-size:24px; cursor:pointer; color:#999;"><i class="fas fa-times"></i></button>
                        <div class="eco-modal-icon" style="width:70px; height:70px; background:#fff4e5; color:#ff9800; border-radius:50%; display:flex; justify-content:center; align-items:center; font-size:32px; margin:0 auto 20px; box-shadow:0 0 20px rgba(255,152,0,0.2);"><i class="fas fa-user-lock"></i></div>
                        <h3 class="eco-modal-title" style="font-size:24px; font-weight:800; color:#222; margin-bottom:12px;">Chưa Đăng Nhập</h3>
                        <p class="eco-modal-desc" style="font-size:16px; color:#666; margin-bottom:25px; line-height:1.5;">Vui lòng đăng nhập để thêm sản phẩm này vào giỏ hàng và nhận thêm nhiều ưu đãi nhé!</p>
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

    // 5. MODAL MUA NGAY THANH TOÁN
    const overlay = document.getElementById('paymentOverlay');
    function showPaymentForm(event) {
        event.preventDefault();
        <?php if (isset($_SESSION['user_data'])) : ?>
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden'; 
        <?php else : ?>
            // Chạy Modal cảnh báo giống giỏ hàng
            handleDetailAddToCart(event, false, '');
        <?php endif; ?>
    }

    function closePaymentForm() {
        if(overlay) {
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto'; 
        }
    }
    if(overlay) {
        overlay.addEventListener('click', function(e) { if (e.target === overlay) closePaymentForm(); });
    }
</script>