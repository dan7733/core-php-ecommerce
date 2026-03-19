<?php
class Cart extends baseModel
{
    public function getProductById($idproduct)
    {
        $sql = "SELECT * FROM sanpham WHERE idsanpham = $idproduct";
        $result = $this->_query($sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result); // Trả về một sản phẩm duy nhất dưới dạng mảng kết hợp
        }
        return null;
    }
    function insertOrder_Cart($maNguoiDung, $ngayDat, $diachi, $sodienthoai)
    {
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
    function insertOrderDetail_Cart($idDonHang, $idSanPham, $gia, $soLuong, $tongTien)
    {
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
}
