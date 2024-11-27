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
                            <h1>Quản lý danh sách Sách</h1>
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
                                <div class="card-header">
                                    <a href="<?=BASE_URL_ADMIN.'?act=form-them-san-pham' ?>">
                                        <button class="btn btn-success">Thêm sách</button>
                                    </a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sách</th>
                                                <th>Ảnh bìa</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Danh mục</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listBook as $key=>$book): ?>
                                            <tr>
                                                <td><?= $key+1?></td>
                                                <td><?= $book['ten'] ?></td>
                                                <td>
                                                    <img src="<?=BASE_URL. $book['hinh_anh'] ?>" style="width: 100px" alt=""
                                                    onerror="this.onerror=null; this.src='https://khothietke.net/wp-content/uploads/2021/05/PNGkhothietke.net-02705.png'"
                                                    >
                                                </td>
                                                <td><?= $book['gia'] ?></td>
                                                <td><?= $book['so_luong'] ?></td>
                                                <td><?= $book['ten_danh_muc'] ?></td>
                                                <td><?= $book['trang_thai'] == 1? 'Còn hàng':'Hết hàng' ?></td>
                                                <td>
                                                    <a href="<?=BASE_URL_ADMIN.'?act=form-sua-san-pham&id_san_pham='. $book['id'] ?>">
                                                    <button class="btn btn-warning">Sửa</button>
                                                    </a>

                                                    <a href="<?=BASE_URL_ADMIN.'?act=xoa-san-pham&id_san_pham='. $book['id'] ?>" 
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                                    <button class="btn btn-danger">Xóa</button>
                                                    </a>
                                                </td>
                                            </tr>
                                           <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>STT</th>
                                                <th>Tên sách</th>
                                                <th>Ảnh bìa</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Danh mục</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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