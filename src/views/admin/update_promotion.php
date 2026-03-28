<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<div class="ad-upd-promo-wrapper">
    <div class="ad-upd-promo-card">
        
        <div class="ad-upd-promo-header">
            <h1><i class="fas fa-gift"></i> Cập Nhật Khuyến Mãi</h1>
            <a href="?admincontroller=admin&action=list_Promotion" class="ad-upd-promo-btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <?php if (isset($updatePromotion_txtErro) && !empty($updatePromotion_txtErro)) : ?>
            <?php 
                $isSuccess = ($updatePromotion_txtErro === 'Cập nhật khuyến mãi thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="ad-upd-promo-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($updatePromotion_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=update_Promotion&idpromotion=<?= urlencode($PromotionInfor['id_khuyenmai']) ?>';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <form class="ad-upd-promo-form" action="" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="khong_update_hinhkhuyenmai" value="<?= htmlspecialchars($PromotionInfor['hinh_khuyenmai']) ?>">
            
            <div class="ad-upd-promo-form-group">
                <label for="update_tieudekhuyenmai">Tiêu đề khuyến mãi <span class="required">*</span></label>
                <div class="ad-upd-promo-input-wrapper">
                    <i class="fas fa-bullhorn ad-upd-promo-icon"></i>
                    <input type="text" id="update_tieudekhuyenmai" name="update_tieudekhuyenmai" placeholder="Nhập tiêu đề chương trình..." value="<?= htmlspecialchars($PromotionInfor['tieude_khuyenmai']) ?>" required>
                </div>
            </div>

            <div class="ad-upd-promo-form-group">
                <label for="update_ndttkhuyenmai">Nội dung tóm tắt <span class="required">*</span></label>
                <div class="ad-upd-promo-input-wrapper">
                    <i class="fas fa-align-left ad-upd-promo-icon"></i>
                    <input type="text" id="update_ndttkhuyenmai" name="update_ndttkhuyenmai" placeholder="Nhập tóm tắt ngắn (hiển thị ở thẻ preview)..." value="<?= htmlspecialchars($PromotionInfor['noidung_tomtat_khuyenmai']) ?>" required>
                </div>
            </div>

            <div class="ad-upd-promo-form-group">
                <label>Hình ảnh (Banner / Poster)</label>
                <div class="ad-upd-promo-image-upload">
                    <div class="ad-upd-promo-img-preview">
                        <img src="./img/promotion/<?= htmlspecialchars($PromotionInfor['hinh_khuyenmai']) ?>" id="update_promotionimg-preview" alt="Preview">
                    </div>
                    <div class="ad-upd-promo-upload-action">
                        <label for="update_promotionimg" class="ad-upd-promo-btn-upload">
                            <i class="fas fa-cloud-upload-alt"></i> Thay đổi ảnh
                        </label>
                        <input type="file" name="update_hinhkhuyenmai" id="update_promotionimg" accept="image/*" style="display: none;">
                        <small>Chỉ tải lên nếu bạn muốn thay đổi banner hiện tại.</small>
                    </div>
                </div>
            </div>

            <div class="ad-upd-promo-form-group">
                <label>Nội dung chi tiết <span class="required">*</span></label>
                <div class="ad-upd-promo-editor-container">
                    <textarea name="update_noidungkhuyenmai" id="noidungkhuyenmai" placeholder="Soạn thảo chi tiết khuyến mãi tại đây..."><?= htmlspecialchars($PromotionInfor['noidung_khuyenmai']) ?></textarea>
                </div>
            </div>

            <div class="ad-upd-promo-submit-area">
                <button type="submit" name="update_promotion" class="ad-upd-promo-btn-submit">
                    <i class="fas fa-save"></i> Cập Nhật Khuyến Mãi
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    // 1. Script hiển thị ảnh xem trước
    document.getElementById('update_promotionimg').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('update_promotionimg-preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    // 2. Khởi tạo CKEditor 5 cho phần nội dung
    ClassicEditor
        .create(document.querySelector('#noidungkhuyenmai'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'insertTable', 'undo', 'redo' ],
            placeholder: 'Mời bạn nhập chi tiết chương trình khuyến mãi...'
        })
        .catch(error => {
            console.error(error);
        });
</script>