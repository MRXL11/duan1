<?php include_once 'layout/header.php'; ?>

<div class="row boxcontent cart">
    <div class="container">
    <form method="POST" action="?act=postOrder">

    <table>
        <thead>
            <tr>
                <th>
                    <!-- Checkbox "Chọn tất cả" -->
                    <input type="checkbox" id="select_all">
                </th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td>
                        <!-- Checkbox cho từng sản phẩm -->
                        <input 
                            type="checkbox" 
                            name="selected_items[]" 
                            value="<?= htmlspecialchars($item['san_pham_id']) ?>" 
                            data-thanh-tien="<?= htmlspecialchars($item['thanh_tien']) ?>"
                        >
                    </td>
                    <td><?= htmlspecialchars($item['ten']) ?></td>
                    <td><img src="<?= htmlspecialchars($item['hinh_anh']) ?>" alt="Hình ảnh sản phẩm" width="50"></td>
                    <td><?= number_format($item['so_luong'])?></td>
                    <td><?= number_format($item['don_gia'], 0, ',', '.') ?> đ</td>
                    <td><?= number_format($item['thanh_tien'], 0, ',', '.') ?> đ</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <!-- Hiển thị tổng tiền -->
        <strong>Tổng tiền: </strong>
        <span id="tong-tien">0</span> đ
    </div>

    <button type="submit" name="buy_now">Mua hàng</button>
</form>

    </div>
</div>


    <script>
    function updateTotal() {
        let total = 0;
        document.querySelectorAll('input[name="selected_items[]"]:checked').forEach(function(checkbox) {
            total += parseFloat(checkbox.getAttribute('data-thanh-tien')) || 0;
        });
        document.getElementById('tong-tien').textContent = total.toLocaleString('vi-VN');
    }

    // Khi checkbox "Chọn tất cả" thay đổi
    document.getElementById('select_all').addEventListener('change', function() {
        const isChecked = this.checked;
        document.querySelectorAll('input[name="selected_items[]"]').forEach(function(checkbox) {
            checkbox.checked = isChecked;
        });
        updateTotal();
    });

    // Cập nhật tổng tiền khi checkbox của từng sản phẩm thay đổi
    document.querySelectorAll('input[name="selected_items[]"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', updateTotal);
    });

    // Chạy một lần để cập nhật tổng tiền khi tải trang
    updateTotal();
</script>




<?php include_once 'layout/footer.php'; ?>