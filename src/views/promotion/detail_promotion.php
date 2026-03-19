<div class='container-row deltailpromotion-container'>
  <h2 class="deltailpromotion-title">
    <?php echo ($Detailpromotion) ? $Detailpromotion['tieude_khuyenmai'] : "Error, There was an error or the news no longer exists";?>
  </h2>
  <img src="./img/promotion/<?php echo $Detailpromotion['hinh_khuyenmai'];?>" class="img-thumbnail deltailpromotion-thumbnail" alt="">
  <p class="content-deltailpromotion">
    <?php echo $Detailpromotion['noidung_khuyenmai'];?>
  </p>
</div>
