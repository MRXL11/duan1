<?php
require_once PATH_ROOT . 'commons/function.php';

class AuthController {
    // Đăng ký tài khoản
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $mat_khau = $_POST['mat_khau'];
            $anh_dai_dien = $_FILES['anh_dai_dien']['name'] ?? '';
    
            // Kiểm tra nếu email hoặc số điện thoại đã tồn tại trong cơ sở dữ liệu
            if (isAccountExists($email, $so_dien_thoai)) {
                $error = "Email hoặc số điện thoại đã tồn tại!";
            } else {
                // Nếu không tồn tại thì tiếp tục đăng ký
                $hashedPassword = password_hash($mat_khau, PASSWORD_DEFAULT); // Mã hóa mật khẩu
    
                if (addAccount($ho_ten, $anh_dai_dien, $email, $so_dien_thoai, $hashedPassword)) {
                    // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
                    header("Location: " . BASE_URL . "login.php");
                    exit;
                } else {
                    $error = "Đăng ký thất bại! Vui lòng thử lại.";
                }
            }
        }
        // Hiển thị form đăng ký với thông báo lỗi (nếu có)
        require_once PATH_ROOT . 'views/register.php';
        header("Location: " . BASE_URL . "login.php");
exit;

    }
    
    
    

    // Đăng nhập
    public function login() {
        $error = ""; // Biến lưu lỗi nếu có
        $email = ""; // Lưu email để giữ lại khi nhập sai thông tin
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
    
            // Kết nối CSDL
            $conn = connectDB();
            $stmt = $conn->prepare("SELECT * FROM taikhoans WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            $user = $stmt->fetch();
    
            // Kiểm tra email và mật khẩu
            if ($user && password_verify($password, $user['mat_khau'])) {
                // Lưu thông tin user vào session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'ho_ten' => $user['ho_ten'],
                    'email' => $user['email'],
                    'chuc_vu_id' => $user['chuc_vu_id']
                ];
    
                // Chuyển hướng đến trang chính
                header("Location: " . BASE_URL . "index.php?controller=home&action=index");
                exit;
            } else {
                // Gán thông báo lỗi
                $error = "Email hoặc mật khẩu không đúng!";
            }
        }
    
        // Hiển thị form đăng nhập và thông báo lỗi
        require_once PATH_ROOT . 'views/login.php';
    }
    

    // Đăng xuất
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "login.php");
        exit;
    }
}
