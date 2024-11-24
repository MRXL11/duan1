<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL', 'http://localhost/duan1/duan1-develop/');
//đường dẫn vào phầm admin
define('BASE_URL_ADMIN', 'http://localhost/duan1/duan1-develop/admin');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'database_duan1');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
