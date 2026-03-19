<?php
if (isset($insertCategory_txtErro) && !empty($insertCategory_txtErro)) {
    echo "<script>alert('$insertCategory_txtErro')</script>";
}
?>
<div class="container-loai">
    <div class="tieude-loai">
        <h2 class="">Thêm Loại</h2>
    </div>
    <div class="container-group loai-container">
        <form action="" method="POST">
            <div class="form-group loai-group">
                <label for="">Tên loại:</label>
                <input type="text" name="tenloai">
            </div>
            <div class="form-group loai-group">
                <label for="">Nổi bật:</label>
                <input type="text" name="noibat">
            </div>
            <div class="form-group loai-group">
                <label for="">Thứ tự:</label>
                <input type="text" name="thutu">
            </div>
            <input type="submit" name="insert_category" value="Thêm loại">
        </form>
    </div>
</div>