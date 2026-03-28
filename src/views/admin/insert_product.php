<div class="admin-prod-container">
    <div class="admin-prod-card">
        
        <div class="admin-prod-header">
            <h1><i class="fas fa-box-open"></i> Thêm Sản Phẩm Mới</h1>
        </div>

        <?php if (isset($insertProdcuct_txtErro) && !empty($insertProdcuct_txtErro)) : ?>
            <?php 
                $alertClass = (strpos(strtolower($insertProdcuct_txtErro), 'thành công') !== false) ? 'success' : 'error';
                $alertIcon = ($alertClass == 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="admin-prod-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($insertProdcuct_txtErro) ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="admin-prod-form">
            <div class="admin-prod-grid">
                
                <div class="admin-prod-group">
                    <label for="tensanpham">Tên sản phẩm <span class="required">*</span></label>
                    <div class="admin-prod-input-wrapper">
                        <input type="text" id="tensanpham" name="tensanpham" placeholder="Nhập tên sản phẩm..." required>
                        <i class="fas fa-laptop icon-left"></i>
                    </div>
                </div>

                <div class="admin-prod-group">
                    <label for="giasanpham">Giá bán (VNĐ) <span class="required">*</span></label>
                    <div class="admin-prod-input-wrapper">
                        <input type="number" id="giasanpham" name="giasanpham" placeholder="VD: 15000000" min="0" required>
                        <i class="fas fa-tag icon-left"></i>
                    </div>
                </div>

                <div class="admin-prod-group">
                    <label for="loaisanpham">Danh mục sản phẩm <span class="required">*</span></label>
                    <div class="admin-prod-input-wrapper">
                        <select id="loaisanpham" name="loaisanpham" required>
                            <option value="" disabled selected>-- Chọn danh mục --</option>
                            <?php
                            if (!empty($Inforcategorys)) {
                                foreach ($Inforcategorys as $Inforcategory) {
                                    echo '<option value="' . $Inforcategory['id'] . '">' . htmlspecialchars($Inforcategory['ten']) . '</option>';
                                }
                            } else {
                                echo '<option value="" disabled>Chưa có danh mục nào</option>';
                            }
                            ?>
                        </select>
                        <i class="fas fa-list icon-left"></i>
                        <i class="fas fa-chevron-down icon-right"></i> </div>
                </div>

                <div class="admin-prod-group">
                    <label for="hinhsanpham">Hình ảnh đại diện <span class="required">*</span></label>
                    <div class="admin-prod-input-wrapper">
                        <input type="file" id="hinhsanpham" name="hinhsanpham" accept="image/*" required>
                        <i class="fas fa-image icon-left"></i>
                    </div>
                </div>

                <div class="admin-prod-group full-width">
                    <label for="motosanpham">Mô tả ngắn <span class="required">*</span></label>
                    <div class="admin-prod-input-wrapper textarea-wrapper">
                        <textarea id="motosanpham" name="motosanpham" placeholder="Mô tả các đặc điểm nổi bật của sản phẩm..." required></textarea>
                        <i class="fas fa-align-left icon-left"></i>
                    </div>
                </div>

            </div> <div class="admin-prod-action">
                <button type="submit" name="addproduct" class="admin-prod-btn">
                    <i class="fas fa-plus-circle"></i> Thêm Sản Phẩm Mới
                </button>
            </div>
            
        </form>
    </div>
</div>