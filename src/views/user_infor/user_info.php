<?php
    if (isset($logouttUserinfor_txtErro) && !empty($logouttUserinfor_txtErro)) {
        echo '<script type="text/javascript">' . $logouttUserinfor_txtErro . '</script>';
        exit;
    }
?>
<main class="col-md-9 ms-sm-auto col-lg-10 content">
    <h1 class="navbar-brand">Thông tin cá nhân</h1>
    <div class="mt-5">
        <div class="info row">
            <div class="col-md-6">
                <h6>Họ và tên</h6>
                <div class="name-container d-flex ">
                    <p><?php echo $userInfo['ho']; ?></p>
                    <p class="ml-2"><?php echo $userInfo['ten']; ?></p>
                </div>
            </div>
            <div class="col-md-6 ">
                <h6>Email</h6>
                <p><?php echo $userInfo['email']; ?></p>
            </div>
            <div class="col-md-6 mt-4">
                <h6>Số điện thoại</h6>
                <p><?php echo $userInfo['sdt']; ?></p>
            </div>
            <div class="col-md-6 mt-4">
                <h6>Địa chỉ</h6>
                <p><?php echo $userInfo['diachi']; ?></p>
            </div>
            
        </div>
    </div>
    </div>
</main>