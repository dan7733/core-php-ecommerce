<?php
if (isset($InsertPromotion) && !empty($InsertPromotion)) {
    echo "<script>alert('$InsertPromotion')</script>";
}
?>
<div class="container-promotion">
    <div class="tieude-promotion">
        <h2 class="Thông tin sản phẩm">Thông tin tin tức - Thêm</h2>
    </div>
    <div class="container-group promotion-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tieudepromotion">Tiêu đề:</label>
                <input type="text" name="tieudepromotion" required>
            </div>
            <div class="form-group">
                <label for="hinhpromotion">Hình:</label>
                <input type="file" name="hinhpromotion" required>
            </div>
            <div class="form-group">
                <label for="noidungtomtat">Nội dung tóm tắt:</label>
                <input type="text" name="noidungtomtatpromotion" id="noidungtomtatpromotion" required>
            </div>
            <div class="form-group">
                <label for="noidungpromotion">Nội dung:</label>
                <textarea name="noidungpromotion" id="noidungpromotion"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="addPromotion" value="Thêm sản phẩm">
            </div>
        </form>
    </div>
</div>
