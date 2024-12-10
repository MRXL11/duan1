<?php include_once 'layout/header.php'; ?>
<h1>Đặt hàng thành công </h1>


<?php
// success_order.php
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    // Hiển thị thông tin đơn hàng nếu cần
    echo "Đơn hàng của bạn đã được xác nhận. Mã đơn hàng: " . htmlspecialchars($orderId);
}
?>


<?php include_once 'layout/footer.php'; ?>