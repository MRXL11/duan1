<?php
class AdminBook
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBook()
    {
        try {
            $sql = 'SELECT sanphams.*, danhmucs.ten_danh_muc
            FROM sanphams INNER JOIN danhmucs ON sanphams.id_danh_muc = danhmucs.id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
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
}
