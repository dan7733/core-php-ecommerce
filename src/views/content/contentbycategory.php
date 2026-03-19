<div class="product-list-container">
    <?php
    if ($newProducts) {
        echo '<div class="product-list-title">SẢN PHẨM MỚI</div>';
    } else {
        echo '<div class="product-list-title">SẢN PHẨM THEO LOẠI</div>';
    }
    ?>
    <div class="product-list-items">
        <?php if ($productList) : ?>
            <?php foreach ($productList as $product) : ?>
                <div class="product-list-product">
                    <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $product['idsanpham']; ?>">
                        <div>
                            <img class="product-img" src="./img/product/<?php echo $product['hinh']; ?>" alt="">
                            <div class="product-img-overlay">
                                <div class="product-hover-icons">
                                    <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                                </div>
                            </div>
                            <h2><?php echo $product['ten']; ?></h2>
                            <div class="product-price">
                                <span class="original-price"><?php echo number_format($product['gia'] * 1.2); ?>Đ</span>
                                <span class="discount-price"><?php echo number_format($product['gia']); ?>Đ</span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h1 class="no-products-message">Hiện tại không có sản phẩm nào trong danh mục này.</h1>
        <?php endif; ?>
    </div>

    <?php if ($productList && $totalPages > 1) : ?>
        <div class="product-list-pagination">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($newProducts) {
                    echo "<a href='?controller=contentbycategory&action=ProductList&new_products&page_number=$i'>$i</a> ";
                } else {
                    echo "<a href='?controller=contentbycategory&action=ProductList&category_id=" . $_GET['category_id'] . "&page_number=$i'>$i</a> ";
                }
            }
            ?>
        </div>
    <?php endif; ?>
</div>
