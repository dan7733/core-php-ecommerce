<?php
if (isset($delCategory_txtErro) && !empty($delCategory_txtErro)) {
    echo "<script>
            alert('$delCategory_txtErro');
            if ('$delCategory_txtErro' === 'Xóa loại thành công!') {
                window.location.href = '?admincontroller=admin&action=list_Category';
            }
          </script>";
}
?>
<div class="list_category-wrapper">
    <div class="list_category-container">
        <div class="list_category-tittle">
            <h1>CẬP NHẬT LOẠI</h1>
        </div>
        <?php
        // Hiển thị sản phẩm từ dữ liệu trả về bởi hàm Lay_thongtin_SP
        if ($listadmincategory) {
            echo '<table class="list_category-bangdulieu">';
            echo '<tr><th>ID loại</th><th>Tên loại</th><th>Nổi bật</th><th>Thứ tự</th><th>Sửa</th><th>xóa</th></tr>';
            foreach ($listadmincategory as $category) {
                echo '<tr>';
                echo '<td>' . $category['id'] . '</td>';
                echo '<td>' . $category['ten'] . '</td>';
                echo '<td>' . $category['noiBat'] . '</td>';
                echo '<td>' . $category['thuTu'] . '</td>';
                echo '<td><a class="edit-btn" href="?admincontroller=admin&action=update_Category&idcategory=' . $category['id'] . '"><i class="fas fa-edit"></i> Sửa</a></td>';
                echo '<td><a class="delete-btn" href="?admincontroller=admin&action=delete_Category&idcategory=' . $category['id'] . '"<i class="fas fa-trash-alt"></i> Xóa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="list_category-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?admincontroller=admin&action=list_Category&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
