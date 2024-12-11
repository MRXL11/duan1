<?php class AdminOrderStatus
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Lấy tất cả đơn hàng
    // Lấy danh sách tất cả đơn hàng
    public function getAllStatuses()
    {
        $sql = "SELECT * FROM trangthaidonhangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
