<?php
class Product extends baseModel {
    function get_Productdetail($productId) {
        $query = "SELECT * FROM sanpham, chitietsanpham WHERE sanpham.idsanpham = chitietsanpham.san_pham_id AND sanpham.idsanpham = $productId";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $productDetail = mysqli_fetch_assoc($result);
            return $productDetail;
        } else {
            return false;
        }
    }
    function get_Similarproducts($productId) {
        $select_query = "SELECT loai FROM sanpham WHERE idsanpham = '$productId'";
        $select_result = $this->_query($select_query);
        $row_category = mysqli_fetch_assoc($select_result);
        $category = $row_category['loai'];
        $query = "SELECT sanpham.idsanpham, sanpham.ten, sanpham.gia, sanpham.hinh FROM sanpham, loai WHERE sanpham.loai = loai.id AND loai.id = '$category' AND sanpham.idsanpham != '$productId' ORDER BY sanpham.idsanpham DESC LIMIT 4";
        $result = $this->_query($query);
        $recommendations = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row =  mysqli_fetch_assoc($result)) {
                $recommendations[] = $row;
            }
        }
        return $recommendations;
    }
    function insertOrder_Productdetail($maNguoiDung, $ngayDat, $diachi, $sodienthoai) {
        // Chuẩn bị câu lệnh SQL để chèn dữ liệu
        $sql = "INSERT INTO donhang (maNguoiDung, ghiChu, ngayDat, trangThai, diaChi, sodienthoai) VALUES ('$maNguoiDung', '', '$ngayDat', 'Đã đặt hàng', '$diachi', '$sodienthoai')";
        $result = $this->_query($sql);
        
        // Thực thi câu lệnh SQL
        if ($result) {
            // Lấy ID cuối cùng được chèn vào
            $idDonHang = mysqli_insert_id($this->conn);
            return $idDonHang;
        } else {
            return false;
        }
    }
    function insertOrderDetail_Productdetail($idDonHang, $idSanPham, $gia, $soLuong, $tongTien) {
        // Chuẩn bị câu lệnh SQL để chèn dữ liệu
        $sql = "INSERT INTO chitietdonhang (idDonHang, idSanPham, gia, soLuong, tongTien) VALUES ('$idDonHang', '$idSanPham', '$gia', '$soLuong', '$tongTien')";
        $result = $this->_query($sql);
        // Thực thi câu lệnh SQL
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function comment_Productdetail($idProduct) {
        // Chuẩn bị câu lệnh SQL để chèn dữ liệu
        $sql = "SELECT taikhoan.ten, taikhoan.ho, danhgia.noidung FROM taikhoan, danhgia WHERE danhgia.idsanpham = $idProduct AND taikhoan.manguoidung = danhgia.manguoidung ORDER BY danhgia.iddanhgia DESC";
        $result = $this->_query($sql);
        // Thực thi câu lệnh SQL
        if ($result) {
            $commentList = array(); // Khởi tạo mảng
            while ($row = mysqli_fetch_assoc($result)) {
                $commentList[] = $row; // Thêm tin tức vào mảng
            }
            return $commentList; // Trả về mảng kết quả
        } else {
            return false;
        }
    }
    function count_CommentProductdetail($idProduct) {
        $query = "SELECT COUNT(*) as tongdanhgia FROM danhgia WHERE idsanpham = $idProduct";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongdanhgia'];
        } else {
            return 0; 
        }
    }
    function insert_Review($manguoidung, $idsanpham, $noidung) {
        $query = "INSERT INTO danhgia(manguoidung,idsanpham,noidung) VALUES('$manguoidung','$idsanpham','$noidung')";
        $result = $this->_query($query);
        if ( $result) {
            return true;
        } else {
            return false; 
        }
    }
}
?>