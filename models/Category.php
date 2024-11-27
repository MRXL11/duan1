<?php

class Category{
    public $conn;
    public function __construct(){
        $this->conn= connectDB();
    }
    public function getAllCategory(){
        try {
            // Câu truy vấn để lấy tất cả các danh mục
            $sql = 'SELECT id, ten_danh_muc, mo_ta FROM danhmucs';
            // Chuẩn bị câu truy vấn
            $stmt = $this->conn->prepare($sql);
    
            // Thực thi câu truy vấn
            $stmt->execute();
    
            // Trả về tất cả kết quả
            return $stmt->fetchAll();
        }
        catch(Exception $e) {
            // Xử lý lỗi nếu có
            echo "Lỗi: ". $e->getMessage();
        }
    }
    
}

?>