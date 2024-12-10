<?php
include_once 'models/Order.php';
class OrderController

{
    public $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }
    public function viewOrder()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Kiểm tra người dùng đã đăng nhập
        $tai_khoan_id = $_SESSION['user']['id'] ?? 0;
        if (!$tai_khoan_id) {
            echo "<script>alert('Vui lòng đăng nhập để đặt hàng!'); window.location.href = '?act=login';</script>";
            exit();
        }
    
        // Lấy thông tin giỏ hàng từ session
        $selected_items = $_SESSION['selected_cart'] ?? [];
    
        // Nếu giỏ hàng trống, không chặn người dùng
        if (empty($selected_items)) {
            // Có thể thông báo cho người dùng, nhưng không chuyển hướng
            $selected_items = []; // Đặt một mảng trống để tiếp tục xử lý
        }
    
        // Gọi model để lấy dữ liệu từ DB (nếu cần xác thực lại sản phẩm)
        $orderModel = new Order();
        $selectedCart = $orderModel->getSelectedItems($tai_khoan_id, array_column($selected_items, 'san_pham_id'));
    
        // Nếu không tìm thấy sản phẩm trong giỏ hàng
        if (empty($selectedCart) && !empty($selected_items)) {
            echo "<script>alert('Một số sản phẩm không khả dụng. Vui lòng kiểm tra lại giỏ hàng!'); window.location.href = '?act=cart';</script>";
            exit();
        }
    
        // Lấy danh sách phương thức thanh toán
        $paymentMethods = $orderModel->getPaymentMethods();
    
        // Gửi dữ liệu đến view
        include './views/order.php';
    }

    public function removeItemFromCart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_GET['act']) && $_GET['act'] === 'remove_item' && isset($_GET['id'])) {
            $id = (int) $_GET['id']; // Lấy ID sản phẩm cần xóa
            unset($_SESSION['selected_cart'][$id]); // Xóa sản phẩm khỏi giỏ hàng
            header('Location: ?act=order'); // Quay lại trang order để hiển thị giỏ hàng đã cập nhật
            exit(); // Dừng script sau khi chuyển hướng
        }
    }


    public function confirmOrder() {
        // Kiểm tra người dùng đã đăng nhập hay chưa
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {
            header('Location: /?act=login');
            exit;
        }
    
        // Kết nối tới Model để lấy thông tin người dùng
        $orderModel = new Order();
        $user = $orderModel->getUserInfoById($userId);
    
        if (!$user) {
            echo "<script>alert('Thông tin người dùng không hợp lệ!'); window.location.href = '?act=order';</script>";
            exit();
        }
    
        // Lấy dữ liệu từ form
        $ten_nguoi_nhan = $_POST['ho_ten'] ?? $user['ho_ten'];  
        $sdt_nguoi_nhan = $_POST['so_dien_thoai'] ?? $user['so_dien_thoai'];  
        $dia_chi_nguoi_nhan = $_POST['dia_chi'] ?? $user['dia_chi'];  
        $payment_method = $_POST['payment_method'] ?? '';  
        $tong_tien = $_POST['tong_tien'] ?? 0;  
        $cart_items = $_SESSION['selected_cart'] ?? [];  
    
        // Kiểm tra phương thức thanh toán hợp lệ
        if (empty($payment_method) || !in_array($payment_method, ['1', '2'])) {
            echo "<script>alert('Phương thức thanh toán không hợp lệ!'); window.location.href = '?act=order';</script>";
            exit();
        }
    
        // Kiểm tra giỏ hàng
        if (empty($cart_items)) {
            echo "<script>alert('Giỏ hàng của bạn đang trống!'); window.location.href = '?act=cart';</script>";
            exit();
        }
    
        try {
            // Tạo đơn hàng
            $order_id = $orderModel->createOrder(
                $userId,
                $ten_nguoi_nhan, 
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $payment_method,
                $tong_tien,
                $cart_items
            );
    
            // Xóa giỏ hàng sau khi tạo đơn hàng thành công
            unset($_SESSION['selected_cart']);
    
            // Hiển thị thông báo và chuyển hướng
            echo "<script>
                    alert('Đặt hàng thành công! Mã đơn hàng của bạn là: $order_id');
                    window.location.href = '/?act=home';
                  </script>";
            exit;
        } catch (Exception $e) {
            // Xử lý lỗi và thông báo
            die("Lỗi: " . $e->getMessage());
        }
    }
    
    


public function successOrder()
{
    $orderId = $_GET['order_id'] ?? null;
    if ($orderId) {
        echo "Đơn hàng của bạn đã được xác nhận. Mã đơn hàng: " . htmlspecialchars($orderId);
    } else {
        echo "Không tìm thấy thông tin đơn hàng.";
    }
}
public function QRCode()
{
    $orderId = $_GET['order_id'] ?? null;
    if ($orderId) {
        echo "Quý khách vui lòng thanh toán qua QR code cho đơn hàng có mã: " . htmlspecialchars($orderId);
        // Thêm logic hiển thị QR code (nếu có)
    } else {
        echo "Không tìm thấy thông tin đơn hàng.";
    }
}
}
