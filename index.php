<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/BookController.php';
require_once './controllers/AuthController.php';
require_once './controllers/CartController.php';
require_once './controllers/OrderController.php';

// Require toàn bộ file Models
require_once './models/Book.php';
require_once './models/Category.php';
require_once './models/User.php';
require_once './models/Cart.php';
require_once './models/Order.php';

session_start();

// Route
$act = $_GET['act'] ?? '/'; // giống switchcase
// Kiểm tra nếu chưa đăng nhập và không ở trang login hoặc register
if (!isset($_SESSION['user']) && !in_array($act, ['login', 'register'])) {
    header("Location: /?act=login");
    exit;
}
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
// var_dump($_GET['act'] );die();
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route
    // Trang chủ
    '/' => (new HomeController())->home(),
    'home'  => (new HomeController())->home(), 

    'bookDetail' => (new BookController())->bookDetail(),

    'login'=> (new AuthController())->login(),
    'register'  => (new AuthController())->register(), 
    'logout'  => (new AuthController())->logout(),    

    // giỏ hàng
    'cart' => (new CartController())->viewCart(),
    'add-to-cart' => (new CartController())->postAddToCart(),

    'deleteSelected' => (new CartController())->deleteSelected(),

    'postOrder' => (new CartController())->postOrder(),

    // Đơn hàng
   'order' => (new OrderController())->viewOrder(),
   'viewOrder' => (new OrderController())->viewOrder(),
  'confirmOrder' => (new OrderController())->confirmOrder(),
   'successOrder' => (new OrderController())->successOrder(),
    'QRcode' => (new OrderController())->QRCode(),
    // Mặc định nếu không khớp
    default => die("404 - Không tìm thấy trang."),
};