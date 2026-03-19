<div class='container-row chitiettintuc-container'>
  <h2 class="chitiettintuc-tieude">
    <?php echo ($Detailnews) ? $Detailnews['tieu_de'] : "Lỗi, Có lỗi xảy ra hoặc tin tức không còn tồn tại";?>
  </h2>
  <img src="./img/news/<?php echo $Detailnews['hinh_tintuc'];?>" class="img-thumbnail chitiettintuc-thumbnail" alt="">
  <p class="noidung-chitiettintuc">
    <?php echo $Detailnews['noi_dung'];?>
  </p>
</div>
