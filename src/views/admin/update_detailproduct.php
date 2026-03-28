<div class="ad-upd-dtl-wrapper">
    
    <div class="ad-upd-dtl-topbar">
        <div class="ad-upd-dtl-avatar-group">
            <i class="fas fa-bell ad-upd-dtl-bell"></i>
            <img src="./img/AVT.jpg" alt="Avatar" class="ad-upd-dtl-avatar">
        </div>
    </div>

    <div class="ad-upd-dtl-card">
        
        <div class="ad-upd-dtl-header">
            <h1><i class="fas fa-tools"></i> Cập Nhật Thông Số Kỹ Thuật</h1>
            <a href="?admincontroller=admin&action=list_detailproduct" class="ad-upd-dtl-btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <?php if (isset($updatedetailproduct_txtErro) && !empty($updatedetailproduct_txtErro)) : ?>
            <?php 
                $isSuccess = ($updatedetailproduct_txtErro === 'Cập nhật chi tiết sản phẩm thành công!!!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="ad-upd-dtl-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($updatedetailproduct_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=update_Admindetailproduct&idproduct=<?= $productDetail['san_pham_id'] ?>';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <form class="ad-upd-dtl-form" action="" method="post">
            <div class="ad-upd-dtl-grid-2">
                
                <div class="ad-upd-dtl-form-group">
                    <label>CPU (Vi xử lý)</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-microchip ad-upd-dtl-icon"></i>
                        <input type="text" name="CPU" placeholder="Nhập thông số CPU..." value="<?= htmlspecialchars($productDetail['CPU'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>RAM (Bộ nhớ trong)</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-memory ad-upd-dtl-icon"></i>
                        <input type="text" name="RAM" placeholder="Nhập dung lượng RAM..." value="<?= htmlspecialchars($productDetail['RAM'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Ổ cứng</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-hdd ad-upd-dtl-icon"></i>
                        <input type="text" name="ocung" placeholder="Nhập thông tin ổ cứng..." value="<?= htmlspecialchars($productDetail['O_Cung'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Màn hình</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-desktop ad-upd-dtl-icon"></i>
                        <input type="text" name="Manhinh" placeholder="Nhập kích thước/độ phân giải màn hình..." value="<?= htmlspecialchars($productDetail['Man_Hinh'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Card màn hình (VGA)</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-tv ad-upd-dtl-icon"></i>
                        <input type="text" name="Cardmanhinh" placeholder="Nhập thông số Card màn hình..." value="<?= htmlspecialchars($productDetail['Card_Man_Hinh'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Cổng kết nối</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-plug ad-upd-dtl-icon"></i>
                        <input type="text" name="Congketnoi" placeholder="Nhập các cổng kết nối..." value="<?= htmlspecialchars($productDetail['Cong_Ket_Noi'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Hệ điều hành</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fab fa-windows ad-upd-dtl-icon"></i>
                        <input type="text" name="hedieuhanh" placeholder="Nhập hệ điều hành..." value="<?= htmlspecialchars($productDetail['He_Dieu_Hanh'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Thiết kế (Chất liệu)</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-pencil-ruler ad-upd-dtl-icon"></i>
                        <input type="text" name="thietke" placeholder="Nhập thiết kế/chất liệu..." value="<?= htmlspecialchars($productDetail['Thiet_Ke'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Kích thước & Khối lượng</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-weight-hanging ad-upd-dtl-icon"></i>
                        <input type="text" name="kichthuoc" placeholder="Nhập kích thước và khối lượng..." value="<?= htmlspecialchars($productDetail['Kich_Thuoc_Khoi_Luong'] ?? '') ?>">
                    </div>
                </div>

                <div class="ad-upd-dtl-form-group">
                    <label>Thời điểm ra mắt</label>
                    <div class="ad-upd-dtl-input-wrapper">
                        <i class="fas fa-calendar-alt ad-upd-dtl-icon"></i>
                        <input type="date" name="thoidiem" value="<?= htmlspecialchars($productDetail['Thoi_Diem_Ra_Mat'] ?? '') ?>">
                    </div>
                </div>

            </div>

            <div class="ad-upd-dtl-submit-area">
                <button type="submit" name="update_detailproduct" class="ad-upd-dtl-btn-submit">
                    <i class="fas fa-save"></i> Cập Nhật Thông Số
                </button>
            </div>

        </form>
    </div>
</div>