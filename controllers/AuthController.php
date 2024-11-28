<?php
require_once 'models/User.php';

class AuthController {
    // Xử lý đăng ký
    public static function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hoTen = $_POST['ho_ten'];
            $email = $_POST['email'];
            $soDienThoai = $_POST['so_dien_thoai'];
            $matKhau = $_POST['mat_khau'];
            $confirmMatKhau = $_POST['confirm_mat_khau'];

            if ($matKhau !== $confirmMatKhau) {
                die("Mật khẩu xác nhận không khớp!");
            }

            $result = User::register($hoTen, $email, $soDienThoai, $matKhau);
            if ($result === true) {
                header("Location: ?controller=auth&action=login");
                exit;
            } else {
                echo $result; // Hiển thị lỗi (email trùng lặp hoặc lỗi khác)
            }
        }

        require 'views/register.php';
    }

    // Xử lý đăng nhập
    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $matKhau = $_POST['mat_khau'];

            $user = User::authenticate($email, $matKhau);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: ?controller=home");
                exit;
            } else {
                die("Email hoặc mật khẩu không đúng!");
            }
        }

        require 'views/login.php';
    }

    // Xử lý đăng xuất
    public static function logout() {
        session_start();
        session_destroy();
        header("Location: ?controller=auth&action=login");
    }
}
?>
