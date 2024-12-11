<?php include_once 'layout/header.php'; ?>
<?php if ($orderHistory): ?>
    <h2>Lịch sử đơn hàng của bạn</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderHistory as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['id']) ?></td>
                    <td><?= htmlspecialchars($order['ngay_dat_hang']) ?></td>
                    <td><?= number_format($order['tong_tien'], 0, ',', '.') ?> VND</td>
                    <td><?= htmlspecialchars($order['trang_thai']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Không có đơn hàng nào trong lịch sử của bạn.</p>
<?php endif; ?>
<?php include_once 'layout/footer.php'; ?>