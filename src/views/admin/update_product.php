<?php
if (isset($updateproduct_txtErro) && !empty($updateproduct_txtErro)) {
    echo "<script>
            alert('$updateproduct_txtErro');
            if ('$updateproduct_txtErro' === 'Cập nhật sản phẩm thành công!') {
                window.location.href = '?admincontroller=admin&action=update_Adminproduct&idproduct=" . $productInfor['idsanpham'] . "';
            }
          </script>";
}
?>
<div class="container-sanpham">
        <div class="avatar-icon-container">
            <i class="fa-solid fa-bell"></i>
            <img src="./img/AVT.jpg" alt="Avatar" class="avatar">
        </div>
    <div class="tieude-sanpham">
        <h2 class="Thông tin sản phẩm">Thông tin sản phẩm- Cập nhật</h2>
    </div>
    <div class="container-group sanpham-container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="khong_update_hinh" value="<?php echo $productInfor['hinh']; ?>">
            <div class="form-group">
                <label for="">Tên sản phẩm :</label>
                <input type="text" name="update_tensanpham" value="<?php echo $productInfor['ten']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Giá:</label>
                <input type="text" name="update_giasanpham" value="<?php echo $productInfor['gia']; ?>" require>
            </div>
            <div class="form-group">
                <label for="">Hình</label>
                <img src="./img/product/<?php echo $productInfor['hinh']; ?>" id="update_productimg-preview" class="capnhatsp-img" alt="">
                <input type="file" name="update_hinhsanpham" id="update_productimg" require>
            </div>
            <div class="form-group">
                <label for="">Mô tả :</label>
                <input type="text" name="update_mota" value="<?php echo $productInfor['moTa']; ?>">
            </div>
            <div class="form-group">
                <label for="loaisanpham">Loại sản phẩm :</label>
                <select id="loaisanpham" name="update_loaisanpham" required>
                        <?php
                        if (!empty($Inforcategorys)) {
                            foreach ($Inforcategorys as $Inforcategory) {
                                $selected = ($Inforcategory['id'] == $productInfor['loai']) ? 'selected' : '';
                                echo '<option value="' . $Inforcategory['id'] . '" ' . $selected . '>' . $Inforcategory['ten'] . '</option>';
                            }
                        } else {
                            echo '<option value=""> Trống </option>';
                        }
                        ?>
                    </select>
            </div>
            <input type="submit" name="update_product" value="Cập nhật sản phẩm">
        </form>
    </div>
</div>
<script>
    document.getElementById('update_productimg').addEventListener('change', function(e) {
        var file = e.target.files[0]; // Lấy tệp hình ảnh đã chọn
        var reader = new FileReader(); // Tạo một FileReader để đọc tệp
        reader.onload = function(e) { // Xử lý sự kiện khi tệp được đọc thành công
            document.getElementById('update_productimg-preview').setAttribute('src', e.target.result); // Cập nhật src của thẻ <img> với URL dữ liệu mới
        }
        reader.readAsDataURL(file); // Đọc tệp dưới dạng URL dữ liệu (data URL)
    });
</script>
