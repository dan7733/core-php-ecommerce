<?php
// Lấy trang hiện tại để bôi đậm phân trang
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="list-account-container">
    <div class="list-account-card">
        
        <div class="list-account-header">
            <h1><i class="fas fa-users-cog"></i> Cập Nhật Tài Khoản</h1>
        </div>

        <?php if (isset($delAccount_txtErro) && !empty($delAccount_txtErro)) : ?>
            <?php 
                $isSuccess = ($delAccount_txtErro === 'Xóa thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="list-account-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($delAccount_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=list_Account';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <div class="list-account-table-wrapper">
            <?php if ($listadminAccount) : ?>
                <table class="list-account-table">
                    <thead>
                        <tr>
                            <th>Thông tin người dùng</th>
                            <th>Thông tin liên hệ</th>
                            <th>Địa chỉ cư trú</th>
                            <th>Quyền hạn</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadminAccount as $account) : ?>
                            <tr>
                                <td data-label="Người dùng">
                                    <div class="list-account-user-info">
                                        <div class="list-account-avatar"><i class="fas fa-user"></i></div>
                                        <div class="list-account-user-details">
                                            <span class="list-account-user-name"><?= htmlspecialchars($account['ho'] . ' ' . $account['ten']) ?></span>
                                            <span class="list-account-user-id">@<?= htmlspecialchars($account['user']) ?> (ID: #<?= htmlspecialchars($account['manguoidung']) ?>)</span>
                                        </div>
                                    </div>
                                </td>

                                <td data-label="Liên hệ">
                                    <div class="list-account-contact">
                                        <span class="list-account-contact-item"><i class="fas fa-envelope"></i> <?= htmlspecialchars($account['email']) ?></span>
                                        <span class="list-account-contact-item"><i class="fas fa-phone-alt"></i> <?= htmlspecialchars($account['sdt']) ?></span>
                                    </div>
                                </td>

                                <td data-label="Địa chỉ">
                                    <span style="color: #475569; font-size: 14px; word-break: break-word;">
                                        <i class="fas fa-map-marker-alt" style="color: #cbd5e1; margin-right: 5px;"></i>
                                        <?= htmlspecialchars($account['diachi']) ?>
                                    </span>
                                </td>
                                
                                <td data-label="Quyền hạn">
                                    <?php if ($account['quyen'] == 1) : ?>
                                        <span class="list-account-role-badge admin"><i class="fas fa-shield-alt"></i> Quản trị viên</span>
                                    <?php else : ?>
                                        <span class="list-account-role-badge user"><i class="fas fa-user"></i> Người dùng</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td data-label="Thao tác">
                                    <div class="list-account-actions">
                                        <a href="?admincontroller=admin&action=update_Account&idaccount=<?= $account['manguoidung'] ?>" class="list-account-btn list-account-btn-edit" title="Sửa thông tin">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        
                                        <a href="?admincontroller=admin&action=delete_Accountadmin&idaccount=<?= $account['manguoidung'] ?>" class="list-account-btn list-account-btn-delete" title="Xóa tài khoản" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không? Hành động này không thể hoàn tác!');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div style="padding: 40px 20px; text-align: center; color: #666;">
                    <i class="fas fa-users-slash" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                    <p style="font-size: 16px; font-weight: 500;">Không có dữ liệu tài khoản nào để hiển thị.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="list-account-pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?admincontroller=admin&action=list_Account&page_number=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</div>