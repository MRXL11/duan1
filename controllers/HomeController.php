<?php
require_once 'commons/function.php';

class HomeController {
    public static function index() {
        checkLogin();
        $user = $_SESSION['user'];
        echo "<h1>Chào mừng, " . htmlspecialchars($user['ho_ten']) . "!</h1>";
        echo "<a href='?controller=auth&action=logout'>Đăng xuất</a>";
    }
}
?>
