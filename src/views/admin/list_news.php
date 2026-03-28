<?php
// Lấy trang hiện tại để bôi đậm phân trang
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="list-news-container">
    <div class="list-news-card">
        
        <div class="list-news-header">
            <h1><i class="far fa-newspaper"></i> Cập Nhật Tin Tức</h1>
        </div>

        <?php if (isset($delNews_txtErro) && !empty($delNews_txtErro)) : ?>
            <?php 
                $isSuccess = ($delNews_txtErro === 'Xóa thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="list-news-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($delNews_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=list_New';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <div class="list-news-table-wrapper">
            <?php if (!empty($listadminnews)) : ?>
                <table class="list-news-table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 25%;">Tiêu đề</th>
                            <th>Nội dung tóm tắt</th>
                            <th style="width: 15%; text-align: center;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadminnews as $news) : ?>
                            <tr>
                                <td data-label="ID Tin tức">
                                    <span class="list-news-id-badge">#<?= htmlspecialchars($news['id_tintuc']) ?></span>
                                </td>
                                
                                <td data-label="Tiêu đề">
                                    <span class="list-news-title-text"><?= htmlspecialchars($news['tieu_de']) ?></span>
                                </td>

                                <td data-label="Tóm tắt">
                                    <div class="list-news-summary-text" title="<?= htmlspecialchars($news['noi_dung_tom_tat']) ?>">
                                        <?= htmlspecialchars($news['noi_dung_tom_tat']) ?>
                                    </div>
                                </td>
                                
                                <td data-label="Thao tác" class="list-news-text-center">
                                    <div class="list-news-action-buttons">
                                        <a href="?admincontroller=admin&action=update_News&idnews=<?= urlencode($news['id_tintuc']) ?>" class="list-news-btn list-news-btn-edit" title="Sửa tin tức">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        
                                        <a href="?admincontroller=admin&action=delete_News&idnews=<?= urlencode($news['id_tintuc']) ?>" class="list-news-btn list-news-btn-delete" title="Xóa tin tức" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không? Hành động này không thể hoàn tác!');">
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
                    <i class="far fa-newspaper" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                    <p style="font-size: 16px; font-weight: 500;">Chưa có bài viết tin tức nào.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="list-news-pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?admincontroller=admin&action=list_New&page_number=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</div>