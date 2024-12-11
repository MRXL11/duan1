<?php
class AdminOrderController
{
    public $modelOrder;
    public $modelOrderStatus;

    public function __construct()
    {
        $this->modelOrder = new AdminOrder();
        $this->modelOrderStatus = new AdminOrderStatus();
    }

    // Hiển thị danh sách đơn hàng
    public function danhSachDonHang()
    {
        $listOrders = $this->modelOrder->getAllOrders();
        require_once './views/order/listOrder.php';
    }

    // Hiển thị chi tiết đơn hàng (có thể sửa trạng thái)
    public function chiTietDonHang()
    {
        $id_order = $_GET['id'] ?? null;
        if ($id_order) {
            $order = $this->modelOrder->getOrderById($id_order);
            $listStatuses = $this->modelOrderStatus->getAllStatuses();

            if ($order) {
                require_once './views/order/detailOrder.php';
            } else {
                echo "Đơn hàng không tồn tại.";
            }
        } else {
            echo "ID đơn hàng không được cung cấp.";
        }
    }

    // Cập nhật trạng thái đơn hàng
    public function postEditStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_order = $_POST['id_order'];
            $trang_thai_id = $_POST['trang_thai_id'];

            $this->modelOrder->updateOrderStatus($id_order, $trang_thai_id);

            header("Location: " . BASE_URL_ADMIN . "?act=chi-tiet-don-hang&id=$id_order");
            exit();
        }
    }
    public function thongKeDonHangForm()
    {
        // Lấy giá trị ngày bắt đầu và kết thúc từ URL nếu có
        $start_date = $_GET['start_date'] ?? null;
        $end_date = $_GET['end_date'] ?? null;
    
        // Kiểm tra nếu cả hai tham số đã được truyền vào
        if ($start_date && $end_date) {
            // Lấy thống kê đơn hàng từ model
            $orders = $this->modelOrder->getOrdersByDateRange($start_date, $end_date);
        } else {
            // Nếu không có tham số, bạn có thể xử lý việc hiển thị thông báo lỗi hoặc không có dữ liệu
            $orders = [];
        }
    
        // Truyền dữ liệu đến view
        require_once './views/order/statisticsOrder.php';
    }
    public function thongKeDonHang() {
        // Lấy start_date và end_date từ URL hoặc form
        $start_date = $_GET['start_date'] ?? null;
        $end_date = $_GET['end_date'] ?? null;
    
        // Kiểm tra xem đã có giá trị start_date và end_date hay chưa
        if ($start_date && $end_date) {
            // Gọi phương thức từ model để lấy đơn hàng trong khoảng thời gian
            $orders = (new AdminOrder())->getOrdersByDateRange($start_date, $end_date);
            
            // Truyền kết quả sang view
            require_once './views/order/statistics.php';
        } else {
            echo "Vui lòng chọn khoảng thời gian để thống kê.";
        }
    }

}
