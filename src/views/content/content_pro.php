<div class="slider-container">
    <div class="slider-content-1">
        <div class="slider-1">
            <div class="slider-mySlides1">
                <img src="./img/slider/sl1.png">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides1')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides1')"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-mySlides1">
                <img src="./img/slider/sl2.png">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides1')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides1')"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-mySlides1">
                <img src="./img/slider/sl3.png">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides1')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides1')"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-mySlides1">
                <img src="./img/slider/sl4.png">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides1')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides1')"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
    <div class="slider-content-2">
        <div class="slider-2">
            <div class="slider-mySlides2">
                <img src="./img/slider/sl21.webp" alt="intel">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides2')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides2')"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-mySlides2">
                <img src="./img/slider/sl22.webp" alt="intel">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides2')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides2')"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-mySlides2">
                <img src="./img/slider/sl23.webp" alt="intel">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides2')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides2')"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-mySlides2">
                <img src="./img/slider/sl24.webp" alt="intel">
                <button class="prev" onclick="plusSlides(-1, 'slider-mySlides2')"><i class="fas fa-chevron-left"></i></button>
                <button class="next" onclick="plusSlides(1, 'slider-mySlides2')"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <div class="slider-3">
            <img src="./img/slider/laptop-xa-kho-390-97-390x97.png" alt="intel">
        </div>
    </div>
</div>
<div class="container-xxl">
    <div class="product-container">
        <div class="product-title">SẢN PHẨM MỚI</div>
        <div class="product-tag-product">
            <?php if (isset($newProducts) && is_array($newProducts) && !empty($newProducts)) : ?>
                <?php foreach ($newProducts as $newproduct) : ?>
                    <div class="product-product">
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $newproduct['idsanpham']; ?>">
                            <div>
                                <img class="product-img" src="./img/product/<?php echo $newproduct['hinh']; ?>" alt="">
                                <div class="product-img-overlay">
                                    <div class="product-hover-icons">
                                        <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                                    </div>
                                </div>
                                <h2><?php echo $newproduct['ten']; ?></h2>
                                <div class="product-price">
                                    <span class="original-price"><?php echo number_format($newproduct['gia'] * 1.2); ?>Đ</span>
                                    <span class="discount-price"><?php echo number_format($newproduct['gia']); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="product-more">
            <a href="?controller=contentbycategory&action=ProductList&new_products&page=1">
                <div class="more-button">
                    <i class="fas fa-arrow-right"></i> <!-- Biểu tượng lái -->
                    Xem thêm
                </div>
            </a>
        </div>

    </div>

    <div class="product-container">
        <div class="product-title">ĐIỆN THOẠI</div>
        <div class="product-tag-product">
            <?php if (isset($productsByPhone) && is_array($productsByPhone) && !empty($productsByPhone)) : ?>
                <?php foreach ($productsByPhone as $Phone_product) : ?>
                    <div class="product-product">
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Phone_product['idsanpham']; ?>">
                            <div>
                                <img class=" product-img" src="./img/product/<?php echo $Phone_product['hinh']; ?>" alt="">
                                <div class="product-img-overlay">
                                    <div class="product-hover-icons">
                                        <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                                    </div>
                                </div>
                                <h2><?php echo $Phone_product['ten']; ?></h2>
                                <div class="product-price">
                                    <span class="original-price"><?php echo number_format($Phone_product['gia'] * 1.2); ?>Đ</span>
                                    <span class="discount-price"><?php echo number_format($Phone_product['gia']); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="product-more">
            <a href="?controller=contentbycategory&action=ProductList&category_id=1&page=1">
                <div class="more-button">
                    <i class="fas fa-arrow-right"></i> <!-- Biểu tượng lái -->
                    Xem thêm
                </div>
            </a>
        </div>
    </div>

    <div class="product-container">
        <div class="product-title">LAPTOP</div>
        <div class="product-tag-product">
            <?php if (isset($productsByLaptop) && is_array($productsByLaptop) && !empty($productsByLaptop)) : ?>
                <?php foreach ($productsByLaptop as $Laptop_product) : ?>
                    <div class="product-product">
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Laptop_product['idsanpham']; ?>">
                            <div>
                                <img class=" product-img" src="./img/product/<?php echo $Laptop_product['hinh']; ?>" alt="">
                                <div class="product-img-overlay">
                                    <div class="product-hover-icons">
                                        <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                                    </div>
                                </div>
                                <h2><?php echo $Laptop_product['ten']; ?></h2>
                                <div class="product-price">
                                    <span class="original-price"><?php echo number_format($Laptop_product['gia'] * 1.2); ?>Đ</span>
                                    <span class="discount-price"><?php echo number_format($Laptop_product['gia']); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="product-more">
            <a href="?controller=contentbycategory&action=ProductList&category_id=3&page=1">
                <div class="more-button">
                    <i class="fas fa-arrow-right"></i> <!-- Biểu tượng lái -->
                    Xem thêm
                </div>
            </a>
        </div>
    </div>

    <div class="product-container">
        <div class="product-title">PHỤ KIỆN</div>
        <div class="product-tag-product">
            <?php if (isset($productsByAccessory) && is_array($productsByAccessory) && !empty($productsByAccessory)) : ?>
                <?php foreach ($productsByAccessory as $Accessory_product) : ?>
                    <div class="product-product">
                        <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Accessory_product['idsanpham']; ?>">
                            <div>
                                <img class=" product-img" src="./img/product/<?php echo $Accessory_product['hinh']; ?>" alt="">
                                <div class="product-img-overlay">
                                    <div class="product-hover-icons">
                                        <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                                    </div>
                                </div>
                                <h2><?php echo $Accessory_product['ten']; ?></h2>
                                <div class="product-price">
                                    <span class="original-price"><?php echo number_format($Accessory_product['gia'] * 1.2); ?>Đ</span>
                                    <span class="discount-price"><?php echo number_format($Accessory_product['gia']); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="product-more">
            <a href="?controller=contentbycategory&action=ProductList&category_id=2&page=1">
                <div class="more-button">
                    <i class="fas fa-arrow-right"></i> <!-- Biểu tượng lái -->
                    Xem thêm
                </div>
            </a>
        </div>
    </div>
