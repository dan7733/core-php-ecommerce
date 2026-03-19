<?php
if (isset($delReview_txtErro) && !empty($delReview_txtErro)) {
    echo "<script>
            alert('$delReview_txtErro');
            if ('$delReview_txtErro' === 'Xóa bình luận thành công!') {
                window.location.href = '?admincontroller=admin&action=list_Review';
            }
          </script>";
}
?>

<div class="review-wrapper">
    
    <div class="review-container">
        <div class="review-tittle">
            <h1>CẬP NHẬT TÀI KHOẢN</h1>
        </div>
        <form action="" method="post" class="form-adminreview">
            <label for="">Nhập mã sản phẩm</label>
            <input type="text" placeholder="Nhập mã sản phẩm" name="masanpham">
            <button type=submit name="timkiemreview">Tìm kiếm</button>
        </form>
        <?php
        // Hiển thị sản phẩm từ dữ liệu trả về bởi hàm Lay_thongtin_SP
        if ($listadminReview) {
            echo '<table class="review-bangdulieu">';
            echo '<tr><th>ID đánh giá</th><th>Mã người dùng</th><th>ID sản phẩm</th><th>Nội dung</th><th>Ngày đánh giá</th><th>xóa</th></tr>';
            foreach ($listadminReview as $review) {
                echo '<tr>';
                echo '<td>' . $review['iddanhgia'] . '</td>';
                echo '<td>' . $review['manguoidung'] . '</td>';
                echo '<td>' . $review['idsanpham'] . '</td>';
                echo '<td>' . $review['noidung'] . '</td>';
                echo '<td>' . $review['ngaydanhgia'] . '</td>';
                echo '<td><a class="delete-btn" href="?admincontroller=admin&action=delete_Review&idreview=' . $review['idsanpham'] . '"<i class="fas fa-trash-alt"></i> Xóa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="review-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?admincontroller=admin&action=list_Review&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
