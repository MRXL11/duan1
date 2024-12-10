<?php include_once 'layout/header.php'; ?>

<?php
if (isset($_POST['confirm_order'])) {
    // Kiểm tra và xử lý đơn hàng ở đây (lưu vào cơ sở dữ liệu, gửi email, vv.)
    echo "<script>alert('Đơn hàng đã được xác nhận!'); window.location.href = 'thank_you.php';</script>";
    exit(); // Ngừng script nếu đã xử lý xong
}
?>

<div class="container">
    <div class="row mb">
    <form action="?act=order&act=confirmOrder" method="POST">
    <div class="row mb">
        <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
        <div class="row boxcontent billform">
            <table>
                <tr>
                    <td>Người đặt</td>
                    <td><input type="text" name="ho_ten" value="<?= isset($_SESSION['user']['ho_ten']) ? htmlspecialchars($_SESSION['user']['ho_ten']) : '' ?>" required></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="dia_chi" value="<?= isset($_SESSION['user']['dia_chi']) ? htmlspecialchars($_SESSION['user']['dia_chi']) : '' ?>" required></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="text" name="so_dien_thoai" value="<?= isset($_SESSION['user']['so_dien_thoai']) ? htmlspecialchars($_SESSION['user']['so_dien_thoai']) : '' ?>" required></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mb">
        <div class="boxtitle">Phương thức thanh toán</div>
        <div class="row boxcontent">
            <select name="payment_method" id="payment_method" required>
                <option value="" disabled selected>Chọn phương thức thanh toán</option>
                <option value="1">Tiền mặt (COD)</option>
                <option value="2">Chuyển khoản</option>
            </select>
        </div>
    </div>
    <div class="row mb">
        <div class="boxtitle">Thông tin giỏ hàng</div>
        <div class="row boxcontent cart">
            <table>
                <tr>
                    <th>Hình</th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Chọn</th>
                </tr>
                <?php
                $tong = 0;
                if (isset($_SESSION['selected_cart']) && count($_SESSION['selected_cart']) > 0) {
                    foreach ($_SESSION['selected_cart'] as $i => $cartItem) {
                        $don_gia = $cartItem['don_gia'] ?? 0;
                        $ten = htmlspecialchars($cartItem['ten'] ?? '');
                        $hinh_anh = htmlspecialchars($cartItem['hinh_anh'] ?? 'default-image.jpg');
                        $so_luong = $cartItem['so_luong'] ?? 1;
                        $thanh_tien = $don_gia * $so_luong;
                        $tong += $thanh_tien;

                        echo '
                        <tr>
                            <td><img src="' . $hinh_anh . '" alt="' . $ten . '" width="100"></td>
                            <td>' . $ten . '</td>
                            <td>' . number_format($don_gia, 0, ',', '.') . '</td>
                            <td>' . $so_luong . '</td>
                            <td>' . number_format($thanh_tien, 0, ',', '.') . '</td>
                            <td><a href="?act=remove_item&id=' . $i . '">Xóa</a></td>
                        </tr>';
                    }

                    echo '
                    <tr>
                        <td colspan="4">Tổng tiền đơn hàng</td>
                        <td>' . number_format($tong, 0, ',', '.') . '</td>
                    </tr>';
                    echo '<input type="hidden" name="tong_tien" value="' . $tong . '">';
                } else {
                    echo '<tr><td colspan="6">Giỏ hàng của bạn đang trống.</td></tr>';
                }
                ?>
            </table>
        </div>
    </div>
    <div class="row mb">
        <input type="submit" value="Xác nhận đơn hàng" name="confirm_order">
    </div>
</form>
    </div>
</div>

<?php include_once 'layout/footer.php'; ?>