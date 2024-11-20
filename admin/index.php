<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminCategoryController.php'; 
require_once './controllers/AdminBookController.php';

// Require toàn bộ file Models
require_once './controllers/AdminBook.php'; 
require_once './controllers/AdminCategory.php'; 

// Route
$act = $_GET['act'] ?? '/'; // giống switchcase

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route
    // Trang chủ
    
};