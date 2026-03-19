<?php
if (isset($updateNews_txtErro) && !empty($updateNews_txtErro)) {
    echo "<script>
            alert('$updateNews_txtErro');
            if ('$updateNews_txtErro' === 'Cập nhật thành công!') {
                window.location.href = '?admincontroller=admin&action=update_News&idnews=" . $NewsInfor['id_tintuc'] . "';
            }
          </script>";
}
?>
<div class="container-tintuc">
    <div class="tieude-tintuc">
        <h2 class="Thông tin sản phẩm">Thông tin tin tức- Cập nhật</h2>
    </div>
    <div class="container-group tintuc-container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="khong_update_hinhtintuc" value="<?php echo $NewsInfor['hinh_tintuc']; ?>">
            <div class="form-group">
                <label for="">Tiêu đề:</label>
                <input type="text" name="update_tieudetintuc" value="<?php echo $NewsInfor['tieu_de']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Nội dung tóm tắt:</label>
                <input type="text" name="update_ndtttintuc" value="<?php echo $NewsInfor['noi_dung_tom_tat']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Nội dung:</label>
                <input type="text" name="update_noidungintuc" value="<?php echo $NewsInfor['noi_dung']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Hình</label>
                <img src="./img/news/<?php echo $NewsInfor['hinh_tintuc']; ?>" id="update_hinhtintuc-preview" class="promotionsp-img" alt="">
                <input type="file" name="update_hinhtintuc" id="update_hinhtintuc" require>
            </div>
            <input type="submit" name="update_news" value="Cập nhật Tin tức">
        </form>
    </div>
</div>
<script>
    document.getElementById('update_hinhtintuc').addEventListener('change', function(e) {
        var file = e.target.files[0]; // Lấy tệp hình ảnh đã chọn
        var reader = new FileReader(); // Tạo một FileReader để đọc tệp
        reader.onload = function(e) { // Xử lý sự kiện khi tệp được đọc thành công
            document.getElementById('update_hinhtintuc-preview').setAttribute('src', e.target.result); // Cập nhật src của thẻ <img> với URL dữ liệu mới
        }
        reader.readAsDataURL(file); // Đọc tệp dưới dạng URL dữ liệu (data URL)
    });
</script>
