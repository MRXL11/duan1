<?php
class AdminBookController
{
    public $modelBook;
    public $modelCategory;
    public function __construct()
    {
        $this->modelBook = new AdminBook();
        $this->modelCategory = new AdminCategory();
    }
    public function danhSachSanPham()
    {

        $listBook = $this->modelBook->getAllBooks();
        require_once './views/book/listBook.php';
    }

    public function formAddSanPham()
    {
        // hiển thị form nhập
        // var_dump('Form thêm');
        $listCategory = $this->modelCategory->getAllCategory();

        require_once './views/book/addBook.php';
        // Xóa session sau khi load
        deleteSessionError();
    }
    public function postAddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'] ?? ' ';
            $gia = $_POST['gia'] ?? ' ';
            $so_luong = $_POST['so_luong'] ?? ' ';
            $ngay_nhap = $_POST['ngay_nhap'] ?? ' ';
            $id_danh_muc = $_POST['id_danh_muc'] ?? ' ';
            $trang_thai = $_POST['trang_thai'] ?? ' ';
            $mo_ta = $_POST['mo_ta'] ?? ' ';
            $tac_gia = $_POST['tac_gia'] ?? ' ';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Lưu hình ảnh vào
            $file_thumb = upLoadFile($hinh_anh, './uploads/');

            $img_array = $_FILES['img_array'];

            $errors = [];
            if (empty($ten)) {
                $errors['ten'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($tac_gia)) {
                $errors['tac_gia'] = 'Tên tác giả không được để trống';
            }
            if (empty($gia)) {
                $errors['gia'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($id_danh_muc)) {
                $errors['id_danh_muc'] = 'Tên danh mục phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm phải chọn';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Trạng thái sản phẩm phải chọn';
            }

            $_SESSION['error'] = $errors;

            // Nếu không có lỗi thì tiến hành thêm sản phẩm vào db
            if (empty($errors)) {
                $this->modelBook->insertBook($ten, $tac_gia, $gia, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $mo_ta, $file_thumb);
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // Trả lỗi và trả lại form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function deleteSanPham()
{
    $id_san_pham = $_GET['id_san_pham'] ?? null;

    if ($id_san_pham) {
        // Gọi phương thức trong model để xóa sản phẩm
        $this->modelBook->deleteBook($id_san_pham);
        header("Location: " . BASE_URL_ADMIN . '?act=san-pham'); // Quay lại trang danh sách sản phẩm
        exit();
    } else {
        header("Location: " . BASE_URL_ADMIN . '?act=san-pham'); // Nếu không có ID thì quay lại trang danh sách
        exit();
    }
}
public function formEditSanPham() {
    // Kiểm tra xem tham số id_san_pham có tồn tại trong URL không
    if (isset($_GET['id_san_pham'])) {
        $id = $_GET['id_san_pham']; // Lấy ID sản phẩm từ URL
        $book = $this->modelBook->getBookById($id); // Lấy thông tin sản phẩm từ DB

        if ($book) {
            // Lấy danh sách danh mục để chọn khi sửa sản phẩm
            $listCategory = $this->modelCategory->getAllCategory();
            require_once './views/book/editBook.php'; // Hiển thị form sửa
        } else {
            // Nếu không tìm thấy sản phẩm
            echo "Sản phẩm không tồn tại";
        }
    } else {
        // Nếu không có tham số id_san_pham trong URL
        echo "Không có ID sản phẩm trong URL.";
    }
}
public function postEditSanPham() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id_san_pham'] ?? null; // Lấy ID từ POST nếu có

        if (!$id) {
            echo "Không có ID sản phẩm trong form";
            exit();
        }

        $ten = $_POST['ten'] ?? '';
        $gia = $_POST['gia'] ?? '';
        $so_luong = $_POST['so_luong'] ?? '';
        $ngay_nhap = $_POST['ngay_nhap'] ?? '';
        $id_danh_muc = $_POST['id_danh_muc'] ?? '';
        $trang_thai = $_POST['trang_thai'] ?? '';
        $mo_ta = $_POST['mo_ta'] ?? '';
        $hinh_anh = $_FILES['hinh_anh'] ?? null;

        // Xử lý upload hình ảnh nếu có
        if ($hinh_anh && $hinh_anh['error'] === 0) {
            $file_thumb = upLoadFile($hinh_anh, './uploads/');
        }

        // Kiểm tra dữ liệu hợp lệ
        $errors = [];
        if (empty($ten)) {
            $errors['ten'] = 'Tên sản phẩm không được để trống';
        }
        if (empty($gia)) {
            $errors['gia'] = 'Giá sản phẩm không được để trống';
        }
        if (empty($so_luong)) {
            $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
        }
        if (empty($ngay_nhap)) {
            $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
        }
        if (empty($id_danh_muc)) {
            $errors['id_danh_muc'] = 'Danh mục sản phẩm không được để trống';
        }
        if (empty($trang_thai)) {
            $errors['trang_thai'] = 'Trạng thái sản phẩm không được để trống';
        }

        // Nếu không có lỗi thì cập nhật sản phẩm
        if (empty($errors)) {
            $this->modelBook->updateBook($id, $ten, $gia, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $mo_ta, $file_thumb);
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        } else {
            // Nếu có lỗi, lưu lỗi vào session và quay lại form
            $_SESSION['error'] = $errors;
            header("Location: " . BASE_URL_ADMIN . "?act=form-sua-san-pham&id=$id");
            exit();
        }
    }
}

}
