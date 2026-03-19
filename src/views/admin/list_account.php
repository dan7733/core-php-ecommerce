<?php
if (isset($delAccount_txtErro) && !empty($delAccount_txtErro)) {
    echo "<script>
            alert('$delAccount_txtErro');
            if ('$delAccount_txtErro' === 'Xóa thành công!') {
                window.location.href = '?admincontroller=admin&action=list_Account';
            }
          </script>";
}
?>
<div class="account-wrapper">
    <div class="account-container">
        <div class="account-tittle">
            <h1>CẬP NHẬT TÀI KHOẢN</h1>
        </div>
        <?php
        // Hiển thị sản phẩm từ dữ liệu trả về bởi hàm Lay_thongtin_SP
        if ($listadminAccount) {
            echo '<table class="account-bangdulieu">';
            echo '<tr><th>Mã người dùng</th><th>Tài khoản</th><th>Họ và Tên</th><th>Email</th><th>Số điện thoại</th><th>Địa chỉ</th><th>Quyền</th><th>Sửa</th><th>xóa</th></tr>';
            foreach ($listadminAccount as $account) {
                echo '<tr>';
                echo '<td>' . $account['manguoidung'] . '</td>';
                echo '<td>' . $account['user'] . '</td>';
                echo '<td>' . $account['ho'] . ' ' . $account['ten'] . '</td>';
                echo '<td>' . $account['email'] . '</td>';
                echo '<td>' . $account['sdt'] . '</td>';
                echo '<td>' . $account['diachi'] . '</td>';
                echo '<td>' . ($account['quyen'] == 1 ? 'Quản trị viên' : 'Người dùng') . '</td>';
                echo '<td><a class="edit-btn" href="?admincontroller=admin&action=update_Account&idaccount=' . $account['manguoidung'] . '"><i class="fas fa-edit"></i> Sửa</a></td>';
                echo '<td><a class="delete-btn" href="?admincontroller=admin&action=delete_Accountadmin&idaccount=' . $account['manguoidung'] . '"<i class="fas fa-trash-alt"></i> Xóa</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <div class="account-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?admincontroller=admin&action=list_Account&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
