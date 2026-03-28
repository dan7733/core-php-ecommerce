<?php
// Lấy trang hiện tại để bôi đậm phân trang
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="dtl-prod-container">
    <div class="dtl-prod-card">
        
        <div class="dtl-prod-header">
            <h1><i class="fas fa-clipboard-list"></i> Cập Nhật Chi Tiết Sản Phẩm</h1>
        </div>

        <div class="dtl-table-wrapper">
            <?php if (!empty($listadminproduct)) : ?>
                <table class="dtl-table">
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
                                    <span class="dtl-id-badge">#<?= htmlspecialchars($adminproduct['idsanpham']) ?></span>
                                </td>
                                
                                <td data-label="Tên sản phẩm">
                                    <span class="dtl-name-text"><?= htmlspecialchars($adminproduct['ten']) ?></span>
                                </td>
                                
                                <td data-label="Thao tác" class="text-center">
                                    <div class="dtl-action-buttons">
                                        <a href="?admincontroller=admin&action=update_Admindetailproduct&idproduct=<?= urlencode($adminproduct['idsanpham']) ?>" class="dtl-btn-action dtl-btn-edit" title="Sửa chi tiết">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div style="padding: 40px 20px; text-align: center; color: #666;">
                    <i class="fas fa-folder-open" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                    <p style="font-size: 16px; font-weight: 500;">Không có dữ liệu chi tiết sản phẩm nào để hiển thị.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="dtl-pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?admincontroller=admin&action=list_Adminproduct&page_number=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</div>