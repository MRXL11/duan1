<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham&id_san_pham=' . $book['id'] ?>" method="POST" enctype="multipart/form-data">
                            <!-- Thêm hidden input để gửi id_san_pham -->
                            <input type="hidden" name="id_san_pham" value="<?= $book['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_san_pham">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="ten_san_pham" value="<?= htmlspecialchars($book['ten']) ?>" placeholder="Nhập tên sản phẩm" required>
                                    <?php if (isset($errors['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="gia">Giá sản phẩm</label>
                                    <input type="number" class="form-control" name="gia" value="<?= htmlspecialchars($book['gia']) ?>" placeholder="Nhập giá sản phẩm" required>
                                    <?php if (isset($errors['gia'])) { ?>
                                        <p class="text-danger"><?= $errors['gia'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="so_luong">Số lượng</label>
                                    <input type="number" class="form-control" name="so_luong" value="<?= htmlspecialchars($book['so_luong']) ?>" placeholder="Nhập số lượng sản phẩm" required>
                                    <?php if (isset($errors['so_luong'])) { ?>
                                        <p class="text-danger"><?= $errors['so_luong'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="id_danh_muc">Danh mục</label>
                                    <select class="form-control" name="id_danh_muc" required>
                                        <option value="">Chọn danh mục</option>
                                        <?php foreach ($listCategory as $category) { ?>
                                            <option value="<?= $category['id'] ?>" <?= $category['id'] == $book['id_danh_muc'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($category['ten_danh_muc']) ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ngay_nhap">Ngày nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap" value="<?= htmlspecialchars($book['ngay_nhap']) ?>" required>
                                    <?php if (isset($errors['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $errors['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="trang_thai">Trạng thái</label>
                                    <select class="form-control" name="trang_thai" required>
                                        <option value="1" <?= $book['trang_thai'] == 1 ? 'selected' : '' ?>>Còn hàng</option>
                                        <option value="0" <?= $book['trang_thai'] == 0 ? 'selected' : '' ?>>Hết hàng</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="mo_ta">Mô tả</label>
                                    <textarea class="form-control" name="mo_ta" placeholder="Mô tả sản phẩm" required><?= htmlspecialchars($book['mo_ta']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="hinh_anh">Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh">
                                    <?php if (isset($errors['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $errors['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
</body>

</html>