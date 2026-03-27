<div id="toast-container"></div>

<?php
$toastScript = "";
// Thay thế alert bằng Toast
if (isset($cart_txtErro) && !empty($cart_txtErro)) {
    $toastScript .= "showToast('{$cart_txtErro}', 'warning');";
    $toastScript .= "setTimeout(() => { window.location.href='?controller=log_reg&action=LoginUser'; }, 1500);";
}
if (isset($cartOrder_txtErro) && !empty($cartOrder_txtErro)) {
    $toastScript .= "showToast('{$cartOrder_txtErro}', 'success');";
    $toastScript .= "setTimeout(() => { window.location.href='?controller=cart'; }, 1500);";
}

// Tính toán tổng
$totalproductincart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalQuantityInCart = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        if (isset($product['qty']) && is_numeric($product['qty'])) {
            $totalQuantityInCart += $product['qty'];
        }
    }
}

$totalPrice = 0;
if(isset($products) && is_array($products)) {
    foreach ($products as $product) {
        if (isset($product['gia']) && isset($product['qty'])) {
            $totalPrice += $product['gia'] * $product['qty'];
        }
    }
}
?>

<div class="main-wrapper">
    <div class="cart-page-header">
        <h1 class="cart-main-title"><i class="fas fa-shopping-cart"></i> GIỎ HÀNG CỦA BẠN</h1>
    </div>

    <?php if (isset($products) && count($products) > 0) : ?>
        <div class="cart-layout-grid">
            
            <div class="cart-items-section">
                <div class="cart-items-header">
                    <h3>Bạn đang có <strong><?= count($totalproductincart) ?></strong> sản phẩm trong giỏ hàng</h3>
                </div>

                <div class="cart-items-list">
                    <?php foreach ($products as $product) : ?>
                        <div class="cart-item-card fade-up">
                            <div class="item-image">
                                <img src="./img/product/<?= isset($product['hinh']) ? htmlspecialchars($product['hinh']) : 'no-image.png' ?>" alt="Product">
                            </div>
                            
                            <div class="item-info">
                                <h4 class="item-name"><?= isset($product['ten']) ? htmlspecialchars($product['ten']) : 'Sản phẩm không xác định' ?></h4>
                                <p class="item-desc"><?= isset($product['moTa']) ? htmlspecialchars($product['moTa']) : '' ?></p>
                            </div>

                            <div class="item-price">
                                <?= isset($product['gia']) ? number_format($product['gia']) : 0 ?> ₫
                            </div>

                            <div class="item-quantity">
                                <form method="POST" action="?controller=cart&action=updatecart" class="qty-form">
                                    <input type="hidden" name="idproduct" value="<?= isset($product['idsanpham']) ? htmlspecialchars($product['idsanpham']) : '' ?>">
                                    
                                    <div class="qty-control">
                                        <button type="button" class="btn-qty btn-minus" onclick="updateQuantity(this, -1)"><i class="fas fa-minus"></i></button>
                                        <input type="text" name="quantity" class="input-qty" value="<?= isset($product['qty']) ? htmlspecialchars($product['qty']) : 1 ?>" onchange="this.form.submit()" readonly>
                                        <button type="button" class="btn-qty btn-plus" onclick="updateQuantity(this, 1)"><i class="fas fa-plus"></i></button>
                                    </div>
                                </form>
                            </div>

                            <div class="item-remove">
                                <a href="?controller=cart&action=removeFromCart&idproduct=<?= isset($product['idsanpham']) ? htmlspecialchars($product['idsanpham']) : '' ?>" class="btn-remove" title="Xóa sản phẩm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if(isset($totalPages) && $totalPages > 1): ?>
                <div class="cart-pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <a href="?controller=cart&page_number=<?= $i ?>" class="page-num"><?= $i ?></a>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="cart-summary-section">
                
                <div class="summary-box address-box">
                    <h3 class="box-title"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</h3>
                    <div class="address-content">
                        <?php if(isset($_SESSION['user_data']['diachi']) && !empty($_SESSION['user_data']['diachi'])): ?>
                            <p><strong><?= $_SESSION['user_data']['ho'] . ' ' . $_SESSION['user_data']['ten'] ?></strong></p>
                            <p><?= $_SESSION['user_data']['sdt'] ?></p>
                            <p><?= htmlspecialchars($_SESSION['user_data']['diachi']) ?></p>
                        <?php else: ?>
                            <p class="text-warning">Bạn chưa cập nhật địa chỉ giao hàng.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="summary-box order-box">
                    <h3 class="box-title"><i class="fas fa-receipt"></i> Thông tin đơn hàng</h3>
                    
                    <div class="summary-row">
                        <span>Tạm tính (<?= $totalQuantityInCart ?> SP):</span>
                        <span class="val"><?= number_format($totalPrice) ?> ₫</span>
                    </div>
                    <div class="summary-row">
                        <span>Phí giao hàng:</span>
                        <span class="val free-ship">Miễn phí</span>
                    </div>
                    
                    <div class="summary-divider"></div>
                    
                    <div class="summary-row total-row">
                        <span>Tổng cộng:</span>
                        <span class="total-val"><?= number_format($totalPrice) ?> ₫</span>
                    </div>
                    <p class="vat-note">(Đã bao gồm VAT nếu có)</p>

                    <button class="btn-checkout ripple-btn" onclick="openCartPayment()">
                        XÁC NHẬN THANH TOÁN <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

        </div>
    <?php else : ?>
        <div class="empty-cart-box fade-up">
            <img src="./img/empty-cart.png" alt="Giỏ hàng trống" onerror="this.src='https://cdn-icons-png.flaticon.com/512/11329/11329060.png'">
            <h2>Giỏ hàng của bạn đang trống</h2>
            <p>Hãy tham khảo thêm các sản phẩm tuyệt vời của chúng tôi nhé!</p>
            <a href="?controller=content_pro&action=showProducts" class="btn-continue-shopping ripple-btn">TIẾP TỤC MUA SẮM</a>
        </div>
    <?php endif; ?>
