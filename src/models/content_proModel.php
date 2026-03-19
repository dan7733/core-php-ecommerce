<?php
class Content_pro extends baseModel {
    function get_Newproduct($n = null) {
        $query = "SELECT * FROM sanpham ORDER BY idsanpham DESC";
        // Nếu $n được truyền vào, thêm điều kiện LIMIT vào truy vấn
        if ($n !== null) {
            $query .= " LIMIT $n";
        }
        $result = $this->_query($query);
        $newproduct = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $newproduct[] = $row;
            }
        } 
        return $newproduct;
    }
    function get_Product($idloai, $n = null) {
        $query = "SELECT sanpham.idsanpham, sanpham.ten, sanpham.gia, sanpham.hinh FROM sanpham, loai WHERE sanpham.loai = loai.id AND loai.id = '$idloai'";
        // Nếu $n được truyền vào, thêm điều kiện LIMIT vào truy vấn
        if ($n !== null) {
            $query .= " ORDER BY sanpham.idsanpham DESC LIMIT $n";
        }
        $result = $this->_query($query);
        $newproduct_loai = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $newproduct_loai[] = $row;
            }
        }
        return $newproduct_loai;
    }
    function count_Product($idloai = null) {
        $query = "SELECT COUNT(*) as tongsosanpham FROM sanpham";
        if ($idloai !== null) {
            $query .= " WHERE loai='$idloai'";
        }
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongsosanpham'];
        } else {
            return 0; 
        }
    }
    function search_Product($searchItem) {
        // Thực hiện truy vấn tìm kiếm
        $query = "SELECT * FROM sanpham WHERE ten LIKE '%$searchItem%' OR gia LIKE '%$searchItem%' OR moTa LIKE '%$searchItem%'";
        $result = $this->_query($query);
        $searchResults = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $searchResults[] = $row;
            }
            return $searchResults;
        } else {
            return $searchResults;
        }
    }
    function count_Searchproducts($searchItem) {
        // Câu truy vấn tìm kiếm và đếm số lượng sản phẩm
        $query = "SELECT COUNT(*) as totalProducts FROM sanpham WHERE ten LIKE '%$searchItem%' OR gia LIKE '%$searchItem%' OR moTa LIKE '%$searchItem%'";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['totalProducts'];
        } else {
            return 0;
        }
    }
    
}
?>