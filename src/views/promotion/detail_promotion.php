<article class="promo-detail-wrapper fade-up">
    
    <header class="promo-detail-header">
        <div class="promo-badge-top">
            <i class="fas fa-fire-alt fire-anim"></i> SIÊU ƯU ĐÃI ĐANG DIỄN RA
        </div>

        <h1 class="promo-detail-title">
            <?php echo ($Detailpromotion) ? $Detailpromotion['tieude_khuyenmai'] : "Chương trình khuyến mãi không tồn tại hoặc đã kết thúc!"; ?>
        </h1>

        <div class="promo-timer-box">
            <i class="fas fa-stopwatch"></i> Nhanh tay lên! Thời gian ưu đãi có hạn.
        </div>
    </header>

    <?php if ($Detailpromotion && !empty($Detailpromotion['hinh_khuyenmai'])) : ?>
    <div class="promo-featured-image">
        <img src="./img/promotion/<?php echo $Detailpromotion['hinh_khuyenmai']; ?>" alt="<?php echo $Detailpromotion['tieude_khuyenmai']; ?>">
        <div class="promo-shine-effect"></div>
    </div>
    <?php endif; ?>

    <div class="promo-content-body">
        <div class="coupon-cutout top-cut"></div>
        
        <div class="promo-html-content">
            <?php 
                if ($Detailpromotion) {
                    echo $Detailpromotion['noidung_khuyenmai'];
                } else {
                    echo '<p style="text-align:center; color:red; font-size:1.6rem;">Vui lòng quay lại trang chủ để xem các ưu đãi khác.</p>';
                }
            ?>
        </div>

        <div class="coupon-cutout bot-cut"></div>
    </div>

    <?php if ($Detailpromotion) : ?>
    <footer class="promo-footer-action">
        <a href="?controller=content_pro&action=showProducts" class="btn-grab-deal ripple-btn">
            SĂN DEAL NGAY <i class="fas fa-shopping-cart"></i>
        </a>
        
        <div class="share-promo">
            <button class="btn-share-link" onclick="copyPromoLink()">
                <i class="fas fa-share-square"></i> Chia sẻ ưu đãi này cho bạn bè
            </button>
        </div>
    </footer>
    <?php endif; ?>

    <div id="confetti-container"></div>
</article>

