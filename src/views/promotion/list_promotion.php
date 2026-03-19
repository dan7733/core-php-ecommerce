<div class="container-row promotion-container">
    <?php if ($promotionList) : ?>
        <?php foreach ($promotionList as $promotion) : ?>
            <a href="?controller=promotion&action=showDetailpromotion&idpromotion=<?php echo $promotion['id_khuyenmai']; ?>" class="promotion-link">
                <div class="row">
                        <div class="col -sm-5"><img src="./img/promotion/<?php echo $promotion['hinh_khuyenmai']; ?>" class="img-thumbnail promotion-thumbnail" alt=""></div>
                        <div class="col -sm-7">
                            <h5 class="promotion-title"><?php echo $promotion['tieude_khuyenmai']; ?></h5>
                            <p class="summary-title"><?php echo $promotion['noidung_tomtat_khuyenmai']; ?></p>
                        </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="promotion-list-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?controller=promotion&action=promotionList&page_number=$i'>$i</a> ";
        }
        ?>
    </div>
</div>
