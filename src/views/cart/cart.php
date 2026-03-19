<?php
if (isset($cart_txtErro) && !empty($cart_txtErro)) {
    echo "<script>alert('$cart_txtErro');";
    echo "window.location.href='?controller=log_reg&action=LoginUser';</script>";
}
if (isset($cartOrder_txtErro) && !empty($cartOrder_txtErro)) {
    echo "<script>alert('$cartOrder_txtErro'); 
        window.location.href='?controller=cart';</script>";
}
$totalproductincart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalQuantityInCart = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        // Kiểm tra xem cột qty có tồn tại trong mỗi sản phẩm không
        if (isset($product['qty']) && is_numeric($product['qty'])) {
            // Cộng số lượng của sản phẩm vào biến tổng
            $totalQuantityInCart += $product['qty'];
        }
    }
}
$totalPrice = 0;
foreach ($products as $product) {
    // Kiểm tra xem giá và số lượng có tồn tại trong mỗi sản phẩm không
    if (isset($product['gia']) && isset($product['qty'])) {
        // Tính tổng tiền cho từng sản phẩm và cộng vào tổng tiền
        $totalPrice += $product['gia'] * $product['qty'];
    }
}
?>
<div class="giohang-container">
    <div class="giohang-content">
        <h1 class="gh">Giỏ Hàng</h1>
        <?php if (count($products) > 0) : ?>
            <div class="giohang-check">
                <label for="select-all"> Số sản phẩm có trong giỏ hàng: <?= count($totalproductincart) ?> sản phẩm</label><br>
            </div>
            <?php foreach ($products as $product) : ?>
                <div class="giohang-product">
                    <div class="giohang_product-info">
                        <img src="./img/product/<?= isset($product['hinh']) ? htmlspecialchars($product['hinh']) : 'no-image.png' ?>" alt="<?= isset($product['ten']) ? htmlspecialchars($product['ten']) : 'Tên sản phẩm không xác định' ?>" class="giohang-img">
                    <div class="giohang-product-details">
                        <h4 class="giohang-tsp"> <?= isset($product['ten']) ? htmlspecialchars($product['ten']) : 'Tên sản phẩm không xác định' ?> </h4>
                        <h4 class="giohang-ttsp"> <?= isset($product['moTa']) ? htmlspecialchars($product['moTa']) : '' ?> </h4>
                    </div>
                        <h3 class="giohang-vnd"><?= isset($product['gia']) ? number_format($product['gia']) : 0 ?> VND</h3>
                        <div class="giohang-quantity">
                            <form method="POST" action="?controller=cart&action=updatecart">
                                <input type="hidden" name="idproduct" value="<?= isset($product['idsanpham']) ? htmlspecialchars($product['idsanpham']) : '' ?>">
                                <button type="button" class="giohang-btn-minus" onclick="updateQuantity(this, -1)">-</button>
                                <input type="text" name="quantity" class="giohang-input-quantity" value="<?= isset($product['qty']) ? htmlspecialchars($product['qty']) : 1 ?>" onchange="this.form.submit()">
                                <button type="button" class="giohang-btn-plus" onclick="updateQuantity(this, 1)">+</button>
                            </form>
                        </div>
                    </div>
                    <a href="?controller=cart&action=removeFromCart&idproduct=<?= isset($product['idsanpham']) ? htmlspecialchars($product['idsanpham']) : '' ?>" class="remove-product">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="cart-list-pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<a href='?controller=cart&page_number=$i'>$i</a> ";
                }
                ?>
            </div>
        <?php else : ?>
            <p class="tronggiohang">Giỏ hàng của bạn trống.</p>
        <?php endif; ?>

    </div>

    <div class="giohang-info">
        <h2 class="giohang-diachi">Địa Chỉ</h2>
        <div>
            <h3 class="giohang-ttdiachi"><?php echo isset($_SESSION['user_data']['diachi']) ? htmlspecialchars($_SESSION['user_data']['diachi']) : ''; ?></h3>
        </div>
    </div>

    <div class="giohang-order-info">
        <h2 class="giohang-ttdh">Thông tin đơn hàng</h2>

        <div class="giohang-tamtinh">
            <h3 class="giohang-tamtinh-title">Tạm tính (<?php echo $totalQuantityInCart; ?> sản phẩm)</h3>
            <h3 class="giohang-xvnd"><?php echo number_format($totalPrice); ?> VND</h3>
        </div>

        <div class="giohang-tamtinh">
            <h3 class="giohang-phigiaohang">Phí giao hàng</h3>
            <h3 class="giohang-xvnd1">0 VND</h3> <!-- Phí giao hàng mặc định là 0 VND -->
        </div>
    </div>

    <div class="giohang-total">
        <div class="giohang-total-row">
            <h2 class="giohang-tc">Tổng cộng </h2>
            <h3 class="giohang-xvnd11"><?php echo number_format($totalPrice); ?> VND</h3>
        </div>
        <div>
            <h2 class="giohang-xacnhangh" onclick="giohang_showPaymentForm();">Xác nhận giỏ hàng và chuyển sang thanh toán </h2>
        </div>
    </div>

    <div class="giohang_payment-container" id="giohang_paymentForm">
        <button id="giohang_closeFormBtn" onclick="giohang_setupCloseButton();">Close</button>
        <h2 class="giohang_payment-title">Payment</h2>
        <h4 class="giohang_payment-method-title">Payment Method</h4>
        <div class="giohang_payment-payment-method">
            <img src="./img/payment/hinh1.jpg" alt="image">
            <img src="./img/payment/hinh2.jpg" alt="image">
            <img src="./img/payment/hinh3.jpg" alt="image">
            <img src="./img/payment/hinh4.jpg" alt="image">
        </div>
        <form action="" method="POST" class="giohang_payment-form">
            <label for="giohang_ten-nguoi-nhan" class="giohang_payment-label">Recipient's Name</label>
            <input type="text" id="giohang_ten-nguoi-nhan" name="ten-nguoi-nhan" class="giohang_payment-text-input" value="<?php echo $_SESSION['user_data']['ho'] . ' ' . $_SESSION['user_data']['ten']; ?>" required>

            <label for="giohang_dia-chi" class="giohang_payment-label">Address</label>
            <input type="text" id="giohang_dia-chi" name="dia-chi" class="giohang_payment-text-input" value="<?php echo $_SESSION['user_data']['diachi']; ?>" required>

            <label for="giohang_so-dien-thoai" class="giohang_payment-label">Phone Number</label>
            <input type="tel" id="giohang_so-dien-thoai" name="so-dien-thoai" class="giohang_payment-phone-input" value="<?php echo $_SESSION['user_data']['sdt']; ?>" required>
            <div class="giohang_payment-total">
                <div class="giohang_payment-total-item">
                    <p class="giohang_payment-total-label">Total Price</p>
                    <p class="giohang_payment-total-value"><?php echo number_format($totalPrice); ?></p>
                </div>
                <div class="giohang_payment-total-item">
                    <p class="giohang_payment-total-label">Shipping Fee</p>
                    <p class="giohang_payment-total-value">0 VND</p>
                </div>
            </div>
            <div class="giohang_payment-click-accept">
                <button type="submit" class="giohang_payment-button" name="giohang_payment-btn"><?php echo number_format($totalPrice); ?>
                    <div>
                        <p class="giohang_payment-accept">Accept</p>
                    </div>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function updateQuantity(button, increment) {
        var input = button.parentElement.querySelector('.giohang-input-quantity');
        var newValue = parseInt(input.value) + increment;
        if (newValue >= 0) {
            input.value = newValue;
            input.form.submit();
        }
    }

    function giohang_showPaymentForm() {
        const paymentForm = document.getElementById('giohang_paymentForm');

        // Kiểm tra xem $_SESSION['user_data'] có tồn tại hay không
        <?php if (!empty($_SESSION['cart'])) : ?>
            // Nếu tồn tại, hiển thị form thanh toán nếu đang ẩn, ẩn nếu đang hiển thị
            if (paymentForm.style.display === 'block') {
                paymentForm.style.display = 'none'; // Ẩn form nếu đã hiển thị
            } else {
                paymentForm.style.display = 'block'; // Hiển thị form nếu đang ẩn
            }
        <?php else : ?>
            // Nếu không tồn tại, hiển thị thông báo và chuyển hướng người dùng đến trang đăng nhập
            alert('Giỏ hàng trống');
        <?php endif; ?>
    }

    function giohang_setupCloseButton() {
        const closeFormBtn = document.getElementById('giohang_closeFormBtn');
        const paymentForm = document.getElementById('giohang_paymentForm');

        closeFormBtn.removeEventListener('click', giohang_handleCloseButtonClick);

        closeFormBtn.addEventListener('click', giohang_handleCloseButtonClick);

        function giohang_handleCloseButtonClick() {
            paymentForm.style.display = 'none';
        }
    }
</script>