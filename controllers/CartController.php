<?php
require_once './models/Book.php';

class CartController
{
    public $modelBook;

    public function __construct()
    {
        $this->modelBook = new Book(); // Khởi tạo Model Book để lấy thông tin sản phẩm
    }
    public function viewCart()
    {
        // Tải view giỏ hàng
        include_once 'views/cart.php';
    }

    // Kiểm tra nếu có sản phẩm thêm vào giỏ
    public function addToCart()
    {
        // Kiểm tra nếu có sản phẩm thêm vào giỏ
        if (isset($_POST['addtocart']) && $_POST['addtocart']) {
            // Lấy thông tin sản phẩm từ form
            $id = $_POST['id'] ?? null;
            $ten = $_POST['ten'] ?? 'Sản phẩm không tên'; // Gán giá trị mặc định nếu thiếu
            $gia = $_POST['gia'] ?? 0; // Gán giá trị mặc định nếu thiếu
            $hinh_anh = $_POST['hinh_anh'] ?? ''; // Gán giá trị mặc định nếu thiếu

            // Kiểm tra nếu thiếu thông tin
            if (!$id || !$ten || !$gia || !$hinh_anh) {
                // Nếu thiếu thông tin, không thực hiện thêm vào giỏ
                echo 'Thông tin sản phẩm không đầy đủ!';
                exit;
            }

            // Kiểm tra sản phẩm đã có trong giỏ chưa
            $found = false;
            foreach ($_SESSION['mycart'] as &$cartItem) {
                if ($cartItem['id'] == $id) {
                    // Cập nhật số lượng và thành tiền nếu đã có sản phẩm trong giỏ
                    $cartItem['so_luong'] += 1;
                    $cartItem['thanh_tien'] = $cartItem['so_luong'] * $cartItem['gia'];
                    $found = true;
                    break;
                }
            }

            // Nếu chưa có sản phẩm, thêm sản phẩm mới vào giỏ
            if (!$found) {
                $so_luong = 1; // Mặc định số lượng = 1
                $thanh_tien = $so_luong * $gia;
                $_SESSION['mycart'][] = [
                    'id' => $id,
                    'ten' => $ten,
                    'gia' => $gia,
                    'hinh_anh' => $hinh_anh,
                    'so_luong' => $so_luong,
                    'thanh_tien' => $thanh_tien,
                ];
            }
        }

        // Chuyển hướng về trang giỏ hàng
        header('Location: ?act=cart');
        exit();
    }
   // Xóa sản phẩm theo id
public function deleteCart()
{
    // Kiểm tra nếu có 'id', xóa sản phẩm tại vị trí đó
    if (isset($_GET['id'])) {
        unset($_SESSION['mycart'][$_GET['id']]);
        // Điều chỉnh lại chỉ mục của giỏ hàng
        $_SESSION['mycart'] = array_values($_SESSION['mycart']);
    }

    // Sau khi xóa, chuyển hướng lại trang giỏ hàng
    header('Location: ?act=cart');
    exit();
}

// Xóa các sản phẩm đã chọn
public function deleteSelected()
{
    if (isset($_POST['delete_selected'])) {
        // Lấy các sản phẩm đã chọn để xóa
        $selectedItems = $_POST['selected_items'] ?? [];

        foreach ($selectedItems as $id) {
            unset($_SESSION['mycart'][$id]);
        }

        // Điều chỉnh lại chỉ mục của giỏ hàng
        $_SESSION['mycart'] = array_values($_SESSION['mycart']);
    }

    // Sau khi xóa, chuyển hướng lại trang giỏ hàng
    header('Location: ?act=cart');
    exit();
}

    
}
