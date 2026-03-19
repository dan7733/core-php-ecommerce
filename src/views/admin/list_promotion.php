<?php
if (isset($delPromotion_txtErro) && !empty($delPromotion_txtErro)) {
    echo "<script>
            alert('$delPromotion_txtErro');
            if ('$delPromotion_txtErro' === 'Xóa thành công!') {
                window.location.href = '?admincontroller=admin&action=list_promotion';
            }
          </script>";
}
?>
<div class="promotion-wrapper">
    <div class="promotion22-container">
        <div class="promotion-tittle">
            <h1>CẬP NHẬT KHUYẾN MÃI</h1>
        </div>
        <?php
        // Hiển thị sản phẩm từ dữ liệu trả về bởi hàm Lay_thongtin_SP
        if ($listadminPromotion) {
            echo '<table class="promotion-bangdulieu">';
            echo '<tr><th>ID</th><th>Tên đề</th><th>Nội dung tóm tắt</th><th>Sửa</th><th>xóa</th></tr>';
            foreach ($listadminPromotion as $promotion) {
                echo '<tr>';
                echo '<td>' . $promotion['id_khuyenmai'] . '</td>';
                echo '<td>' . $promotion['tieude_khuyenmai'] . '</td>';
                echo '<td>' . $promotion['noidung_tomtat_khuyenmai'] . '</td>';
                echo '<td><a class="edit-btn" href="?admincontroller=admin&action=update_Promotion&idpromotion=' . $promotion['id_khuyenmai'] . '"><i class="fas fa-edit"></i> Sửa</a></td>';
                echo '<td><a class="delete-btn" href="?admincontroller=admin&action=delete_Promotion&idpromotion=' . $promotion['id_khuyenmai'] . '"<i class="fas fa-trash-alt"></i> Xóa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="promotion-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?admincontroller=admin&action=list_Promotion&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
