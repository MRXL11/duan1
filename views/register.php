<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <h1>Đăng ký</h1>
    <form method="POST" enctype="multipart/form-data" action="">
        <div>
            <label for="ho_ten">Họ và tên:</label>
            <input type="text" name="ho_ten" id="ho_ten" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="so_dien_thoai">Số điện thoại:</label>
            <input type="text" name="so_dien_thoai" id="so_dien_thoai" required>
        </div>
        <div>
            <label for="mat_khau">Mật khẩu:</label>
            <input type="password" name="mat_khau" id="mat_khau" required>
        </div>
        <div>
            <label for="anh_dai_dien">Ảnh đại diện:</label>
            <input type="file" name="anh_dai_dien" id="anh_dai_dien">
        </div>
        <div>
            <button type="submit">Đăng ký</button>
        </div>
    </form>
</body>
</html>
