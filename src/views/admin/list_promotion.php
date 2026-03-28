<?php
// XỬ LÝ LẤY TRANG HIỆN TẠI (Dùng để tô màu nút Phân trang đang active)
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="list-promo-container">
    <div class="list-promo-card">
        
        <div class="list-promo-header">
            <h1><i class="fas fa-bullhorn"></i> Cập Nhật Khuyến Mãi</h1>
        </div>

        <?php if (isset($delPromotion_txtErro) && !empty($delPromotion_txtErro)) : ?>
            <?php 
                $isSuccess = ($delPromotion_txtErro === 'Xóa thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="list-promo-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($delPromotion_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=list_promotion';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <div class="list-promo-table-wrapper">
            <?php if (!empty($listadminPromotion)) : ?>
                <table class="list-promo-table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 25%;">Tiêu đề</th>
                            <th>Nội dung tóm tắt</th>
                            <th style="width: 15%; text-align: center;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadminPromotion as $promotion) : ?>
                            <tr>
                                <td data-label="ID">
                                    <span class="list-promo-id-badge">#<?= htmlspecialchars($promotion['id_khuyenmai']) ?></span>
                                </td>
                                
                                <td data-label="Tiêu đề">
                                    <span class="list-promo-title-text"><?= htmlspecialchars($promotion['tieude_khuyenmai']) ?></span>
                                </td>

                                <td data-label="Tóm tắt">
                                    <div class="list-promo-summary-text" title="<?= htmlspecialchars($promotion['noidung_tomtat_khuyenmai']) ?>">
                                        <?= htmlspecialchars($promotion['noidung_tomtat_khuyenmai']) ?>
                                    </div>
                                </td>
                                
                                <td data-label="Thao tác" class="list-promo-text-center">
                                    <div class="list-promo-actions">
                                        <a href="?admincontroller=admin&action=update_Promotion&idpromotion=<?= urlencode($promotion['id_khuyenmai']) ?>" class="list-promo-btn list-promo-btn-edit" title="Sửa khuyến mãi">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        
                                        <a href="?admincontroller=admin&action=delete_Promotion&idpromotion=<?= urlencode($promotion['id_khuyenmai']) ?>" class="list-promo-btn list-promo-btn-delete" title="Xóa khuyến mãi" onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này không? Hành động này không thể hoàn tác!');">
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
                    <i class="fas fa-gift" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                    <p style="font-size: 16px; font-weight: 500;">Không có chương trình khuyến mãi nào để hiển thị.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="list-promo-pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?admincontroller=admin&action=list_Promotion&page_number=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</div>