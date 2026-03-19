<?php
if (isset($updatePromotion_txtErro) && !empty($updatePromotion_txtErro)) {
    echo "<script>
            alert('$updatePromotion_txtErro');
            if ('$updatePromotion_txtErro' === 'Cập nhật khuyến mãi thành công!') {
                window.location.href = '?admincontroller=admin&action=update_Promotion&idpromotion=" . $PromotionInfor['id_khuyenmai'] . "';
            }
          </script>";
}
?>
<div class="container-promotion">
    <div class="tieude-promotion">
        <h2 class="Thông tin sản phẩm">Thông tin Khuyến mãi- Cập nhật</h2>
    </div>
    <div class="container-group promotion-container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="khong_update_hinhkhuyenmai" value="<?php echo $PromotionInfor['hinh_khuyenmai']; ?>">
            <div class="form-group">
                <label for="">Tiêu đề:</label>
                <input type="text" name="update_tieudekhuyenmai" value="<?php echo $PromotionInfor['tieude_khuyenmai']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Nội dung tóm tắt:</label>
                <input type="text" name="update_ndttkhuyenmai" value="<?php echo $PromotionInfor['noidung_tomtat_khuyenmai']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Nội dung:</label>
                <input type="text" name="update_noidungkhuyenmai" value="<?php echo $PromotionInfor['noidung_khuyenmai']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Hình</label>
                <img src="./img/promotion/<?php echo $PromotionInfor['hinh_khuyenmai']; ?>" id="update_promotionimg-preview" class="capnhatsp-img" alt="">
                <input type="file" name="update_hinhkhuyenmai" id="update_promotionimg" require>
            </div>
            <input type="submit" name="update_promotion" value="Cập nhật Khuyến mãi">
        </form>
    </div>
</div>
<script>
    document.getElementById('update_promotionimg').addEventListener('change', function(e) {
        var file = e.target.files[0]; // Lấy tệp hình ảnh đã chọn
        var reader = new FileReader(); // Tạo một FileReader để đọc tệp
        reader.onload = function(e) { // Xử lý sự kiện khi tệp được đọc thành công
            document.getElementById('update_promotionimg-preview').setAttribute('src', e.target.result); // Cập nhật src của thẻ <img> với URL dữ liệu mới
        }
        reader.readAsDataURL(file); // Đọc tệp dưới dạng URL dữ liệu (data URL)
    });
</script>
