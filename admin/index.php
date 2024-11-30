<?php 
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminCategoryController.php'; 
require_once './controllers/AdminBookController.php';

// Require toàn bộ file Models
require_once './models/AdminBook.php'; 
require_once './models/AdminCategory.php'; 

if (!isset($_SESSION['user'])) {
    header("Location: /duan1/?act=login");
    exit;
} elseif ($_SESSION['user']['chuc_vu_id'] != 1) {
    header("Location: /duan1/?act=home");
    exit;
}
// Route
$act = $_GET['act'] ?? '/'; // giống switchcase

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route
    // Danh mục
    '/' => (new AdminCategoryController())->danhSachDanhMuc(),
    'danh-muc'=>(new AdminCategoryController())->danhSachDanhMuc(),
    'form-them-danh-muc'=>(new AdminCategoryController())->formAddDanhMuc(),
    'them-danh-muc'=>(new AdminCategoryController())->postAddDanhMuc(),
    'form-sua-danh-muc'=>(new AdminCategoryController())->formEditDanhMuc(),
    'sua-danh-muc'=>(new AdminCategoryController())->postEditDanhMuc(),
    'xoa-danh-muc'=>(new AdminCategoryController())->deleteDanhMuc(),

    
    //sản phẩm
    'san-pham'=>(new AdminBookController())->danhSachSanPham(),
    'form-them-san-pham'=>(new AdminBookController())->formAddSanPham(),
    'them-san-pham'=>(new AdminBookController())->postAddSanPham(),
    // 'form-sua-san-pham'=>(new AdminBookController())->formEditSanPham(),
    // 'sua-san-pham'=>(new AdminBookController())->postEditSanPham(),
    // 'xoa-san-pham'=>(new AdminBookController())->deleteSanPham(),
};
