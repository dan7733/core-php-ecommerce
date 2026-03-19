<?php
class adminController extends baseController
{
    private $admininModel;
    public function __construct()
    {
        $this->loadModel('adminModel');
        $this->admininModel = new admin();
    }
    // in thông tin tài khoản admin
    public function showInforadmin()
    {
        $username = $_SESSION['user_data']['user'];
        // Gọi phương thức từ model Content_pro để lấy sản phẩm mới
        $inforadmin = $this->admininModel->get_Admininfor($username);
        // Trả về view và truyền dữ liệu sản phẩm
        return $this->loadView('admin.admin_infor', [
            'inforadmin' => $inforadmin
        ]);
    }
    // thêm sản phẩm
    public function InsertProduct()
    {
        $insertProdcuct_txtErro = '';
        $Inforcategorys = $this->admininModel->get_Inforcategory();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addproduct'])) {
            $tensanpham = $_POST['tensanpham'];
            $giasanpham = $_POST['giasanpham'];
            $motosanpham = $_POST['motosanpham'];
            $loaisanpham = $_POST['loaisanpham'];
            $hinh = $_FILES['hinhsanpham']['name'];
            $insertProdcuct_result = $this->admininModel->insert_Product($tensanpham, $giasanpham, $hinh, $motosanpham, $loaisanpham);
            if ($insertProdcuct_result) {
                move_uploaded_file($_FILES['hinhsanpham']['tmp_name'], './img/product/' . $_FILES['hinhsanpham']['name']);
                $insertProdcuct_txtErro = 'Thêm Sản phẩm thành công!';
            } else {
                $insertProdcuct_txtErro = 'Thêm Sản phẩm thất bại!';
            }
        }
        return $this->loadView('admin.insert_product', [
            'insertProdcuct_txtErro' => $insertProdcuct_txtErro,
            'Inforcategorys' => $Inforcategorys
        ]);
    }
    // sua chi tiet san pham
    public function list_Adminproduct()
    {
        $data = [];
        $itemsPerPage = 10;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $listadminproduct = $this->admininModel->get_AdminProduct();
        $data['listadminproduct'] = array_slice($listadminproduct, $offset, $itemsPerPage);
        if ($listadminproduct) {
            $totalProducts = $this->admininModel->count_AdminProduct();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('admin.list_detailproduct', $data);
    }
    // sua san pham
    public function list_product()
    {
        $data = [];
        $itemsPerPage = 10;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $listadminproduct = $this->admininModel->get_AdminProduct();
        $data['listadminproduct'] = array_slice($listadminproduct, $offset, $itemsPerPage);
        if ($listadminproduct) {
            $totalProducts = $this->admininModel->count_AdminProduct();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('admin.list_product', $data);
    }
    // update chi tiet san pham
    public function update_Admindetailproduct()
    {
        if (isset($_GET['idproduct'])) {
            $idProduct = $_GET['idproduct'];
        }
        $productDetail = $this->admininModel->get_admindetailproduct($idProduct);
        $updatedetailproduct_txtErro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_detailproduct'])) {
            $CPU = $_POST['CPU'];
            $RAM = $_POST['RAM'];
            $O_Cung = $_POST['ocung'];
            $Man_Hinh = $_POST['Manhinh'];
            $Card_Man_Hinh = $_POST['Cardmanhinh'];
            $Cong_Ket_Noi = $_POST['Congketnoi'];
            $He_Dieu_Hanh = $_POST['hedieuhanh'];
            $Thiet_Ke = $_POST['thietke'];
            $Kich_Thuoc_Khoi_Luong = $_POST['kichthuoc'];
            $Thoi_Diem_Ra_Mat = $_POST['thoidiem'];
            if ($this->admininModel->update_detailproduct($idProduct, $CPU, $RAM, $O_Cung, $Man_Hinh, $Card_Man_Hinh, $Cong_Ket_Noi, $He_Dieu_Hanh, $Thiet_Ke, $Kich_Thuoc_Khoi_Luong, $Thoi_Diem_Ra_Mat)) {
                $updatedetailproduct_txtErro = 'Cập nhật chi tiết sản phẩm thành công!!!';
            } else {
                $updatedetailproduct_txtErro = 'Cập nhật chi tiết sản phẩm thất bại!!!';
            }
        }
        return $this->loadView('admin.update_detailproduct', [
            'productDetail' => $productDetail,
            'updatedetailproduct_txtErro' => $updatedetailproduct_txtErro
        ]);
    }
    // xóa sản phẩm
    public function delete_Adminproduct()
    {
        $delProdcuct_txtErro = '';
        if (isset($_GET['idproduct'])) {
            $idProduct = $_GET['idproduct'];
        }
        if ($ten_tep_anh = $this->admininModel->del_product($idProduct)) {
            // Lấy tên tệp ảnh từ thư mục
            if ($ten_tep_anh && file_exists('./img/product/' . $ten_tep_anh)) {
                if (unlink('./img/product/' . $ten_tep_anh)) {
                    $delProdcuct_txtErro = 'Xóa thành công!';
                } else {
                    $delProdcuct_txtErro = 'Không thể xóa tệp!';
                }
            } else {
                $delProdcuct_txtErro = 'Không thể tìm thấy hoặc tệp không tồn tại!';
            }
        } else {
            $delProdcuct_txtErro = 'Không thể xóa sản phẩm!';
        }
        return $this->loadView('admin.list_product', [
            'delProdcuct_txtErro' => $delProdcuct_txtErro,
        ]);
    }
    // cập nhật sản phẩm
    public function update_Adminproduct()
    {
        if (isset($_GET['idproduct'])) {
            $idProduct = $_GET['idproduct'];
        }
        $Inforcategorys = $this->admininModel->get_Inforcategory();
        $productInfor = $this->admininModel->get_Productbyid($idProduct);

        $updateproduct_txtErro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
            // Tiến hành cập nhật thông tin sản phẩm dựa trên dữ liệu từ biểu mẫu
            $sua_tenSanPham = $_POST['update_tensanpham'];
            $sua_giaSanPham = $_POST['update_giasanpham'];
            $sua_moTaSanPham = $_POST['update_mota'];
            $sua_loaiSanPham = $_POST['update_loaisanpham'];
            $sua_hinhSanPham = $_FILES['update_hinhsanpham']['name'];
            if (isset($_FILES['update_hinhsanpham']) && $_FILES['update_hinhsanpham']['error'] === 0) {
                if (file_exists('./img/product/' . $productInfor['hinh'])) {
                    unlink('./img/product/' . $productInfor['hinh']);
                }
                move_uploaded_file($_FILES['update_hinhsanpham']['tmp_name'], './img/product/' . $_FILES['update_hinhsanpham']['name']);
            } else {
                $sua_hinhSanPham = $_POST['khong_update_hinh'];
            }
            // Tiến hành cập nhật sản phẩm trong CSDL
            if ($this->admininModel->update_Product($idProduct, $sua_tenSanPham, $sua_giaSanPham, $sua_hinhSanPham, $sua_moTaSanPham, $sua_loaiSanPham)) {
                // Sản phẩm đã được cập nhật thành công
                $updateproduct_txtErro = "Cập nhật sản phẩm thành công!";
            } else {
                // Xảy ra lỗi trong quá trình cập nhật sản phẩm
                $updateproduct_txtErro = "Cập nhật sản phẩm không thành công!";
            }
        }
        return $this->loadView('admin.update_product', [
            'productInfor' => $productInfor,
            'Inforcategorys' => $Inforcategorys,
            'updateproduct_txtErro' => $updateproduct_txtErro
        ]);
    }
    // thêm loại
    public function insert_Category()
    {
        $insertCategory_txtErro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert_category'])) {
            $tenloai = $_POST['tenloai'];
            $thutunhom = $_POST['thutu'];
            if (isset($_POST['noibat'])) {
                $noibat = $_POST['noibat'];
            } else {
                $noibat = 0;
            }
            $result = $this->admininModel->insert_Category($tenloai, $noibat, $thutunhom);
            if ($result) {
                $insertCategory_txtErro = 'Thêm Loại thành công!';
            } else {
                $insertCategory_txtErro = 'Thêm Loại thất bại!';
            }
        }
        return $this->loadView('admin.insert_category', [
            'insertCategory_txtErro' => $insertCategory_txtErro,
        ]);
    }
    // Danh sách loại
    public function list_Category()
    {
        $data = [];
        $itemsPerPage = 10;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $listadmincategory = $this->admininModel->get_Inforcategory();
        $data['listadmincategory'] = array_slice($listadmincategory, $offset, $itemsPerPage);
        if ($listadmincategory) {
            $totalProducts = $this->admininModel->count_Category();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('admin.list_category', $data);
    }
    // xóa loại
    public function delete_Category()
    {
        $delCategory_txtErro = '';
        if (isset($_GET['idcategory'])) {
            $idCategoryModel = $_GET['idcategory'];
        }
        if ($this->admininModel->del_Category($idCategoryModel)) {
            $delCategory_txtErro = 'Xóa loại thành công!';
        } else {
            $delCategory_txtErro = 'Có lỗi, không thể xóa loại!';
        }
        return $this->loadView('admin.list_category', [
            'delCategory_txtErro' => $delCategory_txtErro,
        ]);
    }
    // cập nhật loại
    // update chi tiet san pham
    public function update_Category()
    {
        if (isset($_GET['idcategory'])) {
            $idCategory = $_GET['idcategory'];
        }
        $CategoryDetail = $this->admininModel->get_Categorybyid($idCategory);
        $updateCategory_txtErro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_category'])) {
            $ten = $_POST['tenloai'];
            $noibat = $_POST['noibat'];
            $thutu = $_POST['thutu'];
            if ($this->admininModel->update_Category($idCategory, $ten, $noibat, $thutu)) {
                $updateCategory_txtErro = 'Cập nhật loại thành công!!!';
            } else {
                $updateCategory_txtErro = 'Cập nhật loại thất bại!!!';
            }
        }
        return $this->loadView('admin.update_category', [
            'CategoryDetail' => $CategoryDetail,
            'updateCategory_txtErro' => $updateCategory_txtErro
        ]);
    }
    // Danh sách tài khoản
    public function list_Account()
    {
        $data = [];
        $itemsPerPage = 8;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $listadminAccount = $this->admininModel->get_Account();
        $data['listadminAccount'] = array_slice($listadminAccount, $offset, $itemsPerPage);
        if ($listadminAccount) {
            $totalProducts = $this->admininModel->count_Account();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('admin.list_account', $data);
    }
    // 
    public function create_UserAdmin()
    {
        $Regadmin_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Register-btn'])) {
            $reg_user = $_POST['capusername'];
            $reg_pass = $_POST['cappassword'];
            $regconfirm_reg_pass = $_POST['capconfirm_password'];
            $reg_ho = $_POST['caplastname'];
            $reg_ten = $_POST['capfirstname'];
            $reg_email = $_POST['capregister_email'];
            $reg_sdt = $_POST['capphonenumber']; // Số điện thoại
            $reg_diachi = $_POST['capaddress']; // Địa chỉ

            // Thêm sdt và diachi vào hàm create_User
            if ($regconfirm_reg_pass === $reg_pass) {
                // Mật khẩu và mật khẩu xác nhận trùng khớp, thực hiện việc đăng ký
                $reg_result = $this->admininModel->create_UserAdmin($reg_user, $reg_pass, $reg_ho, $reg_ten, $reg_email, $reg_sdt, $reg_diachi);
                if ($reg_result) {
                    $Regadmin_txtErro = 'Cấp tài khoản thành công!!!';
                } else {
                    $Regadmin_txtErro = 'Lỗi, Đăng ký thất bại!!!';
                }
            } else {
                // Mật khẩu và mật khẩu xác nhận không trùng khớp, thông báo lỗi
                $Regadmin_txtErro = 'Mật khẩu và Mật khẩu xác nhận không trùng nhau';
            }
        }
        return $this->loadview('admin.create_accountadmim', [
            'Regadmin_txtErro' => $Regadmin_txtErro
        ]);
    }
    // xóa đánh tài khoản
    public function delete_Accountadmin()
    {

        $delAccount_txtErro = '';
        if (isset($_GET['idaccount'])) {
            $idAccount = $_GET['idaccount'];
        }
        if ($this->admininModel->del_UserAdmin($idAccount)) {
            $delAccount_txtErro = 'Xóa thành công!';
        } else {
            $delAccount_txtErro = 'Có lỗi, không thể xóa !';
        }
        return $this->loadView('admin.list_account', [
            'delAccount_txtErro' => $delAccount_txtErro,
        ]);
    }
    // cập nhật tài khoản
    public function update_Account()
    {
        if (isset($_GET['idaccount'])) {
            $idAccount = $_GET['idaccount'];
        }
        $updateaccount = $this->admininModel->get_Accountbyid($idAccount);
        $updateAccount_txtErro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Update-btn'])) {
            // Tiến hành cập nhật thông tin tài khoản dựa trên dữ liệu từ biểu mẫu
            $ho = $_POST['up_firstname'];
            $ten = $_POST['up_lastname'];
            $user = $_POST['up_username'];
            $sdt = $_POST['up_phonenumber'];
            $diachi = $_POST['up_address'];
            $email = $_POST['up_email'];
            $new_password = $_POST['up_new_password'];

            // Kiểm tra nếu mật khẩu mới được nhập
            if (!empty($new_password)) {
                // Mã hóa mật khẩu mới trước khi cập nhật
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                // Cập nhật thông tin tài khoản với mật khẩu mới đã mã hóa
                $result = $this->admininModel->update_Account($idAccount, $user, $hashed_password, $ho, $ten, $email, $sdt, $diachi);
                if ($result) {
                    $updateAccount_txtErro = "Cập nhật thành công!";
                } else {
                    $updateAccount_txtErro = "Cập nhật thất bại";
                }
            } else {
                // Nếu mật khẩu mới không được nhập, chỉ cập nhật thông tin tài khoản (không bao gồm mật khẩu)
                $result = $this->admininModel->update_Account($idAccount, $user, $updateaccount['pass'], $ho, $ten, $email, $sdt, $diachi);
                if ($result) {
                    $updateAccount_txtErro = "Cập nhật thành công!";
                } else {
                    $updateAccount_txtErro = "Cập nhật thất bại";
                }
            }
        }
        return $this->loadView('admin.update_account', [
            'updateaccount' => $updateaccount,
            'updateAccount_txtErro' => $updateAccount_txtErro
        ]);
    }
    // list đánh giá
    public function list_Review()
    {
        $data = [];
        $itemsPerPage = 10;
        $currentPage = isset($_GET['page_number']) ? (int)$_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['timkiemreview'])) {
            $idsanpham = $_POST['masanpham'];
            $listadminReview = $this->admininModel->get_ReviewDanhgia($idsanpham);
            if (!$listadminReview) {
                $data['updateCategory_txtErro'] = 'Không tìm thấy đánh giá cho mã sản phẩm này.';
                $listadminReview = []; // Initialize as empty array when no results are found
            }
        } else {
            $listadminReview = $this->admininModel->get_Review();
        }

        // Ensure listadminReview is always set before slicing
        $data['listadminReview'] = array_slice($listadminReview, $offset, $itemsPerPage);

        if (!empty($listadminReview)) {
            $totalProducts = count($listadminReview);
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        } else {
            $data['totalPages'] = 1;
        }

        return $this->loadView('admin.list_review', $data);
    }
    // xóa đánh giá
    public function delete_Review()
    {

        $delReview_txtErro = '';
        if (isset($_GET['idreview'])) {
            $idreview = $_GET['idreview'];
        }
        if ($this->admininModel->del_review($idreview)) {
            $delReview_txtErro = 'Xóa bình luận thành công!';
        } else {
            $delReview_txtErro = 'Có lỗi, không thể xóa !';
        }
        return $this->loadView('admin.list_review', [
            'delReview_txtErro' => $delReview_txtErro,
        ]);
    }
    // thêm tin tức
    public function InsertNews()
    {
        $InsertNews = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addnews'])) {
            $tieu_de = $_POST['tieudetintuc'];
            $noi_dung_tom_tat = $_POST['noidungtomtat'];
            $noi_dung = $_POST['noidungtintuc'];
            $hinh_tintuc = $_FILES['hinhtintuc']['name'];
            $insertNews_result = $this->admininModel->insert_News($tieu_de, $hinh_tintuc, $noi_dung, $noi_dung_tom_tat);
            if ($insertNews_result) {
                move_uploaded_file($_FILES['hinhtintuc']['tmp_name'], './img/news/' . $_FILES['hinhtintuc']['name']);
                $InsertNews = 'Thêm Tin tức thành công!';
            } else {
                $InsertNews = 'Thêm Tin tức thất bại!';
            }
        }
        return $this->loadView('admin.insert_news', [
            'InsertNews' => $InsertNews
        ]);
    }
    // danh sách tin tức
    public function list_New()
    {
        $data = [];
        $itemsPerPage = 7;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $listadminnews = $this->admininModel->get_News();
        $data['listadminnews'] = array_slice($listadminnews, $offset, $itemsPerPage);
        if ($listadminnews) {
            $totalProducts = $this->admininModel->count_News();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('admin.list_news', $data);
    }
    // xóa tin tức
    public function delete_News()
    {
        $delNews_txtErro = '';
        if (isset($_GET['idnews'])) {
            $idNews = $_GET['idnews'];
        }
        if ($ten_tep_anh = $this->admininModel->del_New($idNews)) {
            // Lấy tên tệp ảnh từ thư mục
            if ($ten_tep_anh && file_exists('./img/news/' . $ten_tep_anh)) {
                if (unlink('./img/news/' . $ten_tep_anh)) {
                    $delNews_txtErro = 'Xóa thành công!';
                } else {
                    $delNews_txtErro = 'Không thể xóa tệp!';
                }
            } else {
                $delNews_txtErro = 'Không thể tìm thấy hoặc tệp không tồn tại!';
            }
        } else {
            $delNews_txtErro = 'Không thể xóa sản phẩm!';
        }
        return $this->loadView('admin.list_news', [
            'delNews_txtErro' => $delNews_txtErro,
        ]);
    }
    // cập nhật tin tức
    public function update_News()
    {
        if (isset($_GET['idnews'])) {
            $idNews = $_GET['idnews'];
        }
        $NewsInfor = $this->admininModel->get_Newsbyid($idNews);
        $updateNews_txtErro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_news'])) {
            // Tiến hành cập nhật thông tin sản phẩm dựa trên dữ liệu từ biểu mẫu
            $sua_tieude = $_POST['update_tieudetintuc'];
            $sua_noidungtomtat = $_POST['update_ndtttintuc'];
            $sua_noidung = $_POST['update_noidungintuc'];
            $sua_hinhSanPham = $_FILES['update_hinhtintuc']['name'];
            if (isset($_FILES['update_hinhtintuc']) && $_FILES['update_hinhtintuc']['error'] === 0) {
                if (file_exists('./img/news/' . $NewsInfor['hinh_tintuc'])) {
                    unlink('./img/news/' . $NewsInfor['hinh_tintuc']);
                }
                move_uploaded_file($_FILES['update_hinhtintuc']['tmp_name'], './img/news/' . $_FILES['update_hinhtintuc']['name']);
            } else {
                $sua_hinhSanPham = $_POST['khong_update_hinhtintuc'];
            }
            // Tiến hành cập nhật sản phẩm trong CSDL
            if ($this->admininModel->update_New($idNews, $sua_tieude, $sua_hinhSanPham, $sua_noidung, $sua_noidungtomtat)) {
                // Sản phẩm đã được cập nhật thành công
                $updateNews_txtErro = "Cập nhật tin tức thành công!";
            } else {
                // Xảy ra lỗi trong quá trình cập nhật sản phẩm
                $updateNews_txtErro = "Cập nhật tin tức không thành công!";
            }
        }
        return $this->loadView('admin.update_news', [
            'NewsInfor' => $NewsInfor,
            'updateNews_txtErro' => $updateNews_txtErro
        ]);
    }

    // thêm khuyến mãi
    public function InsertPromotion()
    {
        $InsertPromotion = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addPromotion'])) {
            $tieude_khuyenmai = $_POST['tieudepromotion'];
            $noidung_tomtat_khuyenmai = $_POST['noidungtomtatpromotion'];
            $noidung_khuyenmai = $_POST['noidungpromotion'];
            $hinh_khuyenmai = $_FILES['hinhpromotion']['name'];
            $insertNews_result = $this->admininModel->insert_Promotion($tieude_khuyenmai, $hinh_khuyenmai, $noidung_khuyenmai, $noidung_tomtat_khuyenmai);
            if ($insertNews_result) {
                move_uploaded_file($_FILES['hinhpromotion']['tmp_name'], './img/promotion/' . $_FILES['hinhpromotion']['name']);
                $InsertPromotion = 'Thêm Khuyến mãi thành công!';
            } else {
                $InsertPromotion = 'Thêm Khuyến mãi thất bại!';
            }
        }
        return $this->loadView('admin.insert_promotion', [
            'InsertPromotion' => $InsertPromotion
        ]);
    }
    // danh sách tin tức
    public function list_Promotion()
    {
        $data = [];
        $itemsPerPage = 7;
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $offset = ($currentPage - 1) * $itemsPerPage;
        $listadminPromotion = $this->admininModel->get_Promotion();
        $data['listadminPromotion'] = array_slice($listadminPromotion, $offset, $itemsPerPage);
        if ($listadminPromotion) {
            $totalProducts = $this->admininModel->count_Promotion();
            $totalPages = ceil($totalProducts / $itemsPerPage);
            $data['totalPages'] = $totalPages;
        }
        return $this->loadView('admin.list_promotion', $data);
    }
    // xóa khuyến mãi
    public function delete_Promotion()
    {
        $delPromotion_txtErro = '';
        if (isset($_GET['idpromotion'])) {
            $idPromotion = $_GET['idpromotion'];
        }
        if ($ten_tep_anh = $this->admininModel->del_Promotion($idPromotion)) {
            // Lấy tên tệp ảnh từ thư mục
            if ($ten_tep_anh && file_exists('./img/promotion/' . $ten_tep_anh)) {
                if (unlink('./img/promotion/' . $ten_tep_anh)) {
                    $delPromotion_txtErro = 'Xóa thành công!';
                } else {
                    $delPromotion_txtErro = 'Không thể xóa tệp!';
                }
            } else {
                $delPromotion_txtErro = 'Không thể tìm thấy hoặc tệp không tồn tại!';
            }
        } else {
            $delPromotion_txtErro = 'Không thể xóa sản phẩm!';
        }
        return $this->loadView('admin.list_promotion', [
            'delPromotion_txtErro' => $delPromotion_txtErro,
        ]);
    }
    // cập nhật khuyến mãi
    public function update_Promotion()
    {
        if (isset($_GET['idpromotion'])) {
            $idPromotion = $_GET['idpromotion'];
        }
        $PromotionInfor = $this->admininModel->get_Promotionbyid($idPromotion);
        $updatePromotion_txtErro = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_promotion'])) {
            // Tiến hành cập nhật thông tin sản phẩm dựa trên dữ liệu từ biểu mẫu
            $sua_tieudekhuyenmai = $_POST['update_tieudekhuyenmai'];
            $sua_noidungtomtatkhuyenmai = $_POST['update_ndttkhuyenmai'];
            $sua_noidungkhuyenmai = $_POST['update_noidungkhuyenmai'];
            $sua_hinhSanPhamkhuyenmai = $_FILES['update_hinhkhuyenmai']['name'];
            if (isset($_FILES['update_hinhkhuyenmai']) && $_FILES['update_hinhkhuyenmai']['error'] === 0) {
                if (file_exists('./img/promotion/' . $PromotionInfor['hinh_khuyenmai'])) {
                    unlink('./img/promotion/' . $PromotionInfor['hinh_khuyenmai']);
                }
                move_uploaded_file($_FILES['update_hinhkhuyenmai']['tmp_name'], './img/promotion/' . $_FILES['update_hinhkhuyenmai']['name']);
            } else {
                $sua_hinhSanPhamkhuyenmai = $_POST['khong_update_hinhkhuyenmai'];
            }
            // Tiến hành cập nhật sản phẩm trong CSDL
            if ($this->admininModel->update_Promotion($idPromotion, $sua_tieudekhuyenmai, $sua_hinhSanPhamkhuyenmai, $sua_noidungkhuyenmai, $sua_noidungtomtatkhuyenmai)) {
                // Sản phẩm đã được cập nhật thành công
                $updatePromotion_txtErro = "Cập nhật khuyến mãi thành công!";
            } else {
                // Xảy ra lỗi trong quá trình cập nhật sản phẩm
                $updatePromotion_txtErro = "Cập nhật khuyến mãi không thành công!";
            }
        }
        return $this->loadView('admin.update_promotion', [
            'PromotionInfor' => $PromotionInfor,
            'updatePromotion_txtErro' => $updatePromotion_txtErro
        ]);
    }
    // Đăng xuất
    public function LogoutAdmin()
    {
        session_unset();
        session_destroy();
        $logoutadmin_txtErro = 'window.location.href = "index.php";';
        return $this->loadview('admin.admin_infor', [
            'logoutadmin_txtErro' => $logoutadmin_txtErro
        ]);
    }
}
