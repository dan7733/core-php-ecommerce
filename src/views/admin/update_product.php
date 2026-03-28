<div class="ad-upd-prod-wrapper">
    
    <div class="ad-upd-prod-topbar">
        <div class="ad-upd-prod-avatar-group">
            <i class="fas fa-bell ad-upd-prod-bell"></i>
            <img src="./img/AVT.jpg" alt="Avatar" class="ad-upd-prod-avatar">
        </div>
    </div>

    <div class="ad-upd-prod-card">
        
        <div class="ad-upd-prod-header">
            <h1><i class="fas fa-box-open"></i> Cập Nhật Sản Phẩm</h1>
            <a href="?admincontroller=admin&action=list_product" class="ad-upd-prod-btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <?php if (isset($updateproduct_txtErro) && !empty($updateproduct_txtErro)) : ?>
            <?php 
                $isSuccess = ($updateproduct_txtErro === 'Cập nhật sản phẩm thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="ad-upd-prod-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($updateproduct_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=update_Adminproduct&idproduct=<?= urlencode($productInfor['idsanpham']) ?>';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <form class="ad-upd-prod-form" action="" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="khong_update_hinh" value="<?= htmlspecialchars($productInfor['hinh']) ?>">
            
            <div class="ad-upd-prod-grid-2">
                <div class="ad-upd-prod-form-group">
                    <label>Tên sản phẩm <span class="required">*</span></label>
                    <div class="ad-upd-prod-input-wrapper">
                        <i class="fas fa-laptop ad-upd-prod-icon"></i>
                        <input type="text" name="update_tensanpham" placeholder="Nhập tên sản phẩm..." value="<?= htmlspecialchars($productInfor['ten']) ?>" required>
                    </div>
                </div>

                <div class="ad-upd-prod-form-group">
                    <label>Giá sản phẩm (VNĐ) <span class="required">*</span></label>
                    <div class="ad-upd-prod-input-wrapper">
                        <i class="fas fa-tag ad-upd-prod-icon"></i>
                        <input type="text" name="update_giasanpham" placeholder="Nhập giá bán..." value="<?= htmlspecialchars($productInfor['gia']) ?>" required>
                    </div>
                </div>
            </div>

            <div class="ad-upd-prod-form-group">
                <label for="loaisanpham">Danh mục / Loại sản phẩm <span class="required">*</span></label>
                <div class="ad-upd-prod-input-wrapper">
                    <i class="fas fa-list-alt ad-upd-prod-icon"></i>
                    <select id="loaisanpham" name="update_loaisanpham" class="ad-upd-prod-select" required>
                        <?php
                        if (!empty($Inforcategorys)) {
                            foreach ($Inforcategorys as $Inforcategory) {
                                $selected = ($Inforcategory['id'] == $productInfor['loai']) ? 'selected' : '';
                                echo '<option value="' . htmlspecialchars($Inforcategory['id']) . '" ' . $selected . '>' . htmlspecialchars($Inforcategory['ten']) . '</option>';
                            }
                        } else {
                            echo '<option value=""> Trống </option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="ad-upd-prod-form-group">
                <label>Hình ảnh sản phẩm</label>
                <div class="ad-upd-prod-image-upload">
                    <div class="ad-upd-prod-img-preview">
                        <img src="./img/product/<?= htmlspecialchars($productInfor['hinh']) ?>" id="update_productimg-preview" alt="Product Image">
                    </div>
                    <div class="ad-upd-prod-upload-action">
                        <label for="update_productimg" class="ad-upd-prod-btn-upload">
                            <i class="fas fa-cloud-upload-alt"></i> Chọn ảnh mới
                        </label>
                        <input type="file" name="update_hinhsanpham" id="update_productimg" accept="image/*" style="display: none;">
                        <small>Định dạng: JPG, PNG, WEBP. Chỉ tải lên nếu muốn đổi ảnh.</small>
                    </div>
                </div>
            </div>

            <div class="ad-upd-prod-form-group">
                <label>Mô tả tóm tắt</label>
                <div class="ad-upd-prod-input-wrapper">
                    <i class="fas fa-align-left ad-upd-prod-icon"></i>
                    <input type="text" name="update_mota" placeholder="Nhập mô tả ngắn gọn..." value="<?= htmlspecialchars($productInfor['moTa']) ?>">
                </div>
            </div>

            <div class="ad-upd-prod-submit-area">
                <button type="submit" name="update_product" class="ad-upd-prod-btn-submit">
                    <i class="fas fa-save"></i> Lưu Thông Tin Sản Phẩm
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    document.getElementById('update_productimg').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('update_productimg-preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>