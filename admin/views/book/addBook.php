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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm sách</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham&id_san_pham=' . $book['id'] ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body row">
                <div class="form-group col-12">
                  <label>Tên sách</label>
                  <input type="text" class="form-control" name="ten" placeholder="Nhập tên sách" value="<?= isset($_POST['ten']) ? $_POST['ten'] : ''; ?>">
                  <?php if (isset($_SESSION['error']['ten'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ten'] ?></p>
                  <?php  } ?>
                </div>
                <div class="form-group col-12">
                  <label>Tên tác giả</label>
                  <input type="text" class="form-control" name="tac_gia" placeholder="Nhập tên tác giả" value="<?= isset($_POST['tac_gia']) ? $_POST['tac_gia'] : ''; ?>">
                  <?php if (isset($_SESSION['error']['tac_gia'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['tac_gia'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá sản phẩm</label>
                  <input type="number" class="form-control" name="gia" placeholder="Nhập giá sách" value="<?= isset($_POST['gia']) ? $_POST['gia'] : ''; ?>">
                  <?php if (isset($_SESSION['error']['gia'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng sách" value="<?= isset($_POST['so_luong']) ? $_POST['so_luong'] : ''; ?>">
                  <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                  <?php  } ?>
                </div>
                <div class="form-group col-3">
                  <label>Ảnh bìa</label>
                  <input type="file" class="form-control" name="hinh_anh">
                  <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group col-3">
                  <label>Album ảnh</label>
                  <input type="file" class="form-control" name="img_array[]" multiple>
                </div>

                <div class="form-group col-6">
                  <label>Ngày nhập</label>
                  <input type="date" class="form-control" name="ngay_nhap" placeholder="Ngày nhập" value="<?= isset($_POST['ngay_nhap']) ? $_POST['ngay_nhap'] : ''; ?>">
                  <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select class="form-control" name="id_danh_muc" id="exampleFormControlSelect1">
                    <option selected disabled>Chọn danh mục sách</option>
                    <?php foreach ($listCategory as $category): ?>
                      <option value="<?= $category['id'] ?>" <?= (isset($_POST['id_danh_muc']) && $_POST['id_danh_muc'] == $category['id']) ? 'selected' : ''; ?>><?= $category['ten_danh_muc'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php if (isset($_SESSION['error']['id_danh_muc'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['id_danh_muc'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Trạng thái</label>
                  <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                    <option selected disabled>Chọn trạng thái</option>
                    <option value="1" <?= (isset($_POST['trang_thai']) && $_POST['trang_thai'] == '1') ? 'selected' : ''; ?>>Còn hàng</option>
                    <option value="2" <?= (isset($_POST['trang_thai']) && $_POST['trang_thai'] == '2') ? 'selected' : ''; ?>>Hết hàng</option>
                  </select>
                  <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                  <?php  } ?>
                </div>

                <div class="form-group col-12">
                  <label>Mô tả</label>
                  <textarea name="mo_ta" id="" class="form-control" placeholder="Mô tả sách"><?= isset($_POST['mo_ta']) ? $_POST['mo_ta'] : ''; ?></textarea>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
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
