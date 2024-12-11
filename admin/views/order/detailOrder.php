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
                    <h1>Quản lý danh sách</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <h2>Chi Tiết Đơn Hàng</h2>
                            <p><strong>Tên Người Nhận:</strong> <?= $order['ten_nguoi_nhan'] ?></p>
                            <p><strong>Số Điện Thoại:</strong> <?= $order['sdt_nguoi_nhan'] ?></p>
                            <p><strong>Địa Chỉ:</strong> <?= $order['dia_chi_nguoi_nhan'] ?></p>
                            <p><strong>Ngày Đặt Hàng:</strong> <?= $order['ngay_dat_hang'] ?></p>
                            <p><strong>Tổng Tiền:</strong> <?= $order['tong_tien'] ?></p>
                            <p><strong>Trạng Thái:</strong> <?= $order['trang_thai_ten'] ?></p>

                            <h3>Cập Nhật Trạng Thái</h3>
                            <form action="<?= BASE_URL_ADMIN . '?act=post-edit-status' ?>" method="POST">
                                <input type="hidden" name="id_order" value="<?= $order['id'] ?>">
                                <select name="trang_thai_id">
                                    <?php foreach ($listStatuses as $status): ?>
                                        <option value="<?= $status['id'] ?>" <?= $status['id'] == $order['trang_thai_id'] ? 'selected' : '' ?>>
                                            <?= $status['ten_trang_thai'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit">Cập Nhật</button>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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

<!-- END Footer -->
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>

</html>