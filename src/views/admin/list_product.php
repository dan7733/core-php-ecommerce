<?php
// Lấy trang hiện tại để bôi đậm phân trang
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="prod-list-container">
    <div class="prod-list-card">
        
        <div class="prod-list-header">
            <h1><i class="fas fa-box-open"></i> Cập Nhật Sản Phẩm</h1>
        </div>

        <?php if (isset($delProdcuct_txtErro) && !empty($delProdcuct_txtErro)) : ?>
            <?php 
                $isSuccess = ($delProdcuct_txtErro === 'Xóa thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="prod-list-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($delProdcuct_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=list_product';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <div class="prod-table-wrapper">
            <?php if (!empty($listadminproduct)) : ?>
                <table class="prod-table">
                    <thead>
                        <tr>
                            <th style="width: 15%;">ID Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th style="width: 15%; text-align: center;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadminproduct as $adminproduct) : ?>
                            <tr>
                                <td data-label="ID Sản phẩm">
                                    <span class="prod-id-badge">#<?= htmlspecialchars($adminproduct['idsanpham']) ?></span>
                                </td>
                                
                                <td data-label="Tên sản phẩm">
                                    <span class="prod-name-text"><?= htmlspecialchars($adminproduct['ten']) ?></span>
                                </td>
                                
                                <td data-label="Thao tác" class="text-center">
                                    <div class="prod-action-buttons">
                                        <a href="?admincontroller=admin&action=update_Adminproduct&idproduct=<?= urlencode($adminproduct['idsanpham']) ?>" class="prod-btn-action prod-btn-edit" title="Sửa sản phẩm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        
                                        <a href="?admincontroller=admin&action=delete_Adminproduct&idproduct=<?= urlencode($adminproduct['idsanpham']) ?>" class="prod-btn-action prod-btn-delete" title="Xóa sản phẩm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không? Hành động này không thể hoàn tác!');">
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
                    <i class="fas fa-box" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                    <p style="font-size: 16px; font-weight: 500;">Không có dữ liệu sản phẩm nào để hiển thị.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="prod-pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?admincontroller=admin&action=list_product&page_number=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</div>