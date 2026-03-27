<div class="main-wrapper">
    <div class="promo-header-section fade-up">
        <h1 class="promo-main-title"><i class="fas fa-fire-alt fire-icon"></i> SIÊU KHUYẾN MÃI & SỰ KIỆN</h1>
        <p class="promo-subtitle">Đừng bỏ lỡ những deal hời, voucher giảm giá và các chương trình tri ân hấp dẫn nhất!</p>
    </div>

    <div class="promo-filter-bar fade-up">
        <div class="search-box promo-search">
            <i class="fas fa-gift"></i>
            <input type="text" id="promoSearchInput" placeholder="Nhập tên sự kiện, mã khuyến mãi..." onkeyup="liveFilterPromo()">
        </div>
    </div>

    <div class="promo-list-container" id="promoListContainer">
        <?php if (isset($promotionList) && !empty($promotionList)) : ?>
            <?php foreach ($promotionList as $promotion) : ?>
                <article class="promo-card fade-up promo-item">
                    <a href="?controller=promotion&action=showDetailpromotion&idpromotion=<?php echo $promotion['id_khuyenmai']; ?>" class="promo-card-link">
                        
                        <div class="promo-img-box">
                            <span class="promo-badge"><i class="fas fa-bolt"></i> HOT</span>
                            <img src="./img/promotion/<?php echo $promotion['hinh_khuyenmai']; ?>" alt="<?php echo $promotion['tieude_khuyenmai']; ?>" onerror="this.src='https://via.placeholder.com/800x400?text=Promo+Banner'">
                            <div class="promo-overlay">
                                <i class="fas fa-external-link-alt"></i>
                            </div>
                        </div>

                        <div class="promo-content-box">
                            <div class="promo-countdown">
                                <span><i class="fas fa-stopwatch"></i> Đang diễn ra</span>
                            </div>
                            
                            <h2 class="promo-title"><?php echo $promotion['tieude_khuyenmai']; ?></h2>
                            <p class="promo-excerpt"><?php echo $promotion['noidung_tomtat_khuyenmai']; ?></p>
                            
                            <div class="promo-action-btn">
                                NHẬN ƯU ĐÃI NGAY <i class="fas fa-angle-double-right"></i>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="empty-promo-box fade-up">
                <i class="fas fa-ticket-alt"></i>
                <h2>Hiện tại chưa có chương trình khuyến mãi nào.</h2>
                <p>Hãy quay lại sau hoặc tiếp tục mua sắm nhé!</p>
            </div>
        <?php endif; ?>
    </div>

    <?php if (isset($totalPages) && $totalPages > 1) : ?>
        <div class="modern-pagination fade-up">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a href="?controller=promotion&action=promotionList&page_number=<?php echo $i; ?>" class="page-num <?php echo (isset($_GET['page_number']) && $_GET['page_number'] == $i) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    // 1. TÌM KIẾM TRỰC TIẾP KHUYẾN MÃI
    function liveFilterPromo() {
        const filterValue = document.getElementById('promoSearchInput').value.toLowerCase();
        const promoItems = document.querySelectorAll('.promo-item');

        promoItems.forEach(function(item) {
            const title = item.querySelector('.promo-title').innerText.toLowerCase();
            const excerpt = item.querySelector('.promo-excerpt').innerText.toLowerCase();

            if (title.includes(filterValue) || excerpt.includes(filterValue)) {
                item.style.display = ''; 
            } else {
                item.style.display = 'none'; 
            }
        });
    }

    // 2. HIỆU ỨNG TRƯỢT LÊN
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
        }, 100);
    });
</script>