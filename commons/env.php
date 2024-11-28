<?php 

// Base URL dùng trong frontend
define('BASE_URL', 'http://localhost/duan1/duan1-develop/');

// Base URL dùng trong phần admin
define('BASE_URL_ADMIN', 'http://localhost/duan1/duan1-develop/admin');

// Cấu hình database
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'database_duan1');  // Tên database

// Đường dẫn gốc của dự án
define('PATH_ROOT', __DIR__ . '/../');

// Kiểm tra cấu hình bắt buộc
if (!defined('DB_HOST') || !defined('DB_NAME')) {
    die("Cấu hình không đầy đủ. Vui lòng kiểm tra file env.php.");
}
?>
