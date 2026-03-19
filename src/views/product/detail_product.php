<?php
if (isset($Order_txtErro) && !empty($Order_txtErro)) {
  echo "<script>alert('$Order_txtErro');</script>";
}
if (isset($InsertReview_txtErro) && !empty($InsertReview_txtErro)) {
  echo "<script>alert('$InsertReview_txtErro');</script>";
}
if ($InsertReview_txtErro == 'Thêm thành công') {
  echo '<a id="redirectLink" href="?controller=product&action=showDetailproducts&idproduct=' . $Detailproduct['idsanpham'] . '" style="display: none;"></a>';
  echo '<script>document.getElementById("redirectLink").click();</script>';
}


?>
<div class="chitietsp-container">
  <div class="chitietsp-tittle">
    <?php
    if ($Detailproduct) {
      echo $Detailproduct['ten'];
    } else {
      echo "Lỗi, Có lỗi xáy ra hoặc sản phẩm không tồn tại";
    }
    ?>
  </div>
  <div class="chitietsp-content">
    <div class="chitietsp-img">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/product/<?php echo $Detailproduct['hinh']; ?>" class="d-block w-100 img-fluid" alt="h1">
          </div>
        </div>
      </div>
    </div>
    <div class="chitietsp-infor1">
      <div class="chitietsp-infor1a">
        <h2>
          <b>Giá và khuyến mãi</b><br>
          <strong><?php echo number_format($Detailproduct['gia']); ?> * </strong>
          <em><?php echo number_format($Detailproduct['gia'] * 1.2); ?>đ </em>
          <i>(-20%)</i>
        </h2>
      </div>
      <div class="chitietsp-infor1b">
        <p>Mô tả sản phẩm: <?php echo $Detailproduct['moTa']; ?> </p>
        <p>Chính sách bảo hành 12 tháng và nhiều phần quà tặng kèm hấp dẫn khác</p>
        <p>Tặng 100.000đ mua hàng tại website thành viên bachhoaXANH.com, áp dụng khi mua online tại Tp.HCM, Tp. Nha
          Trang, Tp Phan Thiết và 1 số khu vực khác</p>
        <div class="chitietsp-group-btn">
          <a href="##" class="chitietsp-buy-btn" onclick="showPaymentForm();">Mua ngay</a>
          <a href="?controller=cart&action=addcart&idproduct=<?php echo $Detailproduct['idsanpham'] ?>" class="chitietsp-addtocart-btn">Thêm vào giỏ hàng</a>
        </div>
      </div>
      <div class="chitietsp-infor1c">
        <p>Gọi đặt mua: 0123.4567.890 (miễn phí - 7:30-22:00)</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 flwrap">
          <div class="product-info">
            <span class="bold-uppercase">THÔNG TIN SẢN PHẨM</span><br>
            <p class="d1">Với mức giá thành lý tưởng, bạn có thể sở hữu một thiết bị đa dụng mang lại hiệu năng ổn định, ngoại hình thanh lịch và các tính năng hiện đại. Một sản phẩm như vậy sẽ đáp ứng đầy đủ nhu cầu làm việc, học tập và giải trí hàng ngày của cả sinh viên lẫn người đi làm. Được trang bị các tính năng linh hoạt và đa dạng, thiết bị này không chỉ phục vụ cho việc làm công việc văn phòng mà còn đáp ứng được nhiều nhu cầu sáng tạo, giải trí và kết nối với thế giới xung quanh. Đây thực sự là một sự lựa chọn đa năng và tiện ích cho mọi nhu cầu của bạn.</p>
          </div>
          <div class="product-info">
            <span class="bold-uppercase">GIAO DIỆN HIỆN ĐẠI, TRANG NHÃ</span><br>
            <p class="d2">Trong dòng sản phẩm tương đương, sản phẩm này nổi bật với sự sáng tạo và đổi mới trong thiết kế. Không chỉ kết hợp tinh tế giữa phong cách truyền thống và hiện đại, sản phẩm còn mang đậm dấu ấn cá nhân và độc đáo. Khung máy và lớp vỏ được chế tác tỉ mỉ, tạo ra một cấu trúc vững chắc và bền bỉ, không chịu sự co dãn dù áp lực lớn được đặt lên. Tóm lại, sản phẩm này không chỉ là lựa chọn lý tưởng cho người yêu công nghệ mà còn phù hợp cho tất cả mọi người có thể dễ dàng sử dụng.</p>
          </div>
        </div>
        <div class="col-md-6 flwrap">
          <div class="product-info">
            <span class="bold-uppercase">Cấu hình chi tiết <?php echo $Detailproduct['ten']; ?> </span><br>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">CPU:</th>
                  <td><?php echo $Detailproduct['CPU']; ?></td>
                </tr>
                <tr>
                  <th scope="row">RAM:</th>
                  <td><?php echo $Detailproduct['RAM']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Ổ cứng:</th>
                  <td><?php echo $Detailproduct['O_Cung']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Màn hình:</th>
                  <td><?php echo $Detailproduct['Man_Hinh']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Card Màn hình:</th>
                  <td><?php echo $Detailproduct['Card_Man_Hinh']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Cổng kết nối:</th>
                  <td><?php echo $Detailproduct['Cong_Ket_Noi']; ?></td>
                </tr>
                <tr>
                <tr>
                  <th scope="row">Hệ điều hành:</th>
                  <td><?php echo $Detailproduct['He_Dieu_Hanh']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Thiết kế:</th>
                  <td><?php echo $Detailproduct['Thiet_Ke']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Kích thước, khối lượng:</th>
                  <td><?php echo $Detailproduct['Kich_Thuoc_Khoi_Luong']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Thời điểm ra mắt</th>
                  <td><?php echo $Detailproduct['Thoi_Diem_Ra_Mat']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <!-- bình luận bắt đầu-->
        <div class="col-md-6 flwrap">
          <div class="product-reviews">
            <span class="d3">Đánh giá mới nhất <?php echo $Detailproduct['ten']; ?></span><br>
            <?php
            if (isset($_SESSION['user_data'])) {
              echo '<form class="form-review" action="" method="post">
                        <input type="hidden" name="mareviewsp" value="' . $Detailproduct['idsanpham'] . '">
                        <textarea name="review_content" id="review_content"></textarea> 
                        <button type="submit" name="addreview">Lưu</button>
                    </form>';
             }else{
                echo '<h2>Vui lòng đăng nhập để bình luận</h2>';
             }
            ?>
            
            
            
            
            <div class="chitietdg">
              <?php if ($commentList && is_array($commentList) && !empty($commentList)) : ?>
                <?php foreach ($commentList as $comment) : ?>
                  <div>
                    <span class="name-customer"><?php echo $comment['ho'] . ' ' . $comment['ten']; ?></span> <i class="fa-solid fa-circle-check"></i> <span class="buy">Đã mua tại cửa hàng</span>
                    <p><?php echo $comment['noidung']; ?></p>
                  </div>
                <?php endforeach; ?>
                <!--  comment-list-pagination -->
                <div class="comment-list-pagination">
                  <?php
                  for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<a href='?controller=product&action=showDetailproducts&idproduct={$Detailproduct['idsanpham']}&page_number=$i'>$i</a> ";
                  }
                  ?>
                </div>
                <!--  comment-list-pagination -->
              <?php else : ?>
                <div>
                  <p>Không có bình luận về sản phẩm này.</p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- bình luận kết thúc-->
        <div class="col-md-6 flwrap">
          <!-- .... -->
          <div class="container">
            <div class="pr-loyalty">
              <div class="qr-download">
                <img data-src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/qr.png?v=1" class=" ls-is-cached lazyloaded" width="72" height="72" src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/qr.png?v=1">
                <p>Quét để tải App</p>
              </div>
              <div class="text-area">
                <p class="text-area__title"><img data-src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/logo.png" class=" ls-is-cached lazyloaded" width="32" height="32" src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/logo.png"> <span>Quà Tặng
                    VIP</span></p>
                <p class="text-area__content">
                  Tích &amp; Sử dụng điểm <br> cho khách hàng thân thiết
                </p>
                <p class="text-area__note">Sản phẩm của tập đoàn MWG</p>
              </div>
              <div class="download-link">
                <div class="download-item">
                  <a href="http://play.google.com/store/apps/details?id=mwg.tgdd.loyalty" target="_blank">
                    <img data-src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/ggplay.png" class=" ls-is-cached lazyloaded" width="136" height="40" alt="Google Play" src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/ggplay.png">
                  </a>
                </div>
                <div class="download-item">
                  <a href="https://apps.apple.com/vn/app/qu%C3%A0-t%E1%BA%B7ng-vip/id1589555369" target="_blank">
                    <img data-src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/appstore.png" class=" ls-is-cached lazyloaded" width="136" height="40" alt="AppStore" src="//cdn.tgdd.vn/mwgcart/mwgcore/ContentMwg/images/promote_loyalty/appstore.png">
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="col-md-12">
              <div class="footer-col footer-block toggle-footer">
                <div class="footer-title">
                  <h4>Đơn vị vận chuyển</h4>
                </div><br>
                <div class="footer-content">
                  <div class="row">
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/ship_1.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/ship_1.png?v=5166" alt="Hình thức vận chuyển 1" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/ship_2.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/ship_2.png?v=5166" alt="Hình thức vận chuyển 2" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/ship_3.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/ship_3.png?v=5166" alt="Hình thức vận chuyển 3" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/ship_4.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/ship_4.png?v=5166" alt="Hình thức vận chuyển 4" sizes="106px">
                    </div>
                  </div>
                </div>
              </div>
              <div class="footer-col footer-block toggle-footer">
                <div class="footer-title">
                  <h4>Cách thức thanh toán</h4>
                </div><br>
                <div class="footer-content">
                  <div class="row">
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_1.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_1.png?v=5166" alt="Phương thức thanh toán 1" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_2.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_2.png?v=5166" alt="Phương thức thanh toán 2" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_3.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_3.png?v=5166" alt="Phương thức thanh toán 3" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_4.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_4.png?v=5166" alt="Phương thức thanh toán 4" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_5.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_5.png?v=5166" alt="Phương thức thanh toán 5" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_6.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_6.png?v=5166" alt="Phương thức thanh toán 6" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_7.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_7.png?v=5166" alt="Phương thức thanh toán 7" sizes="106px">
                    </div>
                    <div class="col-6 col-md-3">
                      <img data-sizes="auto" class="lazyautosizes lazyloaded" src="//theme.hstatic.net/200000722513/1001090675/14/pay_8.png?v=5166" data-src="//theme.hstatic.net/200000722513/1001090675/14/pay_8.png?v=5166" alt="Phương thức thanh toán 8" sizes="106px">
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="payment-container" id="paymentForm">
    <button id="closeFormBtn" onclick="setupCloseButton();">Close</button>
    <h2 class="payment-title">Payment</h2>
    <h4 class="payment-method-title">Payment Method</h4>
    <div class="payment-payment-method">
      <img src="./img/payment/hinh1.jpg" alt="image">
      <img src="./img/payment/hinh2.jpg" alt="image">
      <img src="./img/payment/hinh3.jpg" alt="image">
      <img src="./img/payment/hinh4.jpg" alt="image">
    </div>
    <form action="" method="POST" class="payment-form">
      <input type="hidden" name="idSanPham" value="<?php echo $Detailproduct['idsanpham']; ?>">

      <label for="ten-nguoi-nhan" class="payment-label">Recipient's Name</label>
      <input type="text" id="ten-nguoi-nhan" name="ten-nguoi-nhan" class="payment-text-input" value="<?php echo $_SESSION['user_data']['ho'] . ' ' . $_SESSION['user_data']['ten']; ?>" required>

      <label for="dia-chi" class="payment-label">Address</label>
      <input type="text" id="dia-chi" name="dia-chi" class="payment-text-input" value="<?php echo $_SESSION['user_data']['diachi']; ?>" required>

      <label for="so-dien-thoai" class="payment-label">Phone Number</label>
      <input type="tel" id="so-dien-thoai" name="so-dien-thoai" class="payment-phone-input" value="<?php echo $_SESSION['user_data']['sdt']; ?>" required>

      <input type="hidden" name="idSanPham" value="<?php echo $Detailproduct['idsanpham']; ?>">
      <input type="hidden" name="giasanpham" value="<?php echo $Detailproduct['gia']; ?>">

      <div class="payment-total">
        <div class="payment-total-item">
          <p class="payment-total-label">Total Price</p>
          <p class="payment-total-value"><?php echo number_format($Detailproduct['gia']); ?></p>
        </div>
        <div class="payment-total-item">
          <p class="payment-total-label">Shipping Fee</p>
          <p class="payment-total-value">0 VND</p>
        </div>
      </div>
      <div class="payment-click-accept">
        <button type="submit" class="payment-button" name="payment-btn"><?php echo number_format($Detailproduct['gia']); ?>
          <div>
            <p class="payment-accept">Accept</p>
          </div>
        </button>
      </div>
    </form>
  </div>
  <!-- ĐÁNH GIÁ -->
