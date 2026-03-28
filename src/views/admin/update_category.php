<div class="ad-upd-cat-wrapper">
    <div class="ad-upd-cat-card">
        
        <div class="ad-upd-cat-header">
            <h1><i class="fas fa-edit"></i> Cập Nhật Danh Mục</h1>
            <a href="?admincontroller=admin&action=list_Category" class="ad-upd-cat-btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <?php if (isset($updateCategory_txtErro) && !empty($updateCategory_txtErro)) : ?>
            <?php 
                $isSuccess = ($updateCategory_txtErro === 'Cập nhật loại thành công!!!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="ad-upd-cat-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($updateCategory_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=update_Category&idcategory=<?= $CategoryDetail['id'] ?>';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <form class="ad-upd-cat-form" action="" method="post">
            
            <div class="ad-upd-cat-form-group">
                <label for="tenloai">Tên danh mục</label>
                <div class="ad-upd-cat-input-wrapper">
                    <i class="fas fa-tag ad-upd-cat-icon"></i>
                    <input type="text" id="tenloai" name="tenloai" placeholder="Nhập tên danh mục..." value="<?= htmlspecialchars($CategoryDetail['ten']) ?>" required>
                </div>
            </div>

            <div class="ad-upd-cat-grid-2">
                <div class="ad-upd-cat-form-group">
                    <label for="noibat">Nổi bật <small>(Ví dụ: Hot, Mới... hoặc để trống)</small></label>
                    <div class="ad-upd-cat-input-wrapper">
                        <i class="fas fa-star ad-upd-cat-icon"></i>
                        <input type="text" id="noibat" name="noibat" placeholder="Nhập trạng thái nổi bật..." value="<?= htmlspecialchars($CategoryDetail['noiBat']) ?>">
                    </div>
                </div>
                
                <div class="ad-upd-cat-form-group">
                    <label for="thutu">Thứ tự hiển thị</label>
                    <div class="ad-upd-cat-input-wrapper">
                        <i class="fas fa-sort-numeric-up-alt ad-upd-cat-icon"></i>
                        <input type="number" id="thutu" name="thutu" placeholder="Nhập số thứ tự..." value="<?= htmlspecialchars($CategoryDetail['thuTu']) ?>">
                    </div>
                </div>
            </div>

            <div class="ad-upd-cat-submit-area">
                <button type="submit" name="update_category" class="ad-upd-cat-btn-submit">
                    <i class="fas fa-save"></i> Lưu Thay Đổi
                </button>
            </div>

        </form>
    </div>
</div>