</div>

<div class="payment-modal-overlay" id="cartPaymentModal">
    <div class="payment-modal-box">
        <button class="btn-close-modal" onclick="closeCartPayment()"><i class="fas fa-times"></i></button>
        <h2 class="modal-title">THANH TOÁN ĐƠN HÀNG</h2>
        
        <div class="payment-methods">
            <label>Phương thức thanh toán:</label>
            <div class="method-logos">
                <img src="./img/payment/hinh1.jpg" alt="COD" class="active">
                <img src="./img/payment/hinh2.jpg" alt="Bank">
                <img src="./img/payment/hinh3.jpg" alt="Momo">
                <img src="./img/payment/hinh4.jpg" alt="ZaloPay">
            </div>
        </div>

        <form action="" method="POST" class="modern-payment-form">
            <div class="form-group">
                <label>Người nhận hàng <span class="text-danger">*</span></label>
                <input type="text" name="ten-nguoi-nhan" value="<?= isset($_SESSION['user_data']) ? $_SESSION['user_data']['ho'] . ' ' . $_SESSION['user_data']['ten'] : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Số điện thoại <span class="text-danger">*</span></label>
                <input type="tel" name="so-dien-thoai" value="<?= isset($_SESSION['user_data']) ? $_SESSION['user_data']['sdt'] : ''; ?>" required>
            </div>

            <div class="form-group">
                <label>Địa chỉ giao hàng <span class="text-danger">*</span></label>
                <input type="text" name="dia-chi" value="<?= isset($_SESSION['user_data']) ? $_SESSION['user_data']['diachi'] : ''; ?>" required>
            </div>

            <div class="payment-summary">
                <div class="summary-row total">
                    <span>Tổng phải thanh toán:</span>
                    <span class="total-price"><?= number_format($totalPrice); ?> ₫</span>
                </div>
            </div>

            <button type="submit" name="giohang_payment-btn" class="btn-confirm-payment ripple-btn">
                <i class="fas fa-check-circle"></i> ĐẶT HÀNG NGAY
            </button>
        </form>
    </div>
</div>

<script>
    // 1. TOAST NOTIFICATION
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if(!container) return;
        const toast = document.createElement('div');
        toast.className = `custom-toast ${type}`;
        let icon = type === 'success' ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-exclamation-triangle"></i>';
        toast.innerHTML = `${icon} <span>${message}</span>`;
        container.appendChild(toast);
        setTimeout(() => { toast.classList.add('show'); }, 10);
        setTimeout(() => { toast.classList.remove('show'); setTimeout(() => { toast.remove(); }, 300); }, 3000);
    }
    <?php echo $toastScript; ?>

    // 2. CẬP NHẬT SỐ LƯỢNG (TĂNG/GIẢM)
    function updateQuantity(btn, change) {
        const input = btn.parentElement.querySelector('.input-qty');
        let currentVal = parseInt(input.value);
        let newVal = currentVal + change;
        
        if (newVal >= 1) {
            input.value = newVal;
            input.form.submit(); // Auto submit form khi bấm đổi số lượng
        }
    }

    // 3. HIỆU ỨNG RIPPLE NÚT BẤM
    document.querySelectorAll('.ripple-btn').forEach(btn => {
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

    // 4. MỞ/ĐÓNG POPUP THANH TOÁN
    const cartModal = document.getElementById('cartPaymentModal');
    function openCartPayment() {
        <?php if (!empty($_SESSION['cart'])) : ?>
            cartModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        <?php else : ?>
            showToast('Giỏ hàng trống! Vui lòng thêm sản phẩm.', 'warning');
        <?php endif; ?>
    }
    function closeCartPayment() {
        cartModal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    cartModal.addEventListener('click', function(e) {
        if (e.target === cartModal) closeCartPayment();
    });

    // Fade up animation
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
        }, 100);
    });
</script>