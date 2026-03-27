<?php
class content_proController extends baseController {
    private $contentProModel; // Thêm thuộc tính này để lưu trữ model Content_pro
    public function __construct() {
        $this->loadModel('Content_proModel'); // Tải model Content_pro
        $this->contentProModel = new Content_pro(); // Khởi tạo model Content_pro
    }
    public function showProducts($n = 8, $m = 4) {
        // Gọi phương thức từ model Content_pro để lấy sản phẩm mới
        $newProducts = $this->contentProModel->get_Newproduct($n);
        $productsByPhone = $this->contentProModel->get_Product(1, $m);
        $productsByAccessory = $this->contentProModel->get_Product(2, $m);
        $productsByLaptop = $this->contentProModel->get_Product(3, $m);
        // Trả về view và truyền dữ liệu sản phẩm
        return $this->loadView('content.content_pro', [
            'newProducts' => $newProducts,
            'productsByPhone' => $productsByPhone,
            'productsByAccessory' => $productsByAccessory,
            'productsByLaptop' => $productsByLaptop
        ]);
    }
}
?>
