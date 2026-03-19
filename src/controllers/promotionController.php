<?php
class promotionController extends baseController{
    private $promotiondetailModel;
    private $promotionModel;
    public function __construct() {
        $this->loadModel('promotionModel'); 
        $this->promotiondetailModel = new promotion(); 
        $this->promotionModel = new promotion(); 
    }
    public function showDetailpromotion(){
        if (isset($_GET['idpromotion'])) {
            $idPromotion = $_GET['idpromotion'];
        }
        $Detailpromotion = $this->promotiondetailModel->get_Detailpromotion($idPromotion);
        return $this->loadView('promotion.detail_promotion', [
            'Detailpromotion' => $Detailpromotion
        ]);
    }
    public function promotionList() {
        $data = [];
        $itemsPerPage = 10;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $promotionList = $this->promotionModel->get_Promotion();
        $data['promotionList'] = array_slice($promotionList, $offset, $itemsPerPage);
        if ($promotionList) {
            $totalProducts = $this->promotionModel->count_Promotion();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('promotion.list_promotion', $data);
    }
}
?>