</div>
</div>
</div>
<div class="goiy_product-container">
  <div class="goiy_product-title">SẢN PHẨM CÙNG LOẠI</div>
  <div class="goiy_product-tag-product">
    <?php if (isset($Similarproducts) && is_array($Similarproducts) && !empty($Similarproducts)) : ?>
      <?php foreach ($Similarproducts as $Similarproduct) : ?>
        <div class="goiy_product-product">
          <a href="?controller=product&action=showDetailproducts&idproduct=<?php echo $Similarproduct['idsanpham']; ?>">
            <div>
              <img class="goiy_product-img" src="./img/product/<?php echo $Similarproduct['hinh']; ?>" alt="">
              <div class="goiy_product-img-overlay">
                <div class="goiy_product-hover-icons">
                  <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                </div>
              </div>
              <h2><?php echo $Similarproduct['ten']; ?></h2>
              <div class="goiy_product-price">
                <span class="goiy_original-price">2.100.000Đ</span>
                <span class="goiy_discount-price"><?php echo $Similarproduct['gia']; ?></span>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
<script>
  function showPaymentForm() {
    // Select the payment form
    const paymentForm = document.getElementById('paymentForm');

    // Kiểm tra xem $_SESSION['user_data'] có tồn tại hay không
    <?php if (isset($_SESSION['user_data'])) : ?>
      // Nếu tồn tại, hiển thị form thanh toán nếu đang ẩn, ẩn nếu đang hiển thị
      if (paymentForm.style.display === 'block') {
        paymentForm.style.display = 'none'; // Ẩn form nếu đã hiển thị
      } else {
        paymentForm.style.display = 'block'; // Hiển thị form nếu đang ẩn
      }
    <?php else : ?>
      // Nếu không tồn tại, hiển thị thông báo và chuyển hướng người dùng đến trang đăng nhập
      alert('Vui lòng Đăng nhập để thực hiện');
      window.location.href = '?controller=log_reg&action=LoginUser';
    <?php endif; ?>
  }

  function setupCloseButton() {
    // Lấy nút tắt và form
    const closeFormBtn = document.getElementById('closeFormBtn');
    const paymentForm = document.getElementById('paymentForm');

    // Xóa sự kiện click trước khi thêm lại
    closeFormBtn.removeEventListener('click', handleCloseButtonClick);

    // Thêm sự kiện click cho nút tắt
    closeFormBtn.addEventListener('click', handleCloseButtonClick);

    // Định nghĩa hàm xử lý sự kiện click của nút tắt
    function handleCloseButtonClick() {
      paymentForm.style.display = 'none'; // Ẩn form khi nhấp vào nút tắt
    }
  }
</script>