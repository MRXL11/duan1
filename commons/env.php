<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

<<<<<<< HEAD
define('BASE_URL', 'http://localhost/duan1/duan1-develop/');
//đường dẫn vào phầm admin
define('BASE_URL_ADMIN', 'http://localhost/duan1/duan1-develop/admin');
=======
define('BASE_URL'       , 'http://localhost:3000/duan1/');
//đường dẫn vào phầm admin
define('BASE_URL_ADMIN'       , 'http://localhost:3000/duan1/admin');
>>>>>>> 74c038dc22b6e174e5f2e93d170f52b4e17f6751

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'database_duan1');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
