<?php
// Xử lý logic tính thời gian đọc dự kiến (Trung bình người Việt đọc 200-250 chữ/phút)
$content = isset($Detailnews['noi_dung']) ? $Detailnews['noi_dung'] : '';
$wordCount = str_word_count(strip_tags($content));
$readingTime = ceil($wordCount / 250); 
if ($readingTime < 1) $readingTime = 1; // Tối thiểu là 1 phút
?>

<div class="reading-progress-container">
    <div class="reading-progress-bar" id="readingProgressBar"></div>
</div>

<article class="news-detail-wrapper fade-up">
    
    <header class="news-header">
        <a href="?controller=news&action=newsList&page_number=1" class="btn-back-news ripple-btn">
            <i class="fas fa-arrow-left"></i> Quay lại Tin tức
        </a>

        <h1 class="news-detail-title">
            <?php echo ($Detailnews) ? $Detailnews['tieu_de'] : "Nội dung này không còn tồn tại hoặc đã bị xóa."; ?>
        </h1>

        <?php if ($Detailnews) : ?>
        <div class="news-meta-data">
            <div class="meta-item">
                <div class="author-avatar"><i class="fas fa-user-edit"></i></div>
                <div class="author-info">
                    <span class="author-name">Ban Biên Tập</span>
                    <span class="publish-date">Cập nhật mới nhất</span>
                </div>
            </div>
            <div class="meta-item reading-time-badge">
                <i class="fas fa-book-reader"></i> 
                <span>Khoảng <strong><?php echo $readingTime; ?> phút</strong> đọc</span>
            </div>
        </div>
        <?php endif; ?>
    </header>

    <?php if ($Detailnews && !empty($Detailnews['hinh_tintuc'])) : ?>
    <div class="news-featured-image">
        <img src="./img/news/<?php echo $Detailnews['hinh_tintuc']; ?>" alt="<?php echo $Detailnews['tieu_de']; ?>">
    </div>
    <?php endif; ?>

    <div class="news-content-body">
        <?php 
            if ($Detailnews) {
                echo $Detailnews['noi_dung'];
            } else {
                echo '<div class="error-msg"><i class="fas fa-exclamation-triangle"></i> Có lỗi xảy ra trong quá trình tải bài viết.</div>';
            }
        ?>
    </div>

    <?php if ($Detailnews) : ?>
    <footer class="news-footer">
        <div class="share-section">
            <span><i class="fas fa-share-alt"></i> Chia sẻ bài viết này:</span>
            <div class="social-buttons">
                <button class="social-btn fb"><i class="fab fa-facebook-f"></i></button>
                <button class="social-btn tw"><i class="fab fa-twitter"></i></button>
                <button class="social-btn link" onclick="copyToClipboard()"><i class="fas fa-link"></i> Copy Link</button>
            </div>
        </div>
    </footer>
    <?php endif; ?>

</article>

