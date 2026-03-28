<div class="admin-cate-container">
    <div class="admin-cate-card">
        
        <div class="admin-cate-header">
            <h1><i class="fas fa-folder-plus"></i> Thêm Loại Sản Phẩm</h1>
        </div>

        <?php if (isset($insertCategory_txtErro) && !empty($insertCategory_txtErro)) : ?>
            <?php 
                // Tự động nhận diện thông báo thành công hay thất bại
                $alertClass = (strpos(strtolower($insertCategory_txtErro), 'thành công') !== false) ? 'success' : 'error';
                $alertIcon = ($alertClass == 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="admin-cate-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($insertCategory_txtErro) ?></span>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="admin-cate-form">
            
            <div class="admin-cate-group">
                <label>Tên danh mục <span class="required">*</span></label>
                <div class="admin-cate-input-wrapper">
                    <input type="text" name="tenloai" placeholder="Ví dụ: Điện thoại, Laptop..." required>
                    <i class="fas fa-tags"></i>
                </div>
            </div>

            <div class="admin-cate-group">
                <label>Độ nổi bật</label>
                <div class="admin-cate-input-wrapper">
                    <input type="text" name="noibat" placeholder="Nhập độ nổi bật (vd: 1, 0, Hot...)">
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <div class="admin-cate-group">
                <label>Vị trí hiển thị (Thứ tự)</label>
                <div class="admin-cate-input-wrapper">
                    <input type="number" name="thutu" placeholder="Ví dụ: 1, 2, 3..." min="0">
                    <i class="fas fa-sort-numeric-down"></i>
                </div>
            </div>

            <div class="admin-cate-action">
                <button type="submit" name="insert_category" class="admin-cate-btn">
                    <i class="fas fa-save"></i> Lưu Danh Mục
                </button>
            </div>
            
        </form>

    </div>
</div>