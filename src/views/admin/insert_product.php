<?php
if (isset($insertProdcuct_txtErro) && !empty($insertProdcuct_txtErro)) {
    echo "<script>alert('$insertProdcuct_txtErro')</script>";
}
?>
<div class="container-sanpham">
    <div class="avatar-icon-container">
        <i class="fa-solid fa-bell"></i>
        <img src="./img/AVT.jpg" alt="Avatar" class="avatar">
    </div>
    <div class="tieude-sanpham">
        <h2 class="Thông tin sản phẩm">Thông tin sản phẩm - Thêm</h2>
    </div>
    <div class="container-group sanpham-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tensanpham">Tên sản phẩm :</label>
                <input type="text" name="tensanpham" required>
            </div>
            <div class="form-group">
                <label for="giasanpham">Giá :</label>
                <input type="text" name="giasanpham" required>
            </div>
            <div class="form-group">
                <label for="hinhsanpham">Hình :</label>
                <input type="file" name="hinhsanpham" required>
            </div>
            <div class="form-group">
                <label for="motosanpham">Mô tả :</label>
                <input type="text" name="motosanpham" required>
            </div>
            <div class="form-group">
                <label for="loaisanpham">Loại sản phẩm :</label>
                <select id="loaisanpham" name="loaisanpham" required>
                    <?php
                    if (!empty($Inforcategorys)) {
                        foreach ($Inforcategorys as $Inforcategory) {
                            echo '<option value="' . $Inforcategory['id'] . '">' . $Inforcategory['ten'] . '</option>';
                        }
                    } else {
                        echo '<option value=""> Trống </option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="addproduct" value="Thêm sản phẩm">
            </div>
        </form>
    </div>
</div>