<style>
    /* BIẾN MÀU CƠ BẢN */
    :root {
        --deep-green: #0a5c36;
        --light-green: #e8f5ed;
        --text-main: #333333;
        --text-light: #555555;
    }

    /* THANH TIẾN TRÌNH ĐỌC (NẰM TRÊN CÙNG MÀN HÌNH) */
    .reading-progress-container { position: fixed; top: 0; left: 0; width: 100%; height: 5px; background: transparent; z-index: 99999; }
    .reading-progress-bar { height: 100%; background: linear-gradient(90deg, #ff9800, #ff3b30); width: 0%; border-radius: 0 5px 5px 0; transition: width 0.1s ease; }

    /* BAO BỌC BÀI VIẾT (CHUẨN ĐỌC BÁO - MAX WIDTH 850px) */
    .news-detail-wrapper {
        width: 95%; max-width: 850px; /* Chiều rộng vàng để đọc không bị mỏi cổ */
        margin: 40px auto 80px auto; background-color: #ffffff;
        border-radius: 16px; padding: 50px 60px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.06);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* HEADER TIN TỨC */
    .btn-back-news { display: inline-flex; align-items: center; gap: 8px; font-size: 1.3rem; font-weight: bold; color: var(--deep-green); text-decoration: none !important; margin-bottom: 25px; padding: 10px 20px; background-color: var(--light-green); border-radius: 30px; transition: 0.3s; }
    .btn-back-news:hover { background-color: var(--deep-green); color: #fff; transform: translateX(-5px); }

    .news-detail-title { font-size: 3.5rem; font-weight: 900; color: #111; line-height: 1.3; margin: 0 0 25px 0; text-transform: capitalize; letter-spacing: -0.5px;}

    .news-meta-data { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 20px 0; margin-bottom: 35px; flex-wrap: wrap; gap: 15px;}
    .meta-item { display: flex; align-items: center; gap: 15px; }
    
    .author-avatar { width: 50px; height: 50px; background-color: var(--deep-green); color: #fff; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 2rem; }
    .author-info { display: flex; flex-direction: column; }
    .author-name { font-size: 1.4rem; font-weight: bold; color: #222; }
    .publish-date { font-size: 1.2rem; color: #888; }

    .reading-time-badge { background-color: #fff4f4; border: 1px solid #ffebeb; padding: 10px 20px; border-radius: 30px; color: #ff3b30; font-size: 1.3rem; font-weight: 500; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(255, 59, 48, 0.1);}
    .reading-time-badge strong { font-weight: 800; }

    /* ẢNH BÌA BÀI VIẾT */
    .news-featured-image { width: 100%; border-radius: 16px; overflow: hidden; margin-bottom: 40px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
    .news-featured-image img { width: 100%; height: auto; display: block; transition: transform 0.5s; }
    .news-featured-image:hover img { transform: scale(1.03); }

    /* NỘI DUNG CHÍNH (TYPOGRAPHY CHUẨN ĐỌC) */
    .news-content-body { font-size: 1.6rem; /* Chữ to chuẩn */ color: var(--text-main); line-height: 1.9; text-align: justify; }
    .news-content-body p { margin-bottom: 25px; }
    .news-content-body img { max-width: 100%; height: auto; border-radius: 10px; margin: 20px 0; display: block; box-shadow: 0 4px 15px rgba(0,0,0,0.05);}
    .news-content-body h2, .news-content-body h3 { font-size: 2.2rem; font-weight: 800; color: var(--deep-green); margin: 35px 0 15px 0; line-height: 1.4; }
    .news-content-body ul, .news-content-body ol { margin-bottom: 25px; padding-left: 20px; }
    .news-content-body li { margin-bottom: 10px; }

    /* FOOTER CHIA SẺ */
    .news-footer { margin-top: 50px; padding-top: 30px; border-top: 2px dashed #eee; }
    .share-section { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;}
    .share-section span { font-size: 1.5rem; font-weight: bold; color: #222; display: flex; align-items: center; gap: 10px;}
    .share-section span i { color: #ff9800; }
    
    .social-buttons { display: flex; gap: 15px; }
    .social-btn { width: 45px; height: 45px; border-radius: 50%; border: none; font-size: 1.6rem; color: #fff; cursor: pointer; transition: 0.3s; display: flex; justify-content: center; align-items: center;}
    .social-btn.fb { background-color: #1877f2; } .social-btn.fb:hover { background-color: #145dbf; transform: translateY(-3px);}
    .social-btn.tw { background-color: #1da1f2; } .social-btn.tw:hover { background-color: #1a8cd8; transform: translateY(-3px);}
    .social-btn.link { background-color: #333; width: auto; padding: 0 20px; border-radius: 30px; font-size: 1.3rem; font-weight: bold; gap: 8px;}
    .social-btn.link:hover { background-color: #000; transform: translateY(-3px);}

    /* THÔNG BÁO COPY LINK (TOAST NHỎ) */
    .copy-toast { position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%) translateY(50px); background: #333; color: #fff; padding: 12px 25px; border-radius: 30px; font-size: 1.4rem; font-weight: bold; opacity: 0; visibility: hidden; transition: 0.4s ease; z-index: 10000; display: flex; align-items: center; gap: 10px;}
    .copy-toast.show { transform: translateX(-50%) translateY(0); opacity: 1; visibility: visible; }

    /* HIỆU ỨNG FADE-UP KHI LOAD */
    .fade-up { opacity: 0; transform: translateY(30px); transition: 0.8s ease-out; }
    .fade-up.visible { opacity: 1; transform: translateY(0); }
    .ripple-effect { position: absolute; border-radius: 50%; transform: scale(0); animation: ripple 0.6s linear; background-color: rgba(0, 0, 0, 0.1); pointer-events: none;}
    @keyframes ripple { to { transform: scale(4); opacity: 0; } }

    /* RESPONSIVE */
    @media (max-width: 992px) { .news-detail-wrapper { width: 90%; padding: 40px; } .news-detail-title { font-size: 3rem; } }
    @media (max-width: 768px) {
        .news-detail-wrapper { width: 100%; margin: 20px auto; padding: 25px 20px; border-radius: 0; box-shadow: none; border-top: 1px solid #eee;}
        .news-detail-title { font-size: 2.4rem; }
        .news-meta-data { flex-direction: column; align-items: flex-start; }
        .reading-time-badge { width: 100%; justify-content: center; }
        .news-content-body { font-size: 1.4rem; }
        .news-content-body h2, .news-content-body h3 { font-size: 1.8rem; }
        .share-section { flex-direction: column; align-items: flex-start; }
    }
</style>

<script>
    // 1. THANH TIẾN TRÌNH ĐỌC (READING PROGRESS)
    window.onscroll = function() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("readingProgressBar").style.width = scrolled + "%";
    };

    // 2. COPY LINK BÀI VIẾT
    function copyToClipboard() {
        const dummy = document.createElement('input'), text = window.location.href;
        document.body.appendChild(dummy);
        dummy.value = text; dummy.select(); document.execCommand('copy');
        document.body.removeChild(dummy);
        
        // Hiện Toast thông báo copy
        let toast = document.createElement('div');
        toast.className = 'copy-toast';
        toast.innerHTML = '<i class="fas fa-check-circle" style="color: #2ecc71;"></i> Đã sao chép liên kết!';
        document.body.appendChild(toast);
        
        setTimeout(() => toast.classList.add('show'), 10);
        setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 400); }, 2500);
    }

    // 3. HIỆU ỨNG RIPPLE & FADE-UP
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => document.querySelector('.fade-up').classList.add('visible'), 100);

        document.querySelectorAll('.ripple-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                let x = e.clientX - e.target.getBoundingClientRect().left;
                let y = e.clientY - e.target.getBoundingClientRect().top;
                let ripples = document.createElement('span');
                ripples.style.left = x + 'px'; ripples.style.top = y + 'px';
                ripples.classList.add('ripple-effect');
                this.appendChild(ripples);
                setTimeout(() => ripples.remove(), 600);
            });
        });
    });
</script>