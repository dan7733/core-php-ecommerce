<?php
if (isset($updateCategory_txtErro) && !empty($updateCategory_txtErro)) {
    echo "<script>
            alert('$updateCategory_txtErro');
            if ('$updateCategory_txtErro' === 'Cập nhật loại thành công!!!') {
                window.location.href = '?admincontroller=admin&action=update_Category&idcategory=" . $CategoryDetail['id'] . "';
            }
          </script>";
}
?>
<div class="container-loai">
    <div class="tieude-loai">
        <h2 class="">Cập nhật loại</h2>
    </div>
    <div class="container-group loai-container">
        <form action="" method="post">
            <div class="form-group loai-group">
                <label for="">Tên loại :</label>
                <input type="text" name="tenloai" value="<?php echo $CategoryDetail['ten']; ?>">
            </div>
            <div class="form-group loai-group">
                <label for="">Nổi bật :</label>
                <input type="text" name="noibat" value="<?php echo $CategoryDetail['noiBat']; ?>">
            </div>
            <div class="form-group loai-group">
                <label for="">Thứ tự :</label>
                <input type="text" name="thutu" value="<?php echo $CategoryDetail['thuTu']; ?>">
            </div>
            <input type="submit" name="update_category" value="Cập nhật loại">
        </form>
    </div>


</div>