<style>
    :root {
        --deep-green: #0a5c36;
        --promo-red: #ff3b30;
        --promo-orange: #ff9800;
    }

    /* BAO BỌC BÀI VIẾT (MAX WIDTH 900px CHO ẢNH BANNER RỘNG) */
    .promo-detail-wrapper {
        width: 95%; max-width: 900px;
        margin: 40px auto 80px auto; background-color: #ffffff;
        border-radius: 20px; padding: 40px 50px;
        box-shadow: 0 15px 50px rgba(255, 59, 48, 0.1);
        border: 3px solid #ffebeb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        position: relative; overflow: hidden;
    }

    /* HEADER */
    .promo-detail-header { text-align: center; margin-bottom: 35px; }
    
    .promo-badge-top { display: inline-block; background: linear-gradient(90deg, var(--promo-red), var(--promo-orange)); color: #fff; font-size: 1.4rem; font-weight: 900; padding: 8px 25px; border-radius: 50px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(255, 59, 48, 0.3); letter-spacing: 1px;}
    .fire-anim { animation: firePulse 1s infinite alternate; margin-right: 8px;}
    @keyframes firePulse { 0% { transform: scale(1); color: #fff; } 100% { transform: scale(1.3); color: #ffe500; } }

    .promo-detail-title { font-size: 3.8rem; font-weight: 900; color: var(--deep-green); line-height: 1.3; margin: 0 0 20px 0; text-transform: uppercase; text-shadow: 2px 2px 0px rgba(10, 92, 54, 0.1);}

    .promo-timer-box { font-size: 1.6rem; color: var(--promo-red); font-weight: bold; background-color: #fff5f5; display: inline-block; padding: 10px 25px; border-radius: 10px; border: 1px dashed var(--promo-red);}

    /* ẢNH BANNER (CÓ HIỆU ỨNG LƯỚT SÁNG) */
    .promo-featured-image { width: 100%; border-radius: 16px; overflow: hidden; margin-bottom: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; background: #f9f9f9;}
    .promo-featured-image img { width: 100%; height: auto; display: block; transition: transform 0.5s; object-fit: cover;}
    .promo-featured-image:hover img { transform: scale(1.05); }
    
    .promo-shine-effect { position: absolute; top: 0; left: -100%; width: 50%; height: 100%; background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 100%); transform: skewX(-25deg); animation: shineBanner 4s infinite;}
    @keyframes shineBanner { 0%, 50% { left: -100%; } 100% { left: 200%; } }

    /* NỘI DUNG (THIẾT KẾ DẠNG COUPON) */
    .promo-content-body { position: relative; background-color: #fdfdfd; border: 2px dashed #ffbda6; border-radius: 16px; padding: 40px; margin-bottom: 40px; box-shadow: inset 0 0 20px rgba(255, 59, 48, 0.02);}
    .coupon-cutout { position: absolute; left: 50%; transform: translateX(-50%); width: 40px; height: 20px; background-color: #fff; border: 2px solid #ffbda6; border-radius: 0 0 40px 40px; border-top: none;}
    .top-cut { top: -2px; }
    .bot-cut { bottom: -2px; border-radius: 40px 40px 0 0; border-top: 2px solid #ffbda6; border-bottom: none;}

    .promo-html-content { font-size: 1.6rem; color: #222; line-height: 1.8; text-align: justify; }
    .promo-html-content p { margin-bottom: 20px; }
    .promo-html-content img { max-width: 100%; height: auto; border-radius: 12px; margin: 20px 0; }
    .promo-html-content h2, .promo-html-content h3 { font-size: 2.4rem; font-weight: 900; color: var(--promo-red); margin: 30px 0 15px 0; }
    .promo-html-content strong { color: var(--deep-green); font-size: 1.7rem;}

    /* NÚT KÊU GỌI HÀNH ĐỘNG (CTA) */
    .promo-footer-action { text-align: center; border-top: 2px solid #f0f0f0; padding-top: 30px; }
    .btn-grab-deal { display: inline-flex; justify-content: center; align-items: center; gap: 15px; width: 100%; max-width: 500px; background: linear-gradient(135deg, var(--promo-red), var(--promo-orange)); color: #fff !important; font-size: 2.2rem; font-weight: 900; padding: 20px; border-radius: 16px; text-decoration: none; text-transform: uppercase; box-shadow: 0 10px 25px rgba(255, 59, 48, 0.4); transition: 0.3s; animation: heartbeat 2s infinite;}
    .btn-grab-deal:hover { background: linear-gradient(135deg, #d32f2f, #e67e22); transform: translateY(-5px); box-shadow: 0 15px 35px rgba(255, 59, 48, 0.6);}
    
    @keyframes heartbeat { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.03); } }

    .share-promo { margin-top: 25px; }
    .btn-share-link { background: none; border: none; font-size: 1.5rem; font-weight: bold; color: var(--deep-green); cursor: pointer; transition: 0.3s; display: inline-flex; align-items: center; gap: 10px;}
    .btn-share-link:hover { color: var(--promo-red); text-decoration: underline;}

    /* TOAST THÔNG BÁO COPY */
    .copy-toast { position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%) translateY(50px); background: var(--deep-green); color: #fff; padding: 15px 30px; border-radius: 50px; font-size: 1.5rem; font-weight: bold; opacity: 0; visibility: hidden; transition: 0.4s ease; z-index: 10000; box-shadow: 0 10px 20px rgba(10,92,54,0.3);}
    .copy-toast.show { transform: translateX(-50%) translateY(0); opacity: 1; visibility: visible; }

    /* HIỆU ỨNG CHUNG */
    .fade-up { opacity: 0; transform: translateY(40px); transition: 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
    .fade-up.visible { opacity: 1; transform: translateY(0); }

    /* CONFETTI (PHÁO GIẤY) */
    #confetti-container { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: 1;}
    .confetti { position: absolute; width: 10px; height: 20px; background-color: #f00; opacity: 0.8; animation: fall 3s linear forwards;}
    @keyframes fall { to { transform: translateY(100vh) rotate(720deg); opacity: 0; } }

    /* RESPONSIVE */
    @media (max-width: 992px) { .promo-detail-wrapper { width: 90%; padding: 40px; } .promo-detail-title { font-size: 3.2rem; } }
    @media (max-width: 768px) {
        .promo-detail-wrapper { width: 100%; margin: 20px auto; padding: 25px 15px; border-radius: 0; box-shadow: none; border-left: none; border-right: none;}
        .promo-detail-title { font-size: 2.6rem; }
        .promo-timer-box { font-size: 1.3rem; }
        .promo-content-body { padding: 25px 15px; }
        .promo-html-content { font-size: 1.4rem; }
        .btn-grab-deal { font-size: 1.8rem; padding: 15px; }
    }
</style>

<script>
    // 1. HIỆU ỨNG PHÁO GIẤY (CONFETTI) KHI MỞ ƯU ĐÃI
    function createConfetti() {
        const container = document.getElementById('confetti-container');
        const colors = ['#ff3b30', '#ff9800', '#2ecc71', '#0a5c36', '#f1c40f', '#9b59b6'];
        
        for (let i = 0; i < 50; i++) {
            let confetti = document.createElement('div');
            confetti.classList.add('confetti');
            confetti.style.left = Math.random() * 100 + '%';
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            
            // Random kích thước và thời gian rơi
            confetti.style.width = (Math.random() * 8 + 5) + 'px';
            confetti.style.height = (Math.random() * 15 + 10) + 'px';
            confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
            confetti.style.animationDelay = Math.random() * 2 + 's';
            
            container.appendChild(confetti);
            
            // Xóa element sau khi rơi xong để không nặng máy
            setTimeout(() => { confetti.remove(); }, 5000);
        }
    }

    // 2. CHIA SẺ LIÊN KẾT (COPY LINK)
    function copyPromoLink() {
        const dummy = document.createElement('input');
        const text = window.location.href;
        document.body.appendChild(dummy);
        dummy.value = text; 
        dummy.select(); 
        document.execCommand('copy');
        document.body.removeChild(dummy);
        
        let toast = document.createElement('div');
        toast.className = 'copy-toast';
        toast.innerHTML = '<i class="fas fa-gift"></i> Đã sao chép link khuyến mãi!';
        document.body.appendChild(toast);
        
        setTimeout(() => toast.classList.add('show'), 10);
        setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 400); }, 3000);
    }

    // 3. KÍCH HOẠT HIỆU ỨNG KHI TẢI TRANG
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => { document.querySelector('.fade-up').classList.add('visible'); }, 100);
        
        // Bắn pháo giấy
        createConfetti();
        // Bắn thêm lần nữa sau 2s cho rực rỡ
        setTimeout(createConfetti, 2000);
    });
</script>