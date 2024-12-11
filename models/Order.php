<?php
class Order {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function getSelectedItems($tai_khoan_id, $selected_ids)
{
    // Chuyển danh sách ID sản phẩm thành chuỗi để sử dụng trong câu SQL
    $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));
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
            gh.tai_khoan_id = ? AND gh.san_pham_id IN ($placeholders)
    ";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(array_merge([$tai_khoan_id], $selected_ids));

    return $stmt->fetchAll();
}
public function getOrderHistoryByUserId($tai_khoan_id) {
    $sql = "
        SELECT 
            dh.id, 
            dh.ten_nguoi_nhan, 
            dh.sdt_nguoi_nhan, 
            dh.dia_chi_nguoi_nhan, 
            dh.ngay_dat_hang, 
            dh.tong_tien, 
            tsdh.ten_trang_thai AS trang_thai
        FROM 
            donhangs dh
        JOIN 
            trangthaidonhangs tsdh ON dh.trang_thai_id = tsdh.id
        WHERE 
            dh.tai_khoan_id = ?
    ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$tai_khoan_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function getPaymentMethods()
{
    $sql = "SELECT id, ten_phuong_thuc FROM phuongthucthanhtoans";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function createOrder($userId, $ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $payment_method, $tong_tien, $cart_items) {
    // Câu lệnh SQL để chèn dữ liệu vào bảng donhangs (không có email_nguoi_nhan)
    $sql = "INSERT INTO donhangs (
        tai_khoan_id,
        ten_nguoi_nhan,
        sdt_nguoi_nhan,
        dia_chi_nguoi_nhan,
        ngay_dat_hang,
        tong_tien,
        phuong_thuc_thanh_toan_id,
        trang_thai_id
    ) VALUES (?, ?, ?, ?, NOW(), ?, ?, 1)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        $userId,
        $ten_nguoi_nhan,
        $sdt_nguoi_nhan,
        $dia_chi_nguoi_nhan,
        $tong_tien,
        $payment_method
    ]);

    // Lấy id đơn hàng vừa tạo
    $order_id = $this->conn->lastInsertId();
    return $order_id;
}
public function getUserInfoById($userId) {
        $sql = "SELECT ho_ten, dia_chi, so_dien_thoai FROM taikhoans WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}