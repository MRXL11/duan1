<?php
// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}



function upLoadFile($file,$folderUpdate){
    $pathStorage = $folderUpdate . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT .$pathStorage ;
    if(move_uploaded_file($from,$to)){
        return $pathStorage ;
    }
    return null ;
}
function deleteFile($file){
    $pathDelete = PATH_ROOT . $file ;
    if(file_exists($pathDelete)){
        unlink($pathDelete);
    }
}
// Thêm mới dữ liệu
// Xóa file
// Debug


// xóa sesison sau khi load trang
function deleteSessionError(){
    if(isset($_SESSION['flash'])){
        // hủy sesion sau khi tải trang 
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }
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
