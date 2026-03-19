<?php
class CartController extends baseController
{
    private $cartModel;
    private $Order_cartModel;

    public function __construct()
    {
        $this->loadModel('cartModel');
        $this->cartModel = new Cart();
        $this->Order_cartModel = new Cart();
    }
    // Trong cartController.php
    public function index()
    {
        $cart_txtErro = '';
        if (!isset($_SESSION['user_data'])) {
            // Trường hợp là admin
            $cart_txtErro = 'Vui lòng đăng nhập để thực hiện chức năng này';
        }
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            // Nếu giỏ hàng chưa được khởi tạo hoặc không phải là một mảng, thì khởi tạo giỏ hàng rỗng
            $_SESSION['cart'] = [];
        }
        $perPage = 5; // Số lượng sản phẩm trên mỗi trang
        $currentPage = isset($_GET['page_number']) ? $_GET['page_number'] : 1; // Trang hiện tại
        $totalProducts = count($_SESSION['cart']); // Tổng số sản phẩm trong giỏ hàng

        $offset = ($currentPage - 1) * $perPage; // Vị trí bắt đầu lấy sản phẩm
        $totalPages = ceil($totalProducts / $perPage); // Tính tổng số trang
        // Lấy danh sách sản phẩm cho trang hiện tại
        $products = array_slice($_SESSION['cart'], $offset, $perPage);
        // order
        $cartOrder_txtErro = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['giohang_payment-btn'])) {
            $maNguoiDung = $_SESSION['user_data']['manguoidung'];
            $diachi = $_POST['dia-chi'];
            $sodienthoai = $_POST['so-dien-thoai'];
            $ngayDat = date('Y-m-d H:i:s');
            $tonggia = 0;
            $iddonghang = $this->Order_cartModel->insertOrder_Cart($maNguoiDung, $ngayDat, $diachi, $sodienthoai);
            if ($iddonghang) {
                $orderSuccess = true;
                foreach ($_SESSION['cart'] as $idSanPham => $item) {
                    $gia = $item['gia'];
                    $soluong = $item['qty'];
                    $tonggiaSanPham = $gia * $soluong; // Tính tổng giá cho từng sản phẩm
                    if (!$this->Order_cartModel->insertOrderDetail_Cart($iddonghang, $idSanPham, $gia, $soluong, $tonggiaSanPham)) {
                        $orderSuccess = false;
                        break;
                    }
                    $tonggia += $tonggiaSanPham; // Cộng tổng giá của sản phẩm vào tổng giá của đơn hàng
                }
                if ($orderSuccess) {
                    $cartOrder_txtErro = 'Đặt hàng thành công';
                    $_SESSION['cart'] = []; // Xóa giỏ hàng sau khi đặt hàng thành công
                } else {
                    $cartOrder_txtErro = 'Đặt hàng thất bại';
                }
            } else {
                $cartOrder_txtErro = 'Đặt hàng thất bại';
            }
        }
        return $this->loadView('cart.cart', [
            'products' => $products,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'cart_txtErro' => $cart_txtErro,
            'cartOrder_txtErro' => $cartOrder_txtErro
        ]);
    }
    public function addcart()
    {
        if (isset($_GET['idproduct'])) {
            $id = $_GET['idproduct'];
            $product = $this->cartModel->getProductById($id);
            if ($product) {
                if (!isset($_SESSION['cart'][$id])) {
                    $product['qty'] = 1;
                    $_SESSION['cart'][$id] = $product;
                } else {
                    $_SESSION['cart'][$id]['qty'] += 1;
                }
            }
        }
        echo "<script>window.location.href='?controller=cart'</script>";
    }
    public function updatecart()
    {
        if (isset($_POST['idproduct']) && isset($_POST['quantity'])) {
            $id = $_POST['idproduct'];
            $quantity = intval($_POST['quantity']);
            if (isset($_SESSION['cart'][$id])) {
                if ($quantity > 0) {
                    $_SESSION['cart'][$id]['qty'] = $quantity;
                } else {
                    unset($_SESSION['cart'][$id]); // Remove item if quantity is zero
                }
            }
        }
        echo "<script>window.location.href='?controller=cart'</script>";
    }
    public function removeFromCart()
    {
        if (isset($_GET['idproduct'])) {
            $id = $_GET['idproduct'];
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
        }
        echo "<script>window.location.href='?controller=cart'</script>";
    }
    // public function delete() {
    //     if (isset($_GET['idproduct'])) {
    //         $idProduct = $_GET['idproduct'];
    //         unset($_SESSION['cart'][$idproduct]);
    //     }
    //     echo "<script>window.location.href='?controller=cart'</script>";
    // }

    // // public function deleteAll() {
    // //     unset($_SESSION['cart']);
    // //     echo "<script>window.location.href='?controller=cart'</script>";
    // // }

    // // public function update() {
    // //     if (isset($_POST['qty'])) {
    // //         foreach ($_POST['qty'] as $id => $qty) {
    // //             if (isset($_SESSION['cart'][$id])) {
    // //                 $_SESSION['cart'][$id]['qty'] = $qty;
    // //             }
    // //         }
    // //     }
    // //     echo "<script>window.location.href='?controller=cart'</script>";
    // // }
}
