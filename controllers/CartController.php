<?php
require_once './models/Book.php';
require_once './models/Cart.php';

class CartController
{
    public $modelBook;
    public $cartModel;

    public function __construct()
    {
        $this->modelBook = new Book(); 
        $this->cartModel = new Cart(); 
    }

    public function viewCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['delete_item'])) {
            $san_pham_id = $_POST['san_pham_id'] ?? null;

            if ($san_pham_id) {
                $tai_khoan_id = $_SESSION['user_id'] ?? 0;
                $this->cartModel->deleteFromCart($tai_khoan_id, $san_pham_id);
            }

            header('Location: ?act=cart');
            exit();
        }

        $tai_khoan_id = $_SESSION['user_id'] ?? 0;
        $cartItems = $this->cartModel->getCartByUser($tai_khoan_id);
        include './views/cart.php';
    }
    public function postAddToCart()
    {
        if (isset($_POST['addtocart']) && $_POST['addtocart']) {
            // Lấy thông tin từ form
            $san_pham_id = $_POST['san_pham_id'] ?? null;
            $ten = $_POST['ten'] ?? 'Sản phẩm không tên';
            $gia = $_POST['don_gia'] ?? 0;
            $hinh_anh = $_POST['hinh_anh'] ?? '';
            $so_luong = $_POST['so_luong'] ?? 1;

            // Kiểm tra các thông tin cần thiết
            if (!$san_pham_id || !$ten || !$gia || !$hinh_anh || !$so_luong) {
                echo 'Thông tin sản phẩm không đầy đủ!';
                exit;
            }

            // Giả sử bạn lưu tài khoản người dùng trong session
            $tai_khoan_id = $_SESSION['user_id'];

            // Gọi phương thức addToCart từ model
            $cartModel = new Cart();
            $thanh_tien = $so_luong * $gia;  // Tính thành tiền
            $cartModel->addToCart($tai_khoan_id, $san_pham_id, $so_luong, $gia, $thanh_tien, $hinh_anh);

            // Chuyển hướng về giỏ hàng
            header('Location: ?act=cart');
            exit();
        }
    }

    public function deleteSelected()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['delete_selected'])) {
            $selectedItems = $_POST['selected_items'] ?? [];

            if (!empty($selectedItems) && isset($_SESSION['user_id'])) {
                foreach ($selectedItems as $san_pham_id) {
                    $this->cartModel->deleteFromCart($_SESSION['user_id'], $san_pham_id);
                }
            }

            header('Location: ?act=cart');
            exit();
        }
    }

    public function postOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $selectedItems = $_POST['selected_items'] ?? []; // Lấy danh sách ID sản phẩm từ checkbox
    
            if (!empty($selectedItems)) {
                // Lấy ID tài khoản (nếu cần thiết)
                $tai_khoan_id = $_SESSION['user']['id'] ?? null;
    
                // Kiểm tra session user
                if (!$tai_khoan_id) {
                    echo "<script>alert('Vui lòng đăng nhập để tiếp tục!'); window.location.href = '?act=login';</script>";
                    exit();
                }
    
                // Khởi tạo giỏ hàng đã chọn
                $_SESSION['selected_cart'] = [];
    
                // Lấy thông tin sản phẩm từ database dựa trên ID sản phẩm và tài khoản
                foreach ($selectedItems as $san_pham_id) {
                    $item = $this->cartModel->getCartItemById($san_pham_id, $tai_khoan_id);
    
                    if ($item) {
                        $_SESSION['selected_cart'][] = $item;
                    }
                }
    
                // Kiểm tra nếu không có sản phẩm nào được thêm
                if (empty($_SESSION['selected_cart'])) {
                    echo "<script>alert('Không tìm thấy sản phẩm nào trong giỏ hàng!'); window.location.href = '?act=cart';</script>";
                    exit();
                }
    
                // Kiểm tra lại dữ liệu trong session
                header('Location: ?act=order');
                exit(); 
            } 
            else {
                echo "<script>alert('Vui lòng chọn ít nhất một sản phẩm để mua!'); window.location.href = '?act=cart';</script>";
                exit();
            }
        }
    }
    
    
}
