<?php
if (isset($delNews_txtErro) && !empty($delNews_txtErro)) {
    echo "<script>
            alert('$delNews_txtErro');
            if ('$delNews_txtErro' === 'Xóa thành công!') {
                window.location.href = '?admincontroller=admin&action=list_New';
            }
          </script>";
}
?>
<div class="news-wrapper">
    <div class="news-container">
        <div class="news-tittle">
            <h1>CẬP NHẬT TIN TỨC</h1>
        </div>
        <?php
        // Hiển thị sản phẩm từ dữ liệu trả về bởi hàm Lay_thongtin_SP
        if ($listadminnews) {
            echo '<table class="news-bangdulieu">';
            echo '<tr><th>ID</th><th>Tên đề</th><th>Nội dung tóm tắt</th><th>Sửa</th><th>xóa</th></tr>';
            foreach ($listadminnews as $news) {
                echo '<tr>';
                echo '<td>' . $news['id_tintuc'] . '</td>';
                echo '<td>' . $news['tieu_de'] . '</td>';
                echo '<td>' . $news['noi_dung_tom_tat'] . '</td>';
                echo '<td><a class="edit-btn" href="?admincontroller=admin&action=update_News&idnews=' . $news['id_tintuc'] . '"><i class="fas fa-edit"></i> Sửa</a></td>';
                echo '<td><a class="delete-btn" href="?admincontroller=admin&action=delete_News&idnews=' . $news['id_tintuc'] . '"<i class="fas fa-trash-alt"></i> Xóa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="news-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?admincontroller=admin&action=list_New&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
