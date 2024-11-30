<form method="POST" action="?controller=auth&action=register">
    <h2>Đăng ký</h2>
    <label>Họ tên:</label>
    <input type="text" name="ho_ten" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Số điện thoại:</label>
    <input type="text" name="so_dien_thoai" required>
    <label>Mật khẩu:</label>
    <input type="password" name="mat_khau" required>
    <label>Xác nhận mật khẩu:</label>
    <input type="password" name="confirm_mat_khau" required>
    <button type="submit">Đăng ký</button>

    <?php if (!empty($result) && $result !== true): ?>
        <p style="color: red;"><?php echo htmlspecialchars($result); ?></p>
    <?php endif; ?>
</form>