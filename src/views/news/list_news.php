<div class="main-wrapper">
    <div class="news-header-section fade-up">
        <h1 class="news-main-title"><i class="fas fa-newspaper"></i> GÓC CÔNG NGHỆ & TIN TỨC</h1>
        <p class="news-subtitle">Cập nhật nhanh nhất những thông tin, thủ thuật và xu hướng công nghệ mới nhất.</p>
    </div>

    <div class="news-filter-bar fade-up">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="newsSearchInput" placeholder="Nhập tiêu đề hoặc nội dung cần tìm..." onkeyup="liveFilterNews()">
        </div>
    </div>

    <div class="news-list-container" id="newsListContainer">
        <?php if (isset($newsList) && !empty($newsList)) : ?>
            <?php foreach ($newsList as $news) : ?>
                <article class="news-card fade-up news-item">
                    <a href="?controller=news&action=showDetailnews&idnews=<?php echo $news['id_tintuc']; ?>" class="news-card-link">
                        
                        <div class="news-img-box">
                            <img src="./img/news/<?php echo $news['hinh_tintuc']; ?>" alt="<?php echo $news['tieu_de']; ?>" onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'">
                            <div class="news-overlay">
                                <span class="read-btn"><i class="fas fa-book-open"></i> Đọc bài</span>
                            </div>
                        </div>

                        <div class="news-content-box">
                            <div class="news-meta">
                                <span><i class="fas fa-clock"></i> Tin mới cập nhật</span>
                            </div>
                            
                            <h2 class="news-title"><?php echo $news['tieu_de']; ?></h2>
                            <p class="news-excerpt"><?php echo $news['noi_dung_tom_tat']; ?></p>
                            
                            <div class="news-readmore">
                                Chi tiết <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="empty-news-box fade-up">
                <i class="fas fa-box-open"></i>
                <h2>Hiện tại chưa có bài viết nào.</h2>
            </div>
        <?php endif; ?>
    </div>

    <?php if (isset($totalPages) && $totalPages > 1) : ?>
        <div class="modern-pagination fade-up">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a href="?controller=news&action=newsList&page_number=<?php echo $i; ?>" class="page-num <?php echo (isset($_GET['page_number']) && $_GET['page_number'] == $i) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    // 1. TÍNH NĂNG TÌM KIẾM TRỰC TIẾP (LIVE FILTER)
    function liveFilterNews() {
        // Lấy giá trị từ thanh tìm kiếm và chuyển thành chữ thường
        const filterValue = document.getElementById('newsSearchInput').value.toLowerCase();
        // Lấy danh sách tất cả các thẻ bài viết
        const newsItems = document.querySelectorAll('.news-item');

        newsItems.forEach(function(item) {
            // Lấy nội dung tiêu đề và tóm tắt để đối chiếu
            const title = item.querySelector('.news-title').innerText.toLowerCase();
            const excerpt = item.querySelector('.news-excerpt').innerText.toLowerCase();

            // Nếu tiêu đề HOẶC tóm tắt chứa từ khóa -> Hiển thị, ngược lại -> Ẩn
            if (title.includes(filterValue) || excerpt.includes(filterValue)) {
                item.style.display = ''; // Trả về display mặc định của CSS (flex)
            } else {
                item.style.display = 'none'; // Ẩn đi
            }
        });
    }

    // 2. HIỆU ỨNG TRƯỢT LÊN KHI LOAD TRANG
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.querySelectorAll('.fade-up').forEach(el => el.classList.add('visible'));
        }, 100);
    });
</script>