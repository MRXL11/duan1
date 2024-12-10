<?php include_once 'layout/header.php'; ?>

<div class="row boxcontent cart">
    <div class="container">
    <form method="post" action="?act=deleteSelected">
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
        $i = 0; // Khởi tạo chỉ mục
        // Kiểm tra nếu giỏ hàng không rỗng
        if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
            foreach ($_SESSION['mycart'] as $cart) {
                // Kiểm tra xem sản phẩm có đầy đủ thông tin không
                if (empty($cart['ten']) || empty($cart['gia']) || empty($cart['hinh_anh'])) {
                    continue; // Bỏ qua sản phẩm không đầy đủ thông tin
                }

                // Tạo checkbox xóa sản phẩm
                $xoasp = '<input type="checkbox" name="selected_items[]" value="' . $i . '">';

                // Nếu thông tin đầy đủ, tiếp tục xử lý
                $ten = htmlspecialchars($cart['ten']);
                $gia = htmlspecialchars($cart['gia']);
                $hinh_anh = htmlspecialchars($cart['hinh_anh']);
                $so_luong = htmlspecialchars($cart['so_luong'] ?? 1);
                $thanh_tien = htmlspecialchars($cart['thanh_tien'] ?? 0);

                // Tính tổng
                $tong += $thanh_tien;
                
                // Hiển thị thông tin giỏ hàng
                echo '
                <tr>
                    <td><img src="' . ($hinh_anh ? $hinh_anh : 'default-image.jpg') . '" alt="' . $ten . '" width="100"></td>
                    <td>' . $ten . '</td>
                    <td>' . number_format($gia, 2) . '</td>
                    <td>' . $so_luong . '</td>
                    <td>' . number_format($thanh_tien, 2) . '</td>
                    <td>' . $xoasp . '</td>
                </tr>';

                // Tăng chỉ mục để cập nhật id
                $i++;
            }

            echo '
            <tr>
                <td colspan="4">Tổng tiền đơn hàng</td>
                <td>' . number_format($tong, 2) . '</td>
            </tr>';
        } else {
            echo '<tr><td colspan="6">Giỏ hàng của bạn đang trống.</td></tr>';
        }
        ?>
    </table>

    <!-- Checkbox "Chọn tất cả" -->
    <div>
        <input type="checkbox" id="select_all"> Chọn tất cả
    </div>

    <input type="submit" value="XÓA SẢN PHẨM ĐÃ CHỌN" name="delete_selected">
</form>

    </div>
</div>
<script>
    // Khi người dùng click vào checkbox "Chọn tất cả"
    document.getElementById('select_all').addEventListener('change', function() {
        // Lấy tất cả các checkbox của sản phẩm
        var checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
        // Duyệt qua tất cả các checkbox và thay đổi trạng thái chọn
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = document.getElementById('select_all').checked;
        });
    });
</script>


<?php include_once 'layout/footer.php'; ?>
