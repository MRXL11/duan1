<?php include_once 'layout/header.php'; ?>
<h1>Quét mã QR thanh toán </h1>


<?php
// QRcode.php
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    // Tạo QR code hoặc chuyển đến hệ thống thanh toán chuyển khoản
    echo "Đơn hàng của bạn có mã số: " . htmlspecialchars($orderId);
}
?>
?>


<?php include_once 'layout/footer.php'; ?>