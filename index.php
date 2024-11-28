<?php
require_once 'commons/env.php';

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'auth':
        require_once 'controllers/AuthController.php';
        $authController = new AuthController();
        if (method_exists($authController, $action)) {
            $authController::$action();
        } else {
            echo "404 - Không tìm thấy trang.";
        }
        break;

    case 'home':
        require_once 'controllers/HomeController.php';
        $homeController = new HomeController();
        if (method_exists($homeController, $action)) {
            $homeController::$action();
        } else {
            echo "404 - Không tìm thấy trang.";
        }
        break;

    default:
        echo "404 - Không tìm thấy controller.";
}
?>
