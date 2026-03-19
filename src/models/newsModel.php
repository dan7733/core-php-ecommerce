<?php
class news extends baseModel{
    function get_news() {
        $query = "SELECT id_tintuc, tieu_de, hinh_tintuc, noi_dung_tom_tat FROM tin_tuc ORDER BY id_tintuc DESC";
        $result = $this->_query($query);
        $newsList = array(); // Khởi tạo một mảng để lưu danh sách tin tức
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $newsList[] = $row; // Thêm tin tức vào mảng
            }
            return $newsList; // Trả về danh sách tin tức
        } else {
            return false;
        }
    }    
    function get_Detailnews($newsid) {
        $query = "SELECT * FROM tin_tuc WHERE id_tintuc = $newsid";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $productDetail = mysqli_fetch_assoc($result);
            return $productDetail;
        } else {
            return false;
        }
    }
    function count_News() {
        $query = "SELECT COUNT(*) as tongtintuc FROM tin_tuc";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongtintuc'];
        } else {
            return 0; 
        }
    }
}
?>