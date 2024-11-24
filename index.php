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
