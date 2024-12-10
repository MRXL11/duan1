<?php
class Cart
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addToCart($tai_khoan_id, $san_pham_id, $so_luong, $don_gia, $thanh_tien)
    {
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $sql = "SELECT * FROM giohangs WHERE tai_khoan_id = :tai_khoan_id AND san_pham_id = :san_pham_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([ ':tai_khoan_id' => $tai_khoan_id, ':san_pham_id' => $san_pham_id ]);
        $existingItem = $stmt->fetch();
    
        if ($existingItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng và thành tiền
            $newQuantity = $existingItem['so_luong'] + $so_luong;
            $newThanhTien = $newQuantity * $don_gia;
    
            $sql = "UPDATE giohangs SET so_luong = :so_luong, thanh_tien = :thanh_tien 
                    WHERE tai_khoan_id = :tai_khoan_id AND san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':so_luong' => $newQuantity,
                ':thanh_tien' => $newThanhTien,
                ':tai_khoan_id' => $tai_khoan_id,
                ':san_pham_id' => $san_pham_id
            ]);
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ
            $sql = "INSERT INTO giohangs (tai_khoan_id, san_pham_id, so_luong, don_gia, thanh_tien) 
                    VALUES (:tai_khoan_id, :san_pham_id, :so_luong, :don_gia, :thanh_tien)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,
                ':don_gia' => $don_gia,
                ':thanh_tien' => $thanh_tien
            ]);
        }
    }
    

    private function getDonGia($san_pham_id)
    {
        $sql = "SELECT don_gia FROM sanphams WHERE id = :san_pham_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([ ':san_pham_id' => $san_pham_id ]);
        $result = $stmt->fetch();
        return $result['don_gia'] ?? 0;
    }
    public function getCartItemById($san_pham_id, $tai_khoan_id)
{
    $sql = "
        SELECT 
            gh.san_pham_id, 
            gh.so_luong, 
            gh.don_gia, 
            gh.thanh_tien, 
            sp.ten, 
            sp.hinh_anh
        FROM 
            giohangs gh
        JOIN 
            sanphams sp ON gh.san_pham_id = sp.id
        WHERE 
            gh.san_pham_id = :san_pham_id 
            AND gh.tai_khoan_id = :tai_khoan_id
    ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':san_pham_id' => $san_pham_id,
        ':tai_khoan_id' => $tai_khoan_id,
    ]);
    return $stmt->fetch();
}
public function getCartByUser($tai_khoan_id)
{
    $sql = "
        SELECT 
            gh.san_pham_id, 
            gh.so_luong, 
            gh.don_gia, 
            gh.thanh_tien, 
            sp.ten, 
            sp.hinh_anh
        FROM 
            giohangs gh
        JOIN 
            sanphams sp ON gh.san_pham_id = sp.id
        WHERE 
            gh.tai_khoan_id = :tai_khoan_id
    ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([ ':tai_khoan_id' => $tai_khoan_id ]);
    return $stmt->fetchAll();
}

    public function updateQuantity($tai_khoan_id, $san_pham_id, $so_luong)
    {
        $don_gia = $this->getDonGia($san_pham_id);
        $thanh_tien = $so_luong * $don_gia;

        $sql = "UPDATE giohangs SET so_luong = :so_luong, thanh_tien = :thanh_tien 
                WHERE tai_khoan_id = :tai_khoan_id AND san_pham_id = :san_pham_id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([ ':so_luong' => $so_luong, ':thanh_tien' => $thanh_tien, ':tai_khoan_id' => $tai_khoan_id, ':san_pham_id' => $san_pham_id ]);
    }

    public function deleteFromCart($tai_khoan_id, $san_pham_id)
    {
        try {
            $sql = "DELETE FROM giohangs WHERE tai_khoan_id = :tai_khoan_id AND san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([ ':tai_khoan_id' => $tai_khoan_id, ':san_pham_id' => $san_pham_id ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
