<?php

// Kết nối cơ sở dữ liệu qua PDO
function connectDB() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8";
        $conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

        // Thiết lập chế độ bắt lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Thiết lập chế độ trả kết quả dạng associative array
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
    }
}

// Ngắt kết nối cơ sở dữ liệu (tùy chọn)
function disconnectDB(&$conn) {
    $conn = null; // PDO ngắt kết nối khi gán null
}

// Kiểm tra người dùng đã đăng nhập hay chưa
function checkLogin() {
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: ?controller=auth&action=login");
        exit;
    }
}
?>
