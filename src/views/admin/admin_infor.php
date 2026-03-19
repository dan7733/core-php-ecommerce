<?php
    if (isset($logoutadmin_txtErro) && !empty($logoutadmin_txtErro)) {
        echo '<script type="text/javascript">' . $logoutadmin_txtErro . '</script>';
        exit;
    }
?>
<div class="admin_infor-container">
    <h2 class="admin_infor-heading">Chào mừng <?php echo $inforadmin['ten'];?> đến với trang quản trị</h2>
    <div class="admin_infor-info">
        <div class="admin_infor-item">
            <div class="icon"><i class="fas fa-user"></i></div>
            <h6>Họ và tên</h6>
            <p><?php echo $inforadmin['ho']." ".$inforadmin['ten'];?></p>
        </div>
        <div class="admin_infor-item">
            <div class="icon"><i class="fas fa-envelope"></i></div>
            <h6>Email</h6>
            <p><?php echo $inforadmin['email'];?></p>
        </div>
        <div class="admin_infor-item">
            <div class="icon"><i class="fas fa-phone"></i></div>
            <h6>Số điện thoại</h6>
            <p><?php echo $inforadmin['sdt'];?></p>
        </div>
        <div class="admin_infor-item">
            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
            <h6>Địa chỉ</h6>
            <p><?php echo $inforadmin['diachi'];?></p>
        </div>
    </div>
    <div class="admin_notes">
        <h3 class="notes_heading">Các điều khoản lưu ý:</h3>
        <ul class="notes_list">
            <li><i class="fas fa-exclamation-circle"></i> Bạn có trách nhiệm đảm bảo rằng thông tin trên trang admin này được bảo mật.</li>
            <li><i class="fas fa-exclamation-circle"></i> Không chia sẻ thông tin đăng nhập của bạn với bất kỳ ai.</li>
            <li><i class="fas fa-exclamation-circle"></i> Hãy đảm bảo sao lưu dữ liệu thường xuyên để tránh mất mát thông tin.</li>
            <li><i class="fas fa-exclamation-circle"></i> Liên hệ với bộ phận hỗ trợ nếu bạn gặp bất kỳ vấn đề nào khi sử dụng hệ thống.</li>
            <li><i class="fas fa-exclamation-circle"></i> Vui lòng tuân thủ các quy định và điều luật của hệ thống.</li>
            <li><i class="fas fa-exclamation-circle"></i> Tài khoản admin chỉ được sử dụng cho mục đích quản trị, không được sử dụng cho mục đích cá nhân.</li>
        </ul>
    </div>
    <div class="admin_useful-info">
        <h3 class="useful_info_heading">Thông tin hữu ích</h3>
        <ul class="useful_info_list">
            <li><a href="#">Hướng dẫn sử dụng</a></li>
            <li><a href="#">Câu hỏi thường gặp</a></li>
            <li><a href="#">Tài liệu hỗ trợ</a></li>
            <li><a href="#">Liên hệ hỗ trợ</a></li>
        </ul>
    </div>
    <div class="admin_footer">
        <p>&copy; 2024 Trang Admin. Tất cả các quyền được bảo lưu.</p>
    </div>
</div>
