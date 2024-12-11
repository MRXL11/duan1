<?php class AdminOrder
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Lấy tất cả đơn hàng
    // Lấy danh sách tất cả đơn hàng
    public function getAllOrders()
    {
        $sql = "SELECT donhangs.*, trangthaidonhangs.ten_trang_thai AS trang_thai_ten
                FROM donhangs
                JOIN trangthaidonhangs ON donhangs.trang_thai_id = trangthaidonhangs.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin chi tiết đơn hàng theo ID
    public function getOrderById($id)
    {
        $sql = "SELECT donhangs.*, trangthaidonhangs.ten_trang_thai AS trang_thai_ten 
                FROM donhangs 
                LEFT JOIN trangthaidonhangs ON donhangs.trang_thai_id = trangthaidonhangs.id 
                WHERE donhangs.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($id_order, $trang_thai_id)
    {
        $sql = "UPDATE donhangs SET trang_thai_id = :trang_thai_id WHERE id = :id_order";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':trang_thai_id', $trang_thai_id, PDO::PARAM_INT);
        $stmt->bindParam(':id_order', $id_order, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getOrdersByDateRange($start_date, $end_date)
{
    $sql = "SELECT donhangs.*, trangthaidonhangs.ten AS ten_trang_thai 
            FROM donhangs 
            JOIN trangthaidonhangs ON donhangs.trang_thai_id = trangthaidonhangs.id
            WHERE ngay_dat_hang BETWEEN :start_date AND :end_date";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
