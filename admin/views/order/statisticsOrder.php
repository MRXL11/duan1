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
                    <h1>Thống kê</h1>
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
                        <h1>Thống kê đơn hàng</h1>
                        <form action="" method="GET">
                            <div>
                                <label for="start_date">Ngày bắt đầu:</label>
                                <input type="date" name="start_date" id="start_date" value="<?= $_GET['start_date'] ?? '' ?>" required>
                            </div>
                            <div>
                                <label for="end_date">Ngày kết thúc:</label>
                                <input type="date" name="end_date" id="end_date" value="<?= $_GET['end_date'] ?? '' ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Xem thống kê</button>
                        </form>


                        <h2>Kết quả thống kê</h2>
                        <?php if (!empty($orders)): ?>
                            <h2>Thống kê đơn hàng từ <?= $start_date ?> đến <?= $end_date ?></h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <tr>
                                            <td><?= $order['id'] ?></td>
                                            <td><?= $order['ngay_dat_hang'] ?></td>
                                            <td><?= $order['ten_trang_thai'] ?></td>
                                            <td><?= $order['tong_tien'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Không có đơn hàng nào trong khoảng thời gian này.</p>
                        <?php endif; ?>
                        </tbody>
                        </table>

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