<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/BookController.php';

// Require toàn bộ file Models
require_once './models/Book.php';
require_once './models/Category.php';

// Route
$act = $_GET['act'] ?? '/'; // giống switchcase
// var_dump($_GET['act'] );die();
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route
    // Trang chủ
    '/' => (new HomeController())->home(),
    'home'  => (new HomeController())->home(), 

    'bookDetail' => (new BookController())->bookDetail(),
};