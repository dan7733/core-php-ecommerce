<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<div class="ad-upd-news-wrapper">
    <div class="ad-upd-news-card">
        
        <div class="ad-upd-news-header">
            <h1><i class="fas fa-newspaper"></i> Cập Nhật Tin Tức</h1>
            <a href="?admincontroller=admin&action=list_New" class="ad-upd-news-btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <?php if (isset($updateNews_txtErro) && !empty($updateNews_txtErro)) : ?>
            <?php 
                $isSuccess = ($updateNews_txtErro === 'Cập nhật thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="ad-upd-news-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($updateNews_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=update_News&idnews=<?= $NewsInfor['id_tintuc'] ?>';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <form class="ad-upd-news-form" action="" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="khong_update_hinhtintuc" value="<?= htmlspecialchars($NewsInfor['hinh_tintuc']) ?>">
            
            <div class="ad-upd-news-form-group">
                <label for="update_tieudetintuc">Tiêu đề bài viết <span class="required">*</span></label>
                <div class="ad-upd-news-input-wrapper">
                    <i class="fas fa-heading ad-upd-news-icon"></i>
                    <input type="text" id="update_tieudetintuc" name="update_tieudetintuc" placeholder="Nhập tiêu đề tin tức..." value="<?= htmlspecialchars($NewsInfor['tieu_de']) ?>" required>
                </div>
            </div>

            <div class="ad-upd-news-form-group">
                <label for="update_ndtttintuc">Nội dung tóm tắt <span class="required">*</span></label>
                <div class="ad-upd-news-input-wrapper">
                    <i class="fas fa-align-left ad-upd-news-icon"></i>
                    <input type="text" id="update_ndtttintuc" name="update_ndtttintuc" placeholder="Nhập tóm tắt ngắn cho bài viết..." value="<?= htmlspecialchars($NewsInfor['noi_dung_tom_tat']) ?>" required>
                </div>
            </div>

            <div class="ad-upd-news-form-group">
                <label>Hình ảnh đại diện</label>
                <div class="ad-upd-news-image-upload">
                    <div class="ad-upd-news-img-preview">
                        <img src="./img/news/<?= htmlspecialchars($NewsInfor['hinh_tintuc']) ?>" id="update_hinhtintuc-preview" alt="Preview">
                    </div>
                    <div class="ad-upd-news-upload-action">
                        <label for="update_hinhtintuc" class="ad-upd-news-btn-upload">
                            <i class="fas fa-cloud-upload-alt"></i> Chọn ảnh mới
                        </label>
                        <input type="file" name="update_hinhtintuc" id="update_hinhtintuc" accept="image/*" style="display: none;">
                        <small>Chỉ tải lên nếu bạn muốn thay đổi ảnh hiện tại.</small>
                    </div>
                </div>
            </div>

            <div class="ad-upd-news-form-group">
                <label>Nội dung chi tiết <span class="required">*</span></label>
                <div class="ad-upd-news-editor-container">
                    <textarea name="update_noidungintuc" id="noidungtintuc" placeholder="Viết nội dung đầy đủ tại đây..."><?= htmlspecialchars($NewsInfor['noi_dung']) ?></textarea>
                </div>
            </div>

            <div class="ad-upd-news-submit-area">
                <button type="submit" name="update_news" class="ad-upd-news-btn-submit">
                    <i class="fas fa-save"></i> Cập Nhật Bài Viết
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    // 1. Script xem trước hình ảnh khi chọn file
    document.getElementById('update_hinhtintuc').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('update_hinhtintuc-preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    // 2. Khởi tạo CKEditor 5
    ClassicEditor
        .create(document.querySelector('#noidungtintuc'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'insertTable', 'undo', 'redo' ],
            placeholder: 'Mời bạn nhập nội dung chi tiết của bài viết tại đây...'
        })
        .catch(error => {
            console.error(error);
        });
</script>