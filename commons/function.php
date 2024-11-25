<?php

// Kết nối CSDL qua PDO
function connectDB() {
<<<<<<< HEAD
=======
    // Kết nối CSDL
>>>>>>> 74c038dc22b6e174e5f2e93d170f52b4e17f6751
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
<<<<<<< HEAD
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
=======

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
>>>>>>> 74c038dc22b6e174e5f2e93d170f52b4e17f6751
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

<<<<<<< HEAD
// Kiểm tra tài khoản đã tồn tại
function isAccountExists($email, $so_dien_thoai) {
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM taikhoans WHERE email = :email OR so_dien_thoai = :so_dien_thoai");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

// Thêm tài khoản vào CSDL
function addAccount($ho_ten, $anh_dai_dien, $email, $so_dien_thoai, $mat_khau) {
    // Kết nối đến cơ sở dữ liệu
    $conn = connectDB();

    // Kiểm tra xem email đã tồn tại chưa
    $stmt = $conn->prepare("SELECT * FROM taikhoans WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Nếu email đã tồn tại, trả về false hoặc thông báo lỗi
        return false; // Hoặc bạn có thể trả về thông báo lỗi ở đây
    }

    // Nếu email chưa tồn tại, tiếp tục thêm tài khoản mới
    $stmt = $conn->prepare("INSERT INTO taikhoans (ho_ten, anh_dai_dien, email, so_dien_thoai, mat_khau) 
                            VALUES (:ho_ten, :anh_dai_dien, :email, :so_dien_thoai, :mat_khau)");

    // Bind các tham số
    $stmt->bindParam(':ho_ten', $ho_ten);
    $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
    $stmt->bindParam(':mat_khau', $mat_khau);

    // Thực thi câu lệnh
    return $stmt->execute();
}

=======
// Thêm mới dữ liệu
// Xóa file
// Debug
>>>>>>> 74c038dc22b6e174e5f2e93d170f52b4e17f6751
