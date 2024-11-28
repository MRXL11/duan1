<?php
require_once 'commons/function.php';

class User {
    // Kiểm tra email đã tồn tại chưa
    public static function emailExists($email) {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM taikhoans WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    // Đăng ký người dùng
    public static function register($hoTen, $email, $soDienThoai, $matKhau) {
        if (self::emailExists($email)) {
            return "Email đã tồn tại!";
        }

        $conn = connectDB();
        $hashedPassword = password_hash($matKhau, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO taikhoans (ho_ten, email, so_dien_thoai, mat_khau, chuc_vu_id, trang_thai) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$hoTen, $email, $soDienThoai, $hashedPassword, 2, 1])) {
            return true;
        } else {
            return "Lỗi khi đăng ký!";
        }
    }

    // Xác thực người dùng
    public static function authenticate($email, $matKhau) {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM taikhoans WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($matKhau, $user['mat_khau'])) {
            return $user;
        }
        return false;
    }
}
?>
