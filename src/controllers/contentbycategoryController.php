<?php
class contentbycategoryController extends BaseController
{
    private $contentByCategory; // Add this property to store the Content_pro model
    private $searchProduct;

    public function __construct()
    {
        $this->loadModel('Content_proModel'); // Load the Content_pro model
        $this->contentByCategory = new Content_pro(); // Initialize the Content_pro model
        $this->searchProduct = new Content_pro();
    }

    public function ProductList()
    {
        $data = [];

        $itemsPerPage = 16;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if (isset($_GET['new_products'])) {
            $data['newProducts'] = true;
            $productList = $this->contentByCategory->get_Newproduct();
        } else {
            $data['newProducts'] = false;
            $categoryId = $_GET['category_id'];
            $productList = $this->contentByCategory->get_Product($categoryId);
        }
        $data['productList'] = array_slice($productList, $offset, $itemsPerPage);
        if ($productList) {
            $totalProducts = isset($_GET['new_products']) ? $this->contentByCategory->count_Product() : $this->contentByCategory->count_Product($categoryId);
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }

        return $this->loadView('content.contentbycategory', $data);
    }
    public function searchProductlist()
    {
        $data = [];
        $itemsPerPage = 16;
        if (isset($_GET['keysearch'])) {
            $searchItem = $_GET['keysearch'];
            $data['keysearch'] = $searchItem;
        }
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $searchproductList = $this->searchProduct->search_Product($searchItem);
        $data['searchproductList'] = array_slice($searchproductList, $offset, $itemsPerPage);
        if ($searchproductList) {
            $totalProducts = $this->searchProduct->count_Searchproducts($searchItem);
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('content.searchcontent', $data);
    }
}
