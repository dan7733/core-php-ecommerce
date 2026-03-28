<div class="admin-promo-container">
    <div class="admin-promo-card">
        
        <div class="admin-promo-header">
            <h1><i class="fas fa-gift"></i> Thêm Chương Trình Khuyến Mãi</h1>
        </div>

        <?php if (isset($InsertPromotion) && !empty($InsertPromotion)) : ?>
            <?php 
                $alertClass = (strpos(strtolower($InsertPromotion), 'thành công') !== false) ? 'success' : 'error';
                $alertIcon = ($alertClass == 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="admin-promo-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($InsertPromotion) ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="admin-promo-form">
            
            <div class="admin-promo-group">
                <label>Tiêu đề khuyến mãi <span class="required">*</span></label>
                <div class="admin-promo-input-wrapper">
                    <input type="text" name="tieudepromotion" placeholder="Nhập tên chương trình khuyến mãi..." required>
                    <i class="fas fa-bullhorn icon-left"></i>
                </div>
            </div>

            <div class="admin-promo-group">
                <label>Banner khuyến mãi <span class="required">*</span></label>
                <div class="admin-promo-input-wrapper">
                    <input type="file" name="hinhpromotion" accept="image/*" required>
                    <i class="fas fa-image icon-left"></i>
                </div>
            </div>

            <div class="admin-promo-group">
                <label>Mô tả ngắn gọn <span class="required">*</span></label>
                <div class="admin-promo-input-wrapper">
                    <input type="text" name="noidungtomtatpromotion" id="noidungtomtatpromotion" placeholder="Tóm tắt nội dung chương trình giảm giá..." required>
                    <i class="fas fa-align-left icon-left"></i>
                </div>
            </div>

            <div class="admin-promo-group">
                <label>Chi tiết thể lệ & Nội dung <span class="required">*</span></label>
                <div class="editor-container">
                    <textarea name="noidungpromotion" id="noidungpromotion" placeholder="Nhập thể lệ chương trình, thời gian, đối tượng áp dụng..."></textarea>
                </div>
            </div>

            <div class="admin-promo-action">
                <button type="submit" name="addPromotion" class="admin-promo-btn">
                    <i class="fas fa-check-circle"></i> Đăng Khuyến Mãi
                </button>
            </div>
            
        </form>

    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#noidungpromotion'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'insertTable', 'undo', 'redo' ],
            placeholder: 'Mời bạn nhập chi tiết thể lệ chương trình khuyến mãi tại đây...'
        })
        .catch(error => {
            console.error(error);
        });
</script>