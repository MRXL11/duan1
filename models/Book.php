<?php
class Book {
    public $conn; // phương thức class sản phẩm

    public function __construct()
    {
        $this->conn= connectDB();
    }

    // Lấy danh sách Sách
    public  function getAllBook(){
        try {
            $sql = 'SELECT sanphams.*, danhmucs.ten_danh_muc
            FROM sanphams INNER JOIN danhmucs ON sanphams.id_danh_muc = danhmucs.id';
            $stmt= $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }
        catch(Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }
    // Trong file Book.php (Model)
public function getTop3HighestPrice() {
    try {
        $sql = 'SELECT sanphams.*, danhmucs.ten_danh_muc
                FROM sanphams 
                INNER JOIN danhmucs ON sanphams.id_danh_muc = danhmucs.id
                ORDER BY sanphams.gia DESC
                LIMIT 3';
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}


public function searchBooks($search) {
    try {
        $sql = "SELECT sanphams.*, danhmucs.ten_danh_muc
                FROM sanphams
                INNER JOIN danhmucs ON sanphams.id_danh_muc = danhmucs.id
                WHERE sanphams.ten LIKE :search 
                OR sanphams.tac_gia LIKE :search
                OR danhmucs.ten_danh_muc LIKE :search";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%');
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}


public function getBooksByCategory($category_id) {
    try {
        $sql = 'SELECT sanphams.*, danhmucs.ten_danh_muc
                FROM sanphams 
                INNER JOIN danhmucs ON sanphams.id_danh_muc = danhmucs.id
                WHERE sanphams.id_danh_muc = :category_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

}