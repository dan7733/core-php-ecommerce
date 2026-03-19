<div class="container-row tintuc-container">
    <?php if ($newsList) : ?>
        <?php foreach ($newsList as $news) : ?>
            <a href="?controller=news&action=showDetailnews&idnews=<?php echo $news['id_tintuc']; ?>" class="tintuc-link">
                <div class="row">
                        <div class="col -sm-5"><img src="./img/news/<?php echo $news['hinh_tintuc']; ?>" class="img-thumbnail tintuc-thumbnail" alt=""></div>
                        <div class="col -sm-7">
                            <h5 class="tintuc-tieude"><?php echo $news['tieu_de']; ?></h5>
                            <p class="noidung-tieude"><?php echo $news['noi_dung_tom_tat']; ?></p>
                        </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="news-list-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?controller=news&action=newsList&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>