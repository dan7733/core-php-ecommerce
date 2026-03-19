<?php
class admin extends baseModel
{
    function get_Admininfor($username)
    {
        $query = "SELECT * FROM taikhoan WHERE user = '$username'";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }
    function insert_Product($name, $price, $picture, $describe, $category)
    {
        // Câu lệnh SQL check
        $check_query = "SELECT * FROM sanpham WHERE hinh = '$picture'";
        $check_query_result = $this->_query($check_query);
        if (mysqli_num_rows($check_query_result) > 0) {
            return false; // Hình đã tồn tại, không thêm sản phẩm
        }
        // Câu lệnh SQL chèn sản phẩm vào bảng sanpham
        $insert_query = "INSERT INTO sanpham(ten, gia, hinh, moTa, loai) VALUES ('$name', '$price', '$picture', '$describe', '$category')";
        $insert_result = $this->_query($insert_query);
        // Kiểm tra việc chèn sản phẩm
        if ($insert_result) {
            // Lấy ID của sản phẩm vừa được chèn
            $san_pham_id = mysqli_insert_id($this->conn);
            // Câu lệnh SQL chèn dòng mới vào bảng ten_bang
            $insert_ten_bang_query = "INSERT INTO chitietsanpham (san_pham_id, CPU, RAM, O_Cung, Man_Hinh, Card_Man_Hinh, Cong_Ket_Noi, He_Dieu_Hanh, Thiet_Ke, Kich_Thuoc_Khoi_Luong, Thoi_Diem_Ra_Mat) VALUES ('$san_pham_id', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A')";
            // Thực thi câu lệnh SQL chèn dòng mới vào bảng ten_bang
            $insert_ten_bang_result = $this->_query($insert_ten_bang_query);
            // Kiểm tra việc chèn dòng mới vào bảng ten_bang
            if ($insert_ten_bang_result) {
                return true; // Thêm sản phẩm và dòng mới vào bảng ten_bang thành công
            } else {
                return false; // Thêm sản phẩm thành công, nhưng thêm dòng mới vào bảng ten_bang không thành công
            }
        } else {
            return false; // Lỗi khi chèn sản phẩm vào bảng sanpham
        }
    }
    // lấy loại
    function get_Inforcategory()
    {
        $query = "SELECT * FROM loai";
        $result = $this->_query($query);
        $laythongtinloais = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $laythongtinloais[] = $row;
            }
        }
        return $laythongtinloais;
    }
    // đếm tổng số loại
    function count_Category()
    {
        $query = "SELECT COUNT(*) as tongsoloai FROM loai";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongsoloai'];
        } else {
            return 0;
        }
    }
    // xóa loại
    function del_Category($idloai)
    {
        $delete_query = "DELETE FROM loai WHERE id = $idloai";
        $delete_result = $this->_query($delete_query);
        if ($delete_result) {
            return true;
        } else {
            return false;
        }
    }
    // lấy chi tiết nhóm
    function get_Categorybyid($idloai)
    {
        $query = "SELECT * FROM loai WHERE id = $idloai";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $chitietnhom = mysqli_fetch_assoc($result);
            return $chitietnhom;
        } else {
            return false;
        }
    }
    // sửa sản loại
    function update_Category($id, $ten, $noiBat, $thuTu)
    {
        // Câu lệnh SQL cho việc cập nhật sản phẩm
        $query = "UPDATE loai SET ten = '$ten', noiBat = '$noiBat', thuTu = '$thuTu' WHERE id = $id";
        $result = $this->_query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // lấy thông tin sản phẩm
    function get_AdminProduct()
    {
        $query = "SELECT * FROM sanpham ORDER BY idsanpham DESC";
        $result = $this->_query($query);
        $infor_products = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $infor_products[] = $row;
            }
        }
        return $infor_products;
    }
    // tính tổng số sản phẩm
    function count_AdminProduct()
    {
        $query = "SELECT COUNT(*) as tongsosanpham FROM sanpham";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongsosanpham'];
        } else {
            return 0;
        }
    }
    // lấy thông tin chi tiết sản phẩm
    function get_admindetailproduct($productId)
    {
        $query = "SELECT * FROM chitietsanpham WHERE san_pham_id = $productId";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $productDetail = mysqli_fetch_assoc($result);
            return $productDetail;
        } else {
            return false;
        }
    }
    // cập nhật chi tiết sản phẩm
    function update_detailproduct($idproduct, $CPU, $RAM, $O_Cung, $Man_Hinh, $Card_Man_Hinh, $Cong_Ket_Noi, $He_Dieu_Hanh, $Thiet_Ke, $Kich_Thuoc_Khoi_Luong, $Thoi_Diem_Ra_Mat)
    {
        $query = "UPDATE chitietsanpham SET CPU = '$CPU', RAM = '$RAM', O_Cung = '$O_Cung', Man_Hinh = '$Man_Hinh', Card_Man_Hinh = '$Card_Man_Hinh', Cong_Ket_Noi = '$Cong_Ket_Noi', He_Dieu_Hanh = '$He_Dieu_Hanh', Thiet_Ke = '$Thiet_Ke', Kich_Thuoc_Khoi_Luong = '$Kich_Thuoc_Khoi_Luong', Thoi_Diem_Ra_Mat = '$Thoi_Diem_Ra_Mat' WHERE san_pham_id = $idproduct";
        $result = $this->_query($query);
        // Kiểm tra kết quả thực thi câu truy vấn
        if ($result) {
            return true; // Trả về true nếu cập nhật thành công
        } else {
            return false; // Trả về false nếu cập nhật thất bại
        }
    }
    function del_product($idproduct)
    {
        // Fetch the image filename before deleting the product
        $query_fetch_image = "SELECT hinh FROM sanpham WHERE idsanpham = '$idproduct'";
        $result_image = $this->_query($query_fetch_image);
        if ($result_image) {
            $row = mysqli_fetch_assoc($result_image);
            $image_filename = $row['hinh'];
            // Xóa sản phẩm khỏi bảng chitietsanpham
            $query_detail = "DELETE FROM chitietsanpham WHERE san_pham_id = '$idproduct'";
            $result_detail = $this->_query($query_detail);
            if ($result_detail) {
                // Nếu xóa thành công, tiếp tục xóa khỏi bảng sanpham
                $query_review = "DELETE FROM danhgia WHERE idsanpham = '$idproduct'";
                $result_review = $this->_query($query_review);
                $query = "DELETE FROM sanpham WHERE idsanpham = '$idproduct'";
                $result = $this->_query($query);
                if ($result && $result_review) {
                    return $image_filename; // Trả về tên tệp ảnh nếu xóa thành công
                } else {
                    return false; // Trả về false nếu xóa khỏi bảng sanpham thất bại
                }
            } else {
                return false; // Trả về false nếu xóa khỏi bảng chitietsanpham thất bại
            }
        } else {
            return false; // Trả về false nếu không thể tìm thấy hình ảnh
        }
    }
    // láy thông tin sản phẩm theo id
    function get_Productbyid($productId)
    {
        $query = "SELECT * FROM sanpham WHERE idsanpham = $productId";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $productDetail = mysqli_fetch_assoc($result);
            return $productDetail;
        } else {
            return false;
        }
    }
    // cập nhật hình ảnh
    function update_Product($id, $ten, $gia, $hinh, $mota, $loai)
    {
        // Câu lệnh SQL cho việc cập nhật sản phẩm
        $sql = "UPDATE sanpham SET ten = '$ten', gia = '$gia', hinh = '$hinh', moTa = '$mota', loai = '$loai' WHERE idsanpham = $id";
        $result = $this->_query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // thêm loai
    function insert_Category($tenloai, $noibat, $thutunhom)
    {
        $check_query = "SELECT * FROM loai WHERE ten = '$tenloai'";
        $check_query_result = $this->_query($check_query);
        if (mysqli_num_rows($check_query_result) > 0) {
            return false;
        }
        //câu lệnh SQL
        $sql = "INSERT INTO loai (ten, noiBat, thuTu, icon) VALUES ('$tenloai', '$noibat', '$thutunhom', 'null')";
        $result = $this->_query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // Lấy tài khoản
    function get_Account()
    {
        $query = "SELECT * FROM taikhoan ORDER BY manguoidung DESC";
        $result = $this->_query($query);
        $accounts = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $accounts[] = $row;
            }
        }
        return $accounts;
    }
    // Cấp tài khoản
    function create_UserAdmin($user, $pass, $ho, $ten, $email, $sdt, $diachi)
    {
        $check_user = "SELECT * FROM taikhoan WHERE user = '$user'";
        $check_user_result = $this->_query($check_user);
        if (mysqli_num_rows($check_user_result) > 0) {
            return false;
        }
        $check_email = "SELECT * FROM taikhoan WHERE email = '$email'";
        $check_email_result = $this->_query($check_email);
        if (mysqli_num_rows($check_email_result) > 0) {
            return false;
        }
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $Insert_acc_query = "INSERT INTO taikhoan (user, pass, ho, ten, email, sdt, diachi, quyen) VALUES ('$user', '$hashed_password', '$ho', '$ten', '$email', '$sdt', '$diachi', 0)";
        $Insert_acc_result = $this->_query($Insert_acc_query);
        if ($Insert_acc_result) {
            return mysqli_insert_id($this->conn);
        } else {
            return false;
        }
    }
    // del_Account
    function del_UserAdmin($user)
    {
        // Xóa các bản ghi trong bảng phụ trước khi xóa tài khoản chính
        $delete_danhgia_query = "DELETE FROM danhgia WHERE manguoidung = '$user'";
        $delete_danhgia_result = $this->_query($delete_danhgia_query);

        // Kiểm tra xem truy vấn xóa trong bảng 'danhgia' có thành công hay không
        if ($delete_danhgia_result) {
            $delete_chitietdonhang_query = "DELETE FROM chitietdonhang WHERE idDonHang IN (SELECT idDonHang FROM donhang WHERE maNguoidung = '$user')";
            $delete_chitietdonhang_result = $this->_query($delete_chitietdonhang_query);

            // Kiểm tra xem truy vấn xóa trong bảng 'chitietdonhang' có thành công hay không
            if ($delete_chitietdonhang_result) {
                $delete_donhang_query = "DELETE FROM donhang WHERE maNguoiDung = '$user'";
                $delete_donhang_result = $this->_query($delete_donhang_query);

                // Kiểm tra xem truy vấn xóa trong bảng 'donhang' có thành công hay không
                if ($delete_donhang_result) {
                    // Xóa tài khoản chính
                    $delete_user_query = "DELETE FROM taikhoan WHERE manguoidung = '$user'";
                    $delete_user_result = $this->_query($delete_user_query);

                    // Kiểm tra xem truy vấn xóa trong bảng 'taikhoan' có thành công hay không
                    if ($delete_user_result) {
                        return true; // Trả về true nếu tất cả các truy vấn đều thành công
                    }
                }
            }
        }

        return false; // Trả về false nếu có lỗi xảy ra
    }
    // lấy chi tiết tài khoản
    function get_Accountbyid($AccountId)
    {
        $query = "SELECT * FROM taikhoan WHERE manguoidung = $AccountId";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $accountDetail = mysqli_fetch_assoc($result);
            return $accountDetail;
        } else {
            return false;
        }
    }
    // cập nhật tài khoản
    function update_Account($manguoidung, $user, $pass, $ho, $ten, $email, $sdt, $diachi)
    {
        // Câu lệnh SQL cho việc cập nhật tài khoản
        $sql = "UPDATE taikhoan SET user = '$user', pass = '$pass', ho = '$ho', ten = '$ten', email = '$email', sdt = '$sdt', diachi = '$diachi' WHERE manguoidung = '$manguoidung'";
        $result = $this->_query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // lấy đánh giá
    function get_Review()
    {
        $query = "SELECT * FROM danhgia";
        $result = $this->_query($query);
        $laythongtinbinhluans = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $laythongtinbinhluans[] = $row;
            }
        }
        return $laythongtinbinhluans;
    }
    // đếm tổng số loại
    function count_Account()
    {
        $query = "SELECT COUNT(*) as tongsotaikhoan FROM taikhoan";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongsotaikhoan'];
        } else {
            return 0;
        }
    }
    // đánh giá tổng
    function count_Review()
    {
        $query = "SELECT COUNT(*) as tongsobinhluan FROM danhgia";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongsobinhluan'];
        } else {
            return 0;
        }
    }
    // láy đánh giá
    function get_ReviewDanhgia($idsanpham)
    {
        $query = "SELECT * FROM danhgia WHERE idsanpham = '$idsanpham'";
        $result = $this->_query($query);

        $reviewDanhgia = array(); // Khởi tạo mảng chứa các đánh giá

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $reviewDanhgia[] = $row; // Thêm mỗi đánh giá vào mảng
            }
        }

        return $reviewDanhgia;
    }
    // xóa đánh giá
    function del_Review($iddanhgia)
    {
        $delete_query = "DELETE FROM danhgia WHERE iddanhgia = $iddanhgia";
        $delete_result = $this->_query($delete_query);
        if ($delete_result) {
            return true;
        } else {
            return false;
        }
    }
    // thêm tin tức
    function insert_News($tieu_de, $hinh_tintuc, $noi_dung, $noi_dung_tom_tat)
    {
        // Câu lệnh SQL chèn sản phẩm vào bảng sanpham
        $insert_query = "INSERT INTO tin_tuc(tieu_de, hinh_tintuc, noi_dung, noi_dung_tom_tat) VALUES ('$tieu_de', '$hinh_tintuc', '$noi_dung', '$noi_dung_tom_tat')";
        $insert_result = $this->_query($insert_query);
        // Kiểm tra việc chèn sản phẩm
        if ($insert_result) {
            return true;
        } else {
            return false;
        }
    }
    // lấy thông tin tin tức
    function get_News()
    {
        $query = "SELECT * FROM tin_tuc ORDER BY id_tintuc DESC";
        $result = $this->_query($query);
        $laythongtin_tintucs = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $laythongtin_tintucs[] = $row;
            }
        }
        return $laythongtin_tintucs;
    }
    // tính tổng tin tức
    function count_News()
    {
        $query = "SELECT COUNT(*) as tongsotintuc FROM tin_tuc";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongsotintuc'];
        } else {
            return 0;
        }
    }
    // xóa tin tức
    function del_New($idnews)
    {
        // Fetch the image filename before deleting the product
        $query_fetch_image = "SELECT hinh_tintuc FROM tin_tuc WHERE id_tintuc = '$idnews'";
        $result_image = $this->_query($query_fetch_image);
        if ($result_image) {
            $row = mysqli_fetch_assoc($result_image);
            $image_filename = $row['hinh_tintuc'];
            // Xóa khỏi bảng tintuc
            $query_tintuc = "DELETE FROM tin_tuc WHERE id_tintuc = '$idnews'";
            $result_tintuc = $this->_query($query_tintuc);
            if ($result_tintuc) {
                return $image_filename;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // láy thông tin tin tức theo id
    function get_Newsbyid($NewsId)
    {
        $query = "SELECT * FROM tin_tuc WHERE id_tintuc = $NewsId";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $newsDetail = mysqli_fetch_assoc($result);
            return $newsDetail;
        } else {
            return false;
        }
    }
    // cập nhật tin tức
    function update_New($id_tintuc, $tieu_de, $hinh_tintuc, $noi_dung, $noi_dung_tom_tat)
    {
        // Câu lệnh SQL cho việc cập nhật sản phẩm
        $sql = "UPDATE tin_tuc SET tieu_de = '$tieu_de', hinh_tintuc = '$hinh_tintuc', noi_dung = '$noi_dung', noi_dung_tom_tat = '$noi_dung_tom_tat' WHERE id_tintuc = $id_tintuc";
        $result = $this->_query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // khuyến mãi
    // thêm khuyến mãi
    function insert_Promotion($tieude_khuyenmai, $hinh_khuyenmai, $noidung_khuyenmai, $noidung_tomtat_khuyenmai)
    {
        // Câu lệnh SQL chèn sản phẩm vào bảng sanpham
        $insert_query = "INSERT INTO khuyenmai(tieude_khuyenmai, hinh_khuyenmai, noidung_khuyenmai, noidung_tomtat_khuyenmai) VALUES ('$tieude_khuyenmai', '$hinh_khuyenmai', '$noidung_khuyenmai', '$noidung_tomtat_khuyenmai')";
        $insert_result = $this->_query($insert_query);
        // Kiểm tra việc chèn sản phẩm
        if ($insert_result) {
            return true;
        } else {
            return false;
        }
    }
    // lấy thông tin khuyến mãi
    function get_Promotion()
    {
        $query = "SELECT * FROM khuyenmai ORDER BY id_khuyenmai DESC";
        $result = $this->_query($query);
        $laythongtin_khuyenmais = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $laythongtin_khuyenmais[] = $row;
            }
        }
        return $laythongtin_khuyenmais;
    }
    // tính tổng khuyến mãi
    function count_Promotion()
    {
        $query = "SELECT COUNT(*) as tongsokhuyenmai FROM khuyenmai";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tongsokhuyenmai'];
        } else {
            return 0;
        }
    }
    // xóa khuyến mãi
    function del_Promotion($idpromotion)
    {
        // Fetch the image filename before deleting the product
        $query_fetch_image = "SELECT hinh_khuyenmai FROM khuyenmai WHERE id_khuyenmai = '$idpromotion'";
        $result_image = $this->_query($query_fetch_image);
        if ($result_image) {
            $row = mysqli_fetch_assoc($result_image);
            $image_filename = $row['hinh_khuyenmai'];
            // Xóa khỏi bảng tintuc
            $query_khuyenmai = "DELETE FROM khuyenmai WHERE id_khuyenmai = '$idpromotion'";
            $result_khuyenmai = $this->_query($query_khuyenmai);
            if ($result_khuyenmai) {
                return $image_filename;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // láy thông tin khuyến mãi theo id
    function get_Promotionbyid($PromotionId)
    {
        $query = "SELECT * FROM khuyenmai WHERE id_khuyenmai = '$PromotionId'";
        $result = $this->_query($query);
        if (mysqli_num_rows($result) > 0) {
            $promotionDetail = mysqli_fetch_assoc($result);
            return $promotionDetail;
        } else {
            return false;
        }
    }
    // cập nhật khuyến mãi
    function update_Promotion($id_khuyenmai, $tieude_khuyenmai, $hinh_khuyenmai, $noidung_khuyenmai, $noidung_tomtat_khuyenmai)
    {
        // Câu lệnh SQL cho việc cập nhật sản phẩm
        $sql = "UPDATE khuyenmai SET tieude_khuyenmai = '$tieude_khuyenmai', hinh_khuyenmai = '$hinh_khuyenmai', noidung_khuyenmai = '$noidung_khuyenmai', noidung_tomtat_khuyenmai = '$noidung_tomtat_khuyenmai' WHERE id_khuyenmai = $id_khuyenmai";
        $result = $this->_query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
