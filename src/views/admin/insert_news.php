<?php
if (isset($InsertNews) && !empty($InsertNews)) {
    echo "<script>alert('$InsertNews')</script>";
}
?>
<div class="container-tintuc">
    <div class="avatar-icon-container">
        <i class="fa-solid fa-bell"></i>
        <img src="./img/AVT.jpg" alt="Avatar" class="avatar">
    </div>
    <div class="tieude-tintuc">
        <h2 class="Thông tin sản phẩm">Thông tin tin tức - Thêm</h2>
    </div>
    <div class="container-group tintuc-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tieudetintuc">Tiêu đề:</label>
                <input type="text" name="tieudetintuc" required>
            </div>
            <div class="form-group">
                <label for="hinhtintuc">Hình:</label>
                <input type="file" name="hinhtintuc" required>
            </div>
            <div class="form-group">
                <label for="noidungtomtat">Nội dung tóm tắt:</label>
                <input type="text" name="noidungtomtat" id="noidungtomtat" required>
            </div>
            <div class="form-group">
                <label for="noidungtintuc">Nội dung:</label>
                <textarea name="noidungtintuc" id="noidungtintuc"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="addnews" value="Thêm sản phẩm">
            </div>
        </form>
    </div>
</div>
