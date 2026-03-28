<?php
// XỬ LÝ LẤY TRANG HIỆN TẠI
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="ad-cat-wrapper">
    <div class="ad-cat-card">
        
        <div class="ad-cat-header">
            <h1><i class="fas fa-tags"></i> Cập Nhật Danh Mục</h1>
        </div>

        <?php if (isset($delCategory_txtErro) && !empty($delCategory_txtErro)) : ?>
            <?php 
                $isSuccess = ($delCategory_txtErro === 'Xóa loại thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="ad-cat-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($delCategory_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=list_Category';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <div class="ad-cat-table-wrapper">
            <?php if (!empty($listadmincategory)) : ?>
                <table class="ad-cat-table">
                    <thead>
                        <tr>
                            <th style="width: 15%;">ID Loại</th>
                            <th>Tên Danh Mục</th>
                            <th style="width: 15%;">Nổi Bật</th>
                            <th style="width: 15%;">Thứ Tự</th>
                            <th style="width: 15%; text-align: center;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadmincategory as $category) : ?>
                            <tr>
                                <td data-label="ID Loại">
                                    <span class="ad-cat-id">#<?= htmlspecialchars($category['id']) ?></span>
                                </td>
                                
                                <td data-label="Tên Danh Mục">
                                    <span class="ad-cat-name"><?= htmlspecialchars($category['ten']) ?></span>
                                </td>
                                
                                <td data-label="Nổi Bật">
                                    <?php if(!empty($category['noiBat'])): ?>
                                        <span class="ad-cat-badge"><i class="fas fa-star"></i> <?= htmlspecialchars($category['noiBat']) ?></span>
                                    <?php else: ?>
                                        <span style="color: #cbd5e1;">-</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td data-label="Thứ Tự">
                                    <span class="ad-cat-order"><?= htmlspecialchars($category['thuTu']) ?></span>
                                </td>
                                
                                <td data-label="Thao Tác">
                                    <div class="ad-cat-actions">
                                        <a href="?admincontroller=admin&action=update_Category&idcategory=<?= urlencode($category['id']) ?>" class="ad-cat-btn ad-cat-btn-edit" title="Sửa danh mục">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        
                                        <a href="?admincontroller=admin&action=delete_Category&idcategory=<?= urlencode($category['id']) ?>" class="ad-cat-btn ad-cat-btn-delete" title="Xóa danh mục" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');">
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
                    <i class="fas fa-folder-open" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                    <p style="font-size: 16px; font-weight: 500;">Không có danh mục nào để hiển thị.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="ad-cat-pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?admincontroller=admin&action=list_Category&page_number=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</div>