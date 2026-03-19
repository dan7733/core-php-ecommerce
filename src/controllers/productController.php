<?php
class productController extends baseController
{
    private $productdetailProModel;
    private $Order_ProductdetailProModel;
    private $comment_ProductdetailProModel;
    private $addReview_ProductdetailProModel;
    public function __construct()
    {
        $this->loadModel('productModel'); // Tải model Content_pro
        $this->productdetailProModel = new Product(); // Khởi tạo model Content_pro
        $this->Order_ProductdetailProModel = new Product();
        $this->comment_ProductdetailProModel = new Product();
        $this->addReview_ProductdetailProModel = new Product();
    }
    public function showDetailproducts()
    {
        // in thông tin chi tiết sản phẩm
        if (isset($_GET['idproduct'])) {
            $idProduct = $_GET['idproduct'];
        }
        $Detailproduct = $this->productdetailProModel->get_Productdetail($idProduct);
        $Similarproducts = $this->productdetailProModel->get_Similarproducts($idProduct);
        // đặt hàng sản phẩm
        $Order_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment-btn'])) {
            $maNguoiDung = $_SESSION['user_data']['manguoidung'];
            $idSanPham = $_POST['idSanPham'];
            $gia = $_POST['giasanpham'];
            $diachi = $_POST['dia-chi'];
            $sodienthoai = $_POST['so-dien-thoai'];
            $ngayDat = date('Y-m-d H:i:s');
            $iddonghang = $this->Order_ProductdetailProModel->insertOrder_Productdetail($maNguoiDung, $ngayDat, $diachi, $sodienthoai);
            if ($iddonghang) {
                if ($this->Order_ProductdetailProModel->insertOrderDetail_Productdetail($iddonghang, $idSanPham, $gia, 1, $gia)) {
                    $Order_txtErro = 'Đặt hàng thành công';
                } else {
                    $Order_txtErro = 'Đặt hàng, Thất bại';
                }
            } else {
                $Order_txtErro = 'Đặt hàng, Thất bại';
            }
        }
        // đánh giá 
        $itemsPerPage = 5;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $commentList = $this->comment_ProductdetailProModel->comment_Productdetail($idProduct);
        $totalPages = 0;
        if ($commentList) {
            $totalProducts = $this->comment_ProductdetailProModel->count_CommentProductdetail($idProduct);
            $totalPages = ceil($totalProducts / $itemsPerPage);
        }

        //Thêm đánh giá
        $InsertReview_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addreview'])) {
            $maNguoiDung = $_SESSION['user_data']['manguoidung'];
            $idsanpham = $_POST['mareviewsp'];
            $noidung = $_POST['review_content'];
            if($this->addReview_ProductdetailProModel->insert_Review( $maNguoiDung, $idsanpham,$noidung)){
                $InsertReview_txtErro = 'Thêm thành công';
            
            }else{
                $InsertReview_txtErro = 'Thêm thất bại';
            }
        }
        return $this->loadView('product.detail_product', [
            'Detailproduct' => $Detailproduct,
            'Similarproducts' => $Similarproducts,
            'Order_txtErro' => $Order_txtErro,
            'commentList' => array_slice($commentList, $offset, $itemsPerPage),
            'totalPages' => $totalPages,
            'InsertReview_txtErro' => $InsertReview_txtErro
        ]);
    }
}
