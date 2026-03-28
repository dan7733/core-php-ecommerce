<div class="admin-news-container">
    <div class="admin-news-card">
        
        <div class="admin-news-header">
            <h1><i class="fas fa-newspaper"></i> Thêm Tin Tức Mới</h1>
        </div>

        <?php if (isset($InsertNews) && !empty($InsertNews)) : ?>
            <?php 
                $alertClass = (strpos(strtolower($InsertNews), 'thành công') !== false) ? 'success' : 'error';
                $alertIcon = ($alertClass == 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="admin-news-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($InsertNews) ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="admin-news-form">
            
            <div class="admin-news-group">
                <label>Tiêu đề bài viết <span class="required">*</span></label>
                <div class="admin-news-input-wrapper">
                    <input type="text" name="tieudetintuc" placeholder="Nhập tiêu đề tin tức..." required>
                    <i class="fas fa-heading"></i>
                </div>
            </div>

            <div class="admin-news-group">
                <label>Hình ảnh đại diện <span class="required">*</span></label>
                <div class="admin-news-input-wrapper">
                    <input type="file" name="hinhtintuc" accept="image/*" required>
                    <i class="fas fa-image"></i>
                </div>
            </div>

            <div class="admin-news-group">
                <label>Nội dung tóm tắt <span class="required">*</span></label>
                <div class="admin-news-input-wrapper">
                    <input type="text" name="noidungtomtat" id="noidungtomtat" placeholder="Mô tả ngắn gọn nội dung bài viết..." required>
                    <i class="fas fa-align-left"></i>
                </div>
            </div>

            <div class="admin-news-group">
                <label>Nội dung chi tiết <span class="required">*</span></label>
                <div class="editor-container">
                    <textarea name="noidungtintuc" id="noidungtintuc" placeholder="Viết nội dung đầy đủ tại đây..."></textarea>
                </div>
            </div>

            <div class="admin-news-action">
                <button type="submit" name="addnews" class="admin-news-btn">
                    <i class="fas fa-paper-plane"></i> Đăng Bài Viết
                </button>
            </div>
            
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // Khởi tạo CKEditor cho thẻ textarea có id="noidungtintuc"
    ClassicEditor
        .create(document.querySelector('#noidungtintuc'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'insertTable', 'undo', 'redo' ],
            placeholder: 'Mời bạn nhập nội dung chi tiết của bài viết tại đây...'
        })
        .catch(error => {
            console.error(error);
        });
</script>