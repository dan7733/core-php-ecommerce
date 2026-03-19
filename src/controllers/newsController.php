<?php
class newsController extends baseController{
    private $newsdetailModel;
    private $newsModel;
    public function __construct() {
        $this->loadModel('newsModel'); 
        $this->newsdetailModel = new news(); 
        $this->newsModel = new news(); 
    }
    public function showDetailnews(){
        if (isset($_GET['idnews'])) {
            $idNews = $_GET['idnews'];
        }
        $Detailnews = $this->newsdetailModel->get_Detailnews($idNews);
        return $this->loadView('news.detail_news', [
            'Detailnews' => $Detailnews
        ]);
    }
    public function newsList() {
        $data = [];
        $itemsPerPage = 10;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $newsList = $this->newsModel->get_news();
        $data['newsList'] = array_slice($newsList, $offset, $itemsPerPage);
        if ($newsList) {
            $totalProducts = $this->newsModel->count_News();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('news.list_news', $data);
    }
}
?>