<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS
// ĐƯờng dẫn client
define('BASE_URL'       , 'http://localhost:3000/duan1/');

//đường dẫn vào phầm admin
define('BASE_URL_ADMIN'       , 'http://localhost:3000/duan1/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'database_duan1');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
