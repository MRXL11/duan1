<<<<<<< HEAD
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bắt đầu session
session_start();

// Tự động nạp các file cần thiết
require_once 'commons/env.php';
require_once 'commons/function.php';

// Điều hướng dựa trên tham số "controller" và "action"
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Đường dẫn file controller
$controllerPath = 'controllers/' . ucfirst($controller) . 'Controller.php';

// Kiểm tra nếu controller tồn tại
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerClass = ucfirst($controller) . 'Controller';

    // Kiểm tra nếu class controller tồn tại
    if (class_exists($controllerClass)) {
        $controllerObj = new $controllerClass();

        // Kiểm tra nếu phương thức (action) tồn tại
        if (method_exists($controllerObj, $action)) {
            $controllerObj->$action();
        } else {
            echo "Action '$action' không tồn tại!";
        }
    } else {
        echo "Controller '$controllerClass' không tồn tại!";
    }
} else {
    echo "File '$controllerPath' không tồn tại!";
}


$controller = $_GET['controller'] ?? 'product';
$action = $_GET['action'] ?? 'list';

require_once "controllers/" . ucfirst($controller) . "Controller.php";
$class = ucfirst($controller) . "Controller";

if (method_exists($class, $action)) {
    $class::$action();
} else {
    echo "404 - Không tìm thấy trang.";
}
?>
=======
<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Sach.php';

// Route
$act = $_GET['act'] ?? '/'; // giống switchcase

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route
    // Trang chủ
    '/' => (new HomeController())->home(),
    'trangchu'=> (new HomeController())->trangChu(),  // BASE_URL/?act='trangchu'

    'danh_sach_sach'=>(new HomeController())->danhSachSach(),
};
>>>>>>> 74c038dc22b6e174e5f2e93d170f52b4e17f6751
