<div class="updatedetailproduct-wrapper">
    <div class="updatedetailproduct-container">
        <div class="updatedetailproduct-tittle">
            <h1>CẬP NHẬT CHI TIẾT SẢN PHẨM</h1>
        </div>
        <?php
        // Hiển thị sản phẩm từ dữ liệu trả về bởi hàm Lay_thongtin_SP
        if ($listadminproduct) {
            echo '<table class="updatedetailproduct-bangdulieu">';
            echo '<tr><th>ID sản phẩm</th><th>Tên sản phẩm</th><th>Sửa</th></tr>';
            foreach ($listadminproduct as $adminproduct) {
                echo '<tr>';
                echo '<td>' . $adminproduct['idsanpham'] . '</td>';
                echo '<td>' . $adminproduct['ten'] . '</td>';
                echo '<td><a class="edit-btn" href="?admincontroller=admin&action=update_Admindetailproduct&idproduct=' . $adminproduct['idsanpham'] . '"><i class="fas fa-edit"></i> Sửa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="updatedetailproduct-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?admincontroller=admin&action=list_Adminproduct&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
