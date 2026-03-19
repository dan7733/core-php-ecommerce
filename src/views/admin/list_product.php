<?php
if (isset($delProdcuct_txtErro) && !empty($delProdcuct_txtErro)) {
    echo "<script>
            alert('$delProdcuct_txtErro');
            if ('$delProdcuct_txtErro' === 'Xóa thành công!') {
                window.location.href = '?admincontroller=admin&action=list_product';
            }
          </script>";
}
?>
<div class="updateproduct-wrapper">
    <div class="updateproduct-container">
        <div class="updateproduct-tittle">
            <h1>CẬP NHẬT SẢN PHẨM</h1>
        </div>
        <?php
        // Hiển thị sản phẩm từ dữ liệu trả về bởi hàm Lay_thongtin_SP
        if ($listadminproduct) {
            echo '<table class="updateproduct-bangdulieu">';
            echo '<tr><th>ID sản phẩm</th><th>Tên sản phẩm</th><th>Sửa</th><th>Xóa</th></tr>';
            foreach ($listadminproduct as $adminproduct) {
                echo '<tr>';
                echo '<td>' . $adminproduct['idsanpham'] . '</td>';
                echo '<td>' . $adminproduct['ten'] . '</td>';
                echo '<td><a class="edit-btn" href="?admincontroller=admin&action=update_Adminproduct&idproduct=' . $adminproduct['idsanpham'] . '"><i class="fas fa-edit"></i> Sửa</a></td>';
                echo '<td><a class="delete-btn" href="?admincontroller=admin&action=delete_Adminproduct&idproduct=' . $adminproduct['idsanpham'] . '"<i class="fas fa-trash-alt"></i> Xóa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="updateproduct-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?admincontroller=admin&action=list_product&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