</div>

<script>
    var slideIndex1 = 1;
    var slideIndex2 = 1;
    showSlides(slideIndex1, 'slider-mySlides1');
    showSlides(slideIndex2, 'slider-mySlides2');

    function plusSlides(n, className) {
        if (className === 'slider-mySlides1') {
            showSlides(slideIndex1 += n, className);
        } else if (className === 'slider-mySlides2') {
            showSlides(slideIndex2 += n, className);
        }
    }

    function currentSlide(n, className) {
        if (className === 'slider-mySlides1') {
            showSlides(slideIndex1 = n, className);
        } else if (className === 'slider-mySlides2') {
            showSlides(slideIndex2 = n, className);
        }
    }

    function showSlides(n, className) {
        var i;
        var slides = document.getElementsByClassName(className);

        if (n > slides.length) {
            n = 1;
        }

        if (n < 1) {
            n = slides.length;
        }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slides[n - 1].style.display = "block";
    }

    carousel(); // Kích hoạt tự động chuyển slide

    function carousel() {
        var i;
        var x1 = document.getElementsByClassName("slider-mySlides1");
        var x2 = document.getElementsByClassName("slider-mySlides2");

        for (i = 0; i < x1.length; i++) {
            x1[i].style.display = "none";
        }
        for (i = 0; i < x2.length; i++) {
            x2[i].style.display = "none";
        }

        slideIndex1++;
        if (slideIndex1 > x1.length) {
            slideIndex1 = 1;
        }
        slideIndex2++;
        if (slideIndex2 > x2.length) {
            slideIndex2 = 1;
        }

        x1[slideIndex1 - 1].style.display = "block";
        x2[slideIndex2 - 1].style.display = "block";

        setTimeout(carousel, 2500); //2.5s
    }
</script>