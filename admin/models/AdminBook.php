<?php
class AdminBook
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBooks() {
        // Truy vấn với JOIN để lấy tên danh mục từ bảng danhmucs
        $query = "
            SELECT sanphams.*, danhmucs.ten_danh_muc
            FROM sanphams
            LEFT JOIN danhmucs ON sanphams.id_danh_muc = danhmucs.id
        ";
        
        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        // Trả về tất cả các kết quả dưới dạng mảng kết hợp
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBookById($id)
    {
        // Sử dụng $this->conn thay vì $pdo
        $query = "SELECT * FROM sanphams WHERE id = ?";
        $stmt = $this->conn->prepare($query);  // Chú ý dùng $this->conn thay vì $pdo
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function insertBook($ten,$tac_gia, $gia, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO  sanphams (ten,tac_gia,gia,so_luong,ngay_nhap,id_danh_muc,trang_thai,mo_ta,hinh_anh) 
            VALUES (:ten,:tac_gia,:gia,:so_luong,:ngay_nhap,:id_danh_muc,:trang_thai,:mo_ta,:hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten' => $ten,
                ':tac_gia' => $tac_gia,
                ':gia' => $gia,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':id_danh_muc' => $id_danh_muc,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    
    // Hàm xóa sách
    public function deleteBook($id) {
        // Kiểm tra xem sản phẩm có tồn tại không
        $query = "SELECT * FROM sanphams WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch();
    
        if ($product) {
            // Nếu sản phẩm tồn tại, tiến hành xóa
            $deleteQuery = "DELETE FROM sanphams WHERE id = :id";
            $deleteStmt = $this->conn->prepare($deleteQuery);
            $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $deleteStmt->execute();
        } else {
            // Nếu sản phẩm không tồn tại
            echo "Sản phẩm không tồn tại";
        }
    }
    
    public function updateBook($id, $ten, $gia, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $mo_ta, $hinh_anh) {
        $sql = "UPDATE sanphams SET 
                    ten = :ten, 
                    gia = :gia, 
                    so_luong = :so_luong, 
                    ngay_nhap = :ngay_nhap, 
                    id_danh_muc = :id_danh_muc, 
                    trang_thai = :trang_thai, 
                    mo_ta = :mo_ta, 
                    hinh_anh = :hinh_anh 
                WHERE id = :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
        $stmt->bindParam(':gia', $gia, PDO::PARAM_INT);
        $stmt->bindParam(':so_luong', $so_luong, PDO::PARAM_INT);
        $stmt->bindParam(':ngay_nhap', $ngay_nhap, PDO::PARAM_STR);
        $stmt->bindParam(':id_danh_muc', $id_danh_muc, PDO::PARAM_INT);
        $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);
        $stmt->bindParam(':mo_ta', $mo_ta, PDO::PARAM_STR);
        $stmt->bindParam(':hinh_anh', $hinh_anh, PDO::PARAM_STR); // Nếu có ảnh mới
    
        $stmt->execute();
    }
    
    // Hàm lấy tất cả danh mục sách
    function getCategories() {
        global $pdo;
        $query = "SELECT * FROM danhmucs";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
