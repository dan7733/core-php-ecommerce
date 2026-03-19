<?php
class promotion extends baseModel{
    function get_Promotion() {
        $query = "SELECT id_khuyenmai, tieude_khuyenmai, hinh_khuyenmai, noidung_tomtat_khuyenmai FROM khuyenmai ORDER BY id_khuyenmai DESC";
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
    function get_Detailpromotion($promotionsid) {
        $query = "SELECT * FROM khuyenmai WHERE id_khuyenmai = $promotionsid";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $productDetail = mysqli_fetch_assoc($result);
            return $productDetail;
        } else {
            return false;
        }
    }
    function count_Promotion() {
        $query = "SELECT COUNT(*) as tongkhuyenmai FROM khuyenmai";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongkhuyenmai'];
        } else {
            return 0; 
        }
    }
}
?>