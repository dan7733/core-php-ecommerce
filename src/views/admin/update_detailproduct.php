<?php
if (isset($updatedetailproduct_txtErro) && !empty($updatedetailproduct_txtErro)) {
    echo "<script>
            alert('$updatedetailproduct_txtErro');
            if ('$updatedetailproduct_txtErro' === 'Cập nhật chi tiết sản phẩm thành công!!!') {
                window.location.href = '?admincontroller=admin&action=update_Admindetailproduct&idproduct=" . $productDetail['san_pham_id'] . "';
            }
          </script>";
}
?>
<div class="container-chitietsp">
        <div class="avatar-icon-container">
            <i class="fa-solid fa-bell"></i>
            <img src="./img/AVT.jpg" alt="Avatar" class="avatar">
        </div>
    
        <div class="tieude-chitietsp">
            <h2>Cập nhật chi tiết sản phẩm</h2>
        </div>
       <div class="container-group chitietsp-container">
            <form action="" method="post">
                <div class="form-group chitiet-group">
                    <label for="">CPU</label>
                    <input type="text" name="CPU" value="<?php echo $productDetail['CPU']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="" >RAM</label>
                    <input type="text" name="RAM" value="<?php echo $productDetail['RAM']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Ổ cứng</label>
                    <input type="text" name="ocung" value="<?php echo $productDetail['O_Cung']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Màn hình</label>
                    <input type="text" name="Manhinh" value="<?php echo $productDetail['Man_Hinh']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Card màn hình</label>
                    <input type="text" name="Cardmanhinh" value="<?php echo $productDetail['Card_Man_Hinh']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Cổng kết nối</label>
                    <input type="text" name="Congketnoi" value="<?php echo $productDetail['Cong_Ket_Noi']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Hệ điều hành</label>
                    <input type="text" name="hedieuhanh" value="<?php echo $productDetail['He_Dieu_Hanh']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Thiết kế </label>
                    <input type="text" name="thietke" value="<?php echo $productDetail['Thiet_Ke']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Kích thước khối lượng </label>
                    <input type="text" name="kichthuoc" value="<?php echo $productDetail['Kich_Thuoc_Khoi_Luong']; ?>">
                </div>
                <div class="form-group chitiet-group">
                    <label for="">Thời điểm ra mắt </label>
                    <input type="date" name="thoidiem" value="<?php echo $productDetail['Thoi_Diem_Ra_Mat']; ?>">
                </div>
                <input type="submit" name="update_detailproduct" value="Cập nhật chi tiết sản phẩm">
            </form>
       </div>
</div>