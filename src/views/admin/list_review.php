<?php
// XỬ LÝ LẤY TRANG HIỆN TẠI
$currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
if ($currentPage < 1) $currentPage = 1;
?>

<div class="list-review-container">
    <div class="list-review-card">
        
        <div class="list-review-header">
            <h1><i class="fas fa-comments"></i> Quản Lý Đánh Giá</h1>
        </div>

        <form action="" method="post" class="list-review-search-form">
            <div class="list-review-search-group">
                <input type="text" placeholder="Nhập mã sản phẩm cần tìm..." name="masanpham" class="list-review-search-input" required>
                <button type="submit" name="timkiemreview" class="list-review-search-btn">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </div>
        </form>

        <?php if (isset($delReview_txtErro) && !empty($delReview_txtErro)) : ?>
            <?php 
                $isSuccess = ($delReview_txtErro === 'Xóa bình luận thành công!');
                $alertClass = $isSuccess ? 'success' : 'error';
                $alertIcon = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
            ?>
            <div class="list-review-alert <?= $alertClass ?>">
                <i class="fas <?= $alertIcon ?>"></i>
                <span><?= htmlspecialchars($delReview_txtErro) ?></span>
            </div>

            <?php if ($isSuccess): ?>
                <script>
                    setTimeout(function() {
                        window.location.href = '?admincontroller=admin&action=list_Review';
                    }, 1500); 
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <div class="list-review-table-wrapper">
            <?php if (!empty($listadminReview)) : ?>
                <table class="list-review-table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 15%;">Người dùng</th>
                            <th style="width: 15%;">Sản phẩm</th>
                            <th>Nội dung</th>
                            <th style="width: 15%;">Ngày đăng</th>
                            <th style="width: 10%; text-align: center;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadminReview as $review) : ?>
                            <tr>
                                <td data-label="ID Đánh giá">
                                    <span class="list-review-id-badge">#<?= htmlspecialchars($review['iddanhgia']) ?></span>
                                </td>
                                
                                <td data-label="Mã người dùng">
                                    <span class="list-review-user"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($review['manguoidung']) ?></span>
                                </td>

                                <td data-label="Mã sản phẩm">
                                    <span class="list-review-product"><i class="fas fa-box"></i> <?= htmlspecialchars($review['idsanpham']) ?></span>
                                </td>

                                <td data-label="Nội dung">
                                    <div class="list-review-content" title="<?= htmlspecialchars($review['noidung']) ?>">
                                        <?= htmlspecialchars($review['noidung']) ?>
                                    </div>
                                </td>

                                <td data-label="Ngày đánh giá">
                                    <span class="list-review-date"><?= htmlspecialchars($review['ngaydanhgia']) ?></span>
                                </td>
                                
                                <td data-label="Thao tác" class="list-review-text-center">
                                    <div class="list-review-actions">
                                        <a href="?admincontroller=admin&action=delete_Review&idreview=<?= urlencode($review['idsanpham']) ?>" class="list-review-btn list-review-btn-delete" title="Xóa đánh giá" onclick="return confirm('Bạn có chắc chắn muốn xóa đánh giá này không? Hành động này không thể hoàn tác!');">
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
                    <i class="fas fa-comment-slash" style="font-size: 45px; color: #cbd5e1; margin-bottom: 15px;"></i>
                    <p style="font-size: 16px; font-weight: 500;">Không có đánh giá nào được tìm thấy.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (isset($totalPages) && $totalPages > 1) : ?>
            <div class="list-review-pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <a href="?admincontroller=admin&action=list_Review&page_number=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</div>