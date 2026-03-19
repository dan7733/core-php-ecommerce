<div class="find_product-list-container">
    <?php
    if ($searchproductList) {
        echo '<div class="find_product-list-title">KẾT QUẢ</div>';
    } else {
        echo '<div class="find_product-list-title">KHÔNG TÌM THẤY</div>';
    }
    ?>
    <div class="find_product-list-items">
        <?php if ($searchproductList) : ?>
            <?php foreach ($searchproductList as $searchproduct) : ?>
                <div class="find_product-list-product">
                    <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $searchproduct['idsanpham']; ?>">
                        <div>
                            <img class="find_product-img" src="./img/product/<?php echo $searchproduct['hinh']; ?>" alt="">
                            <div class="find_product-img-overlay">
                                <div class="find_product-hover-icons">
                                    <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                                </div>
                            </div>
                            <h2><?php echo $searchproduct['ten']; ?></h2>
                            <div class="find_product-price">
                                <span class="original-price"><?php echo number_format($searchproduct['gia'] * 1.2); ?>Đ</span>
                                <span class="discount-price"><?php echo number_format($searchproduct['gia']); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="find_product-list-pagination">
        <?php
        for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='?controller=contentbycategory&action=searchProductlist&page_number=$i&keysearch=$keysearch'>$i</a>";
        }
        ?>
    </div>
</div>
